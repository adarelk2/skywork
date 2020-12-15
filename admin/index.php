<?php
	session_start();
	include "../core/functions.php";
	
	if (!isset($_GET['act']) OR empty($_GET['act']))
		$_GET['act'] = null;
	$act = secur($_GET['act'],"string");

	if((!isset($_SESSION['Username']) || !$User->check_admin()))
	{
		
		if($act != "login")
			die(' <meta http-equiv="Refresh" content="0; url=index.php?act=login">');
	
		
	}
	
	
	
	if (!isset($_GET['act']) OR (isset($_GET['act']) AND $_GET['act'] != "login"))
	{
		global $User;
		include_once('template/header.php'); 
		include_once('template/aside.php'); 
	}
	 
	$Limit = 3;
	
	
	switch ($act)
	{
		default:
			include "sources/default.php";
		break;
		case "login":
			include "sources/login.php";
		break;
		case "customers":
			include "sources/customers.php";
		break;
		case "products":
			include "sources/products.php";
		break;
		case "tickets":
			include "sources/tickets.php";
		break;
		case "orders":
			include "sources/orders.php";
		break;
		case "settings":
			include "sources/settings.php";
		break;
		case "editpages":
			include "sources/editpages.php";
		break;
		case "logout":
			session_unset($_SESSION['UserId']);
			session_unset($_SESSION['Username']);
			session_destroy();
			die(' <meta http-equiv="Refresh" content="0; url=index.php?act=login">');

		break;
		case "contact":
			include "sources/contact.php";
		break;
	}

	if (!isset($_GET['act']) OR isset($_GET['act']) AND $_GET['act'] != "login")
		include_once('template/footer.php');
?>