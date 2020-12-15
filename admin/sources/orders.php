<?php
	if (!isset($_GET['do']) || empty($_GET['do']))
		$_GET['do'] = null;
	
	switch($_GET['do'])
	{
		
		case "mark":
			if (!isset($_GET['id']) OR empty($_GET['id'])) $_GET['id'] = null;

			$id = secur($_GET['id'],"int");
			$query = $mysqli->query("SELECT * FROM `".PREFIX."_orders` WHERE `id`='".$id."'");
			if ($query->num_rows == 0)
				die(' <meta http-equiv="Refresh" content="0; url=index.php?act=orders">');
			
			$query = $mysqli->query("UPDATE `".PREFIX."_orders` SET `status`='1' WHERE `id`='".$id."'");
			$queryBroker = $mysqli->query("SELECT broker_id,Cost FROM `".PREFIX."_orders` WHERE `id`='".$id."'");
			$checkBrokerid = $queryBroker->fetch_assoc();
			$getMoney = $checkBrokerid['Cost'] /5;
			$query = $mysqli->query("UPDATE `".PREFIX."_broker` SET `Money`=Money + $getMoney WHERE `broker_id`='$checkBrokerid[broker_id]'");
				die(' <meta http-equiv="Refresh" content="0; url=index.php?act=orders">');

			
		break;
		
		case "remove":
			if (!isset($_GET['id']) OR empty($_GET['id'])) $_GET['id'] = null;

			$id = secur($_GET['id'],"int");
			$query = $mysqli->query("SELECT * FROM `".PREFIX."_orders` WHERE `id`='".$id."'");
			if ($query->num_rows == 0)
				die(' <meta http-equiv="Refresh" content="0; url=index.php?act=contact">');
			
			$query = $mysqli->query("DELETE FROM `".PREFIX."_orders` WHERE `id`='".$id."'");
			die(' <meta http-equiv="Refresh" content="0; url=index.php?act=orders">');
		break;
		
		default:
				if (!isset($_GET['filter']) || empty($_GET['filter']))
				{		
					$_GET['filter'] = -1;
				}
				
				
				$filter = secur($_GET['filter'],"int");
								
				if($filter != 0 && $filter != 1)
					$filter = -1;
								
				$filter = ($filter == -1) ? "" : "WHERE `status`='".(int) $filter."'";
				

?>

	<div id="left-side">
		<div class="container">
			<div class="block">
				<div class="block-title">
					<h1>ניהול הזמנות</h1>
					<div class="input-field">
						<input type="text" class="search" placeholder="חפש הזמנה...">
					</div>
				<span class="counter"></span>
				</div>
				<div class="block-inner">

					<table class="table table-hover table-bordered results">
					  <thead>
						<tr>
							<th>#</th>
							<th class="col-md-5 col-xs-5">שם המוצר</th>
							<th class="col-md-4 col-xs-4">שם הקונה</th>
							<th class="col-md-3 col-xs-3">תאריך הקנייה</th>
							<th class="col-md-3 col-xs-3">סטטוס</th>
							<th class="col-md-3 col-xs-3">ניהול</th>
						</tr>
						<tr class="warning no-result">
							<td colspan="4"><i class="fa fa-warning"></i>אין תוצאות</td>
						</tr>
					  </thead>
					  <tbody>
							<?php
								$qGetOrders = $mysqli->query("SELECT * FROM `".PREFIX."_orders` ORDER BY `status` ASC,`date` DESC");
								$counter = 1;
								while($qGetOrderData = $qGetOrders->fetch_assoc())
								{
									
									$UserData = new User($qGetOrderData['userid']);
									$Product = $mysqli->query("SELECT * FROM `".PREFIX."_product` WHERE `id`='{$qGetOrderData['productid']}' LIMIT 1");
									$ProductData = $Product->fetch_assoc();
									$game = "";
									if($ProductData['type'] == "servers") {
									
										$type = "שרתי משחק";
										$JsonData = json_decode($ProductData['parameters']);
										$game = " (".$gameJs[$JsonData->game].")";
									}
									if($ProductData['type'] == "hosts")
										$type = "איחסון אתרים";
									if($ProductData['type'] == "virtual")
										$type = "שרתים ווירטואליים";
									if($ProductData['type'] == "clouds")
										$type = "גיבוי בענן";
									if($ProductData['type'] == "domains")
										$type = "שמות מתחם";
									$tupal = 0;
									if ($qGetOrderData['status'] == 0)
									{
										$sStatus = "<span style='font-weight: bold;color: red;'>לא טופל</span>";
									}
									else {
										$sStatus = "<span style='font-weight: bold;color: green;'>טופל</span>";
									}
							?>
							<tr>
								<th scope="row"><?= $counter ?></th>
								<th><?= $type."".$game.": ".$ProductData['title'] ?></th>
								<th><a href="index.php?act=customers&do=view&id=<?= $qGetOrderData['userid'] ?>"><?= $UserData->get_FullName() ?></a></th>
								<th><?= ago($qGetOrderData['date']) ?></th>
								<th><?= $sStatus ?></th>
								<th>
									<? if($qGetOrderData['status'] == 0)
										{
									?>
										
											<a  href='index.php?act=orders&do=mark&id=<?= $qGetOrderData['id'] ?>' aria-label="סמן כטופל" class="editsvg hint--top">
											

											<i class="fa fa-check" style="color: green;font-size: 20px;"aria-hidden="true"></i>

										</a>
									<? } ?>
										<a <?= "onClick=\"javascript: return confirm('האם אתה בטוח שברצונך למחוק הזמנה זו מהמערכת?');\" href='index.php?act=orders&do=remove&id=".$qGetOrderData['id']."' " ?> aria-label="מחיקה" class="hint--top editsvg">
											<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 59 59" xml:space="preserve">
												<path d="M29.5 51c0.6 0 1-0.4 1-1V17c0-0.6-0.4-1-1-1s-1 0.4-1 1v33C28.5 50.6 28.9 51 29.5 51zM19.5 51c0.6 0 1-0.4 1-1V17c0-0.6-0.4-1-1-1s-1 0.4-1 1v33C18.5 50.6 18.9 51 19.5 51zM39.5 51c0.6 0 1-0.4 1-1V17c0-0.6-0.4-1-1-1s-1 0.4-1 1v33C38.5 50.6 38.9 51 39.5 51zM52.5 6H38.5c-0.1-1.2-0.5-3.4-1.8-4.7C35.8 0.4 34.8 0 33.5 0H23.5c-1.3 0-2.3 0.4-3.1 1.3C19 2.6 18.7 4.8 18.5 6H6.5c-0.6 0-1 0.4-1 1s0.4 1 1 1h2l1.9 46C10.5 55.7 11.6 59 15.4 59h28.3c3.8 0 4.9-3.3 4.9-5L50.5 8H52.5c0.6 0 1-0.4 1-1S53.1 6 52.5 6zM21.8 2.7C22.2 2.2 22.8 2 23.5 2h10c0.7 0 1.3 0.2 1.7 0.7 0.8 0.8 1.1 2.3 1.2 3.3H20.6C20.7 5 21 3.5 21.8 2.7zM46.5 54C46.5 54.3 46.4 57 43.6 57H15.4c-2.7 0-2.9-2.7-2.9-3L10.5 8h37.9L46.5 54z"/>
											</svg>
										</a>
								</th>
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