<?php
session_start();

ini_set("display_errors", true);
error_reporting(E_ALL);

include "config.php";
global $mysqli;
include "User.php";

//build username class
$User = new User(0);
if(isset($_SESSION['Username']))
{
	
	$select = $mysqli->query("SELECT * FROM `".PREFIX."_members` WHERE `id` = '". (int) $_SESSION['UserId'] . "'");
	if ($select->num_rows > 0)
	{
		$User = new User($_SESSION['UserId']);
	}
}

//GET WEB SETTINGS
global $Settings;
$sQuery = $mysqli->query("SELECT * FROM `".PREFIX."_settings`");
if($sQuery->num_rows == 1)
	$Settings = $sQuery->fetch_assoc();
else 
	$Setting = null;


$mons = array(1 => "ינואר", 2 => "פברואר", 3 => "מרץ", 4 => "אפריל", 5 => "מאי", 6 => "יוני", 7 => "יולי", 8 => "אוגוסט", 9 => "ספטמבר", 10 => "אוקטובר", 11 => "נובמבר", 12 => "דצמבר");

$translateJs = array(
		"storage" => "נפח איחסון",
		"traffic" => "תעבורה",
		"os" => "מערכת הפעלה",
		"panel" => "פאנל ניהול",
		"domain" => "כמות דומיינים",
		"mails" => "תיבות דואר",
		"flag" => "מיקום חוות שרתים",
		"prossesor" => "מעבד",
		"lib" => "ליבות",
		"space" => "נפח איחסון",
		"ddos" => "הגנת DDOS",
		"ip" => "כמות כתובות IP",
		"disk" => "נפח איחסון",
		"memory" => "זיכרון",
		"whereserver" => "מיקום חוות שרתים",
		"files" => "קבצים",
		"ram" => "זיכרון",
		"website" => "אתר",
		"rdp" => "גישת RDP",
		"mods" => "כמות מודים",
		"players" => "כמות שחקנים",
		"ftp" => "גישות FTP",
		"webpanel" => "פאנל ניהול אתרים",
		"exstraram" => "תוספת 2GB ראם",
		"gamepanel" => "פאנל שרתי משחק",
		"extradisk" => "תוספת 50GB שטח דיסק",
	);
$gameJs = array(
	"mc" => "Minecraft",
	"mu" => "MU",
	"fl" => "FlyFF",
	"samp" => "GTA Samp",
	"csgo" => "CS:GO",
	"cs" => "CS 1.6",
	"gm" => "Garry's Mod",
);



function ago($time)
{
   $periods = array("שניות", "דקות", "שעות", "ימים", "שבועות", "חודשים", "שנים");
   $lengths = array("60","60","24","7","4.35","12","10");

   $now = time();

       $difference     = $now - $time;
       $tense         = "לפני";

   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
       $difference /= $lengths[$j];
   }
   $date = date("h:m:s d/m/y",$time);

   $difference = round($difference);


   return "<i  class='customTitle' title='$date'>לפני $difference $periods[$j]</i>";
}

function limitText($string,$num)
{

	if (strlen($string) > $num) {

		$string = substr($string, 0, $num)."...";
	}
	echo $string;
}

function get_ip() {
	
	return $_SERVER['REMOTE_ADDR'];
}

function refreshPage($title = null,$message = null)
{
	if(isset($title) && isset($message))
	{
		echo '<div class="modal">
			<div class="container">
				<div class="block">
					<div class="block-title">
						<h1>'.$title.'</h1>
						<a href="'.basename($_SERVER['REQUEST_URI']).'" class="modal-close">סגור</a>
					</div>
					<div class="block-inner">
						<p>'.$message.'</p>
					</div>
				</div>
			</div>
		</div>';
	}
	else
		echo ' <meta http-equiv="Refresh" content="0;">';
	
	
}


function secur($s,$type) {
global $mysqli;

	switch ($type)
	{
		case "string":
			$s = (string) $s;
			return $mysqli->real_escape_string(htmlspecialchars($s));
		break;
		
		case "int":
			$s = (int) $s;
			return $mysqli->real_escape_string(htmlspecialchars($s));
		break;
		
		default:
			return $mysqli->real_escape_string(htmlspecialchars($s));
		break;
	}

}
function editAdmin($text,$NameSQL)
{
	global $User;
	global $mysqli;

	if($User->check_admin())
	{
		
		$page = secur($_GET['page'],"string");
		if(isset($_GET['game']) && !empty($_GET['game']))
			$page = secur($_GET['game'],"string");
		
		$getJson = $mysqli->query("SELECT `json` FROM `".PREFIX."_editblock` WHERE `name`='{$page}' LIMIT 1")->fetch_assoc();
		$JsonData = json_decode($getJson['json']);
		echo '
				<div class="can-edit">
				'.html_entity_decode(nl2br($text)).'
				<div class="edit-text">
					<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 300 300" xml:space="preserve"><path d="M150 0C67.2 0 0 67.2 0 150S67.2 300 150 300s150-67.2 150-150S232.8 0 150 0zM221.3 107.9l-14.2 14.2 -29-29 -11 11 29 29 -71.1 71.1 -29-29L84.9 186.3l29 29 -7.1 7.1 -0.1-0.1c-0.8 1.3-2.1 2.2-3.6 2.6l-27 6c-0.4 0.1-0.8 0.1-1.2 0.1 -1.5 0-2.9-0.6-4-1.6 -1.4-1.4-1.9-3.3-1.5-5.2l6-27c0.3-1.5 1.3-2.8 2.6-3.6l-0.1-0.1L192.3 78.9c1.7-1.7 4.4-1.7 6.1 0l22.9 22.9C223 103.5 223 106.3 221.3 107.9z"/></svg>
					<form method="post" action="">
						<div style="height: 200px;">
						<textarea name="'.$NameSQL.'">'.html_entity_decode($JsonData->$NameSQL).'</textarea>
						<input type="submit" name="submit-'.$NameSQL.'" value="עריכה">
						</div>
					</form>
				</div>
			</div>
			';
		if(isset($_POST['submit-'.$NameSQL.'']))
		{
			$newText = secur($_POST[$NameSQL],"string");
			$JsonData->$NameSQL = $newText;
			
			$update = $mysqli->query("UPDATE `".PREFIX."_editblock` SET `json`='".json_encode($JsonData, JSON_UNESCAPED_UNICODE)."' WHERE `name`='{$page}'");
			
			refreshPage();
			
		}
	}
	else {
		echo nl2br($text);
	}
	
	
}
function emptyOrShort($text,$length) 
{
	if(!empty($text) && (strlen($text) >= $length))
		return false;
	return true;
}
?>