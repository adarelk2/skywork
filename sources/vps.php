„<?php
$page = secur($_GET['page'],"string");
$getJson = $mysqli->query("SELECT `json` FROM `".PREFIX."_editblock` WHERE `name`='{$page}'")->fetch_assoc();
$JsonData = json_decode($getJson['json']);
?>
<script>
$(function() {
	
	$(".lastdesc input[type=checkbox]").change(function() {
		var price = $(this).attr("data-price");
		var new_price = 0;
		
		var total_elm = $("#hosting-packages-tabs-tabs .active").find(".tab-bottom p strong");
		var total = total_elm.text();
		total = total.replace("₪", "");
		
		var n = total.indexOf('.');
		total = total.substring(0, n != -1 ? n : total.length);
		total = total.replace(/\D/g, '');
		
		var str = $(this).is(":checked");
		
		if (str == true)
			new_price = ( parseInt(total) + parseInt(price) );
		else
			new_price = ( parseInt(total) - parseInt(price) );
		
		total_elm.text(new_price.toLocaleString('he-IL', {style: 'currency', currency: 'ILS'}));
	});
});
</script>
<div class="clear"></div>	
	<div id="page" style="float: right; margin-top: -25px;">
		<div id="page-top">
			<div class="container">
				<h1>שרתים וירטואליים</h1>
				<a class="conbutton" href="#">צרו איתנו קשר</a>
			</div>
		</div>
		
		<div id="hosting" class="hosting-vps" style="font-family: myFirstFont;line-height: 1.5em;">
			<div id="hosting-top">
				<div class="container">
					<div id="hosting-title">
						<img src="assets/images/server.png" alt="server" />
						<h2><?php editAdmin($JsonData->title,"title"); ?></h2>
						<p><?php editAdmin($JsonData->sub_title,"sub_title"); ?></p>
					</div>
					<div id="hosting-con">
						<div>
							<?php editAdmin($JsonData->text1,"text1"); ?>
							<br /><br />
							<strong><?php editAdmin($JsonData->title2,"title2"); ?></strong><br /><br />
							<?php editAdmin($JsonData->text2,"text2"); ?>
						</div>
					</div>
				</div>
			</div>			
			<div id="hosting-threeblocks">
				<div class="container">
					<h2><?php editAdmin($JsonData->why_choose,"why_choose"); ?></h2>
					<div class="hosting-threeblocks-item">
						<!--<svg xmlns="https://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="88.4" height="88.4" viewBox="0 0 88.4 88.4" xml:space="preserve"><polygon points="67.4 0 34.3 0 21 47.7 34.3 47.7 23 88.4 27 88.4 65.4 40.7 45.9 40.7 "/></svg>-->
						<h3><?php editAdmin($JsonData->choose1_title,"choose1_title"); ?></h3>
						<div><?php editAdmin($JsonData->choose1_text,"choose1_text"); ?></div>
					</div>
					<div class="hosting-threeblocks-item">
						<h3><?php editAdmin($JsonData->choose2_title,"choose2_title"); ?></h3>
						<div><?php editAdmin($JsonData->choose2_text,"choose2_text"); ?></div>
					</div>
					<div class="hosting-threeblocks-item">
						<h3><?php editAdmin($JsonData->choose3_title,"choose3_title"); ?></h3>
						<div><?php editAdmin($JsonData->choose3_text,"choose3_text"); ?></div>
					</div>
				</div>
			</div>
			
			<div class="container">
				<div id="hosting-packages-tabs">
					<div id="hosting-packages-tabs-top">
						<ul>
						<?php
							$arr =array("first","two","three","four");
							$qVps = $mysqli->query("SELECT * FROM `".PREFIX."_product` WHERE `type`='virtual' LIMIT 4");
							$counter = 0;
							while($Data = $qVps->fetch_assoc())	{	
							?>
							
							<li class="<?= $arr[$counter] ?>-package <?php if($counter == 0) echo 'active' ?>">
								<p><?= $Data['title'] ?></p>
								<span><?= $counter+1 ?></span>
							</li>
							
							<?php
								$counter++;
							}
							?>
						</ul>
					</div>
					<div id="hosting-packages-tabs-tabs">
						<?php
							$counter = 0;
							$qVps = $mysqli->query("SELECT * FROM `".PREFIX."_product` WHERE `type`='virtual' LIMIT 4");
							while($Data = $qVps->fetch_assoc())	{
								$json = json_decode($Data['parameters']);
						?>
						<form method="post">
							<div class="hosting-packages-tabs-tab <?= $arr[$counter] ?>-tab <?php if($counter == 0) echo 'active' ?>">
								<div class="tab-desc"><h3>מעבד:</h3><p><?= $json->prossesor ?></p></div>
								<div class="tab-desc"><h3>ליבות:</h3><p><?= $json->lib ?></p></div>
								<div class="tab-desc"><h3>זיכרון:</h3><p><?= $json->memory ?></p></div>
								<div class="tab-desc"><h3>הגנות DDOS:</h3><p><?php echo ($json->ddos == 1) ? "<strong>הגנה מלאה</strong>" : "ללא" ?></p></div>
								<div class="tab-desc"><h3>חוות שרתים:</h3><p><?= $json->whereserver ?></p></div>
								<div class="tab-desc"><h3>כתובת אייפי:</h3><p><?= $json->ip ?></p></div>
								<div class="tab-desc"><h3>שטח דיסק:</h3><p><?= $json->disk ?></p></div>
								<div class="tab-desc"><h3>תעבורה:</h3><p><?= $json->space ?></p></div>
								<div class="tab-desc lastdesc">
									<input type="checkbox" value="cloud" name="cloud<?= $counter ?>" data-price="50"> <label for="cloud">פאנל ניהול אתרים</label>
									<div class="clear"></div>
									<input type="checkbox" value="firewall" name="firewall<?= $counter ?>" data-price="30"> <label for="firewall">תוספת 50GB שטח דיסק</label>	
								</div>
								<div class="tab-desc lastdesc">
									<input type="checkbox" value="manage" name="manage<?= $counter ?>" data-price="50"> <label for="manage">פאנל שרתי משחק</label>
									<div class="clear"></div>
									<input type="checkbox" value="rent" name="rent<?= $counter ?>" data-price="30"> <label for="rent">תוספת 2GB ראם</label>
								<div class="clear"></div>
								
								</div>
								<div class="tab-bottom">
									<!--<a href="buy&product_id=<?= $Data['id'] ?>"><svg xmlns="https://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="510" height="510" viewBox="0 0 510 510" xml:space="preserve"><path d="M153 408c-28 0-51 23-51 51s23 51 51 51 51-22.9 51-51S181.1 408 153 408zM0 0v51h51l91.8 193.8L107.1 306c-2.5 7.7-5.1 17.9-5.1 25.5 0 28.1 23 51 51 51h306v-51H163.2c-2.5 0-5.1-2.5-5.1-5.1v-2.6l23-43.3h188.7c20.4 0 35.7-10.2 43.4-25.5L504.9 89.3c5.1-5.1 5.1-7.6 5.1-12.7 0-15.3-10.2-25.5-25.5-25.5H107.1L84.2 0H0zM408 408c-28 0-51 23-51 51s23 51 51 51 51-22.9 51-51S436.1 408 408 408z"/></svg> <strong>הזמן חבילה</strong></a>
									-->
									<input type="submit" name="submit<?= $counter ?>" value="הזמן חבילה" />
									<?php
										$extras = "&";
										if(isset($_POST['submit'.$counter.''])) {
											if(isset($_POST['cloud'.$counter.''])) {
												$extras .= "webpanel&";
											}
											
											if(isset($_POST['firewall'.$counter.''])) {
												$extras .= "extradisk&";
											}
											
											if(isset($_POST['manage'.$counter.''])) {
												$extras .= "gamepanel&";
											}
											
											if(isset($_POST['rent'.$counter.''])) {
												$extras .= "exstraram&";
											}
											if(isset($_POST['backup'.$counter.''])) {
												$extras .= "exstraclouds&";
											}
											
											echo "<meta http-equiv='refresh' content='0;URL= https://skywork.co.il/buy&product_id={$Data['id']}{$extras}' />   ";
										}
									?>
									<p><strong id="price"><?= number_format($Data["price"],2) ?> ₪</strong><span>\חודש</span></p>
								</div>
							</div>
						</form>
							<?php $counter++; }	?>
							
						
					</div>
				</div>
			</div>
		</div>
		
	</div>
