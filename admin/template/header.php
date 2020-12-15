<?php
	if (!isset($_GET['act']) || empty($_GET['act']))
		$_GET['act'] = null;
?>
<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
	<title>Turing Panel</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="author" content="TURING | TURING.co.il">
	<meta name="keywords" content="SkyWork | Project">
	<meta name="description" content="SkyWork | Project">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/hint.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://use.fontawesome.com/653c5c44ab.js"></script>
  </head>
<body>
	<header>
		<ul class="desktop">
			<?php

				
				if($_GET['act'] == "customers") {
					echo '
						<li><a href="index.php?act=customers&filter=-1">כל המשתמשים</a></li>
						<li><a href="index.php?act=customers&filter=2">לקוחות בלבד</a></li>
						<li><a href="index.php?act=customers&filter=1">מנהלים בלבד</a></li>
					';
				}
				if($_GET['act'] == "tickets") {
					echo '
						<li><a href="index.php?act=tickets">כל הפניות</a></li>
						<li><a href="index.php?act=tickets&filter=2">פניות שטופלו</a></li>
						<li><a href="index.php?act=tickets&filter=1">פניות בטיפול</a></li>
						<li><a href="index.php?act=tickets&filter=3">פניות ממתינות לטיפול</a></li>
					';
				}
				if($_GET['act'] == "orders") {
					echo '
						<li><a href="index.php?act=orders&filter=-1">כל ההזמנות</a></li>
						<li><a href="index.php?act=orders&filter=1">הזמנות שאושרו</a></li>
					';
				}
				if($_GET['act'] == "editpages") {
					echo '
						<li><a href="index.php?act=editpages">ניהול ממליצים</a></li>
						<li><a href="index.php?act=editpages&what=services">ניהול שירותים</a></li>
						<li><a href="index.php?act=editpages&what=links">ניהול קישורים</a></li>
					';
				}
			?>
		</ul>
		<div id="header-left">
			<!--<div id="header-notifications">
				<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="510" height="510" viewBox="0 0 510 510" xml:space="preserve"><path d="M255 510c28.1 0 51-22.9 51-51H204C204 487.1 227 510 255 510zM420.8 357V216.8c0-79-53.5-142.8-127.5-160.6V38.3C293.3 17.9 275.4 0 255 0c-20.4 0-38.2 17.9-38.2 38.3V56.1c-73.9 17.9-127.5 81.6-127.5 160.7V357l-51 51v25.5h433.5V408L420.8 357z"/></svg>
				<p>3</p>
				<ul>
					<li><p>התראות</p></li>
					<li><div class="user-avatar"><img src="assets/images/user-avatar-default.png" alt="" /></div></li>
				</ul>				
			</div>-->
			<div id="header-userbar">
				<p>שלום <?= $User->get_FullName() ?> <svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 386.3 386.3" xml:space="preserve"><polygon points="0 96.9 193.1 289.4 386.3 96.9 "/></svg></p>
				<ul>
					<li><p>טורינג</p></li>
					<li><a href="#">ניהול משתמש</a></li>
					<li><a href="index.php?act=logout"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 55 55" xml:space="preserve"><path d="M53.9 23.6c-0.1-0.1-0.1-0.2-0.2-0.3L41.7 11.3c-0.4-0.4-1-0.4-1.4 0s-0.4 1 0 1.4L50.6 23H29c-0.6 0-1 0.4-1 1s0.4 1 1 1h21.6L40.3 35.3c-0.4 0.4-0.4 1 0 1.4C40.5 36.9 40.7 37 41 37s0.5-0.1 0.7-0.3l12-12c0.1-0.1 0.2-0.2 0.2-0.3C54 24.1 54 23.9 53.9 23.6zM36 29c-0.6 0-1 0.4-1 1v16h-10V8c0-0.4-0.3-0.8-0.7-1L8.4 2h26.6v16c0 0.6 0.4 1 1 1s1-0.4 1-1V1c0-0.6-0.4-1-1-1h-34c0 0-0.1 0-0.1 0C1.9 0 1.8 0 1.8 0.1 1.7 0.1 1.6 0.1 1.5 0.2 1.5 0.2 1.4 0.2 1.4 0.2 1.4 0.2 1.4 0.2 1.3 0.3c0 0 0 0-0.1 0C1.2 0.4 1.1 0.5 1.1 0.6c0 0 0 0 0 0.1C1 0.8 1 0.9 1 1v46c0 0.1 0 0.2 0.1 0.4 0 0 0 0.1 0.1 0.1 0 0.1 0.1 0.1 0.1 0.2 0 0 0.1 0.1 0.1 0.1 0.1 0.1 0.1 0.1 0.2 0.1 0 0 0.1 0 0.1 0.1 0 0 0 0 0 0l22 7C23.8 55 23.9 55 24 55c0.2 0 0.4-0.1 0.6-0.2 0.3-0.2 0.4-0.5 0.4-0.8v-6h11c0.6 0 1-0.4 1-1V30C37 29.4 36.6 29 36 29z"/></svg> התנתק</a></li>
				</ul>
			</div>
			<div id="header-menubutton" class="mobile">
				<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 512 512" xml:space="preserve"><path d="M491.3 235.3H20.7C9.3 235.3 0 244.6 0 256s9.3 20.7 20.7 20.7h470.6c11.4 0 20.7-9.3 20.7-20.7C512 244.6 502.7 235.3 491.3 235.3z"/><path d="M491.3 78.4H20.7C9.3 78.4 0 87.7 0 99.1c0 11.4 9.3 20.7 20.7 20.7h470.6c11.4 0 20.7-9.3 20.7-20.7C512 87.7 502.7 78.4 491.3 78.4z"/><path d="M491.3 392.2H20.7C9.3 392.2 0 401.5 0 412.9s9.3 20.7 20.7 20.7h470.6c11.4 0 20.7-9.3 20.7-20.7S502.7 392.2 491.3 392.2z"/></svg>
			</div>
		</div>
	</header>