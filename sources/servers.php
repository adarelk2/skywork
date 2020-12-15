<?php
if(!isset($_GET['game']) || empty($_GET['game']))
	$_GET['game'] = "mc";
$game = secur($_GET['game'],"string");

$page = secur($_GET['page'],"string");
$getJson = $mysqli->query("SELECT `json` FROM `".PREFIX."_editblock` WHERE `name`='{$game}'")->fetch_assoc();
if($getJson==null)
	die(' <meta http-equiv="Refresh" content="0; url=index.php">');
$JsonData = json_decode($getJson['json']);
?>
<div id="skywork">
	<div class="clear"></div>	
	<div id="page">
		<div id="page-top">
			<div class="container">
				<h1>שרתי משחק</h1>
				<a class="conbutton" href="contact">צרו איתנו קשר</a>
			</div>
		</div>
		<div id="game-list">
			<div class="container">
				<div class="game_box" style="background: url('assets/images/mc.png') no-repeat center center; background-size: 100%;">
					<?php 
						if($game != "mc") 
						{
					?>
					
							<a href="?page=game-servers&game=mc" class="no_checked">
								Minecraft
							</a>
					<?php
						}
						else
							echo "&nbsp;";
					?>
					
				</div>
				<div class="game_box" style="background: url('assets/images/mu.png') no-repeat center center; background-size: 100%;">
					<?php 
						if($game != "mu") 
						{
					?>
					
							<a href="?page=game-servers&game=mu" class="no_checked">
								MU
							</a>
					<?php
						}
					?>
					
				</div>
				<div class="game_box" style="background: url('assets/images/flyff.png') no-repeat center center; background-size: 100%;">
					<?php 
						if($game != "fl") 
						{
					?>
					
							<a href="?page=game-servers&game=fl" class="no_checked">
								Flyff
							</a>
					<?php
						}
						else
							echo "&nbsp;";
					?>
				</div>
				<div class="game_box" style="background: url('assets/images/samp.png') no-repeat center center; background-size: 100%;">
					<?php 
						if($game != "samp") 
						{
					?>
					
							<a href="?page=game-servers&game=samp" class="no_checked">
								GTA Samp
							</a>
					<?php
						}
						else
							echo "&nbsp;";
					?>
				</div>
				<div class="game_box" style="background: url('assets/images/csgo.png') no-repeat center center; background-size: 100%;">
					<?php 
						if($game != "csgo") 
						{
					?>
					
							<a href="?page=game-servers&game=csgo" class="no_checked">
								CS:GO
							</a>
					<?php
						}
						else
							echo "&nbsp;";
					?>
				</div>
				<div class="game_box" style="background: url('assets/images/cs16.png') no-repeat center center; background-size: 100%;">
					<?php 
						if($game != "cs") 
						{
					?>
					
							<a href="?page=game-servers&game=cs" class="no_checked">
								CS:1.6
							</a>
					<?php
						}
						else
							echo "&nbsp;";
					?>
				</div>
				<div class="game_box" style="background: url('assets/images/gm.png') no-repeat center center; background-size: 100%;">
					<?php 
						if($game != "gm")
						{
					?>
					
							<a href="?page=game-servers&game=gm" class="no_checked">
								Garry's Mod
							</a>
					<?php
						}
						else
							echo "&nbsp;";
					?>
				</div>
			</div>
		</div>
		<div class="container" style="font-family: myFirstFont;">
			<div id="hosting">
				<div id="hosting-top" style="background: #FFF;">
					<div class="container">
						<div id="hosting-title">
							<h2><?php editAdmin($JsonData->title,"title"); ?></h2>
						</div>
						<div id="hosting-con" style="color: #5b5b5b;">
							<div>
								<?php editAdmin($JsonData->content,"content"); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<section id="packages-section">
				<div class="container">
		<div class="packages-section-items desktop" style="margin-top: 0px;">
			<?php
				$qGetHosts = $mysqli->query("SELECT * FROM `".PREFIX."_product` WHERE `type`='servers' ORDER BY `index`");
				$index = 0;
				while($qGetHostsData = $qGetHosts->fetch_assoc())
				{
					
					$arr = json_decode($qGetHostsData['parameters']);
					if($arr->game == $game)
					{
					if($index == 4)
						break;
			?>
			<div class="packages-section-item" style="width: 23%;margin: 0 2% 0 0;">
		
				<p class="packages-section-item-title" style="border-top-right-radius: 9px;border-top-left-radius: 9px;background: #<?= ($qGetHostsData['recommended'] == 1) ? "7cb813" : "0071bc"?>;"><?= $qGetHostsData['title'] ?></p>
					<?php
						if($game == "mc")
						{
						
					?>
						<p class="packages-section-item-desc">כמות שחקנים: <strong><?= $arr->players ?></strong></p>
						<p class="packages-section-item-desc">מודים לבחירה: <strong><?= ($arr->mods == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">הגנות DDOS: <strong><?= ($arr->ddos == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">פאנל ניהול: <strong><?= ($arr->panel == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">גישות FTP: <strong><?= ($arr->ftp == 1) ? "כלול" : "לא כלול"?></strong></p>
						<?if($qGetHostsData['title']== "חבילה מתחילה")
						{?>
						<p class="packages-section-item-desc">וירטואלי מתקדם<strong> :VPS</strong></p>
						<?}
						elseif($qGetHostsData['title']== "חבילה בינונית")
						{?>
						<p class="packages-section-item-desc"><strong>וירטואלי מתקדם</strong> :VPS</p>
						<?}
						elseif($qGetHostsData['title']== "חבילה מתקדמת")
						{?>
						<p class="packages-section-item-desc"><strong>וירטואלי מומלץ</strong> :VPS</p>
						<?}
						elseif($qGetHostsData['title']== "חבילה גדולה")
						{?>
						<p class="packages-section-item-desc"><strong>וירטואלי מומלץ</strong> :VPS</p>
						<?}?>
						<p class="packages-section-item-price"><strong><?= $qGetHostsData['price'] ?>₪</strong> / חודש</p>
						<a href="buy&product_id=<?= $qGetHostsData['id'] ?>">קניה</a>
					<?php
						}
						if($game == "mu")
						{
					?>
						<p class="packages-section-item-desc">RAM: <strong><?= $arr->ram ?>GB</strong></p>
						<p class="packages-section-item-desc">קבצים: <strong><?= ($arr->files == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">אתר: <strong><?= ($arr->website == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">גישת RDP: <strong><?= ($arr->rdp == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">הגנות DDOS: <strong><?= ($arr->ddos == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">פאנל ניהול: <strong><?= ($arr->panel == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">עונה: <strong>1-13</strong></p>
						<p class="packages-section-item-desc"><strong>התקנה ראשונית חינם</strong></p>


						<p class="packages-section-item-price"><strong><?= $qGetHostsData['price'] ?>₪</strong> / חודש</p>
						<a href="buy&product_id=<?= $qGetHostsData['id'] ?>">קניה</a>
					<?php
						}
						if($game == "fl")
						{
					?>
						<p class="packages-section-item-desc">RAM: <strong><?= $arr->ram ?>GB </strong></p>
						<p class="packages-section-item-desc">קבצים: <strong><?= ($arr->files == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">אתר: <strong><?= ($arr->website == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">גישת RDP: <strong><?= ($arr->rdp == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">הגנות DDOS: <strong><?= ($arr->ddos == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">פאנל ניהול: <strong><?= ($arr->panel == 1) ? "כלול" : "לא כלול"?></strong></p>

						<p class="packages-section-item-desc">עונה: <strong>V6/V7/V11</strong></p>
						<p class="packages-section-item-desc"><strong>התקנה ראשונית חינם</strong></p>
						<p class="packages-section-item-price"><strong><?= $qGetHostsData['price'] ?>₪</strong> / חודש</p>
						<a href="buy&product_id=<?= $qGetHostsData['id'] ?>">קניה</a>
					<?php
						}
						if($game == "samp")
						{
					?>
						<p class="packages-section-item-desc">כמות שחקנים: <strong><?= $arr->players ?></strong></p>
						<p class="packages-section-item-desc">מודים לבחירה: <strong><?= ($arr->mods == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">הגנות DDOS: <strong><?= ($arr->ddos == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">פאנל ניהול: <strong><?= ($arr->panel == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">גישות FTP: <strong><?= ($arr->ftp == 1) ? "כלול" : "לא כלול"?></strong></p>


						<p class="packages-section-item-price"><strong><?= $qGetHostsData['price'] ?>₪</strong> / חודש</p>
						<a href="buy&product_id=<?= $qGetHostsData['id'] ?>">קניה</a>
					<?php
						}
						if($game == "csgo")
						{
					?>
						<p class="packages-section-item-desc">כמות שחקנים: <strong><?= $arr->players ?></strong></p>
						<p class="packages-section-item-desc">מודים לבחירה: <strong><?= ($arr->mods == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">הגנות DDOS: <strong><?= ($arr->ddos == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">פאנל ניהול: <strong><?= ($arr->panel == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">גישות FTP: <strong><?= ($arr->ftp == 1) ? "כלול" : "לא כלול"?></strong></p>


						<p class="packages-section-item-price"><strong><?= $qGetHostsData['price'] ?>₪</strong> / חודש</p>
						<a  href="buy&product_id=<?= $qGetHostsData['id'] ?>">קניה</a>
					<?php
						}
						if($game == "cs")
						{
					?>
						<p class="packages-section-item-desc">כמות שחקנים: <strong><?= $arr->players ?></strong></p>
						<p class="packages-section-item-desc">מודים לבחירה: <strong><?= ($arr->mods == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">הגנות DDOS: <strong><?= ($arr->ddos == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">פאנל ניהול: <strong><?= ($arr->panel == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">גישות FTP: <strong><?= ($arr->ftp == 1) ? "כלול" : "לא כלול"?></strong></p>


						<p class="packages-section-item-price"><strong><?= $qGetHostsData['price'] ?>₪</strong> / חודש</p>
						<a href="buy&product_id=<?= $qGetHostsData['id'] ?>">קניה</a>
					<?php
						}
						if($game == "gm")
						{
					?>
						<p class="packages-section-item-desc">כמות שחקנים: <strong><?= $arr->players ?></strong></p>
						<p class="packages-section-item-desc">מודים לבחירה: <strong><?= ($arr->mods == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">הגנות DDOS: <strong><?= ($arr->ddos == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">פאנל ניהול: <strong><?= ($arr->panel == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">גישות FTP: <strong><?= ($arr->ftp == 1) ? "כלול" : "לא כלול"?></strong></p>


						<p class="packages-section-item-price"><strong><?= $qGetHostsData['price'] ?>₪</strong> / חודש</p>
						<a href="buy&product_id=<?= $qGetHostsData['id'] ?>">קניה</a>
					<?php
						}
					?>
				
				
			</div>
			<?php
						$index++;
					}
					
				}
			?>
		</div>
					
		<div class="mobileslide mobile">
			<div class="packages-section-items mobile packagesslide">
				<?php
					$qGetHosts = $mysqli->query("SELECT * FROM `".PREFIX."_product` WHERE `type`='servers' ORDER BY `index`");
					$index = 0;
					while($qGetHostsData = $qGetHosts->fetch_assoc())
					{
						$arr = json_decode($qGetHostsData['parameters']);
						if($arr->game == $game)
						{
						if($index == 4)
							break;
				?>
				<div class="packages-section-item" >
					<p class="packages-section-item-title" style="border-top-right-radius: 9px;border-top-left-radius: 9px;background: #<?= ($qGetHostsData['recommended'] == 1) ? "7cb813" : "0071bc"?>;"><?= $qGetHostsData['title'] ?></p>
					<?php
						if($game == "mc")
						{
					?>
						<p class="packages-section-item-desc" style="direction: lrt;border-right: 1px solid #d4d4d4;border-left: 1px solid #d4d4d4;">כמות שחקנים: <strong><?= $arr->players ?></strong></p>
						<p class="packages-section-item-desc" style="border-right: 1px solid #d4d4d4;border-left: 1px solid #d4d4d4;">הגנת DDOS: <strong><?= ($arr->panel == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc" style="border-right: 1px solid #d4d4d4;border-left: 1px solid #d4d4d4;">פאנל ניהול: <strong><?= ($arr->ddos == 1) ? "כלול" : "לא כלול"?></strong></p>
						<?if($qGetHostsData['title']== "חבילה מתחילה")
						{?>
						<p class="packages-section-item-desc" style="border-right: 1px solid #d4d4d4;border-left: 1px solid #d4d4d4;">וירטואלי מתקדם<strong> :VPS</strong></p>
						<?}
						elseif($qGetHostsData['title']== "חבילה בינונית")
						{?>
						<p class="packages-section-item-desc" style="border-right: 1px solid #d4d4d4;border-left: 1px solid #d4d4d4;"><strong>וירטואלי מתקדם</strong> :VPS</p>
						<?}
						elseif($qGetHostsData['title']== "חבילה מתקדמת")
						{?>
						<p class="packages-section-item-desc" style="border-right: 1px solid #d4d4d4;border-left: 1px solid #d4d4d4;"><strong>וירטואלי מומלץ</strong> :VPS</p>
						<?}
						elseif($qGetHostsData['title']== "חבילה גדולה")
						{?>
						<p class="packages-section-item-desc" style="border-right: 1px solid #d4d4d4;border-left: 1px solid #d4d4d4;"><strong>וירטואלי מומלץ</strong> :VPS</p>
						<?}?>
						<p class="packages-section-item-price" style="border-right: 1px solid #d4d4d4;border-left: 1px solid #d4d4d4;"><strong><?= $qGetHostsData['price'] ?>₪</strong> / חודש</p>
						<a href="buy&product_id=<?= $qGetHostsData['id'] ?>">קניה</a>
					<?php
						}
						if($game == "mu")
						{
					?>
						<p class="packages-section-item-desc">RAM: <strong><?= $arr->ram ?> GB</strong></p>
						<p class="packages-section-item-desc">קבצים: <strong><?= ($arr->files == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">אתר: <strong><?= ($arr->website == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">גישת RDP: <strong><?= ($arr->rdp == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">הגנות DDOS: <strong><?= ($arr->ddos == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">פאנל ניהול: <strong><?= ($arr->panel == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">עונה: <strong>1-13</strong></p>
						<p class="packages-section-item-desc"><strong>התקנה ראשונית חינם</strong></p>


						<p class="packages-section-item-price"><strong><?= $qGetHostsData['price'] ?>₪</strong> / חודש</p>
						<a href="buy&product_id=<?= $qGetHostsData['id'] ?>">קניה</a>
					<?php
						}
						if($game == "fl")
						{
					?>
						<p class="packages-section-item-desc">RAM: <strong><?= $arr->ram ?> GB</strong></p>
						<p class="packages-section-item-desc">קבצים: <strong><?= ($arr->files == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">אתר: <strong><?= ($arr->website == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">גישת RDP: <strong><?= ($arr->rdp == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">הגנות DDOS: <strong><?= ($arr->ddos == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">פאנל ניהול: <strong><?= ($arr->panel == 1) ? "כלול" : "לא כלול"?></strong></p>


						<p class="packages-section-item-price"><strong><?= $qGetHostsData['price'] ?>₪</strong> / חודש</p>
						<a href="buy&product_id=<?= $qGetHostsData['id'] ?>">קניה</a>
					<?php
						}
						if($game == "samp")
						{
					?>
						<p class="packages-section-item-desc">כמות שחקנים: <strong><?= $arr->players ?></strong></p>
						<p class="packages-section-item-desc">מודים לבחירה: <strong><?= ($arr->mods == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">הגנות DDOS: <strong><?= ($arr->ddos == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">פאנל ניהול: <strong><?= ($arr->panel == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">גישות FTP: <strong><?= ($arr->ftp == 1) ? "כלול" : "לא כלול"?></strong></p>


						<p class="packages-section-item-price"><strong><?= $qGetHostsData['price'] ?>₪</strong> / חודש</p>
						<a href="buy&product_id=<?= $qGetHostsData['id'] ?>">קניה</a>
					<?php
						}
						if($game == "csgo")
						{
					?>
						<p class="packages-section-item-desc">כמות שחקנים: <strong><?= $arr->players ?></strong></p>
						<p class="packages-section-item-desc">מודים לבחירה: <strong><?= ($arr->mods == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">הגנות DDOS: <strong><?= ($arr->ddos == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">פאנל ניהול: <strong><?= ($arr->panel == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">גישות FTP: <strong><?= ($arr->ftp == 1) ? "כלול" : "לא כלול"?></strong></p>


						<p class="packages-section-item-price"><strong><?= $qGetHostsData['price'] ?>₪</strong> / חודש</p>
						<a  href="buy&product_id=<?= $qGetHostsData['id'] ?>">קניה</a>
					<?php
						}
						if($game == "cs")
						{
					?>
						<p class="packages-section-item-desc">כמות שחקנים: <strong><?= $arr->players ?></strong></p>
						<p class="packages-section-item-desc">מודים לבחירה: <strong><?= ($arr->mods == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">הגנות DDOS: <strong><?= ($arr->ddos == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">פאנל ניהול: <strong><?= ($arr->panel == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">גישות FTP: <strong><?= ($arr->ftp == 1) ? "כלול" : "לא כלול"?></strong></p>


						<p class="packages-section-item-price"><strong><?= $qGetHostsData['price'] ?>₪</strong> / חודש</p>
						<a href="buy&product_id=<?= $qGetHostsData['id'] ?>">קניה</a>
					<?php
						}
						if($game == "gm")
						{
					?>
						<p class="packages-section-item-desc">כמות שחקנים: <strong><?= $arr->players ?></strong></p>
						<p class="packages-section-item-desc">מודים לבחירה: <strong><?= ($arr->mods == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">הגנות DDOS: <strong><?= ($arr->ddos == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">פאנל ניהול: <strong><?= ($arr->panel == 1) ? "כלול" : "לא כלול"?></strong></p>
						<p class="packages-section-item-desc">גישות FTP: <strong><?= ($arr->ftp == 1) ? "כלול" : "לא כלול"?></strong></p>


						<p class="packages-section-item-price"><strong><?= $qGetHostsData['price'] ?>₪</strong> / חודש</p>
						<a href="buy&product_id=<?= $qGetHostsData['id'] ?>">קניה</a>
					<?php
						}
					?>
				</div>
				<?php
							$index++;
						}
					}
				?>
			</div>
		</div>
		</div>
		</section>
	</div>
