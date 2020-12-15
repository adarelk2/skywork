<?php
if(!isset($_GET['game']) || empty($_GET['game']))
	$_GET['game'] = null;
$game = secur($_GET['game'],"string");

?>
<div id="left-side">
	<div class="container">
				<div id="game-list">
				<div class="game_box" style="background: url('assets/images/mc.png') no-repeat center center; background-size: 100%;">
					<?php 
						if($game != "mc") 
						{
					?>
					
							<a href="index.php?act=products&do=add&type=servers&game=mc" class="no_checked">
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
					
							<a href="index.php?act=products&do=add&type=servers&game=mu" class="no_checked">
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
					
							<a href="index.php?act=products&do=add&type=servers&game=fl" class="no_checked">
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
					
							<a href="index.php?act=products&do=add&type=servers&game=samp" class="no_checked">
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
					
							<a href="index.php?act=products&do=add&type=servers&game=csgo" class="no_checked">
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
					
							<a href="index.php?act=products&do=add&type=servers&game=cs" class="no_checked">
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
					
							<a href="index.php?act=products&do=add&type=servers&game=gm" class="no_checked">
								Garry's Mod
							</a>
					<?php
						}
						else
							echo "&nbsp;";
					?>
				</div>
			
			</div>
			
				<?php
				switch($game)
				{
					
					case "mc":
						
				?>
				<form method="post">
					<div class="block">
						<div class="block-title">
							<h1>הוסף שרת Minecraft חדש</h1>
							<a href="index.php?act=products">חזור לניהול מוצרים</a>
						</div>
						<div class="block-inner">
						
						<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack">שם החבילה</label>
							<input type="text" name="title_pack">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ram">ראם</label>
							<input type="text" name="ram">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<label for="ddos">הגנות DDOS</label>
							<select name="ddos">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="panel">פאנל ניהול</label>
							<select name="panel">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index">מקום ברשימה</label>
							<select name="index">
								<option value=""></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<label for="price">מחיר החבילה</label>
							<input type="text" name="price">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="הוסף מוצר" class="button_tickets">
						</div>
					</div>
					<?php 
					if(isset($_POST['submit'])) {
					    $title_pack = secur($_POST['title_pack'],"string");
					    $ram = secur($_POST['ram'],"int");
					    $ddos = secur($_POST['ddos'],"int");
					    $panel = secur($_POST['panel'],"int");
					    $price = secur($_POST['price'],"int");
					    $index = secur($_POST['index'],"int");
						$game = "mc";
						
						if (empty($title_pack) || empty($ram) || empty($ddos) || empty($panel) || empty($index) || empty($price)) {
							echo '
								<div class="row">
									<div class="input-field">
										<div class="notice error"><p>שגיאה: אחד מהשדות אינם תקינים.</p></div>
									</div>
								</div>
							';
						}
						else
						{
							if(!isset($json))
								$json = new \stdClass();
							
							$json->game		= $game;
							$json->ram		= $ram;
							$json->ddos		= $ddos;
							$json->panel	= $panel;
						
							$mysqli->query("INSERT INTO `".PREFIX."_product` (`title`, `price`, `parameters`, `type`, `date`, `index`) VALUES ('".$title_pack."', '".$price."', '".json_encode($json, JSON_UNESCAPED_UNICODE)."', 'servers', '".time()."', '{$index}');");
							
							refreshPage("שרת המשחק נוסף בהצלחה!","שרת מסוג Minecraft נוסף בהצלחה!");
							die(' <meta http-equiv="Refresh" content="2; url=index.php?act=products">');

						}
					}
				?>
				</form>
				
				<?php
					break;
					case "mu":
				?>
				
				<form method="post">
					<div class="block">
						<div class="block-title">
							<h1>הוסף שרת MU חדש</h1>
							<a href="index.php?act=products">חזור לניהול מוצרים</a>
						</div>
						<div class="block-inner">
						
						<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack">שם החבילה</label>
							<input type="text" name="title_pack">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ram">ראם</label>
							<input type="text" name="ram">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="files">קבצים</label>
							<select name="files">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="website">אתר</label>
							<select name="website">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="rdp">גישת RDP</label>
							<select name="rdp">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ddos">הגנות DDOS</label>
							<select name="ddos">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="panel">פאנל ניהול</label>
							<select name="panel">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index">מקום ברשימה</label>
							<select name="index">
								<option value=""></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<label for="price">מחיר החבילה</label>
							<input type="text" name="price">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="הוסף מוצר" class="button_tickets">
						</div>
					</div>
					<?php 
					if(isset($_POST['submit'])) {
					    $title_pack = secur($_POST['title_pack'],"string");
					    $ram = secur($_POST['ram'],"int");
					    $files = secur($_POST['files'],"int");
					    $website = secur($_POST['website'],"int");
					    $rdp = secur($_POST['rdp'],"int");
					    $ddos = secur($_POST['ddos'],"int");
					    $panel = secur($_POST['panel'],"int");
					    $price = secur($_POST['price'],"int");
					    $index = secur($_POST['index'],"int");
						$game = "mu";
						
						if (empty($title_pack) || empty($ram) || empty($files) || empty($website) || empty($rdp) || empty($ddos) || empty($panel) || empty($index) || empty($price)) {
							echo '
								<div class="row">
									<div class="input-field">
										<div class="notice error"><p>שגיאה: אחד מהשדות אינם תקינים.</p></div>
									</div>
								</div>
							';
						}
						else
						{
							if(!isset($json))
								$json = new \stdClass();
							
							$json->game		= $game;
							$json->files	= $files;
							$json->ram		= $ram;
							$json->rdp		= $rdp;
							$json->website	= $website;
							$json->ddos		= $ddos;
							$json->panel	= $panel;
						
							$mysqli->query("INSERT INTO `".PREFIX."_product` (`title`, `price`, `parameters`, `type`, `date`, `index`) VALUES ('".$title_pack."', '".$price."', '".json_encode($json, JSON_UNESCAPED_UNICODE)."', 'servers', '".time()."', '{$index}');");
							
							refreshPage("שרת המשחק נוסף בהצלחה!","שרת מסוג MU נוסף בהצלחה!");
							die(' <meta http-equiv="Refresh" content="2; url=index.php?act=products">');

						}
					}
				?>
				</form>
				<?php
					break;
					case "fl":
				?>
				
				<form method="post">
					<div class="block">
						<div class="block-title">
							<h1>הוסף שרת Flyff חדש</h1>
							<a href="index.php?act=products">חזור לניהול מוצרים</a>
						</div>
						<div class="block-inner">
						
						<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack">שם החבילה</label>
							<input type="text" name="title_pack">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ram">ראם</label>
							<input type="text" name="ram">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="files">קבצים</label>
							<select name="files">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="website">אתר</label>
							<select name="website">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="rdp">גישת RDP</label>
							<select name="rdp">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ddos">הגנות DDOS</label>
							<select name="ddos">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="panel">פאנל ניהול</label>
							<select name="panel">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index">מקום ברשימה</label>
							<select name="index">
								<option value=""></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<label for="price">מחיר החבילה</label>
							<input type="text" name="price">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="הוסף מוצר" class="button_tickets">
						</div>
					</div>
					<?php 
					if(isset($_POST['submit'])) {
					    $title_pack = secur($_POST['title_pack'],"string");
					    $ram = secur($_POST['ram'],"int");
					    $files = secur($_POST['files'],"int");
					    $website = secur($_POST['website'],"int");
					    $rdp = secur($_POST['rdp'],"int");
					    $ddos = secur($_POST['ddos'],"int");
					    $panel = secur($_POST['panel'],"int");
					    $price = secur($_POST['price'],"int");
					    $index = secur($_POST['index'],"int");
						$game = "fl";
						
						if (empty($title_pack) || empty($ram) || empty($files) || empty($website) || empty($rdp) || empty($ddos) || empty($panel) || empty($index) || empty($price)) {
							echo '
								<div class="row">
									<div class="input-field">
										<div class="notice error"><p>שגיאה: אחד מהשדות אינם תקינים.</p></div>
									</div>
								</div>
							';
						}
						else
						{
							if(!isset($json))
								$json = new \stdClass();
							
							$json->game		= $game;
							$json->files	= $files;
							$json->ram		= $ram;
							$json->website	= $website;
							$json->rdp		= $rdp;
							$json->ddos		= $ddos;
							$json->panel	= $panel;
						
							$mysqli->query("INSERT INTO `".PREFIX."_product` (`title`, `price`, `parameters`, `type`, `date`, `index`) VALUES ('".$title_pack."', '".$price."', '".json_encode($json, JSON_UNESCAPED_UNICODE)."', 'servers', '".time()."', '{$index}');");
							
							refreshPage("שרת המשחק נוסף בהצלחה!","שרת מסוג FlyFF נוסף בהצלחה!");
							die(' <meta http-equiv="Refresh" content="2; url=index.php?act=products">');

						}
					}
				?>
				</form>
				<?php
					break;
					case "samp":
				?>
				
				<form method="post">
					<div class="block">
						<div class="block-title">
							<h1>הוסף שרת SAMP חדש</h1>
							<a href="index.php?act=products">חזור לניהול מוצרים</a>
						</div>
						<div class="block-inner">
						
						<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack">שם החבילה</label>
							<input type="text" name="title_pack">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="players">כמות שחקנים</label>
							<input type="text" name="players">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="mods">מודים לבחירה</label>
							<select name="mods">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ddos">הגנות DDOS</label>
							<select name="ddos">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="panel">פאנל ניהול</label>
							<select name="panel">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index">מקום ברשימה</label>
							<select name="index">
								<option value=""></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="ftp">גישות FTP</label>
							<select name="ftp">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="price">מחיר החבילה</label>
							<input type="text" name="price">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="הוסף מוצר" class="button_tickets">
						</div>
					</div>
					<?php 
					if(isset($_POST['submit'])) {
					    $title_pack = secur($_POST['title_pack'],"string");
					    $players = secur($_POST['players'],"int");
					    $mods = secur($_POST['mods'],"int");
					    $ddos = secur($_POST['ddos'],"int");
					    $panel = secur($_POST['panel'],"int");
					    $ftp = secur($_POST['ftp'],"int");
					    $price = secur($_POST['price'],"int");
					    $index = secur($_POST['index'],"int");
						$game = "samp";
						
						if (empty($title_pack) || empty($players) || empty($mods) || empty($ddos) || empty($panel) || empty($ftp) || empty($price) || empty($index) || empty($price)) {
							echo '
								<div class="row">
									<div class="input-field">
										<div class="notice error"><p>שגיאה: אחד מהשדות אינם תקינים.</p></div>
									</div>
								</div>
							';
						}
						else
						{
							if(!isset($json))
								$json = new \stdClass();
							
							$json->game	= $game;
							$json->players	= $players;
							$json->mods		= $mods;
							$json->ddos		= $ddos;
							$json->panel	= $panel;
							$json->ftp		= $ftp;
						
							$mysqli->query("INSERT INTO `".PREFIX."_product` (`title`, `price`, `parameters`, `type`, `date`, `index`) VALUES ('".$title_pack."', '".$price."', '".json_encode($json, JSON_UNESCAPED_UNICODE)."', 'servers', '".time()."', '{$index}');");
							
							refreshPage("שרת המשחק נוסף בהצלחה!","שרת מסוג SAMP נוסף בהצלחה!");
							die(' <meta http-equiv="Refresh" content="2; url=index.php?act=products">');

						}
					}
				?>
				</form>
				<?php
					break;
					case "csgo":
				?>
				<form method="post">
					<div class="block">
						<div class="block-title">
							<h1>הוסף שרת CS:GO חדש</h1>
							<a href="index.php?act=products">חזור לניהול מוצרים</a>
						</div>
						<div class="block-inner">
						
						<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack">שם החבילה</label>
							<input type="text" name="title_pack">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="players">כמות שחקנים</label>
							<input type="text" name="players">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="mods">מודים</label>
							<select name="mods">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ddos">הגנות DDOS</label>
							<select name="ddos">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="panel">פאנל ניהול</label>
							<select name="panel">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index">מקום ברשימה</label>
							<select name="index">
								<option value=""></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="ftp">גישות FTP</label>
							<select name="ftp">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="price">מחיר החבילה</label>
							<input type="text" name="price">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="הוסף מוצר" class="button_tickets">
						</div>
					</div>
					<?php 
					if(isset($_POST['submit'])) {
					    $title_pack = secur($_POST['title_pack'],"string");
					    $players = secur($_POST['players'],"int");
					    $mods = secur($_POST['mods'],"int");
					    $ddos = secur($_POST['ddos'],"int");
					    $panel = secur($_POST['panel'],"int");
					    $ftp = secur($_POST['ftp'],"int");
					    $price = secur($_POST['price'],"int");
					    $index = secur($_POST['index'],"int");
						$game = "csgo";
						
						if (empty($title_pack) || empty($players) || empty($mods) || empty($ddos) || empty($panel) || empty($ftp) || empty($price) || empty($index) || empty($price)) {
							echo '
								<div class="row">
									<div class="input-field">
										<div class="notice error"><p>שגיאה: אחד מהשדות אינם תקינים.</p></div>
									</div>
								</div>
							';
						}
						else
						{
							if(!isset($json))
								$json = new \stdClass();
							
							$json->game	= $game;
							$json->players	= $players;
							$json->mods		= $mods;
							$json->ddos		= $ddos;
							$json->panel	= $panel;
							$json->ftp		= $ftp;
						
							$mysqli->query("INSERT INTO `".PREFIX."_product` (`title`, `price`, `parameters`, `type`, `date`, `index`) VALUES ('".$title_pack."', '".$price."', '".json_encode($json, JSON_UNESCAPED_UNICODE)."', 'servers', '".time()."', '{$index}');");
							
							refreshPage("שרת המשחק נוסף בהצלחה!","שרת מסוג CS:GO נוסף בהצלחה!");
							die(' <meta http-equiv="Refresh" content="2; url=index.php?act=products">');

						}
					}
				?>
				</form>
				<?php
					break;
					case "cs":
				?>
				<form method="post">
					<div class="block">
						<div class="block-title">
							<h1>הוסף שרת CS 1.6 חדש</h1>
							<a href="index.php?act=products">חזור לניהול מוצרים</a>
						</div>
						<div class="block-inner">
						
						<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack">שם החבילה</label>
							<input type="text" name="title_pack">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="players">כמות שחקנים</label>
							<input type="text" name="players">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="mods">מודים</label>
							<select name="mods">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ddos">הגנות DDOS</label>
							<select name="ddos">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="panel">פאנל ניהול</label>
							<select name="panel">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index">מקום ברשימה</label>
							<select name="index">
								<option value=""></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="ftp">גישות FTP</label>
							<select name="ftp">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="price">מחיר החבילה</label>
							<input type="text" name="price">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="הוסף מוצר" class="button_tickets">
						</div>
					</div>
					<?php 
					if(isset($_POST['submit'])) {
					    $title_pack = secur($_POST['title_pack'],"string");
					    $players = secur($_POST['players'],"int");
					    $mods = secur($_POST['mods'],"int");
					    $ddos = secur($_POST['ddos'],"int");
					    $panel = secur($_POST['panel'],"int");
					    $ftp = secur($_POST['ftp'],"int");
					    $price = secur($_POST['price'],"int");
					    $index = secur($_POST['index'],"int");
						$game = "cs";
						
						if (empty($title_pack) || empty($players) || empty($mods) || empty($ddos) || empty($panel) || empty($ftp) || empty($price) || empty($index) || empty($price)) {
							echo '
								<div class="row">
									<div class="input-field">
										<div class="notice error"><p>שגיאה: אחד מהשדות אינם תקינים.</p></div>
									</div>
								</div>
							';
						}
						else
						{
							if(!isset($json))
								$json = new \stdClass();
							
							$json->game	= $game;
							$json->players	= $players;
							$json->mods		= $mods;
							$json->ddos		= $ddos;
							$json->panel	= $panel;
							$json->ftp		= $ftp;
						
							$mysqli->query("INSERT INTO `".PREFIX."_product` (`title`, `price`, `parameters`, `type`, `date`, `index`) VALUES ('".$title_pack."', '".$price."', '".json_encode($json, JSON_UNESCAPED_UNICODE)."', 'servers', '".time()."', '{$index}');");
							
							refreshPage("שרת המשחק נוסף בהצלחה!","שרת מסוג CS 1.6 נוסף בהצלחה!");
							die(' <meta http-equiv="Refresh" content="2; url=index.php?act=products">');

						}
					}
				?>
				</form>
				<?php
					break;
					case "gm":
				?>
				<form method="post">
					<div class="block">
						<div class="block-title">
							<h1>הוסף שרת Garry's Mod חדש</h1>
							<a href="index.php?act=products">חזור לניהול מוצרים</a>
						</div>
						<div class="block-inner">
						
						<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack">שם החבילה</label>
							<input type="text" name="title_pack">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="players">כמות שחקנים</label>
							<input type="text" name="players">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="mods">מודים</label>
							<select name="mods">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ddos">הגנות DDOS</label>
							<select name="ddos">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="panel">פאנל ניהול</label>
							<select name="panel">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index">מקום ברשימה</label>
							<select name="index">
								<option value=""></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="ftp">גישות FTP</label>
							<select name="ftp">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="price">מחיר החבילה</label>
							<input type="text" name="price">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="הוסף מוצר" class="button_tickets">
						</div>
					</div>
					<?php 
					if(isset($_POST['submit'])) {
					    $title_pack = secur($_POST['title_pack'],"string");
					    $players = secur($_POST['players'],"int");
					    $mods = secur($_POST['mods'],"int");
					    $ddos = secur($_POST['ddos'],"int");
					    $panel = secur($_POST['panel'],"int");
					    $ftp = secur($_POST['ftp'],"int");
					    $price = secur($_POST['price'],"int");
					    $index = secur($_POST['index'],"int");
						$game = "gm";
						
						if (empty($title_pack) || empty($players) || empty($mods) || empty($ddos) || empty($panel) || empty($ftp) || empty($price) || empty($index) || empty($price)) {
							echo '
								<div class="row">
									<div class="input-field">
										<div class="notice error"><p>שגיאה: אחד מהשדות אינם תקינים.</p></div>
									</div>
								</div>
							';
						}
						else
						{
							if(!isset($json))
								$json = new \stdClass();
							
							$json->game	= $game;
							$json->players	= $players;
							$json->mods		= $mods;
							$json->ddos		= $ddos;
							$json->panel	= $panel;
							$json->ftp		= $ftp;
						
							$mysqli->query("INSERT INTO `".PREFIX."_product` (`title`, `price`, `parameters`, `type`, `date`, `index`) VALUES ('".$title_pack."', '".$price."', '".json_encode($json, JSON_UNESCAPED_UNICODE)."', 'servers', '".time()."', '{$index}');");
							
							refreshPage("שרת המשחק נוסף בהצלחה!","שרת מסוג Garry's Mod נוסף בהצלחה!");
							die(' <meta http-equiv="Refresh" content="2; url=index.php?act=products">');

						}
					}
				?>
				</form>
				<?php
					break;
					default:
				?>
				
				<?php
					break;
				}
				?>
			</div>
		</div>
	</div>
</div>