<?php
	if (!isset($_GET['do']) || empty($_GET['do']))
		$_GET['do'] = null;
	$do = secur($_GET['do'],"string");
	
	switch ($do)
	{
		case "view":
			include "view-ticket.php";
			
		break;
		
		case "close":
			include "close-ticket.php";
			
		break;
		default:

			if (!isset($_GET['filter']) || empty($_GET['filter']))
			{		
				$_GET['filter'] = -1;
			}
			if($_GET['filter'] == 3)
				$_GET['filter'] = 0;
			$filter = secur($_GET['filter'],"int");
			$filter = ($filter == -1) ? "" : "WHERE `status`='".(int) $filter."'";
?>
<div id="left-side">
	<div class="container">
		<div class="block">
			<div class="block-title">
				<h1>כל הפניות</h1>
			</div>
			<div class="block-inner">
				<table>
					<thead>
					<tr>
						<th>#</th>
						<th>כותרת</th>
						<th>תאריך פתיחה</th>
						<th>פותח הפנייה</th>
						<th>תומך מטפל</th>
						<th>מצב הפניה</th>
						<th>צפייה</th>
					</tr>
					</thead>
					<tbody>
						<?php
							$counter = 1;
							$sql = $mysqli->query("SELECT * FROM `".PREFIX."_tickets` {$filter} ORDER BY `date` DESC,`status` ASC");
							while($data = $sql->fetch_assoc())
							{
								$userOpen = new User($data['userid']);
								$userTakeCare = new User($data['per']);
								if($data['status'] == 0)
									$status = "<span style='color: red;'>לא טופל</span>";
								if($data['status'] == 1)
									$status = "<span style='color: orange;'>בטיפול</span>";
								if($data['status'] == 2)
									$status = "<span style='color: green;'>טופל</span>";
						?>
								<tr>
									<td><?= $counter ?></td>
									<td><?= limitText($data['title'],60) ?> </td>
									<td><?= ago($data['date']) ?></td>
									<td><a href="index.php?act=customers&do=view&id=<?= $data['userid'] ?>"><?= $userOpen->get_FullName() ?></a></td>
									<td><?= $userTakeCare->get_FullName() ?></td>
									<td><span style='font-weight: bold;'><?= $status ?></span></td>
									<td><a href="index.php?act=tickets&do=view&id=<?= (int) $data['id'] ?>" class="button_tickets">צפה בפניה</a></td>
								</tr>
						<?php
								$counter++;
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php
	break;
	}
?>