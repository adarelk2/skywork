<?php
if (!isset($_GET['id']) OR empty($_GET['id'])) $_GET['id'] = null;

$id = secur($_GET['id'],"int");
$query = $mysqli->query("SELECT * FROM `".PREFIX."_members` WHERE `id`='".$id."'");
if ($query->num_rows == 0)
	die(' <meta http-equiv="Refresh" content="0; url=index.php?act=customers">');
$Member = $query->fetch_assoc();
?>
<div id="left-side">
	<div class="container">
		<div class="block">
			<div class="block-title">
				<h1>פרטי הלקוח "<?= $Member['firstname']." ".$Member['lastname'] ?>"</h1>
				<a href="index.php?act=customers&do=edit&id=<?php echo $_GET['id']; ?>">ערוך לקוח זה</a>
			</div>
			<div class="block-inner">
				<form method="post">
					<div class="row">
						<div class="input-field input-field-2">
							<label for="firstname" class="active">*שם פרטי</label>
							<input type="text" disabled name="firstname" value="<?= $Member['firstname']?>">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="firstname" class="active">*שם משפחה</label>
							<input type="text" disabled name="lastname" value="<?= $Member['lastname']?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<label for="thoda" class="active">*תעודת זהות/חברה פרטית</label>
							<input type="text" disabled name="business_id" value="<?= $Member['business_id']?>">
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>ת.ז או מספר עוסק של החברה/אדם המחזיק בחשבון</p>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<label for="name_p"  class="active">שם העסק</label>
							<input type="text" disabled name="business_name" value="<?= $Member['business_name']?>">
						</div>
						<div class="row-remark">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 496.2 496.2" xml:space="preserve"><style>.s0{fill:#FFF;}</style><path d="M496.2 248.1c0-137-111.1-248.1-248.1-248.1C111.1 0 0 111.1 0 248.1c0 137 111.1 248.1 248.1 248.1C385.1 496.2 496.2 385.1 496.2 248.1z" fill="#25B7D3"/><path d="M315.2 359.6c-1.4-2-4-2.8-6.3-1.7 -24.6 11.6-52.5 23.9-58 25 -0.1-0.1-0.4-0.3-0.6-0.7 -0.7-1-1.1-2.3-1.1-4 0-13.9 10.5-56.2 31.2-125.7 17.5-58.4 19.5-70.5 19.5-74.5 0-6.2-2.4-11.4-6.9-15.1 -4.3-3.5-10.2-5.3-17.7-5.3 -12.5 0-26.9 4.7-44.1 14.5 -16.7 9.4-35.4 25.4-55.4 47.5 -1.6 1.7-1.7 4.3-0.4 6.2 1.3 1.9 3.8 2.6 6 1.8 7-2.9 42.4-17.4 47.6-20.6 4.2-2.6 7.9-4 10.9-4 0.1 0 0.2 0 0.3 0 0 0.2 0.1 0.5 0.1 0.9 0 3-0.6 6.7-1.9 10.7 -30.1 97.6-44.8 157.5-44.8 183 0 9 2.5 16.2 7.4 21.5 5 5.4 11.8 8.1 20.1 8.1 8.9 0 19.7-3.7 33.1-11.4 12.9-7.4 32.7-23.7 60.4-49.7C316.3 364.3 316.6 361.6 315.2 359.6zM314.3 76.7c-4.9-5-11.2-7.6-18.7-7.6 -9.3 0-17.5 3.7-24.2 11 -6.6 7.2-9.9 15.9-9.9 26.1 0 8 2.5 14.7 7.3 19.8 4.9 5.2 11.1 7.8 18.5 7.8 9 0 17-3.9 24-11.6 6.9-7.6 10.4-16.4 10.4-26.4C321.6 88.1 319.2 81.7 314.3 76.7z" fill="#FFF"/></svg>								
							<p>השם עבורו יופקו חשבוניות, שם החברה\עסק</p>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2 ">
							<label for="tel"  class="active">*מספר פלאפון</label>
							<input type="text" disabled name="phone" value="<?= $Member['phone']?>">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="address"  class="active">*כתובת</label>
							<input type="text" disabled name="address" value="<?= $Member['address']?>">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="gender" class="active">מין</label>
							<select name="gender" disabled>
								<option value=""></option>
								<option value="male"<? if($Member['gender'] == "male") echo "selected"; ?>>זכר</option>
								<option value="female" <? if($Member['gender'] == "female") echo "selected"; ?>>נקבה</option>
							</select>
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="email_message"  class="active">קבלת עדכונים באימייל</label>
							<select name="email_message" disabled>
								<option value=""></option>
								<option value="enable" <? if($Member['email_message'] == "enable") echo "selected"; ?>>אפשר</option>
								<option value="disable" <? if($Member['email_message'] == "disable") echo "selected"; ?>>בטל</option>
							</select>
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field input-field-2">
							<label for="email"  class="active">*כתובת דוא"ל</label>
							<input type="email" name="email" disabled value="<?= $Member['email']?>">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="level" class="active">דרגת משתמש</label>
							<select name="level" disabled>
								<option value=""></option>
								<option value="3" <? if($Member['level'] == 3) echo "selected"; ?>>משתמש רשום</option>
								<option value="2" <? if($Member['level'] == 2) echo "selected"; ?>>לקוח</option>
								<option value="1" <? if($Member['level'] == 1) echo "selected"; ?>>מנהל</option>
							</select>
						
					</div>					
					<div class="clear"></div>
				</form>
			</div>
		</div>
	</div>
</div>
