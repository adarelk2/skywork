<?php
	session_start();
include "functions.php";


	$err = array();
	
	$name = htmlentities(secur($_POST['fullname'],"string"), ENT_COMPAT, "UTF-8");
	$email = htmlentities(secur($_POST['email'],"string"), ENT_COMPAT, "UTF-8");
	$phone = htmlentities(secur($_POST['phone'],"string"), ENT_COMPAT, "UTF-8");
	$message = htmlentities(secur($_POST['message'],"string"), ENT_COMPAT, "UTF-8");
	$ip = $_SERVER['REMOTE_ADDR'];
	$date = date("l jS \of F Y h:i:s A");
	
	if(isset($_SESSION['expire'])) {
		array_push($err,"ניתן לשלוח פנייה אחת ב 15 דקות. אנא נסה שנית מאוחר יותר.");
		
	}
	else {
		if(!empty($name) || !empty($email) || !empty($phone) || !empty($message)) {
			if(preg_match('/\p{Hebrew}/u', $name)) {
				if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
					if(strlen($phone) == 9 || strlen($phone) == 10) {
						if(strlen($message) <= 150) {
							$mysqli->query("INSERT INTO `".PREFIX."_contact` (`fullname`, `phone`, `email`, `content`, `date`, `ip`, `status`) VALUES ('{$name}', '{$phone}', '{$email}', '{$message}', '".time()."', '{$ip}', '0')");

							
							//שליחת מייל
							$to = "skywork17@gmail.com";
							$subject = "פנייה חדשה מ SkyWork";
							$message = "
							<html>
								<body style='direction: rtl;'>
									
									שם מלא: <b>$name</b><br />
									כתובת אימייל: <b>$email</b><br />
									מספר טלפון: <b>$phone</b><br />
									כתובת אייפי: <b>$ip</b><br /><br />
									תוכן:<br /> <b>$message</b><br />
									
								</body>
							</html>
							
							
							";
							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
							$headers .= 'From: <LEADSYSTEM@turing.co.il>' . "\r\n";
							mail($to,$subject,$message,$headers);
							
							// סשן 15 דקות
							$_SESSION['expire'] = time() + 900;
							echo "הפנייה נקלטה בהצלחה במערכת!";
						}
						else {
							array_push($err, "תוכן הפנייה מוגבל ל150 תווים בלבד.");
						}
					} else {
						array_push($err, "נא הזן מספר פלאפון תקין בין 9 ל 10 ספרות.");
					}
				} else {
					array_push($err, "נא הזן כתובת דואר אלקטרוני תקינה. בפורמט: user@domain.com");
				}
			} else {
				array_push($err, "נא הזן את שמך כראוי ללא מספרים או סימנים מיוחדים.");
			}
		} else {
			array_push($err, "נא הזן את כל השדות כראוי.");
		}
	}
	
	
	if($err != null) {
		foreach($err as $value) {
			echo $value . "<br />";
		}
	}
?>