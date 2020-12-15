<?php
	if (!isset($_GET['id']) || empty($_GET['id']))
		die(' <meta http-equiv="Refresh" content="0; url=index.php?act=tickets">');
	if(!is_numeric($_GET['id']))
		die(' <meta http-equiv="Refresh" content="0; url=index.php?act=tickets">');
	
	$_GET['id'] = (int) $_GET['id'];
	$query = $mysqli->query("SELECT * FROM `".PREFIX."_tickets` WHERE `id`='{$_GET['id']}'");
	$getTicketData = $query->fetch_assoc();
	if($query->num_rows == 0)
		die(' <meta http-equiv="Refresh" content="0; url=index.php?act=tickets">');
	
	$update = $mysqli->query("UPDATE `".PREFIX."_tickets` SET `status`='2' WHERE `id`='{$_GET['id']}'");
	die(' <meta http-equiv="Refresh" content="0; url=index.php?act=tickets">');
	

