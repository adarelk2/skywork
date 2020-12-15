
<link rel="icon" href="https://skywork.co.il/logo.ico"/>
<?php 
include "core/functions.php";
include_once ('template/header.php');	

if (!isset($_GET['page']) OR empty($_GET['page'])) $_GET['page'] = "index";

if($Settings['status'] == 0 && $_GET['page'] != "contact")
{
	include "sources/404.php";
	include_once ('template/footer.php');
	die();

}
else {
switch($_GET['page'])
{
	default:
		$_GET['page'] = "index";
		include "sources/home.php";
	break;
	case "about":
		include "sources/about.php";
	break;
	case "contact":
		include "sources/contact.php";


	break;
	case "register":
		include "sources/register.php";
	break;
		case "domains":
		include "sources/domains.php";
	break;
	case "hosting":
		include "sources/hosting.php";			
	break;
	case "vps":
		include "sources/vps.php";			
	break;
	case "game-servers":
		include "sources/servers.php";			
	break;
	case "private_area":
		include "sources/private_area.php";			
	break;
	case "404":
		include "sources/404.php";			
	break;
	case "buy":
		include "sources/buy.php";			
	break;
	case "resetpassword":
		include "sources/reset-password.php";			
	break;
	case "logout":
		if(isset($_SESSION['UserId']))
			session_unset($_SESSION['UserId']);
		
		if(isset($_SESSION['Username']))
		session_unset($_SESSION['Username']);
	
		session_destroy();
		die(' <meta http-equiv="Refresh" content="0; url=index.php">');
	break;
}



	
include_once ('template/footer.php');
}
 ?>