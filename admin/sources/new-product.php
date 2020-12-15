<?php
if (!isset($_GET['type']) OR empty($_GET['type'])) $_GET['type'] = null;
$type = secur($_GET['type'],"string");
switch($type)
{
	default:
		die(header("Location: index.php?act=products"));
	break;
	case "hosts":
?>
<div id="left-side">
	<div class="container">
		<div class="block">
			<div class="block-title">
				<h1>הוסף מוצר לקטגורית אחסון אתרים</h1>
				<a href="index.php?act=products">חזור לניהול מוצרים</a>
			</div>
			<div class="block-inner">
				<form method="post">
					<div class="row">
						<div class="input-field input-field-2">
							<label for="storage">שטח אחסון</label>
							<input type="text" name="storage">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="traffic">תעבורה</label>
							<input type="text" name="traffic">
						</div>
						
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<label for="title_pack">שם החבילה</label>
							<input type="text" name="title_pack">
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>שם החבילה יוצג באתר בכותרת.</p>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="os">מערכת הפעלה</label>
							<select name="os">
								<option value=""></option>
								<option value="Windows">Windows</option>
								<option value="Linux">Linux</option>
								<option value="Windows/Linux">Windows/Linux</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="panel">פאנל ניהול</label>
							<select name="panel">
								<option value=""></option>
								<option value="Directadmin">Directadmin</option>
								<option value="Plesk">Plesk</option>
								<option value="cPanel">cPanel</option>
								<option value="Directadmin/cPanel/Plesk">Directadmin/cPanel/Plesk</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="domain">דומיינים</label>
							<input type="text" name="domain">
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="mails">תיבות דואר</label>
							<input type="text" name="mails">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="flag">חוות שרתים</label>
							<select name="flag">
								<option value=""></option>
								<option value="ישראל">ישראל</option>
								<option value="גרמניה">גרמניה</option>
								<option value="צרפת">צרפת</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index">מקום ברשימת המוצרים</label>
							<select name="index">
								<option value=""></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="price">מחיר החבילה</label>
							<input type="text" name="price">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="recommended">חבילה מומלצת</label>
							<select name="recommended">
								<option value=""></option>
								<option value="1">כן</option>
								<option value="0">לא</option>
							</select>
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>יש להזין מספרים ללא פסיקים, המחיר מתעדכן לפי שקלים. מחיר פר חודש.<br />חבילה מומלצת מבליטה את החבילה באתר.</p>
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
					    $storage = secur($_POST['storage'],"string");
					    $traffic = secur($_POST['traffic'],"string");
					    $title_pack = secur($_POST['title_pack'],"string");
					    $os = secur($_POST['os'],"string");
					    $panel = secur($_POST['panel'],"string");
					    $domain = secur($_POST['domain'],"string");
					    $mails = secur($_POST['mails'],"string");
					    $flag = secur($_POST['flag'],"string");
					    $index = secur($_POST['index'],"int");
					    $price = secur($_POST['price'],"int");
					    $recommended = secur($_POST['recommended'],"int");
						
						if (empty($storage) || empty($traffic) || empty($title_pack) || empty($os) || empty($panel) || empty($domain) || empty($mails) || empty($flag) || empty($index) || empty($price)) {
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
							
							$json->storage	= $storage;
							$json->traffic	= $traffic;
							$json->os		= $os;
							$json->panel	= $panel;
							$json->domain	= $domain;
							$json->mails	= $mails;
							$json->flag		= $flag;
						
							$mysqli->query("INSERT INTO `".PREFIX."_product` (`title`, `price`, `parameters`, `type`, `date`, `index`, `recommended`) VALUES ('".$title_pack."', '".$price."', '".json_encode($json, JSON_UNESCAPED_UNICODE)."', 'hosts', '".time()."', '{$index}', '".$recommended."');");
							
							
							refreshPage("האחסון שלך נוסף בהצלחה","המוצר שלך נוסף בהצלחה, כעת תועבר לעמוד ניהול מוצרים.");
							die(' <meta http-equiv="Refresh" content="2; url=index.php?act=products">');
						}
						
						
					}
				?>
				</form>
				
			</div>
		</div>
	</div>
</div>
<?php
break;

case "virtual":


?>
<div id="left-side">
	<div class="container">
		<div class="block">
			<div class="block-title">
				<h1>הוסף שרת וירטואלי חדש</h1>
				<a href="index.php?act=products">חזור לניהול מוצרים</a>
			</div>
			<div class="block-inner">
				<form method="post">
					<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack">שם החבילה</label>
							<input type="text" name="title_pack">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="lib">ליבות</label>
							<input type="text" name="lib">
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>שם החבילה יוצג באתר בכותרת.</p>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="prossesor">מעבד</label>
							<input type="text" name="prossesor">
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
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>פרמטר "מקום ברשימה" מסדר את החבילה לפי סדר עולה (1,2,3,4).</p>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="space">תעבורה</label>
							<input type="text" name="space">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ddos">הגנות DDOS</label>
							<select name="ddos">
								<option value=""></option>
								<option value="1">כלול</option>
								<option value="0">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="ip">מספר כתובות IP</label>
							<input type="text" name="ip">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="disk">שטח דיסק</label>
							<input type="text" name="disk">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="memory">זיכרון</label>
							<input type="text" name="memory">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="whereserver">חוות שרתים</label>
							<input type="text" name="whereserver">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<label for="price">מחיר החבילה</label>
							<input type="text" name="price">
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>יש להזין מספרים ללא פסיקים, המחיר מתעדכן לפי שקלים. מחיר פר חודש.</p>
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
					    $prossesor = secur($_POST['prossesor'],"string");
					    $lib = secur($_POST['lib'],"string");
					    $title_pack = secur($_POST['title_pack'],"string");
					    $space = secur($_POST['space'],"string");
					    $ddos = secur($_POST['ddos'],"string");
					    $ip = secur($_POST['ip'],"string");
					    $disk = secur($_POST['disk'],"string");
					    $whereserver = secur($_POST['whereserver'],"string");
					    $memory = secur($_POST['memory'],"string");
					    $price = secur($_POST['price'],"int");
					    $index = secur($_POST['index'],"int");
						
						if (empty($memory) || empty($whereserver) || empty($prossesor) || empty($lib) || empty($index) || empty($title_pack) || empty($space) || empty($ddos) || empty($ip) || empty($disk) || empty($price)) {
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
							
							$json->prossesor	= $prossesor;
							$json->lib			= $lib;
							$json->space		= $space;
							$json->ddos			= $ddos;
							$json->ip			= $ip;
							$json->disk			= $disk;
							$json->memory		= $memory;
							$json->whereserver	= $whereserver;
						
							$mysqli->query("INSERT INTO `".PREFIX."_product` (`title`, `price`, `parameters`, `type`, `date`, `index`) VALUES ('".$title_pack."', '".$price."', '".json_encode($json, JSON_UNESCAPED_UNICODE)."', 'virtual', '".time()."', '{$index}');");
							
							refreshPage("הVPS שלך נוסף","המוצר שלך נוסף בהצלחה, כעת תועבר לעמוד ניהול מוצרים.");
							die(' <meta http-equiv="Refresh" content="2; url=index.php?act=products">');

						}
					}
				?>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
break;

case "domains":


?>
<div id="left-side">
	<div class="container">
		<div class="block">
			<div class="block-title">
				<h1>הוסף חבילת גיבוי בענן חדשה</h1>
				<a href="index.php?act=products">חזור לניהול מוצרים</a>
			</div>
			<div class="block-inner">
				<form method="post">
					<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack">שם החבילה</label>
							<input type="text" name="title_pack">
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>שם החבילה יוצג באתר בכותרת.</p>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2 pull-left">
							<label for="index">מקום ברשימה</label>
							<select name="index">
								<option value=""></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>פרמטר "מקום ברשימה" מסדר את החבילה לפי סדר עולה (1,2,3,4).</p>
						</div>
					</div>
						<div class="input-field input-field-2 pull-left">
							<label for="disk">סיומת</label>
							<input type="text" name="disk">
						</div>
					</div>
						<div class="input-field input-field-2 pull-left">
							<label for="whereserver">ספק דומיינים</label>
							<input type="text" name="whereserver">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<label for="price">מחיר החבילה</label>
							<input type="text" name="price">
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>יש להזין מספרים ללא פסיקים, המחיר מתעדכן לפי שקלים. מחיר פר חודש.</p>
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
					    $disk = secur($_POST['disk'],"string");
					    $whereserver = secur($_POST['whereserver'],"string");
					    $price = secur($_POST['price'],"int");
					    $index = secur($_POST['index'],"int");
						
						if (empty($index) || empty($title_pack) || empty($disk) || empty($disk) || empty($price)) {
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
							
							$json->disk			= $disk;
							$json->whereserver	= $whereserver;
						
							$mysqli->query("INSERT INTO `".PREFIX."_product` (`title`, `price`, `parameters`, `type`, `date`, `index`) VALUES ('".$title_pack."', '".$price."', '".json_encode($json, JSON_UNESCAPED_UNICODE)."', 'domains', '".time()."', '{$index}');");
							
							refreshPage("חבילת גיבוי הענן","המוצר שלך נוסף בהצלחה, כעת תועבר לעמוד ניהול מוצרים.");
							die(' <meta http-equiv="Refresh" content="2; url=index.php?act=products">');

						}
					}
				?>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
break;

case "clouds":


?>
<div id="left-side">
	<div class="container">
		<div class="block">
			<div class="block-title">
				<h1>הוסף חבילת גיבוי בענן חדשה</h1>
				<a href="index.php?act=products">חזור לניהול מוצרים</a>
			</div>
			<div class="block-inner">
				<form method="post">
					<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack">שם החבילה</label>
							<input type="text" name="title_pack">
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>שם החבילה יוצג באתר בכותרת.</p>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
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
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>פרמטר "מקום ברשימה" מסדר את החבילה לפי סדר עולה (1,2,3,4).</p>
						</div>
					</div>
						<div class="input-field input-field-2 pull-left">
							<label for="disk">שטח דיסק</label>
							<input type="text" name="disk">
						</div>
					</div>
						<div class="input-field input-field-2 pull-left">
							<label for="whereserver">חוות שרתים</label>
							<input type="text" name="whereserver">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<label for="price">מחיר החבילה</label>
							<input type="text" name="price">
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>יש להזין מספרים ללא פסיקים, המחיר מתעדכן לפי שקלים. מחיר פר חודש.</p>
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
					    $disk = secur($_POST['disk'],"string");
					    $whereserver = secur($_POST['whereserver'],"string");
					    $price = secur($_POST['price'],"int");
					    $index = secur($_POST['index'],"int");
						
						if (empty($index) || empty($title_pack) || empty($disk) || empty($disk) || empty($price)) {
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
							
							$json->disk			= $disk;
							$json->whereserver	= $whereserver;
						
							$mysqli->query("INSERT INTO `".PREFIX."_product` (`title`, `price`, `parameters`, `type`, `date`, `index`) VALUES ('".$title_pack."', '".$price."', '".json_encode($json, JSON_UNESCAPED_UNICODE)."', 'clouds', '".time()."', '{$index}');");
							
							refreshPage("חבילת גיבוי הענן","המוצר שלך נוסף בהצלחה, כעת תועבר לעמוד ניהול מוצרים.");
							die(' <meta http-equiv="Refresh" content="2; url=index.php?act=products">');

						}
					}
				?>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
break;

case "servers":
	include "add-servers.php";
break;


}

?>

