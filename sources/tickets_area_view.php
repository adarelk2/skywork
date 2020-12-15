<?php
if(!isset($_GET['id']) || empty($_GET['id']))
	$_GET['id'] = null;
$id = secur($_GET['id'],"int");

$ticketq = $mysqli->query("SELECT * FROM `".PREFIX."_tickets` WHERE `userid`='".$User->get_Id()."' AND `id`='{$id}' LIMIT 1");

if($ticketq->num_rows >0 )
{
$ticketData = $ticketq->fetch_assoc();
if($ticketData['status'] == 0)
	$status = '<span style="font-weight: bold;color: #d21515;">ממתין</span>';

if($ticketData['status'] == 1)
	$status = '<span style="font-weight: bold;color: #eb9d16;">בתהליך</span>';

if($ticketData['status'] == 2)
	$status = '<span style="font-weight: bold;color: #6fb10e;">טופל</span>';

if(!empty($ticketData['per'])) {
	$userTakeCare	= new User($ticketData['per']);
	$PerName = $userTakeCare->get_Fullname();
}
else
	$PerName = "לא זמין כעת";
?>
<h2 style="width: 70%"><?= $ticketData['title']?></h2>
<a href="private_area&show=tickets" class="add_new_tickets">חזור לפניות</a>
<div class="desc_area">
	<br />
	<?= nl2br($ticketData['content']) ?>
	<ul class="status">
		<li style="float: right;">מצב הפניה: <?= $status ?></li>
		<li style="float: right;">שם התומך: <strong><?= $PerName ?></strong></li>
		<li style="float: right;">תאריך פתיחה: <strong><?= date("d/m/Y",$ticketData['date']) ?></strong></li>
	</ul>
</div>
<div class="line"></div>
<div style="height: 450px;width: 100%;min-height: 300px;max-height: 550px;overflow: visible;overflow-y: auto;float: right;position: relative;z-index:9999;padding: 0 18px 0 0;">
<ul class="tickets">
	<?php
		$messageQ = $mysqli->query("SELECT * FROM `".PREFIX."_messages` WHERE `tickets_id`='{$id}' ORDER BY `date` ASC");
		if($messageQ->num_rows > 0) {
			while($messageData = $messageQ->fetch_assoc()) {
				$msgUser = new User($messageData['userid']);
	?>
	<li style="padding: 20px 0 25px 0;">
		<div style="float: right;">
			<img width="60" src="<?= $msgUser->get_Image() ?>" />
		</div>
		<div style="padding-right: 15px;float: right;">
			<strong><?php if($msgUser->get_id() == $User->get_id()) echo "את/ה"; else echo $msgUser->get_fullname(); ?></strong><br />
			<div style="padding-top: 7px;word-wrap:break-word;width: 515px;"><?= nl2br($messageData['content'])?></div>
		</div>
		<div style="float: left;">
			<?= ago($messageData['date']) ?>
		</div>
		
	</li>
	<?php
			}
		}
		else {

			echo "
				<div class='desc_area' style='text-align: center;'>
					אין תגובות.
				</div>
			";
		}
	?>
</ul>
</div>
<?php
	if($ticketData['status'] != 2)
		{
?>
<form method="post">
	<ul class="massage_send" style="margin-top: 30px;">
		<h3>כתוב תגובה חדשה:</h3><br />

		<li><textarea style="direction: rtl;" name="msgcontent" placeholder="תוכן התגובה..."></textarea></li>
		<li><input type="submit" name="sendmassage" value="" /></li>
	</ul>
</form>
<?php
			if(isset($_POST['sendmassage']))
			{
				$content = secur($_POST['msgcontent'],"string");
				if(emptyOrShort($content,10))
				{

						echo "<div style='float: right;margin-top: 20px;'>שגיאה - נדרשים 10 תווים או יותר על מנת לשלוח תגובה חדשה.</div>";
				}
				else {
					if(strlen($content) > 500)
						echo "<div style='float: right;margin-top: 20px;'>שגיאה - לא ניתן להגיב עם יותר מ-500 תווים.</div>";
					else
					{
						$mysqli->query("INSERT INTO `".PREFIX."_messages` (`content`, `tickets_id`, `userid`, `date`, `ip`) VALUES ('{$content}', '{$id}', '".$User->get_Id()."', '".time()."', '".$_SERVER['REMOTE_ADDR']."');");
						echo "<div style='float: right;margin-top: 20px;'>התגובה נשלחה בהצלחה!</div>";
						die(' <meta http-equiv="refresh" content="0">');
					}
				}
			}
		}
}
else {
	echo "<h2 style='width: 80%'>שגיאה, לא ניתן להציג עמוד זה.</h2>";
}
?>
