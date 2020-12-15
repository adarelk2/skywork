<?php

//variables
$sUserDb		= "yakovserv_turing";
$sPasswordDb	= "0nXUy3Zam1";
$sDbName		= "yakovserv_turing";

//paypal configs
$paypal_email = 'adarelkabetz0@gmail.com';
$paypal_currency = 'ILS'; //Coin

//connet mysql
$mysqli = new mysqli('localhost', $sUserDb, $sPasswordDb, $sDbName);
if($mysqli->connect_error)
{
	die("שגיאת מסד נתונים");
}

$mysqli->set_charset("utf8");

if (!defined("PREFIX")) 
	define ("PREFIX", "turing");

?>