<?php
if(isset($_SESSION['Username'])) {
	die(' <meta http-equiv="Refresh" content="0; url=index">');
}
?>
<div id="skywork">
	<div class="clear"></div>	
	<div id="page">
		<div id="page-top">
			<div class="container">
				<h1>שיחזור סיסמה</h1>
				<a class="conbutton" href="contact">צרו איתנו קשר</a>
			</div>
		</div>
		
			<div id="hosting">
			<div id="hosting-top">
				<div class="container">
					<div id="hosting-title">
						<h2>שיחזור סיסמה</h2>
					</div>
					<div id="hosting-con" style="text-align: center;width: 100%; float: none; margin: 0 auto;">
					<?php
					if(isset($_GET['key']) && isset($_GET['reset']))
					{
					  $email=$_GET['key'];
					  $pass=$_GET['reset'];
					  $select=$mysqli->query("SELECT email,password from `".PREFIX."_members` where md5(email)='$email' and md5(password)='$pass'");
					  if($select->num_rows ==1)
					  {
						?>
						<form method="post">
							<ul id="reset_password">
								<li>אנא הכנס סיסמה חדשה</li>
								<li><input type="password" name='password' placeholder="סיסמה" /></li>
								<li><input type="password" name='repassword' placeholder="אימות סיסמא" /></li>
								<li><input type="submit" name="submit_password" class="buy_now_btn" value="אפס סיסמא" /></li>
							</ul>
						</form>
						<?php
							if (isset($_POST['submit_password'])) {
								
								$password = md5(secur($_POST['password'],"string"));
								$repassword = md5(secur($_POST['repassword'],"string"));
								if($password == $repassword) {
									$select=$mysqli->query("UPDATE `".PREFIX."_members` SET `password`='{$password}' where md5(email)='$email' and md5(password)='$pass'");
									if($select) {
										echo "הסיסמה שונתה! אתה מועבר..";
										echo '<meta http-equiv="Refresh" content="2; url=index.php?act=editpages">';
									}
									else {
										 echo "נתקל בבעיה? <a href='contact'>צור קשר</a>";
									}
								}
								else {
									echo "הסיסמאות אינן תואמות";
								}
							}
						?>
						<?php
					  }
					  else {
						  echo "נתקל בבעיה? <a>צור קשר</a>";
					  }
					}
					else {
					?>
						<p style="width: 100%;">
							הזן את כתובת האימייל שלך בשדה מתחת. ברגע שתלחץ 'בקש סיסמה חדשה', תישלח הודעה לתיבת המייל שלך שתבקש ממך לאשר את הבקשה, ובה קישור שבאמצעותו בלבד תוכל לאפס את הסיסמה.
						</p>
						<form method="post">
							<ul id="reset_password">
								<li><input name="email" type="email" placeholder="אימייל" class="password_email important_register" /></li>
								<li><input name="submit" type="submit" class="buy_now_btn" value="בקש סיסמה חדשה"/></li>
							</ul>
						</form>
						<?php
							if (isset($_POST['submit'])) {
								$email = secur($_POST['email'],"string");
								if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
									
									$getEmailq = $mysqli->query("SELECT `password`,`email` FROM `".PREFIX."_members` WHERE `email`='{$email}'");
									if ($getEmailq->num_rows > 0) {
										$Data = $getEmailq->fetch_assoc();
										
										$email2 = md5($email);
										$password = md5($Data['password']);
										
									$link="www.skywork.co.il/?page=resetpassword&key={$email2}&reset={$password}";
									$msg = "לקוח יקר, שלום רב \r\n על מנת לאפס את סיסמתך לחץ על הקישור המצורף ותעובר לאיפוס הסיסמא. \r\n {$link}";
										mail($email,"איפוס סיסמא - SkyWork",$msg);
										
										echo "הודעה לאיפוס הסיסמא נשלחה לאימייל, אנא בדוק את הדואר הנכנס/דואר הזבל.";


									}
									else {
										echo "כתובת האימייל שגויה.";
									}
								}
								else {
									echo "כתובת האימייל לא תקינה.";
								}
							}
					}
						?>
						
					</div>
				</div>
			</div>
			

			</div>
		</div>
		
	</div>