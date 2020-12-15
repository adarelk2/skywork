<h2>פרטים אישיים</h2>
<div class="line"></div>
<div class="desc_area">
	<ul class="details_user">
		<form method="POST">
			<li>שם פרטי: <input type="text" value="<?= $User->get_FirstName()?>" name="firstname" class="edit_details" /></li>
			<li>שם משפחה: <input type="text" value="<?= $User->get_LastName()?>" name="lastname" class="edit_details" /></li>
			<li>כתובת: <input type="text" value="<?= $User->get_Address()?>" name="address" class="edit_details" /></li>
			<li>דואר אלקטרוני: <input type="email" value="<?= $User->get_Email()?>" name="email" class="edit_details" /></li>
			<li>פלאפון: <input type="text" value="<?= $User->get_Phone()?>" name="phone" class="edit_details" /></li>
			<li>שם החברה: <input type="text" value="<?= $User->get_BusinessName() ?>" name="company" class="edit_details" /></li>
			<li>מספר עסק/תעודת זהות: <input type="text" value="<?= $User->get_BusinessId() ?>" name="number_company" class="edit_details" /></li>
			<li>
				<h2 style="font-family: 'OpenSansHebrewRegular', Arial;font-weight: normal;font-size: 25px;color: #4b4b4b;">הזן את סיסמתך על מנת לעדכן את הפרטים האישיים</h2>
				<input type="password" name="password" placeholder="סיסמא..." class="password_details" />
				<input type="submit" name="details_update" value="עדכן פרטים" class="add_new_tickets" style="cursor: pointer;float: right;margin: 8px 10px 0 0;"/>
			</li>
		</form>
		<?php
		if(isset($_POST['details_update']))
		{
			$error = "";
			$errorpassword = "";
			if(empty($_POST['firstname']))
				$error .= "שם פרטי לא תקין.<br />";
			
			if(empty($_POST['lastname']))
				$error .= "שם משפחה לא תקין.<br />";
			
			if(empty($_POST['address']))
				$error .= "כתובת לא תקינה.<br />";
			
			if(empty($_POST['email']))
				$error .= "אימייל לא תקין.<br />";
			
			if(empty($_POST['phone']) || strlen($_POST['phone']) != 10)
				$error .= "מספר טלפון לא תקין.<br />";
			
			if(empty($_POST['company']))
				$error .= "שם חברה לא תקינה.<br />";
			
			if(empty($_POST['number_company']))
				$error .= "מספר עסק או תעודת זהות לא תקין.<br />";
			
			if(empty($_POST['password']))
				$error .= "סיסמה לא נכונה.<br />";
			
			
			$firstname 	= secur($_POST['firstname'],"string");
			$lastname 	= secur($_POST['lastname'],"string");
			$address 	= secur($_POST['address'],"string");
			$email 		= secur($_POST['email'],"string");
			$phone 		= secur($_POST['phone'],"string");
			$company 	= secur($_POST['company'],"string");
			$id 		= secur($_POST['number_company'],"int");
			$password 	= secur($_POST['password'],"string");
			
			if($error == "")
			{
				$check = $mysqli->query("SELECT `id` FROM ".PREFIX."_members WHERE `id`='{$User->get_Id()}' AND `password`='".md5($password)."'");
				if($check->num_rows > 0)
				{
					echo "<div class='okay_register'>הפרטים עודכנו בהצלחה!</div>";
				}
				else {
					$errorpassword = "סיסמה לא נכונה.<br />";
				}
			}
			echo "<div class='error_list'>". $error ." ".$errorpassword."</div>";
		}
		?>
	</ul>
</div>