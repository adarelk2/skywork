<?php
if(!isset($_GET['do']) || empty($_GET['do']))
	$_GET['do'] = null;
$do = secur($_GET['do'],"string");
switch($do)
{
	
	case "open":
		include("tickets_area_open.php");
	break;
	case "view":
		include("tickets_area_view.php");
	break;
	default:
?>
<h2 style="width: 40%">פניות</h2>
<a href="private_area&show=tickets&do=open" class="add_new_tickets">פתח פניה חדשה</a>
<div class="line"></div>
<ul class="tickets">
	<?php
		$ticketq = $mysqli->query("SELECT * FROM `".PREFIX."_tickets` WHERE `userid`='".$User->get_Id()."' ORDER BY date DESC");
		while($ticketData = $ticketq->fetch_assoc())
		{
			
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
	<li>
		<a href="private_area&show=tickets&do=view&id=<?= $ticketData['id'] ?>"><?= limitText($ticketData['title'],125)?></a>
		<p>
			<?= limitText($ticketData['content'],300)?>
		</p>
		<ul class="status">
			<li>מצב הפניה: <?= $status ?></li>
			<li>שם התומך: <strong><?= $PerName ?></strong></li>
			<li>תאריך פתיחה: <strong><?= date("d/m/Y",$ticketData['date']) ?></strong></li>
			<li><a href="private_area&show=tickets&do=view&id=<?= $ticketData['id'] ?>">כניסה לפניה</a></li>
		</ul>
	</li>
	<?php
		}
		if($ticketq->num_rows == 0) {
			echo "
				<div class='desc_area' style='text-align: center;'>
					אין פניות.
				</div>
			";
		}
	?>
</ul>
<?php
	break;
}
?>