<h2>פתח פניה חדשה</h2>
<a href="private_area&show=tickets" class="add_new_tickets">חזור לפניות</a>
<div class="line"></div>

<div class="desc_area" style="font-size: 14px;">
	נתקלת בבעיה כלשהי בשירות שלנו? <strong>פנה אלינו כעת</strong> ונציגינו יחזרו אליך במהירות עם פתרון!
	
	<form method="POST">
		<input type="text" name="title" placeholder="כותרת הפניה..." class="title_tickets" />
		
		<textarea class="desc_tickets" name="content" placeholder="תוכן הפניה..."></textarea>
		
		<input type="submit" name="submit" value="שלח פניה" class="add_new_tickets" style="float: right;cursor: pointer;" />
	</form>
	<?php
		if(isset($_POST['submit']))
		{
			$checkRepeatQ = $mysqli->query("SELECT `date` FROM `".PREFIX."_tickets` WHERE `userid`='".$User->get_Id()."' ORDER BY `date` DESC LIMIT 1");
			$checkRepeat= $checkRepeatQ->fetch_assoc();
			if($checkRepeatQ->num_rows == 0 || ((time() - $checkRepeat['date']) >= 300)) {
				if(!empty($_POST['title']) && !empty($_POST['content'])) {
					$title	 = secur($_POST['title'],"string");
					$content = secur($_POST['content'],"string");
					
					$mysqli->query("INSERT INTO `".PREFIX."_tickets` ( `title`, `content`, `date`, `status`, `per`, `userid`, `ip`) VALUES ( '{$title}', '{$content}', '".time()."', '0', '', '".$User->get_Id()."', '".$_SERVER['REMOTE_ADDR']."')");
					echo '
						<div class="tickets_ok">
							<span>הפניה נשלחה בהצלחה!</span>
							<p>לקוח יקר, הפניה נשלחה בהצלחה! אנא המתן לתגובת נציג שירות.</p>
						</div>
					';
					die(' <meta http-equiv="Refresh" content="2; url=private_area&show=tickets">');
				}
			}
			else {
				echo '<div class="tickets_ok">
						<span>יש לחכות לפחות 5 דקות מפתיחת הפנייה האחרונה.</span>
						
					</div>
					';
			}
		}
	?>
</div>