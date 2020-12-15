<?php

if (!isset($_GET['page']) OR empty($_GET['page'])) $_GET['page'] = "index";

switch($_GET['page'])
{
	default:
		$title_page = "סקייוורק > אחסון אתרים החל מ10₪ לחודש";
	break;
	case "about":
		$title_page = "סקייוורק פתרונות ענן - אודותינו - קצת עלינו";
	break;
	case "contact":
		$title_page = "סקייוורק פתרונות ענן - שירות לקוחות | יצירת קשר";
	break;
	case "clouds":
		$title_page = "סקייוורק - גיבוי בענן";
	break;
	case "register":
		$title_page = "סקייוורק פתרונות ענן - הרשמה";
	break;
		case "domains":
		$title_page = "סקייוורק - דומיינים | שמות מתחם";
	
	break;
	case "hosting":
		$title_page = "סקייוורק - אחסון אתרים החל מ10₪";		
	break;
	case "vps":
		$title_page = "סקייוורק - שרת וירטואלי החל מ80₪";			
	break;
	case "game-servers":
		$title_page = "סקייוורק - שרתי משחק החל מ12₪ ";
		if(!isset($_GET['game']) || empty($_GET['game']))
			$_GET['game'] = "mc";
		
		switch ($_GET['game']) {
			default:
				$title_page .= " - Minecraft";
			break;
			case ("mc"):
				$title_page .= " - שרתי מיינקרפט - Minecraft";
			break;
			case ("mu"):
				$title_page .= " - שרתי אמיו אונלין - MuOnline";
			break;
			case ("fl"):
				$title_page .= " - פלייפ - Flyff";
			break;
			case ("samp"):
				$title_page .= " - שרתי סאמפ - SAMP";
			break;
			case ("csgo"):
				$title_page .= " - שרתי סיאס גו - CSGO";
			break;
			case ("cs"):
				$title_page .= " - שרתי סיאס 1.6 - CS 1.6";
			break;
			case ("gm"):
				$title_page .= " - Garry's Mod";
			break;
			
		}		
	break;
	case "private_area":
		$title_page = "סקייוורק פתרונות ענן - איזור אישי";			
	break;
	case "404":
		$title_page = "הדף המבוקש לא נמצא";		
	break;
	case "buy":
		$title_page = "סקייוורק פתרונות ענן - ביצוע הזמנה";		
	break;
	
}
?>
<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112951809-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112951809-1');
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>


@font-face {
   font-family: myFirstFont;
   src: url(../GveretLevinAlefAlefAlef-Regular.ttf);
}

</style>
<!-- Global site tag (gtag.js) - Google Analytics -->

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
   
	<base href="https://skywork.co.il/" />
    <title><?= $title_page; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="סקייוורק - שרתים וירטואלים | אחסון אתרים | שרתי משחק">
	<meta name="robot" content="index,follow"/>
    <meta name="keywords" content="<?= $Settings['words'] ?>">
    <meta name="description" content="<?= $Settings['description'] ?>">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="99954ff3-46ad-4c70-8ef6-a51853177c98";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

	</head>
<body>

	<div id="top-bar" class="mobile">
				<div class="container">
						<div id="top-bar-userbar">
					<?php
						if(!isset($_SESSION['UserId']))
						{
					?>
						<button>
							לקוח קיים? <strong>התחבר</strong>
						</button>
						<div id="top-bar-userbar-drop">
							<form method="post" action="?">
								<label for="email"><strong>כתובת דוא"ל</strong></label>
								<input type="email" placeholder="לדוגמה: sample@skywork.com" name="email">
								<div class="clear"></div>
								<label for="password"><strong>סיסמה</strong></label>
								<input type="password" placeholder="סיסמא" name="password">
								<input type="submit" name="submit" value="התחבר">
								<a href="resetpassword">שכחתי את הסיסמה</a>
								<Br />
								<input type="submit" name="register" style="width: 100%;"value="הרשמה">
							</form>
							<?php
							if(isset($_POST['submit'])) {
								$sEmail = secur($_POST['email'],"string");
								$sPassword = md5(secur($_POST['password'],"string") );
								$select = $mysqli->query( "SELECT * FROM `".PREFIX."_members` WHERE `email`= '".$sEmail."' AND `password` = '".$sPassword."' LIMIT 1");
								if($select->num_rows > 0) {
									$data = $select->fetch_assoc();
									$_SESSION['Username'] = $sEmail;
									$_SESSION['UserId'] = (int) $data['id'];
		echo "<meta http-equiv=refresh content=0>";
								} else {
									echo '<script>
											$(".error").css("display", "block");

										</script>';
								}
							}
							if(isset($_POST['register'])) {
		echo "<script> window.location.replace('register') </script>";
							}
						}
						else {
							?>
							<button>
								ברוך הבא, <strong><?= $User->get_FullName() ?></strong>.
							</button>
							<div id="top-bar-userbar-drop">
								<ul>
									<li><a href="private_area">איזור אישי</a></li>
									<?php if($User->check_admin()) { echo '<li><a href="admin">לוח הבקרה למנהלים</a></li>'; } ?>
									<li><a href="logout">התנתק</a></li>
								</ul>
							</div>
						<?php
						}
						?>
						</div>
					</div>
				</div>
			</div>
			
			<div id="top-bar" class="desktop" style="font-family: myFirstFont";>
				<div class="container">
					<ul class="phonenemail">
						<li><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 578.1 578.1" xml:space="preserve"><path d="M577.8 456.1c1.2 9.4-1.6 17.5-8.6 24.5l-81.4 80.8c-3.7 4.1-8.5 7.6-14.4 10.4 -5.9 2.9-11.7 4.7-17.4 5.5 -0.4 0-1.6 0.1-3.7 0.3 -2 0.2-4.7 0.3-8 0.3 -7.8 0-20.3-1.3-37.6-4s-38.6-9.2-63.6-19.6c-25.1-10.4-53.6-26-85.4-46.8 -31.8-20.8-65.7-49.4-101.6-85.7 -28.6-28.2-52.2-55.1-71-80.8 -18.8-25.7-33.9-49.5-45.3-71.3 -11.4-21.8-20-41.6-25.7-59.4S4.6 177.4 2.6 164.5s-2.9-22.9-2.4-30.3c0.4-7.3 0.6-11.4 0.6-12.2 0.8-5.7 2.7-11.5 5.5-17.4s6.3-10.7 10.4-14.4L98 8.8c5.7-5.7 12.2-8.6 19.6-8.6 5.3 0 10 1.5 14.1 4.6s7.5 6.8 10.4 11.3l65.5 124.2c3.7 6.5 4.7 13.7 3.1 21.4 -1.6 7.8-5.1 14.3-10.4 19.6l-30 30c-0.8 0.8-1.5 2.1-2.1 4s-0.9 3.4-0.9 4.6c1.6 8.6 5.3 18.4 11 29.4 4.9 9.8 12.4 21.7 22.6 35.8s24.7 30.3 43.5 48.7c18.4 18.8 34.7 33.4 49 43.8 14.3 10.4 26.2 18.1 35.8 22.9 9.6 4.9 16.9 7.9 22 8.9l7.6 1.5c0.8 0 2.1-0.3 4-0.9 1.8-0.6 3.2-1.3 4-2.1l34.9-35.5c7.3-6.5 15.9-9.8 25.7-9.8 6.9 0 12.4 1.2 16.5 3.7h0.6l118.1 69.8C571.1 441.2 576.2 448 577.8 456.1z" /></svg> <a href="tel:<?= $Settings['phonenumber'] ?>"><?= $Settings['phonenumber'] ?></a></li>						
						<li><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 14 14" xml:space="preserve"><path d="M7 9L5.3 7.5l-5 4.2C0.5 11.9 0.7 12 1 12h12c0.3 0 0.5-0.1 0.7-0.3L8.7 7.5 7 9zM13.7 2.3C13.5 2.1 13.3 2 13 2H1C0.7 2 0.5 2.1 0.3 2.3L7 8 13.7 2.3z" /><polygon points="0 2.9 0 11.2 4.8 7.1 " /><polygon points="9.2 7.1 14 11.2 14 2.9 " /></svg> <a href="mailto:<?= $Settings['email'] ?>"><?= $Settings['email'] ?></a></li>						
					</ul>
					
						<div id="top-bar-userbar">
					<?php
						if(!isset($_SESSION['UserId']))
						{
					?>
						<button>
							לקוח קיים? <strong>התחבר</strong>
						</button>
						<div id="top-bar-userbar-drop">
							<form method="post" action="?">
								<label for="email"><strong>כתובת דוא"ל</strong></label>
								<input type="email" placeholder="לדוגמה: sample@skywork.com" name="email">
								<div class="clear"></div>
								<label for="password"><strong>סיסמה</strong></label>
								<input type="password" placeholder="סיסמא" name="password">
								<input type="submit" name="submit" value="התחבר">
								<a href="resetpassword">שכחתי את הסיסמה</a>
								<Br />
								<input type="submit" name="register" style="width: 100%;"value="הרשמה">
							</form>
							<?php
							if(isset($_POST['submit'])) {
								$sEmail = secur($_POST['email'],"string");
								$sPassword = md5(secur($_POST['password'],"string") );
								$select = $mysqli->query( "SELECT * FROM `".PREFIX."_members` WHERE `email`= '".$sEmail."' AND `password` = '".$sPassword."' LIMIT 1");
								if($select->num_rows > 0) {
									$data = $select->fetch_assoc();
									$_SESSION['Username'] = $sEmail;
									$_SESSION['UserId'] = (int) $data['id'];
									header("Location: index.php");
								} else {
									echo '<script>
											$(".error").css("display", "block");

										</script>';
								}
							}
							if(isset($_POST['register'])) {
							}
						}
						else {
							?>
							<button>
								ברוך הבא, <strong><?= $User->get_FullName() ?></strong>.
							</button>
							<div id="top-bar-userbar-drop">
								<ul>
									<li><a href="private_area">איזור אישי</a></li>
									<?php if($User->check_admin()) { echo '<li><a href="admin">לוח הבקרה למנהלים</a></li>'; } ?>
									<li><a href="logout">התנתק</a></li>
								</ul>
							</div>
						<?php
						}
						?>
						</div>
					</div>
				</div>
			</div>
			<header>
				<div class="container">
					<ul class="desktop" style="font-family: myFirstFont";>
						<li <?php if((isset($_GET['page']) && $_GET['page'] == "index" )|| !isset($_GET['page'])) echo "class='active'";?> ><a href="index.php">דף הבית</a></li>
						<li <?php if(isset($_GET['page']) && $_GET['page'] == "about") echo "class='active'";?>><a href="about">אודותינו</a></li>
						<li <?php if(isset($_GET['page']) && $_GET['page'] == "vps") echo "class='active'";?>><a href="vps">שרתים וירטואליים</a>
						
						</li>
						<li <?php if(isset($_GET['page']) && $_GET['page'] == "hosting") echo "class='active'";?>><a href="hosting">אחסון אתרים</a></li>
												
						<li><a href="javascript:void(null)">שירותים נוספים</a>
							<ul>
															<li <?php if(isset($_GET['page']) && $_GET['page'] == "servers") echo "class='active'";?>><a href="game-servers">שרתי משחק</a></li>
<li <?php if(isset($_GET['page']) && $_GET['page'] == "domains") echo "class='active'";?>><a href="domains">דומיינים</a></li>
<li><a href="soon" target="_blank">בניית אתרים(בקרוב)</a></li>
<li><a href="soon" target="_blank">דף נחיתה(בקרוב)</a></li>
							</ul>
						</li>
						<li <?php if(isset($_GET['page']) && $_GET['page'] == "contact") echo "class='active'";?>><a href="contact">צור קשר</a></li>
					</ul>
					<div class="mobile menu-button"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="512" height="512" viewBox="0 0 459 459" xml:space="preserve"><path d="M0 382.5h459v-51H0V382.5zM0 255h459v-51H0V255zM0 76.5v51h459v-51H0z" fill="#FFFFFF"/></svg></div>
					<div class="logo">
						<a href="index.php"><img src="assets/images/logo.png" alt="סקייוורק" title="סקייוורק" /></a>
					</div>
				</div>
			</header>