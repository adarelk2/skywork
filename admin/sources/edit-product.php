<?php
if (!isset($_GET['id']) OR empty($_GET['id'])) $_GET['id'] = null;
$id = secur($_GET['id'],"int");

$query = $mysqli->query("SELECT * FROM `".PREFIX."_product` WHERE `id`='".(int) $id."'");
if ($query->num_rows == 0)
	die(' <meta http-equiv="Refresh" content="0; url=index.php?act=products">');
$Product = $query->fetch_assoc();
$ProductData = json_decode($Product['parameters']);
print_r ($ProductData);
switch($Product['type'])
{
	default:
		die(' <meta http-equiv="Refresh" content="0; url=index.php?act=products">');
	break;
	case "hosts":
	

?>

<div id="left-side">
	<div class="container">
		<div class="block">
			<div class="block-title">
				<h1>עריכת מוצר "<?= $Product['title'] ?>"</h1>
				<a href="index.php?act=products">חזור לניהול מוצרים</a>
			</div>
			<div class="block-inner">
				<form method="post">
					<div class="row">
						<div class="input-field input-field-2">
							<label for="storage" class="active">שטח אחסון</label>
							<input type="text" name="storage" value="<?= $ProductData->storage ?>" >
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="traffic" class="active">תעבורה</label>
							<input type="text" name="traffic" value="<?= $ProductData->traffic ?>">
						</div>
						
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<label for="title_pack" class="active">שם החבילה</label>
							<input type="text" name="title_pack" value="<?= $Product['title'] ?>">
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>שם החבילה יוצג באתר בכותרת.</p>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="os" class="active">מערכת הפעלה</label>
							<select name="os">
								<option value=""></option>
								<option value="Windows" <?php if($ProductData->os == "Windows") echo "selected"; ?>>Windows</option>
								<option value="Linux"  <?php if($ProductData->os == "Linux") echo "selected"; ?>>Linux</option>
								<option value="Windows/Linux"  <?php if($ProductData->os == "Windows/Linux") echo "selected"; ?>>Windows/Linux</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="panel" class="active">פאנל ניהול</label>
							<select name="panel">
								<option value=""></option>
								<option value="Directadmin" <?php if($ProductData->panel == "Directadmin") echo "selected"; ?>>Directadmin</option>
								<option value="Plesk" <?php if($ProductData->panel == "Plesk") echo "selected"; ?>>Plesk</option>
								<option value="cPanel" <?php if($ProductData->panel == "cPanel") echo "selected"; ?>>cPanel</option>
								<option value="Directadmin/cPanel/Plesk" <?php if($ProductData->panel == "Directadmin/cPanel/Plesk") echo "selected"; ?>>Directadmin/cPanel/Plesk</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="domain" class="active">דומיינים</label>
							<input type="text" name="domain" value="<?= $ProductData->domain ?>">
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="mails" class="active">תיבות דואר</label>
							<input type="text" name="mails" value="<?= $ProductData->mails ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="flag" class="active">חוות שרתים</label>
							<select name="flag">
								<option value=""></option>
								<option value="ישראל" <?php if($ProductData->flag == "ישראל") echo "selected"; ?>>ישראל</option>
								<option value="גרמניה" <?php if($ProductData->flag == "גרמניה") echo "selected"; ?>>גרמניה</option>
								<option value="צרפת" <?php if($ProductData->flag == "צרפת") echo "selected"; ?>>צרפת</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index" class="active">מקום ברשימת המוצרים</label>
							<select name="index">
								<option value=""></option>
								<option value="1" <?php if($Product['index'] == 1) echo "selected"; ?>>1</option>
								<option value="2" <?php if($Product['index'] == 2) echo "selected"; ?>>2</option>
								<option value="3" <?php if($Product['index'] == 3) echo "selected"; ?>>3</option>
								<option value="4" <?php if($Product['index'] == 4) echo "selected"; ?>>4</option>
								<option value="5" <?php if($Product['index'] == 5) echo "selected"; ?>>5</option>
								<option value="6" <?php if($Product['index'] == 6) echo "selected"; ?>>6</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="price" class="active">מחיר החבילה</label>
							<input type="text" name="price" value="<?= $Product['price'] ?>">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="recommended" class="active">חבילה מומלצת</label>
							<select name="recommended">
								<option value=""></option>
								<option value="1" <?php if($Product['recommended'] == 1) echo "selected"; ?>>כן</option>
								<option value="0" <?php if($Product['recommended'] == 0) echo "selected"; ?>>לא</option>
							</select>
						</div>
						<div class="input-field">
							
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>יש להזין מספרים ללא פסיקים, המחיר מתעדכן לפי שקלים. מחיר פר חודש.<br />חבילה מומלצת מבליטה את החבילה באתר.</p>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="החל שינויים" class="button_tickets">
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
							echo "שגיאה. אחד או יותר מהשדות שגויים.";
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
						
							$mysqli->query("UPDATE `".PREFIX."_product` SET `title`='".(string) $title_pack."', `price`='".(int) $price."', `parameters`='".json_encode($json, JSON_UNESCAPED_UNICODE)."', `index`='".(int) $index."', `recommended`='".(int) $recommended."' WHERE `id`='".(int) $_GET['id']."'");
							//message
							refreshPage("השינויים בוצעו בהצלחה!","המוצר התעדכן וכעת תעבור לעמוד ניהול מוצרים.");
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
				<h1>עריכת מוצר "<?= $Product['title'] ?>"</h1>
				<a href="index.php?act=products">חזור לניהול מוצרים</a>
			</div>
			<div class="block-inner">
				<form method="post">
					<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack" class="active">שם החבילה</label>
							<input type="text" name="title_pack" value="<?= $Product['title'] ?>">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="lib" class="active">ליבות</label>
							<input type="text" name="lib" value="<?= $ProductData->lib ?>">
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>שם החבילה יוצג באתר בכותרת.</p>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="prossesor" class="active">מעבד</label>
							<input type="text" name="prossesor" value="<?= $ProductData->prossesor ?>">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index" class="active">מקום ברשימה</label>
							<select name="index">
								<option value=""></option>
								<option value="1" <?php if($Product['index'] == 1) echo "selected"; ?>>1</option>
								<option value="2" <?php if($Product['index'] == 2) echo "selected"; ?>>2</option>
								<option value="3" <?php if($Product['index'] == 3) echo "selected"; ?>>3</option>
								<option value="4" <?php if($Product['index'] == 4) echo "selected"; ?>>4</option>
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
							<label for="space" class="active">תעבורה</label>
							<input type="text" name="space" value="<?= $ProductData->space ?>">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ddos" class="active">הגנות DDOS</label>
							<select name="ddos">
								<option value=""></option>
								<option value="1" <?php if($ProductData->ddos == 1) echo "selected"; ?>>כלול</option>
								<option value="0" <?php if($ProductData->ddos == 0) echo "selected"; ?>>לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="ip" class="active">מספר כתובות IP</label>
							<input type="text" name="ip" value="<?= $ProductData->ip ?>">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="disk" class="active">שטח דיסק</label>
							<input type="text" name="disk" value="<?= $ProductData->disk ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="memory" class="active">זיכרון</label>
							<input type="text" name="memory" value="<?= $ProductData->memory ?>">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="whereserver" class="active">חוות שרתים</label>
							<input type="text" name="whereserver" value="<?= $ProductData->whereserver ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<label for="price" class="active">מחיר החבילה</label>
							<input type="text" name="price" value="<?= $Product['price'] ?>">
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>יש להזין מספרים ללא פסיקים, המחיר מתעדכן לפי שקלים. מחיר פר חודש.</p>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="החל שינויים" class="button_tickets">
						</div>
					</div>
					<?php 
						if(isset($_POST['submit'])) {
							$prossesor		= secur($_POST['prossesor'],"string");
							$lib			= secur($_POST['lib'],"string");
							$title_pack		= secur($_POST['title_pack'],"string");
							$space			= secur($_POST['space'],"string");
							$ddos			= secur($_POST['ddos'],"string");
							$memory			= secur($_POST['memory'],"string");
							$whereserver	= secur($_POST['whereserver'],"string");
							$ip				= secur($_POST['ip'],"string");
							$disk			= secur($_POST['disk'],"string");
							$price			= secur($_POST['price'],"int");
							$index			= secur($_POST['index'],"int");
								
							if (empty($prossesor) || empty($memory) || empty($whereserver) || empty($lib) || empty($index) || empty($title_pack) || empty($space) || empty($ddos) || empty($ip) || empty($disk) || empty($price)) {
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
								$json->memory		= $memory;
								$json->whereserver	= $whereserver;
								$json->disk			= $disk;
							
								$mysqli->query("UPDATE `".PREFIX."_product` SET `title`='".(string) $title_pack."', `price`='".(int) $price."', `parameters`='".json_encode($json, JSON_UNESCAPED_UNICODE)."', `index`='".(int) $index."' WHERE `id`='".(int) $_GET['id']."'");

								refreshPage("השינויים בוצעו בהצלחה!","המוצר התעדכן וכעת תעבור לעמוד ניהול מוצרים.");
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
				<h1>עריכת מוצר "<?= $Product['title'] ?>"</h1>
				<a href="index.php?act=products">חזור לניהול מוצרים</a>
			</div>
			<div class="block-inner">
				<form method="post">
					<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack" class="active">שם החבילה</label>
							<input type="text" name="title_pack" value="<?= $Product['title'] ?>">
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>שם החבילה יוצג באתר בכותרת.</p>
						</div>
					</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index" class="active">מקום ברשימה</label>
							<select name="index">
								<option value=""></option>
								<option value="1" <?php if($Product['index'] == 1) echo "selected"; ?>>1</option>
								<option value="2" <?php if($Product['index'] == 2) echo "selected"; ?>>2</option>
								<option value="3" <?php if($Product['index'] == 3) echo "selected"; ?>>3</option>
								<option value="4" <?php if($Product['index'] == 4) echo "selected"; ?>>4</option>
								<option value="5" <?php if($Product['index'] == 5) echo "selected"; ?>>5</option>
								<option value="6" <?php if($Product['index'] == 6) echo "selected"; ?>>6</option>
								<option value="7" <?php if($Product['index'] == 7) echo "selected"; ?>>7</option>
								<option value="8" <?php if($Product['index'] == 8) echo "selected"; ?>>8</option>
							    <option value="9" <?php if($Product['index'] == 9) echo "selected"; ?>>9</option>
								<option value="10" <?php if($Product['index'] == 10) echo "selected"; ?>>10</option>
							</select>
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>פרמטר "מקום ברשימה" מסדר את החבילה לפי סדר עולה (1,2,3,4).</p>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="disk" class="active">סיומת</label>
							<input type="text" name="disk" value="<?= $ProductData->disk ?>">
						</div>
					</div>
						<div class="input-field input-field-2 pull-left">
							<label for="whereserver" class="active">ספק דומיינים</label>
							<input type="text" name="whereserver" value="<?= $ProductData->whereserver ?>">
						</div>
					</div>
					<div class="clear"></div>
				<div class="row">
						<div class="input-field">
							<label for="price" class="active">מחיר החבילה</label>
							<input type="text" name="price" value="<?= $Product['price'] ?>">
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>יש להזין מספרים ללא פסיקים, המחיר מתעדכן לפי שקלים. מחיר פר חודש.</p>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="החל שינויים" class="button_tickets">
						</div>
					</div>
					<?php 
						if(isset($_POST['submit'])) {
							$title_pack		= secur($_POST['title_pack'],"string");
							$whereserver	= secur($_POST['whereserver'],"string");
							$disk			= secur($_POST['disk'],"string");
							$price			= secur($_POST['price'],"int");
							$index			= secur($_POST['index'],"int");
								
							if (empty($whereserver) || empty($index) || empty($title_pack)|| empty($disk) || empty($price)) {
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
								
								$json->whereserver	= $whereserver;
								$json->disk			= $disk;
							
								$mysqli->query("UPDATE `".PREFIX."_product` SET `title`='".(string) $title_pack."', `price`='".(int) $price."', `parameters`='".json_encode($json, JSON_UNESCAPED_UNICODE)."', `index`='".(int) $index."' WHERE `id`='".(int) $_GET['id']."'");

								refreshPage("השינויים בוצעו בהצלחה!","המוצר התעדכן וכעת תעבור לעמוד ניהול מוצרים.");
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
				<h1>עריכת מוצר "<?= $Product['title'] ?>"</h1>
				<a href="index.php?act=products">חזור לניהול מוצרים</a>
			</div>
			<div class="block-inner">
				<form method="post">
					<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack" class="active">שם החבילה</label>
							<input type="text" name="title_pack" value="<?= $Product['title'] ?>">
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>שם החבילה יוצג באתר בכותרת.</p>
						</div>
					</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index" class="active">מקום ברשימה</label>
							<select name="index">
								<option value=""></option>
								<option value="1" <?php if($Product['index'] == 1) echo "selected"; ?>>1</option>
								<option value="2" <?php if($Product['index'] == 2) echo "selected"; ?>>2</option>
								<option value="3" <?php if($Product['index'] == 3) echo "selected"; ?>>3</option>
								<option value="4" <?php if($Product['index'] == 4) echo "selected"; ?>>4</option>
							</select>
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>פרמטר "מקום ברשימה" מסדר את החבילה לפי סדר עולה (1,2,3,4).</p>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="disk" class="active">שטח דיסק</label>
							<input type="text" name="disk" value="<?= $ProductData->disk ?>">
						</div>
					</div>
						<div class="input-field input-field-2 pull-left">
							<label for="whereserver" class="active">חוות שרתים</label>
							<input type="text" name="whereserver" value="<?= $ProductData->whereserver ?>">
						</div>
					</div>
					<div class="clear"></div>
				<div class="row">
						<div class="input-field">
							<label for="price" class="active">מחיר החבילה</label>
							<input type="text" name="price" value="<?= $Product['price'] ?>">
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>יש להזין מספרים ללא פסיקים, המחיר מתעדכן לפי שקלים. מחיר פר חודש.</p>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="החל שינויים" class="button_tickets">
						</div>
					</div>
					<?php 
						if(isset($_POST['submit'])) {
							$title_pack		= secur($_POST['title_pack'],"string");
							$whereserver	= secur($_POST['whereserver'],"string");
							$disk			= secur($_POST['disk'],"string");
							$price			= secur($_POST['price'],"int");
							$index			= secur($_POST['index'],"int");
								
							if (empty($whereserver) || empty($index) || empty($title_pack)|| empty($disk) || empty($price)) {
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
								
								$json->whereserver	= $whereserver;
								$json->disk			= $disk;
							
								$mysqli->query("UPDATE `".PREFIX."_product` SET `title`='".(string) $title_pack."', `price`='".(int) $price."', `parameters`='".json_encode($json, JSON_UNESCAPED_UNICODE)."', `index`='".(int) $index."' WHERE `id`='".(int) $_GET['id']."'");

								refreshPage("השינויים בוצעו בהצלחה!","המוצר התעדכן וכעת תעבור לעמוד ניהול מוצרים.");
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
?>
<div id="left-side">
	<div class="container">
		<div class="block">
				<?php
				$game = $ProductData->game;
				switch($game)
				{
					
					case "mc":
						
				?>
				<form method="post">
					<div class="block-title">
						<h1>עריכת מוצר "<?= $Product['title'] ?>" - משחק <?= $gameJs[$ProductData->game]?></h1>
						<a href="index.php?act=products">חזור לניהול מוצרים</a>
					</div>
					<div class="block-inner">
						
						<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack" class="active">שם החבילה</label>
							<input type="text" value="<?= $Product['title'] ?>" name="title_pack">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ram" class="active">כמות שחקנים</label>
							<input type="text" value="<?= $ProductData->players ?>" name="ram">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<label for="ddos" class="active">הגנות DDOS</label>
							<select name="ddos">
								<option value=""></option>
								<option <?php if($ProductData->ddos == 1) echo "selected"; ?> value="1">כלול</option>
								<option  <?php if($ProductData->ddos == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="panel" class="active">פאנל ניהול</label>
							<select name="panel">
								<option value=""></option>
								<option <?php if($ProductData->panel == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->panel == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index" class="active">מקום ברשימה</label>
							<select name="index">
								<option value=""></option>
								<option value="1" <?php if($Product['index'] == 1) echo "selected"; ?>>1</option>
								<option value="2" <?php if($Product['index'] == 2) echo "selected"; ?>>2</option>
								<option value="3" <?php if($Product['index'] == 3) echo "selected"; ?>>3</option>
								<option value="4" <?php if($Product['index'] == 4) echo "selected"; ?>>4</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<label for="price" class="active">מחיר החבילה</label>
							<input type="text" name="price" value="<?= $Product['price'] ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="עדכן מוצר" class="button_tickets">
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
						
							$mysqli->query("UPDATE `".PREFIX."_product` SET `parameters`='".json_encode($json, JSON_UNESCAPED_UNICODE)."', `price`='{$price}', `title`='{$title_pack}', `index`='{$index}' WHERE `id`='{$id}'");
							
							refreshPage("שרת המשחק עודכן בהצלחה!","שרת מסוג Minecraft עודכן בהצלחה, אנא המתן לרענון הדף");
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
					<div class="block-title">
						<h1>עריכת מוצר "<?= $Product['title'] ?>" - משחק <?= $gameJs[$ProductData->game]?></h1>
						<a href="index.php?act=products">חזור לניהול מוצרים</a>
					</div>
					<div class="block-inner">
					<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack" class="active">שם החבילה</label>
							<input type="text" name="title_pack" value="<?= $Product['title'] ?>">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ram" class="active">RAM</label>
							<input type="text" name="ram" value="<?= $ProductData->ram ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="files" class="active">קבצים</label>
							<select name="files">
								<option value=""></option>
								<option <?php if($ProductData->files == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->files == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="website" class="active">אתר</label>
							<select name="website">
								<option value=""></option>
								<option <?php if($ProductData->website == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->website == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="rdp" class="active">גישת RDP</label>
							<select name="rdp">
								<option value=""></option>
								<option <?php if($ProductData->rdp == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->rdp == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ddos" class="active">הגנות DDOS</label>
							<select name="ddos">
								<option value=""></option>
								<option <?php if($ProductData->ddos == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->ddos == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="panel" class="active">פאנל ניהול</label>
							<select name="panel">
								<option value=""></option>
								<option <?php if($ProductData->panel == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->panel == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index" class="active">מקום ברשימה</label>
							<select name="index">
								<option value=""></option>
								<option value="1" <?php if($Product['index'] == 1) echo "selected"; ?>>1</option>
								<option value="2" <?php if($Product['index'] == 2) echo "selected"; ?>>2</option>
								<option value="3" <?php if($Product['index'] == 3) echo "selected"; ?>>3</option>
								<option value="4" <?php if($Product['index'] == 4) echo "selected"; ?>>4</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<label for="price" class="active">מחיר החבילה</label>
							<input type="text" name="price" value="<?= $Product['price'] ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="עדכן מוצר" class="button_tickets">
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
							
							$mysqli->query("UPDATE `".PREFIX."_product` SET `parameters`='".json_encode($json, JSON_UNESCAPED_UNICODE)."', `price`='{$price}', `title`='{$title_pack}', `index`='{$index}' WHERE `id`='{$id}'");
							
							refreshPage("שרת המשחק עודכן בהצלחה!","שרת מסוג MU עודכן בהצלחה, אנא המתן לרענון הדף.");
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
						<div class="block-title">
							<h1>עריכת מוצר "<?= $Product['title'] ?>" - משחק <?= $gameJs[$ProductData->game]?></h1>
							<a href="index.php?act=products">חזור לניהול מוצרים</a>
						</div>
						<div class="block-inner">
						
						<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack" class="active">שם החבילה</label>
							<input type="text" name="title_pack" value="<?= $Product['title'] ?>">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ram" class="active">ראם</label>
							<input type="text" name="ram" value="<?= $ProductData->ram ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="files" class="active">קבצים</label>
							<select name="files">
								<option value=""></option>
								<option <?php if($ProductData->files == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->files == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="website" class="active">אתר</label>
							<select name="website">
								<option value=""></option>
								<option <?php if($ProductData->website == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->website == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="rdp" class="active">גישת RDP</label>
							<select name="rdp">
								<option value=""></option>
								<option <?php if($ProductData->rdp == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->rdp == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ddos" class="active">הגנות DDOS</label>
							<select name="ddos">
								<option value=""></option>
								<option <?php if($ProductData->ddos == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->ddos == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="panel" class="active">פאנל ניהול</label>
							<select name="panel">
								<option value=""></option>
								<option <?php if($ProductData->panel == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->panel == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index" class="active">מקום ברשימה</label>
							<select name="index">
								<option value=""></option>
								<option value="1" <?php if($Product['index'] == 1) echo "selected"; ?>>1</option>
								<option value="2" <?php if($Product['index'] == 2) echo "selected"; ?>>2</option>
								<option value="3" <?php if($Product['index'] == 3) echo "selected"; ?>>3</option>
								<option value="4" <?php if($Product['index'] == 4) echo "selected"; ?>>4</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<label for="price" class="active">מחיר החבילה</label>
							<input type="text" name="price" value="<?= $Product['price'] ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="עדכן מוצר" class="button_tickets">
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
							
							$mysqli->query("UPDATE `".PREFIX."_product` SET `parameters`='".json_encode($json, JSON_UNESCAPED_UNICODE)."', `price`='{$price}', `title`='{$title_pack}', `index`='{$index}' WHERE `id`='{$id}'");
							
							refreshPage("שרת המשחק עודכן בהצלחה!","שרת מסוג FlyFF עודכן בהצלחה, אנא המתן לרענון הדף.");
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
						<div class="block-title">
							<h1>עריכת מוצר "<?= $Product['title'] ?>" - משחק <?= $gameJs[$ProductData->game]?></h1>
							<a href="index.php?act=products">חזור לניהול מוצרים</a>
						</div>
						<div class="block-inner">
						
						<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack" class="active">שם החבילה</label>
							<input type="text" name="title_pack" value="<?= $Product['title'] ?>">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="players" class="active">כמות שחקנים</label>
							<input type="text" name="players" value="<?= $ProductData->players ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="mods" class="active">מודים לבחירה</label>
							<select name="mods">
								<option value=""></option>
								<option <?php if($ProductData->mods == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->mods == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ddos" class="active">הגנות DDOS</label>
							<select name="ddos">
								<option value=""></option>
								<option <?php if($ProductData->ddos == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->ddos == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="panel" class="active">פאנל ניהול</label>
							<select name="panel">
								<option value=""></option>
								<option <?php if($ProductData->panel == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->panel == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index" class="active">מקום ברשימה</label>
							<select name="index">
								<option value=""></option>
								<option value="1" <?php if($Product['index'] == 1) echo "selected"; ?>>1</option>
								<option value="2" <?php if($Product['index'] == 2) echo "selected"; ?>>2</option>
								<option value="3" <?php if($Product['index'] == 3) echo "selected"; ?>>3</option>
								<option value="4" <?php if($Product['index'] == 4) echo "selected"; ?>>4</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="ftp" class="active">גישות FTP</label>
							<select name="ftp">
								<option value=""></option>
								<option <?php if($ProductData->ftp == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->ftp == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="price" class="active">מחיר החבילה</label>
							<input type="text" name="price" value="<?= $Product['price'] ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="עדכן מוצר" class="button_tickets">
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
						
							$mysqli->query("UPDATE `".PREFIX."_product` SET `parameters`='".json_encode($json, JSON_UNESCAPED_UNICODE)."', `price`='{$price}', `title`='{$title_pack}', `index`='{$index}' WHERE `id`='{$id}'");
							
							refreshPage("שרת המשחק עודכן בהצלחה!","שרת מסוג SAMP עודכן בהצלחה, אנא המתן לרענון הדף.");
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
						<div class="block-title">
							<h1>עריכת מוצר "<?= $Product['title'] ?>" - משחק <?= $gameJs[$ProductData->game]?></h1>
							<a href="index.php?act=products">חזור לניהול מוצרים</a>
						</div>
						<div class="block-inner">
						
						<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack" class="active">שם החבילה</label>
							<input type="text" name="title_pack" value="<?= $Product['title'] ?>">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="players" class="active">כמות שחקנים</label>
							<input type="text" name="players" value="<?= $ProductData->players ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="mods" class="active">מודים</label>
							<select name="mods">
								<option value=""></option>
								<option <?php if($ProductData->mods == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->mods == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ddos" class="active">הגנות DDOS</label>
							<select name="ddos">
								<option value=""></option>
								<option <?php if($ProductData->ddos == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->ddos == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="panel" class="active">פאנל ניהול</label>
							<select name="panel">
								<option value=""></option>
								<option <?php if($ProductData->panel == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->panel == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index" class="active">מקום ברשימה</label>
							<select name="index">
								<option value=""></option>
								<option value="1" <?php if($Product['index'] == 1) echo "selected"; ?>>1</option>
								<option value="2" <?php if($Product['index'] == 2) echo "selected"; ?>>2</option>
								<option value="3" <?php if($Product['index'] == 3) echo "selected"; ?>>3</option>
								<option value="4" <?php if($Product['index'] == 4) echo "selected"; ?>>4</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="ftp" class="active">גישות FTP</label>
							<select name="ftp">
								<option value=""></option>
								<option <?php if($ProductData->ftp == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->ftp == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="price" class="active">מחיר החבילה</label>
							<input type="text" name="price" value="<?= $Product['price'] ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="עדכן מוצר" class="button_tickets">
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
						
							$mysqli->query("UPDATE `".PREFIX."_product` SET `parameters`='".json_encode($json, JSON_UNESCAPED_UNICODE)."', `price`='{$price}', `title`='{$title_pack}', `index`='{$index}' WHERE `id`='{$id}'");
							
							refreshPage("שרת המשחק עודכן בהצלחה!","שרת מסוג CS:GO עודכן בהצלחה, אנא המתן לרענון הדף.");
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
						<div class="block-title">
							<h1>עריכת מוצר "<?= $Product['title'] ?>" - משחק <?= $gameJs[$ProductData->game]?></h1>
							<a href="index.php?act=products">חזור לניהול מוצרים</a>
						</div>
						<div class="block-inner">
						
						<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack" class="active">שם החבילה</label>
							<input type="text" name="title_pack" value="<?= $Product['title'] ?>">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="players" class="active">כמות שחקנים</label>
							<input type="text" name="players" value="<?= $ProductData->players ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="mods" class="active">מודים</label>
							<select name="mods">
								<option value=""></option>
								<option <?php if($ProductData->mods == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->mods == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ddos" class="active">הגנות DDOS</label>
							<select name="ddos">
								<option value=""></option>
								<option <?php if($ProductData->ddos == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->ddos == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="panel" class="active">פאנל ניהול</label>
							<select name="panel">
								<option value=""></option>
								<option <?php if($ProductData->panel == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->panel == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index" class="active">מקום ברשימה</label>
							<select name="index">
								<option value=""></option>
								<option value="1" <?php if($Product['index'] == 1) echo "selected"; ?>>1</option>
								<option value="2" <?php if($Product['index'] == 2) echo "selected"; ?>>2</option>
								<option value="3" <?php if($Product['index'] == 3) echo "selected"; ?>>3</option>
								<option value="4" <?php if($Product['index'] == 4) echo "selected"; ?>>4</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="ftp" class="active">גישות FTP</label>
							<select name="ftp">
								<option value=""></option>
								<option <?php if($ProductData->ftp == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->ftp == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="price" class="active">מחיר החבילה</label>
							<input type="text" name="price" value="<?= $Product['price'] ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="עדכן מוצר" class="button_tickets">
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
						
							$mysqli->query("UPDATE `".PREFIX."_product` SET `parameters`='".json_encode($json, JSON_UNESCAPED_UNICODE)."', `price`='{$price}', `title`='{$title_pack}', `index`='{$index}' WHERE `id`='{$id}'");
							
							refreshPage("שרת המשחק עודכן בהצלחה!","שרת מסוג CS 1.6 עודכן בהצלחה, אנא המתן לרענון הדף.");
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
						<div class="block-title">
							<h1>עריכת מוצר "<?= $Product['title'] ?>" - משחק <?= $gameJs[$ProductData->game]?></h1>
							<a href="index.php?act=products">חזור לניהול מוצרים</a>
						</div>
						<div class="block-inner">
						
						<div class="row">
						<div class="input-field input-field-2">
							<label for="title_pack" class="active">שם החבילה</label>
							<input type="text" name="title_pack" value="<?= $Product['title'] ?>">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="players" class="active">כמות שחקנים</label>
							<input type="text" name="players" value="<?= $ProductData->players ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="mods" class="active">מודים</label>
							<select name="mods">
								<option value=""></option>
								<option <?php if($ProductData->mods == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->mods == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="ddos" class="active">הגנות DDOS</label>
							<select name="ddos">
								<option value=""></option>
								<option <?php if($ProductData->ddos == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->ddos == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="panel" class="active">פאנל ניהול</label>
							<select name="panel">
								<option value=""></option>
								<option <?php if($ProductData->panel == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->panel == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index" class="active">מקום ברשימה</label>
							<select name="index">
								<option value=""></option>
								<option value="1" <?php if($Product['index'] == 1) echo "selected"; ?>>1</option>
								<option value="2" <?php if($Product['index'] == 2) echo "selected"; ?>>2</option>
								<option value="3" <?php if($Product['index'] == 3) echo "selected"; ?>>3</option>
								<option value="4" <?php if($Product['index'] == 4) echo "selected"; ?>>4</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="ftp" class="active">גישות FTP</label>
							<select name="ftp">
								<option value=""></option>
								<option <?php if($ProductData->ftp == 1) echo "selected"; ?> value="1">כלול</option>
								<option <?php if($ProductData->ftp == 2) echo "selected"; ?> value="2">לא כלול</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="price" class="active">מחיר החבילה</label>
							<input type="text" name="price" value="<?= $Product['price'] ?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="עדכן מוצר" class="button_tickets">
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
						
							$mysqli->query("UPDATE `".PREFIX."_product` SET `parameters`='".json_encode($json, JSON_UNESCAPED_UNICODE)."', `price`='{$price}', `title`='{$title_pack}', `index`='{$index}' WHERE `id`='{$id}'");
							
							refreshPage("שרת המשחק עודכן בהצלחה!","שרת מסוג Garry's Mod עודכן בהצלחה, אנא המתן לרענון הדף.");
							die(' <meta http-equiv="Refresh" content="2; url=index.php?act=products">');

						}
					}
				?>
				</form>
				<?php
					break;
					default:
					break;
				}
				?>
			</div>
		</div>
	</div>
</div>

<?php
break;


}

?>

