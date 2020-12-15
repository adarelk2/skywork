<?php
$page = "domains";
$getJson = $mysqli->query("SELECT `json` FROM `".PREFIX."_editblock` WHERE `name`='{$page}'")->fetch_assoc();
$JsonData = json_decode($getJson['json']);
?>
<div id="skywork">
	<div class="clear"></div>	
	<div id="page">
		<div id="page-top">
			<div class="container">
				<h1>דומיינים</h1>
				<a class="conbutton" href="contact">צרו איתנו קשר</a>
			</div>
		</div>
		
		<div id="hosting">
			<div id="hosting-top">
				<div class="container">
					<div id="hosting-title">
						<img src="assets/images/server.png" alt="server" />
						<h2>דומיינים</h2>
						<p>שם מתחם לבעלי אתרים</p>
					</div>
				</div>
			</div>
			
			<div id="hosting-packages">
				<div class="container">
					<div id="hosting-packages-right">
						<ul>
							<li><p>סיומת</p></li>
							<li><p>ספק דומיינים</p></li>
						</ul>
					</div>
					<div id="hosting-packages-center">
					<?php
							$qHosting = $mysqli->query("SELECT * FROM `".PREFIX."_product` WHERE `type`='domains' ORDER BY `index` LIMIT 10");
						while($productsData = $qHosting->fetch_assoc())
						{
							$arr = json_decode($productsData['parameters']);
							$recommended = "";
							if($productsData['recommended'] == 1) 
								$recommended = "-recommended";
							
					?>
							<div class="hosting-packages-item desktop">
								<p class="hosting-packages-item-capacity"><?= $arr->disk ?></p>
								<div class="hosting-packages-item-inner">
									<div class="hosting-packages-item-inner">
																				<p class="hosting-packages-item-price"><?= number_format($productsData['price'],2) ?>₪<span>\שנה</span></p>
										<p class="hosting-packages-item-ssl"><span><?= $arr->whereserver ?></span></p>
										<div class="hosting-packages-item-button"><a href="buy&product_id=<?= $productsData['id']; ?>">רכישה</a></div>
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
									$qGetHosts = $mysqli->query("SELECT * FROM `".PREFIX."_product` WHERE `type`='cloud' ORDER BY `index` LIMIT 10");
									while($qGetHostsData = $qGetHosts->fetch_assoc())
									{
										$arr = json_decode($qGetHostsData['parameters']);
									?>
									<div class="packages-section-item">
										<p class="packages-section-item-title"><?= $qGetHostsData['title'] ?></p>
										<p class="packages-section-item-desc">שטח אחסון: <strong><?= $arr->disk ?></strong></p>
										<p class="packages-section-item-desc">פאנל ניהול: <strong><?= $arr->panel ?></strong></p>
										<p class="packages-section-item-price"><strong><?= number_format($qGetHostsData['price'],2) ?>₪</strong> / שנה</p>			
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
				</div>
			</div>
		</div>
		
	</div>