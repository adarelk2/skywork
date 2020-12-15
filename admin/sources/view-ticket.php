<?php
	if (!isset($_GET['id']) || empty($_GET['id']))
		die(' <meta http-equiv="Refresh" content="0; url=index.php?act=tickets">');
	if(!is_numeric($_GET['id']))
		die(' <meta http-equiv="Refresh" content="0; url=index.php?act=tickets">');
	
	$id = secur($_GET['id'],"int");
	$query = $mysqli->query("SELECT * FROM `".PREFIX."_tickets` WHERE `id`='{$id}'");
	$getTicketData = $query->fetch_assoc();
	if($query->num_rows == 0)
		die(' <meta http-equiv="Refresh" content="0; url=index.php?act=tickets">');
	$userOpen		= new User($getTicketData['userid']);
	$userTakeCare	= new User($getTicketData['per']);
	
	$closeTicket = "";
	if($getTicketData['status'] == 0)
	{
		$status = "<span style='color: red;'>לא טופל</span>";
		$closeTicket = "<a style='background: #2ecc71;color: white;' href='index.php?act=tickets&do=close&id={$id}'>סגור פנייה</a>";
	}
	if($getTicketData['status'] == 1)
	{
		$status = "<span style='color: orange;'>בטיפול</span>";
		$closeTicket = "<a style='background: #2ecc71;color: white;' href='index.php?act=tickets&do=close&id={$id}'>סגור פנייה</a>";
	}
	if($getTicketData['status'] == 2)
	{
		$status = "<span style='color: green;'>טופל</span>";
		
	}
	
	
?>
<div id="left-side">
	<div class="container">
		<div class="block">
			<div class="block-title">
				<h1><?= limitText($getTicketData['title'],86) ?></h1>
				<?= /* message */$closeTicket ?>
			</div>
			<div class="block-inner">
				<div class="ticket-con">
					<p><?= $getTicketData['content'] ?></p>
				</div>
				<div class="pull-right">
					<p><strong>תאריך פתיחה:</strong> <?= ago($getTicketData['date']) ?></p>						
					<p><strong>נפתח ע"י:</strong> <a href="#"><?= $userOpen->get_FullName() ?></a></p>
				</div>
				<div class="pull-left">
					<p><strong>מצב הפניה:</strong> <?= $status ?></p>
					<p><strong>מטופל ע"י:</strong> <a href="#"><?= $userTakeCare->get_FullName() ?></a></p>
				</div>
			</div>
		</div>
		<div class="block">
			<div class="block-title">
				<h1>התכתבות</h1>
			</div>
			<div class="block-inner">
				<div id="chat">
					<?php
						$messageSql = $mysqli->query("SELECT * FROM `".PREFIX."_messages` WHERE `tickets_id`='{$getTicketData['id']}' ORDER BY `date` DESC");
						while($message = $messageSql->fetch_assoc()) 
						{
							$userReply = new User($message['userid']);
					?>
							<div class="chat-message <?php if($message['userid'] != $userOpen->get_Id()) echo "message-2";?>">							
								<img src="assets/images/user-avatar-default.png" alt="" />
								<div class="chat-message-inner">
									<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 386.3 386.3" xml:space="preserve"><polygon points="0 96.9 193.1 289.4 386.3 96.9 "></polygon></svg>
									<div class="chat-message-inner-top">
										<p><?= $userReply->get_FullName() ?></p>
									</div>
									<div class="chat-message-inner-text">
										<p><?= nl2br($message['content'])?></p>
									</div>
									<div class="chat-message-inner-time">
										<p><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 60 60" xml:space="preserve"><path d="M30 0C13.5 0 0 13.5 0 30s13.5 30 30 30 30-13.5 30-30S46.5 0 30 0zM30 58C14.6 58 2 45.4 2 30S14.6 2 30 2s28 12.6 28 28S45.4 58 30 58zM30 6c-0.6 0-1 0.4-1 1v23H14c-0.6 0-1 0.4-1 1s0.4 1 1 1h16c0.6 0 1-0.4 1-1V7C31 6.4 30.6 6 30 6z"/></svg>
										<?= ago($message['date']) ?>
										</p>
									</div>
								</div>
							</div>
					
					<?php
						}
					?>
				</div>
			</div>
			
		</div>
		<div class="block">
			<div class="block-title">
				<h1>להגיב ל<?= $userOpen->get_FullName() ?> על <?= limitText($getTicketData['title'],86) ?></h1>
			</div>
			<div class="block-inner">
				<form method="post">
						<div class="input-field">
							<label for="message">תגובה</label>
							<textarea name="message"></textarea>
						</div>
						<div class="input-field">
							<input type="submit" name="submit" class="button_tickets" value="שלח" />
						</div>
				</form>
				<?php
					if (isset($_POST['submit']))
					{
						if	(!empty($_POST['message']))
						{
							$message = secur($_POST['message'],"string");
							$insert = $mysqli->query("INSERT INTO `".PREFIX."_messages` (`content`, `tickets_id`, `userid`, `date`, `ip`) VALUES ('{$message}', '{$_GET['id']}', '{$User->get_Id()}', '".time()."', '".get_ip()."');");
							$update = $mysqli->query("UPDATE `".PREFIX."_tickets` SET `status`='1',`per`='".$User->get_Id()."' WHERE `id`='{$_GET['id']}'");
	
							//message
							refreshPage();
	
						}
						else {
							echo "הודעת שגיאה";
						}
					}
				?>
			</div>
		</div>
	</div>
</div>
