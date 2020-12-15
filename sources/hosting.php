<?php
$page = secur($_GET['page'],"string");
$getJson = $mysqli->query("SELECT `json` FROM `".PREFIX."_editblock` WHERE `name`='{$page}'")->fetch_assoc();
$JsonData = json_decode($getJson['json']);
?>
<div id="skywork">
	<div class="clear"></div>	
	<div id="page">
		<div id="page-top">
			<div class="container">
				<h1>אירוח אתרים</h1>
				<a class="conbutton" href="#">צרו איתנו קשר</a>
			</div>
		</div>
		<head>

</head>
		<div id="hosting">
			<div id="hosting-top" style="font-family: myFirstFont;line-height: 1.5em;">
				<div class="container">
					<div id="hosting-title">
						<img src="assets/images/server.png" alt="server" />
						<h2><?php editAdmin($JsonData->title,"title"); ?></h2>
						<p><?php editAdmin($JsonData->subtitle,"subtitle"); ?></p>
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
			
			<div id="hosting-packages">
				<div class="container">
					<div id="hosting-packages-right">
						<ul>
							<li><p>כמות דומיינים</p></li>
							<li><p>מערכת הפעלה</p></li>
							<li><p>שטח אחסון</p></li>
							<li><p>תעבורה</p></li>
							<li><p>תיבות דואר</p></li>
							<li><p>פאנל ניהול</p></li>
						</ul>
					</div>
					<div id="hosting-packages-center">
					<?php
						$qHosting = $mysqli->query("SELECT * FROM `".PREFIX."_product` WHERE `type`='hosts' and price >1 ORDER BY `index` LIMIT 3");
						while($productsData = $qHosting->fetch_assoc())
						{
							$arr = json_decode($productsData['parameters']);
							$recommended = "";
							if($productsData['recommended'] == 1) 
								$recommended = "-recommended";
							
					?>
							<div class="hosting-packages-item desktop">
								<p><?= $productsData['title'] ?></p>
								<div class="hosting-packages-item<?= $recommended ?>-inner">
									<?php
										if($recommended != "")
										{
											?>
											<p><strong>*מומלץ</strong></p>
											<?php
										}
									?>
									<div class="hosting-packages-item-inner">
										<p class="hosting-packages-item-price"><?= number_format($productsData['price'],2) ?>₪<span>\ חודש</span></p>
										<p class="hosting-packages-item-sites"><?= $arr->domain ?></p>
										<p class="hosting-packages-item-databases"><?= $arr->os ?></p>
										<p class="hosting-packages-item-capacity"><?= $arr->storage ?></p>
										<p class="hosting-packages-item-bandwith"><span><?= $arr->traffic ?></span></p>
										<p class="hosting-packages-item-mail"><?= $arr->mails ?></p>
										<p class="hosting-packages-item-ssl"><span><?= $arr->panel ?></span></p>
									<div class="hosting-packages-item-button"><a href="https://skywork.co.il/buy&product_id=<?= $productsData['id']; ?>">רכישה</a></div>
									</div>
								</div>
							</div>
							<?php
							

						}
					?>
						
					<section id="packages-section">
						<div class="container">
							<div class="mobileslide mobile">
								<div class="packages-section-items mobile packagesslide">
									<?php
									$qGetHosts = $mysqli->query("SELECT * FROM `".PREFIX."_product` WHERE `type`='hosts' ORDER BY `index` LIMIT 4");
									while($qGetHostsData = $qGetHosts->fetch_assoc())
									{
										$arr = json_decode($qGetHostsData['parameters']);
									?>
									<div class="packages-section-item">
										<p class="packages-section-item-title"><?= $qGetHostsData['title'] ?></p>
										<p class="packages-section-item-desc">שטח אחסון: <strong><?= $arr->storage ?></strong></p>
										<p class="packages-section-item-desc">תעבורה: <strong><?= $arr->traffic ?></strong></p>
										<p class="packages-section-item-desc">מערכת הפעלה: <strong><?= $arr->os ?></strong></p>
										<p class="packages-section-item-desc">פאנל ניהול: <strong><?= $arr->panel ?></strong></p>
										<p class="packages-section-item-desc"><span>דומיין: <strong><?= $arr->domain ?></strong></span></p>
										<p class="packages-section-item-desc">תיבות דואר: <strong><?= $arr->mails ?></strong></p>
										<p class="packages-section-item-desc">מיקום חוות שרתים: <strong>ישראל</strong></p>
										<p class="packages-section-item-price"><strong><?= number_format($qGetHostsData['price'],2) ?>₪</strong> / חודש</p>			
										<a href="buy&product_id=<?= $qGetHostsData['id'] ?>">קניה</a>
									</div>
									<?php
									}
									?>
								</div>
							</div>
						</div>
					</section>
					
					</div>
					<div id="hosting-packages-left">
						<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 23.6 23.6" xml:space="preserve"><path d="M11.8 0C5.3 0 0 5.3 0 11.8s5.3 11.8 11.8 11.8 11.8-5.3 11.8-11.8S18.3 0 11.8 0zM14.3 18.3c-0.6 0.2-1.1 0.4-1.5 0.5 -0.4 0.1-0.8 0.2-1.3 0.2 -0.7 0-1.3-0.2-1.7-0.5s-0.6-0.8-0.6-1.4c0-0.2 0-0.4 0-0.7 0-0.2 0.1-0.5 0.1-0.8l0.8-2.7c0.1-0.3 0.1-0.5 0.2-0.7 0-0.2 0.1-0.4 0.1-0.6 0-0.3-0.1-0.6-0.2-0.7 -0.1-0.1-0.4-0.2-0.8-0.2 -0.2 0-0.4 0-0.6 0.1 -0.2 0.1-0.4 0.1-0.5 0.2l0.2-0.8c0.5-0.2 1-0.4 1.4-0.5 0.5-0.1 0.9-0.2 1.3-0.2 0.7 0 1.3 0.2 1.7 0.5 0.4 0.4 0.6 0.8 0.6 1.4 0 0.1 0 0.3 0 0.6 0 0.3-0.1 0.6-0.2 0.8l-0.8 2.7c-0.1 0.2-0.1 0.5-0.2 0.7 0 0.3-0.1 0.5-0.1 0.6 0 0.4 0.1 0.6 0.2 0.7 0.2 0.1 0.4 0.2 0.8 0.2 0.2 0 0.4 0 0.6-0.1 0.2-0.1 0.4-0.1 0.5-0.2L14.3 18.3zM14.1 7.4c-0.4 0.3-0.8 0.5-1.3 0.5 -0.5 0-0.9-0.2-1.3-0.5 -0.4-0.3-0.5-0.7-0.5-1.2 0-0.5 0.2-0.9 0.5-1.2 0.4-0.3 0.8-0.5 1.3-0.5 0.5 0 0.9 0.2 1.3 0.5 0.4 0.3 0.5 0.7 0.5 1.2C14.7 6.7 14.5 7.1 14.1 7.4z" /></svg>
						<p>רוצה לדעת איזה חבילה מתאימה עבורך?</p>
						<p><strong>צור איתנו קשר ונציגינו יעזרו לך בכל ההחלטות הקשות!</strong></p>
						<a href="contact">צור קשר</a>
					</div>
				</div>
			</div>
		</div>
		
	</div>
