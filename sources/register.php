<?php
if(isset($_SESSION['Username']))
	die(' <meta http-equiv="Refresh" content="0; url=index.php">');

	$page = "index";
	$getJson = $mysqli->query("SELECT `json` FROM `".PREFIX."_editblock` WHERE `name`='{$page}'")->fetch_assoc();
	$JsonData = json_decode($getJson['json']);
?>
<div id="skywork">
	<div class="clear"></div>	
	<div id="page">
		<div id="page-top">
			<div class="container">
				<h1>הרשמה</h1>
				<a class="conbutton" href="#">צרו איתנו קשר</a>
			</div>
		</div>
		<div class="container">
			<h2>פרטים אישיים</h2>
			<span style="font-weight: bold;">*שדות חובה מסומנות במסגרת אדומה</span>
			<form method="post">
				<ul class="register_block">
					<li><input type="text" name="firstname" placeholder="שם פרטי" class="important_register" /></li>
					<li><input type="text" name="lastname" placeholder="שם משפחה" class="important_register" /></li>
					<li><input type="email" name="email" placeholder="דואר אלקטרוני" class="important_register" /></li>
					<li><input type="text" name="phone" placeholder="מספר פלאפון" class="important_register" /></li>
					<li>
						<select name="gender">
							<option disabled selected>מין</option>
							<option value="1">זכר</option>
							<option value="0">נקבה</option>
						</select>
					</li>
					</ul>
					<ul class="register_block">
					<li><input type="text" name="city" placeholder="עיר" /></li>
					<li><input type="text" name="street" placeholder="רחוב" /></li>
					<li><input type="number" name="home" placeholder="מספר בית" /></li>
					<li><input type="text" name="businessname" placeholder="שם העסק" /></li>
					<li><input type="number" name="idcard" placeholder="תעודת זהות/ח.פ" /></li>
					</ul><ul class="register_block"><li>10% הנחה על כל מוצר</li>
					</ul>
					<ul class="register_block">
					<li><input type="number" name="broker" placeholder="קוד מתווך" /></li>
				</ul>
			<h2 style="border-bottom: 1px solid #d9d9d9;padding: 10px 0 5px 0;margin: 40px 0 30px 0;float: right;width: 100%;">אבטחת חשבון</h2>
				<ul class="register_block">
					<li><input type="password" name="password" placeholder="סיסמא" class="important_register" /></li>
					<li><input type="password" name="passwordagain" placeholder="אימות סיסמא" class="important_register" /></li>
					<li style="margin: 10px 0 0 0;"><label><input type="checkbox" name="emailsend" value="1" /><span>מעוניין לקבל התראות לאימייל מהמערכת</span></label></li>
				</ul>
				<input type="submit" value="הרשם למערכת" name="registersub" />
			</form>
			<?php
				if(isset($_SESSION['Username']))
					die(' <meta http-equiv="Refresh" content="0; url=index.php');
				
				if(isset($_POST['registersub']))
				{
					$errormsg = "";
					$firstname = secur($_POST['firstname'],"string");
					$lastname = secur($_POST['lastname'],"string");
					$email = secur($_POST['email'],"string");
					$phone = secur($_POST['phone'],"string");
					$gender = (isset($_POST['gender']) && $_POST['gender'] == 1) ? "male" : "female";
					$city = secur($_POST['city'],"string");
					$street = secur($_POST['street'],"string");
					$home = secur($_POST['home'],"int");
					$businessname = secur($_POST['businessname'],"string");
					$idcard = secur($_POST['idcard'],"int");
					$broker = secur($_POST['broker'],"int");
					$password = secur($_POST['password'],"string");
					$passwordagain = secur($_POST['passwordagain'],"string");
					$emailmsg = (isset($_POST['emailsend'])) ? "enable" : "disable";
					
					$checkemail = $mysqli->query("SELECT `email` FROM `".PREFIX."_members` WHERE `email`='{$email}'");
					$checkphone = $mysqli->query("SELECT `phone` FROM `".PREFIX."_members` WHERE `phone`='{$phone}'");
					$checkbroker = $mysqli->query("SELECT id from Broker_code where id=$broker");
					if($checkemail->num_rows > 0)
					{
						$errormsg .= "האימייל קיים במערכת <a href='#' style='font-weight: bold;color: #000;'>לחץ כאן</a> על מנת לאפס סיסמא.<br />";
					}
					
					if($checkphone->num_rows > 0)
					{
						$errormsg .= "מספר הפלאפון קיים במערכת, <a href='#' style='font-weight: bold;color: #000;'>לחץ כאן</a> על מנת לאפס את הסיסמא.<br />";
					}
					if($checkbroker->num_rows <1 and $broker >0)
					{
						$errormsg .= "קוד מתווך אינו קיים במערכת.<br />";
						$broker =0;
					}
					if(emptyOrShort($firstname,2))
						$errormsg .= "שם פרטי אינו תקין<br />";
					if(emptyOrShort($lastname,2))
						$errormsg .= "שם המשפחה אינו תקין<br />";
					if(empty($email))
						$errormsg .= "כתובת דואר האלקטרוני אינה תקינה<br />";
					if(empty($city))
						$errormsg .= "לא צוין עיר מגורים<br />";
					if(empty($street))
						$errormsg .= "לא צוין כתובת מגורים<br />";
						if(empty($home))
						$errormsg .= "לא צוין מספר בית<br />";
					if(empty($phone) || strlen($phone) != 10)
						$errormsg .= "מספר הפלאפון אינו תקין<br />";
					
					if(emptyOrShort($password,8))
					{
						$errormsg .= "הסיסמא חייבת להכיל 8 תווים או יותר<br />";
					}
					if(emptyOrShort($idcard,8))
					{
						$errormsg .= "תעודת הזהות אינה תקינה<br />";
					}
					
					else if($password != $passwordagain)
					{
						$errormsg .= "אימות הסיסמא נכשל, הסיסמאות אינן תואמות.<br />";
					}

					if($errormsg == "")
					{
						
					$mysqli->query("INSERT INTO `turing_members` (`firstname`, `lastname`, `job`, `picture`, `status`, `password`, `email`, `phone`, `address`, `business_name`, `business_id`, `gender`, `email_message`, `registration_date`, `ip`, `level`, `broker_id`) VALUES ('{$firstname}', '{$lastname}', 'לא זמין', 'assets/images/customer.png', '1', '".md5($password)."', '{$email}', '{$phone}', '". $city." ".$street." ".$home ."', '{$businessname}', '{$idcard}', '{$gender}', '{$emailmsg}', '".time()."', '".$_SERVER['REMOTE_ADDR']."', '3', '{$broker}')");
							$checkidofuser = $mysqli->query("SELECT id FROM `turing_members` where email ='$email'");
							$getidofuser = $checkidofuser->fetch_assoc();
						//$mysqli->query("INSERT INTO `turing_broker` (`broker_id`,`Money`,`id`)VALUES($rand,0,$getidofuser[id])");
						echo "<div class='okay_register'>נרשמת למערכת בהצלחה, הינך מועבר לדף הראשי של האתר.</div>";
						echo "<meta http-equiv='Refresh' content='2; url=index.php'>";
					}
					else {
						echo "<div class='error_list'>". $errormsg ."</div>";
					}
					
				}
			?>
		</div>
		<section id="whatdoyou-section">
			<div class="container">
				<div id="whatdoyou-right">
					<?=
						editAdmin($JsonData->p_price,"p_price");
						editAdmin($JsonData->p_pricedesc,"p_pricedesc");
					?>
				</div>
				<a href="contact">קבל הצעת מחיר <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 129 129" enable-background="new 0 0 129 129" width="512" height="512"><path d="m64.5 122.6c32 0 58.1-26 58.1-58.1s-26-58-58.1-58-58 26-58 58 26 58.1 58 58.1zm0-108c27.5 0 49.9 22.4 49.9 49.9s-22.4 49.9-49.9 49.9-49.9-22.4-49.9-49.9 22.4-49.9 49.9-49.9zM70 93.5c0.8 0.8 1.8 1.2 2.9 1.2 1 0 2.1-0.4 2.9-1.2 1.6-1.6 1.6-4.2 0-5.8l-23.5-23.5 23.5-23.5c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8 0l-26.4 26.4c-0.8 0.8-1.2 1.8-1.2 2.9s0.4 2.1 1.2 2.9l26.4 26.4z" /></svg></a>
			</div>
		</section>
	</div>
