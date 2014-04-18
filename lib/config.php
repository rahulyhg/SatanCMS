<?php
// Mysqli connection

$CMS = new Cms();

$mysqli = new mysqli($CMS->MYSQL['HOST'],$CMS->MYSQL['USER'],$CMS->MYSQL['PASS'],$CMS->MYSQL['DATABASE']);

if($mysqli->connect_errno){
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// this is just so $_SERVER['SCRIPT_NAME'] will work better locally
$_SERVER['SCRIPT_NAME'] = str_replace("/SatanCMS","",$_SERVER['SCRIPT_NAME']);

?>