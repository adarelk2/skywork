<?php
$page = secur($_GET['page'],"string");
$getJson = $mysqli->query("SELECT `json` FROM `".PREFIX."_editblock` WHERE `name`='{$page}'")->fetch_assoc();
$JsonData = json_decode($getJson['json']);
?>
	<div class="clear"></div>	
	<div id="page">
		<div id="page-top">
			<div class="container">
				<h1>צור קשר</h1>
			</div>
		</div>
		
		<div class="container">
			<h2><?php editAdmin($JsonData->title,"title"); ?></h2>
			<?php
						function checkIssetCookie() {
							if(isset($_SESSION['expire'])) {
								echo "disabled";
							}
						}
						
					?>
			<div id="contact-form">
				<form method="POST" action="" name="contact">
					<input type="text" id="fullname" placeholder="שם..." name="fullname"   <?= checkIssetCookie() ?>>
					<input type="text" id="phone" placeholder="מספר פלאפון..." name="phone"  <?= checkIssetCookie() ?>>
					<input type="email" id="email" placeholder='כתובת דוא"ל' name="email"  <?= checkIssetCookie() ?>>
					<textarea id="message" name="message" placeholder='הודעה...'  <?= checkIssetCookie() ?>></textarea >
					<input type="submit" name="submit" value="שליחה" <?= checkIssetCookie() ?>>
					<div id="contact_response" style="font-weight: bold; font-size: 18px;"></div>
					

				</form>
			</div>
			<script type="text/javascript">
			$(function() {
				$("form[name='contact']").submit(function() {
					$.ajax({
						type: "POST",
						data: $(this).serialize(),
						url: "./core/contact.php",
						success: function(data) {
							$("#contact_response").html(data);
							if(data == "הפנייה נקלטה בהצלחה במערכת!") {
								$('#fullname').prop('disabled', true);
								$('#phone').prop('disabled', true);
								$('#email').prop('disabled', true);
								$('#submit').prop('disabled', true);
								$('#message').prop('disabled', true);
							}
						}
					});
					return false;
				});
			});
			</script>
			<div id="contact-address">
				<ul>
					<li><span><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 430.1 430.1" xml:space="preserve"><path d="M356.2 107.1c-1.5-5.7-4.6-11.9-6.9-17.2C321.7 23.7 261.6 0 213.1 0 148.1 0 76.5 43.6 66.9 133.4v18.4c0 0.8 0.3 7.6 0.6 11.1 5.4 42.8 39.1 88.3 64.4 131.1 27.1 45.9 55.3 91 83.2 136.1 17.2-29.4 34.4-59.3 51.2-87.9 4.6-8.4 9.9-16.8 14.5-24.9 3.1-5.3 8.9-10.7 11.6-15.7 27.1-49.7 70.8-99.8 70.8-149.1v-20.3C363.2 126.9 356.6 108.2 356.2 107.1zM214.2 199.2c-19.1 0-40-9.6-50.3-35.9 -1.5-4.2-1.4-12.6-1.4-13.4v-11.9c0-33.6 28.6-48.9 53.4-48.9 30.6 0 54.2 24.5 54.2 55.1C270.1 174.7 244.8 199.2 214.2 199.2z"/></svg></span> <p><?= $Settings['address'] ?></p></li>
					<li><span><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 578.1 578.1" xml:space="preserve"><path d="M577.8 456.1c1.2 9.4-1.6 17.5-8.6 24.5l-81.4 80.8c-3.7 4.1-8.5 7.6-14.4 10.4 -5.9 2.9-11.7 4.7-17.4 5.5 -0.4 0-1.6 0.1-3.7 0.3 -2 0.2-4.7 0.3-8 0.3 -7.8 0-20.3-1.3-37.6-4s-38.6-9.2-63.6-19.6c-25.1-10.4-53.6-26-85.4-46.8 -31.8-20.8-65.7-49.4-101.6-85.7 -28.6-28.2-52.2-55.1-71-80.8 -18.8-25.7-33.9-49.5-45.3-71.3 -11.4-21.8-20-41.6-25.7-59.4S4.6 177.4 2.6 164.5s-2.9-22.9-2.4-30.3c0.4-7.3 0.6-11.4 0.6-12.2 0.8-5.7 2.7-11.5 5.5-17.4s6.3-10.7 10.4-14.4L98 8.8c5.7-5.7 12.2-8.6 19.6-8.6 5.3 0 10 1.5 14.1 4.6s7.5 6.8 10.4 11.3l65.5 124.2c3.7 6.5 4.7 13.7 3.1 21.4 -1.6 7.8-5.1 14.3-10.4 19.6l-30 30c-0.8 0.8-1.5 2.1-2.1 4s-0.9 3.4-0.9 4.6c1.6 8.6 5.3 18.4 11 29.4 4.9 9.8 12.4 21.7 22.6 35.8s24.7 30.3 43.5 48.7c18.4 18.8 34.7 33.4 49 43.8 14.3 10.4 26.2 18.1 35.8 22.9 9.6 4.9 16.9 7.9 22 8.9l7.6 1.5c0.8 0 2.1-0.3 4-0.9 1.8-0.6 3.2-1.3 4-2.1l34.9-35.5c7.3-6.5 15.9-9.8 25.7-9.8 6.9 0 12.4 1.2 16.5 3.7h0.6l118.1 69.8C571.1 441.2 576.2 448 577.8 456.1z" /></svg></span> <p><a href="tel:<?= $Settings['phonenumber'] ?>"><?= $Settings['phonenumber'] ?></a></p></li>
					<li><span><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 14 14" xml:space="preserve"><path d="M7 9L5.3 7.5l-5 4.2C0.5 11.9 0.7 12 1 12h12c0.3 0 0.5-0.1 0.7-0.3L8.7 7.5 7 9zM13.7 2.3C13.5 2.1 13.3 2 13 2H1C0.7 2 0.5 2.1 0.3 2.3L7 8 13.7 2.3z" /><polygon points="0 2.9 0 11.2 4.8 7.1 " /><polygon points="9.2 7.1 14 11.2 14 2.9 " /></svg></span> <p><a href="mailto:<?= $Settings['email'] ?>"><?= $Settings['email'] ?></a></p></li>
				</ul>
			</div>
		</div>
	</div>
