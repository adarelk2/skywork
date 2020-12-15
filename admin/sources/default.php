
<div id="left-side">
		<div class="container">
			<div class="block">
				<div class="block-title">
					<h1><?= $Limit ?> פניות אחרונות</h1>
					<a href="index.php?act=tickets">צפה בכל הפניות</a>
				</div>
				<div class="block-inner">
					<table>
						<thead>
						<tr>
							<th>#</th>
							<th>כותרת</th>
							<th>תאריך פתיחה</th>
							<th>שם לקוח</th>
							<th>סטטוס</th>
							<th></th>
						</tr>
						</thead>
						<tbody>
							<?php
								$counter = 0;
								$qGetTickets = $mysqli->query("SELECT * FROM `turing_tickets` ORDER BY `date` DESC LIMIT {$Limit}");
								while($qGetTicketsData = $qGetTickets->fetch_assoc())
								{
									$counter++;
									$q = $mysqli->query("SELECT `firstname`,`lastname` FROM `turing_members` WHERE `id`='". (int) $qGetTicketsData['userid']."'");
									$sUserName = $q->fetch_assoc();
									$sStatus = $qGetTicketsData['status'];
									if($sStatus == 0)
										$sStatus = "<span style='font-weight: bold;color: red;'>ממתין לתגובה</span>";
									if($sStatus == 1)
										$sStatus = "<span style='font-weight: bold;color: #ffc107;'>תגובת נציג</span>";
									if($sStatus == 2)
										$sStatus = "<span style='font-weight: bold;color: green;'>טופל</span>";
							?>
							<tr>
								<td><?= $counter ?></td>
								<td><?= limitText($qGetTicketsData['title'],60) ?></td>
								<td><?= ago($qGetTicketsData['date']); ?></td>
								<td><a href="index.php?act=customers&do=view&id=<?= $qGetTicketsData['userid'] ?>"><?= $sUserName['firstname']." ".$sUserName['lastname']?></a></td>
								<td><?= $sStatus ?></td>
								<td><a href="index.php?act=tickets&do=view&id=<?= $qGetTicketsData['id'] ?>" class="button_tickets">צפה בפניה</a></td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="block">
				<div class="block-title">
					<h1><?= $Limit ?> הזמנות אחרונות</h1>
					<a href="index.php?act=orders">צפה בכל ההזמנות</a>
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
								$qGetOrders = $mysqli->query("SELECT * FROM `".PREFIX."_orders` ORDER BY `status` ASC,`date` DESC Limit {$Limit}");
								$counter = 1;
								while($qGetOrderData = $qGetOrders->fetch_assoc())
								{
									$UserData = new User($qGetOrderData['userid']);
									$Product = $mysqli->query("SELECT * FROM `".PREFIX."_product` WHERE `id`='{$qGetOrderData['productid']}' LIMIT 1");
									$ProductData = $Product->fetch_assoc();
									if ($qGetOrderData['status'] == 0)
									{
										$sStatus = "<span style='font-weight: bold;color: red;'>לא טופל</span>";
									}
									else {
										$sStatus = "<span style='font-weight: bold;color: green;'>טופל</span>";
									}
									
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
									
									$extra = " ";
									if($qGetOrderData['extra'] != null) {
										$arrExtras = explode(",", $qGetOrderData['extra']);
										$extra .= "(";
										for ($i = 0; $i < count($arrExtras); $i++) {
											$extra .= $translateJs[$arrExtras[$i]].", ";
										}
										if(substr($extra, -2) == ", ") {
											$extra = substr($extra, 0, -2);
										}
										$extra .= ")";
									}
							?>
							<tr>
								<th scope="row"><?= $counter ?></th>
								<th><?= $type."".$game.": ".$ProductData['title'].$extra?></th>
								<th><a href="#"><?= $UserData->get_FullName() ?></a></th>
								<th><?= ago($qGetOrderData['date']) ?></th>
								<th><?= $sStatus ?></th>
								<th>
									<? if($qGetOrderData['status'] == 0){?>
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
					<div class="block">
			<div class="block-title">
				<h1>3 יצירות קשר אחרונות</h1>
				<a href="index.php?act=contact">צפה בכל יצירות הקשר</a>

			</div>
			<div class="block-inner">
				<table>
					<thead>
					<tr>
						<th>#</th>
						<th>תוכן הפנייה</th>
						<th>תאריך פנייה</th>
						<th>שם מלא</th>
						<th>טלפון</th>
						<th>מצב הפניה</th>
						<th>ניהול</th>
					</tr>
					</thead>
					<tbody>
						<?php
							$counter = 1;
							$sql = $mysqli->query("SELECT * FROM `".PREFIX."_contact` ORDER BY `status` DESC LIMIT {$Limit}");
							while($data = $sql->fetch_assoc())
							{
								if($data['status'] == 0)
									$status = "<span style='color: red;'>לא נוצר קשר</span>";
								if($data['status'] == 1)
									$status = "<span style='color: green;'>נוצר קשר</span>";
						?>
								<tr>
									<td><?= $counter ?></td>
									<td><span class="more"><?= $data['content'] ?> </span></td>
									<td><?= ago($data['date']) ?></td>
									<td><?= $data['fullname'] ?></td>
									<td><?= $data['phone'] ?></td>
									<td><span style='font-weight: bold;'><?= $status ?></span></td>
									<th>
										<? if($data['status'] == 0){?>
											<a  href='index.php?act=contact&do=mark&id=<?= $data['id'] ?>' aria-label="סמן כטופל" class="editsvg hint--top">
											

											<i class="fa fa-check" style="color: green;font-size: 20px;"aria-hidden="true"></i>

										</a>
										<? } ?>
										<a <?= "onClick=\"javascript: return confirm('האם אתה בטוח שברצונך למחוק פנייה זו?');\" href='index.php?act=contact&do=remove&id=".$data['id']."' " ?> aria-label="מחיקה" class="hint--top editsvg">
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