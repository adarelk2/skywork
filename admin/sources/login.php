<?php
if(isset($_SESSION['Username']))
{
	if($User->check_admin())
		die(' <meta http-equiv="Refresh" content="0; url=index.php">');
}
?>
<!DOCTYPE html>
<html dir="rtl">
	<head>
		<title>Turing Panel - login</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="assets/css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	</head>
	<body id="login-page">
		<div class="container">
			<div class="login-logo"><img src="https://turing.co.il/do_not_touch/logo.png" alt="turing-logo" /></div>
			<div class="block" style="text-align: center;">
				<div class="block-title">
					<h1>התחברות</h1>
				</div>
				<form method="post" style="float: none; margin: 0 auto;">
					<div class="input-field">
						<label for="username">דואר אלקטרוני</label>
						<input type="text" name="username" required>
					</div>
					<div class="input-field">
						<label for="password">סיסמה</label>
						<input type="password" name="password" required>
					</div>
					<div class="input-field">
						<input type="submit" name="submit" value="התחבר למערכת" class="button_tickets" />
					</div>
				</form>
			</div>
		</div>
			<div class="error" style="display: none;">
				<div id="error-right">
					<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 512 512" xml:space="preserve"><style>.s0{fill:#495A79;}.s1{fill:#42516D;}</style><path d="M501.5 383.8L320.5 51.4C306.7 28.6 282.7 14.8 256 14.8s-50.7 13.8-64.5 36.6L10.5 383.8C-3.3 407.5-3.6 435.7 9.9 459.4c13.5 23.7 37.8 37.8 65.1 37.8h361.9c27.3 0 51.6-14.1 65.1-37.8C515.6 435.7 515.3 407.5 501.5 383.8z" fill="#495A79"/><path d="M502.1 459.4c-13.5 23.7-37.8 37.8-65.1 37.8H256V14.8c26.7 0 50.7 13.8 64.5 36.6L501.5 383.8C515.3 407.5 515.6 435.7 502.1 459.4z" fill="#42516D"/><path d="M475.7 399.1L294.7 66.7C286.6 52.9 271.9 44.8 256 44.8s-30.6 8.1-38.7 21.9L36.3 399.1c-8.4 14.1-8.4 31.2-0.3 45.3 8.1 14.4 22.8 22.8 39 22.8h361.9c16.2 0 30.9-8.4 39-22.8C484.1 430.3 484.1 413.2 475.7 399.1z" fill="#FFDE33"/><path d="M476 444.4c-8.1 14.4-22.8 22.8-39 22.8H256V44.8c15.9 0 30.6 8.1 38.7 21.9L475.7 399.1C484.1 413.2 484.1 430.3 476 444.4z" fill="#FFBC33"/><path d="M256 437.2c-16.5 0-30-13.5-30-30s13.5-30 30-30 30 13.5 30 30S272.5 437.2 256 437.2zM286 317.2c0 16.5-13.5 30-30 30s-30-13.5-30-30v-150c0-16.5 13.5-30 30-30s30 13.5 30 30V317.2z" fill="#495A79"/><path d="M286 407.2c0-16.5-13.5-30-30-30v60C272.5 437.2 286 423.7 286 407.2zM286 317.2v-150c0-16.5-13.5-30-30-30v210C272.5 347.2 286 333.7 286 317.2z" fill="#42516D"/></svg>
				</div>
				<p><strong>שגיאה:</strong> שם משתמש או הסיסמה אינם נכונים.</p>			
				<div id="error-close">
					<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="512" height="512" viewBox="0 0 357 357" xml:space="preserve"><polygon points="357 35.7 321.3 0 178.5 142.8 35.7 0 0 35.7 142.8 178.5 0 321.3 35.7 357 178.5 214.2 321.3 357 357 321.3 214.2 178.5 " /></svg>
				</div>
			</div>
		<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.input-field input').focus(function() {
					$(this).parent().find('label').addClass('active');
				});	
				
				$('.input-field input').blur(function() {
					if($(this).val().length >= 1) {
						
					} else {
						$(this).parent().find('label').removeClass('active');
					}
				});	
				
				$('#error-close').click(function() {
					$(this).parent().slideUp("slow");
				});	
			});
		</script>		
	</body>
</html>
<?php
	if(isset($_POST['submit'])) {
		$sUsername = secur($_POST['username'],"string");
		$sPassword = md5(secur($_POST['password'],"string") );
		$select = $mysqli->query( "SELECT * FROM `".PREFIX."_members` WHERE `email`= '".$sUsername."' AND `password` = '".$sPassword."' AND `level`='1' LIMIT 1");
		if($select->num_rows > 0) {
			$data = $select->fetch_assoc();
			$_SESSION['Username'] = $sUsername;
			$_SESSION['UserId'] = (int) $data['id'];
			$_SESSION['level'] = (int) $data['level'];
			header("Location: index.php");
		} else {
			echo '<script>
					$(".error").css("display", "block");

				</script>';
		}
	}
?>