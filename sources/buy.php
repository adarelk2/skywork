<?php
if(!isset($_SESSION['Username'])) {
	die(' <meta http-equiv="Refresh" content="0; url=register">');
}
if(!isset($_GET['product_id']) || empty($_GET['product_id']))
	$_GET['product_id'] = 0;
$product_id = secur($_GET['product_id'],"int");
	
	$productq = $mysqli->query("SELECT * FROM `".PREFIX."_product` WHERE `id`='{$product_id}'");
	if($productq->num_rows == 0)
		die(' <meta http-equiv="Refresh" content="0; url=index.php">');

	$productData = $productq->fetch_assoc();
	
	if($productData['type'] == "servers")
		$type = "שרתי משחק";
	if($productData['type'] == "hosts")
		$type = "איחסון אתרים";
	if($productData['type'] == "virtual")
		$type = "שרתים ווירטואליים";
	if($productData['type'] == "clouds")
		$type = "גיבוי בענן";
	if($productData['type'] == "domains")
		$type = "שמות מתחם";
?>
<div class="clear"></div>	
<div id="page">
	<div id="page-top">
		<div class="container">
			<h1>סיכום רכישה</h1>
			<a class="conbutton" href="contact">צרו איתנו קשר</a>
		</div>
	</div>
	<div class="container">
		<h1 style="font-size: 1.7em;padding: 10px 0 10px 0;float: right;width: 100%;">
			פרטי המוצר
		</h1>
		
		<div id="buy_block">
			<p><?= $type ?>: <strong><?= $productData['title'] ?></strong></p>
			<?php
				$params = json_decode($productData['parameters']);
				$getid = $mysqli->query("SELECT broker_id from turing_members where email = '$_SESSION[Username]'");
				$getid = $getid->fetch_assoc();
				$getBroder_code = $mysqli->query("SELECT id from Broker_code where id = '$getid[broker_id]'");
				if($getBroder_code->num_rows ==1)
				{
				$firstprice = $productData['price'] / 10;
				$price =$productData['price'] - $firstprice;
				echo "הנחה 10%";
				}
				else
				$price = $productData['price'];
				if (isset($_GET['extradisk'])) {
					$price += 30;
				}
				
				if (isset($_GET['webpanel'])) {
					$price += 50;
				}
				
				if (isset($_GET['gamepanel'])) {
					$price += 50;
				}
				
				if(isset($_GET['exstraram'])) {
					$price += 30;
				}
				$sixmounth = 0;
				if($price < 50)
				{
			if($type=="איחסון אתרים")
			if($price <=1)
			$price =0;
			else
{
			$price = $price *3;
			$sixmounth =1;
}			
				}
			?>
			<span>סה"כ: <strong id="price"><?= $price ?>&#8362;</strong></span>
			<form method="post">
						<input type="hidden" max=99999 name="brokerid" placeholder="קוד מתווך" style="border: 1px solid #d7d7d7;" />

			<ul>
			<?php
				
				//echo json_encode($params);
				foreach($params as $key => $value) {
					if($key != "game") {
						if($productData['type'] == "servers" && ($key == "files" || $key == "ddos" || $key == "website" || $key == "ftp" || $key == "rdp"  || $key == "panel"))
						{
							$value = ($value == 1) ? "כלול" : "לא כלול";
						}					
						echo "<li>".$translateJs[$key].": <strong>{$value}</strong></li>";

					}
					
				}
				$extra = "";
				
				if (isset($_GET['extradisk'])) {
					echo "<li>".$translateJs['extradisk'].": <strong>כלול</strong></li>";
					$extra .= "extradisk,";
				}
				
				if (isset($_GET['webpanel'])) {
					echo "<li>".$translateJs['webpanel'].": <strong>כלול</strong></li>";
					$extra .= "webpanel,";
				}
				
				if (isset($_GET['exstraram'])) {
					echo "<li>".$translateJs['exstraram'].": <strong>כלול</strong></li>";
					$extra .= "exstraram,";
				}
				
				if(isset($_GET['gamepanel'])) {
					echo "<li>".$translateJs['gamepanel'].": <strong>כלול</strong></li>";
					$extra .= "gamepanel";
				}
				
				if(substr($extra, -1) == ",") {
					$extra = substr($extra, 0, -1);
				}
				
				if($sixmounth ==1){
				if($type=="איחסון אתרים")
				echo "<li>תקופה: <strong>3 חודשים</strong></li>";
				}
				
				
			?>
				
			</ul>
		</div>
		
		<style>
.buy_now_btn {
    line-height: 20px;
    background: #6fb10e;
    cursor: pointer;
    border-radius: 5px;
    font-weight: bold;
    padding: 8px 35px;
    color: #FFF;
    text-shadow: 1px 1px 0 #4b6d19;
    margin: 10px 0 15px 0;
	</style>
			<? if($price <=0)
			{
				?>
							<form method=POST><input type=submit class="buy_now_btn" name="GetFree" value="קבל בחינם!"></form>
			<?} else
			{
				?>
				<button class="buy_now_btn" id="package-<?php echo $product_id;?>-<?php echo $price;?>">קנה עכשיו!</button>
			<?}?>
		</form>
					<script>
						var base_url = $('base').attr('href');
						$('button[id^="package-"]').on('click', function(e){
							e.preventDefault();
							var id = $(this).attr('id').split("-")[1];
							var extra = $(this).attr('id').split("-")[2];
							PaypalSubmit(id, extra);
						});
						function PaypalSubmit(id, extra){
							$.ajax({
								type: 'post',
								dataType: 'json',
								url: base_url+'paypal_helper.php',
								data: {
									id: id,
									extra: extra
								},
								success: function(data){
									if(data.error){
										alert(data.error);
									}
									else{
										var form = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post">';
										form += '<input type="hidden" name="cmd" value="_donations" />';
										form += '<input type="hidden" name="rm" value="2" />';
										form += '<input type="hidden" name="business" value="'+data.email+'" />';
										form += '<input type="hidden" name="item_name" value="Donate for '+$('title').html()+'" />';
										form += '<input type="hidden" name="item_number" value="'+data.item_number+'" />';
										form += '<input type="hidden" name="currency_code" value="'+data.currency_code+'" />';
										form += '<input type="hidden" name="amount" value="'+data.amount+'" />';
										form += '<input type="hidden" name="no_shipping" value="1" />';
										form += '<input type="hidden" name="shipping" value="0.00" />';
										form += '<input type="hidden" name="return" value="'+base_url+'" />';
										form += '<input type="hidden" name="cancel_return" value="'+base_url+'" />';
										form += '<input type="hidden" name="notify_url" value="'+base_url+'paypal.php" />';
										form += '<input type="hidden" name="custom" value="'+data.user+'" />';
										form += '<input type="hidden" name="no_note" value="1" />';
										form += '<input type="hidden" name="tax" value="0.00" />';
										form += '<input type="submit" value="Donate" />';
										form += '</form>';
										$(form).appendTo('body').submit();
									}
								}
							});
						}
					</script>
		<?php
		
			if(isset($_POST['GetFree'])) {
				if(!isset($_SESSION['Username']))
					die(' <meta http-equiv="Refresh" content="0; url=register">');
				$checkRepeatQ = $mysqli->query("SELECT `date` FROM `".PREFIX."_orders` WHERE `userid`='".$User->get_Id()."' ORDER BY `date` DESC LIMIT 1");
				$checkRepeat= $checkRepeatQ->fetch_assoc();
				if($checkRepeatQ->num_rows == 0 || ((time() - $checkRepeat['date']) >= 500)) { // 500
					if($_POST['brokerid'] =="")
					{
						$mysqli->query("INSERT INTO `turing_orders` (`date`, `userid`, `productid`,`extra`, `status`, `ip`, `Cost`) VALUES ('".time()."', '{$User->get_Id()}', '{$product_id}', '{$extra}', '0', '{$_SERVER['REMOTE_ADDR']}', '$price')");
						
				echo "
					<div class='okay_area'>
						המוצר נרכש בהצלחה, צוות החברה יצור איתך קשר תוך 24 שעות!
					</div>
				";
				echo ' <meta http-equiv="Refresh" content="2; url=private_area">';
					}
					else
					{
						$checkbrokerid = $mysqli->query("SELECT `broker_id` FROM `".PREFIX."_broker` WHERE `broker_id`='$_POST[brokerid]'");
						if($checkbrokerid->num_rows <=0)
					{
					echo '<div class="tickets_ok">
						<span>קוד מתווך אינו קיים במערכת.</span>
					</div>';	
					}
					else
					{
						$mysqli->query("INSERT INTO `turing_orders` (`date`, `userid`, `productid`,`extra`, `status`, `ip`, `broker_id`, `Cost`) VALUES ('".time()."', '{$User->get_Id()}', '{$product_id}', '{$extra}', '0', '{$_SERVER['REMOTE_ADDR']}', '$_POST[brokerid]', '$price')");
				
				echo "
					<div class='okay_area'>
						המוצר נרכש בהצלחה, צוות החברה יצור איתך קשר תוך 24 שעות!
					</div>
				";
				echo ' <meta http-equiv="Refresh" content="2; url=private_area">';
				} 
					}
					
				}
				else {
				echo '<div class="tickets_ok">
						<span>יש לחכות 5 דקות לפחות בין כל רכישה.</span>
					</div>';
				
				}
				
			}
			
		?>
	</div>
</div>