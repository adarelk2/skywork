<?php
if(!isset($_GET['do']) || empty($_GET['do']))
	$_GET['do'] = null;
$do = secur($_GET['do'],"string");
switch($do)
{
	
	case "edit":
		include("private_area_details_edit.php");
	break;
	default:
	$id = $User->get_Id();
	$checkbrokerid = $mysqli->query("SELECT broker_id,Money FROM turing_broker where id='$id'");
	$getbrokerid = $checkbrokerid->fetch_assoc();
?>
<h2>פרטים אישיים</h2>
<div class="line"></div>
<div class="desc_area">
	<ul class="details_user">
		<li>שם הלקוח: <strong><?php echo $User->get_Fullname()?></strong></li>
		<li>כתובת: <strong><?php echo $User->get_Address()?></strong></li>
		<li>דואר אלקטרוני: <strong><?php echo $User->get_Email()?></strong></li>
		<li>פלאפון: <strong><?php echo $User->get_Phone()?></strong></li>
		<li>שם החברה: <strong><?= $User->get_BusinessName() ?></strong></li>
		<li>מספר עסק/תעודת זהות: <strong><?= $User->get_BusinessId() ?></strong></li>
		<li>מין: <strong><?php echo ($User->get_Gender() == "female") ? "נקבה" : "זכר";?></strong></li>
		<li>תאריך הצטרפות: <strong>123123</strong></li>
		<li>קוד מתווך: <strong><? echo $getbrokerid['broker_id'];?></strong></li>
		<li>זיכוי: <strong><? echo $getbrokerid['Money'];?> ש"ח</strong></li>
		<li><a href="private_area&show=details&do=edit">ערוך פרטים אישיים</a></li>
	</ul>
</div>
<?php
	break;
}
?>