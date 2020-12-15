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
			if($type=="איחסון אתרים" or $type=="שרתי משחק" and $price < 50)
			$price = $price *6;
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
				if($type=="איחסון אתרים"  or $type=="שרתי משחק" and $price < 50)
									echo "<li>תקופה: <strong>6 חודשים</strong></li>";

			?>
				
			</ul>
		</div>
		
		
		
			<input class="buy_now_btn" type="submit" name="submit" value="קנה עכשיו!" />
		</form>
		<?php
		
			if(isset($_POST['submit'])) {
				if(!isset($_SESSION['Username']))
					die(' <meta http-equiv="Refresh" content="0; url=register">');
				$checkRepeatQ = $mysqli->query("SELECT `date` FROM `".PREFIX."_orders` WHERE `userid`='".$User->get_Id()."' ORDER BY `date` DESC LIMIT 1");
				$checkRepeat= $checkRepeatQ->fetch_assoc();
				if($checkRepeatQ->num_rows == 0 || ((time() - $checkRepeat['date']) >= 300)) {
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