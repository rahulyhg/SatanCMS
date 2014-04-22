<?php include '../../lib/framework.php';

$title = $mysqli->escape_string($_POST['title']);
$description = $mysqli->escape_string($_POST['meta-description']);
$keywords = $mysqli->escape_string($_POST['meta-keywords']);

$qry = "INSERT INTO config (`conf_key`,`conf_value`,`conf_datestamp`) VALUES";

$mysqli->query("{$qry} ('title','{$title}',UNIX_TIMESTAMP()) ON DUPLICATE KEY UPDATE `conf_value` = '{$title}', `conf_datestamp` = UNIX_TIMESTAMP()");
$mysqli->query("{$qry} ('meta-description','{$description}',UNIX_TIMESTAMP()) ON DUPLICATE KEY UPDATE `conf_value` = '{$description}', `conf_datestamp` = UNIX_TIMESTAMP()");
$mysqli->query("{$qry} ('meta-keywords','{$keywords}',UNIX_TIMESTAMP()) ON DUPLICATE KEY UPDATE `conf_value` = '{$keywords}', `conf_datestamp` = UNIX_TIMESTAMP()");

echo json_encode(array('message' => 'Settings Saved!'));

die();
?>