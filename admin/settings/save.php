<?php include '../../lib/framework.php';

$title = $mysqli->escape_string($_POST['title']);
$description = $mysqli->escape_string($_POST['meta-description']);
$keywords = $mysqli->escape_string($_POST['meta-keywords']);
$heading = $mysqli->escape_string($_POST['heading']);
$subheading = $mysqli->escape_string($_POST['sub-heading']);
$footer = $mysqli->escape_string($_POST['footer']);

$qry = "INSERT INTO config (`conf_key`,`conf_value`,`conf_datestamp`) VALUES";

$mysqli->query("{$qry} ('title','{$title}',UNIX_TIMESTAMP()) ON DUPLICATE KEY UPDATE `conf_value` = '{$title}', `conf_datestamp` = UNIX_TIMESTAMP()");
$mysqli->query("{$qry} ('meta-description','{$description}',UNIX_TIMESTAMP()) ON DUPLICATE KEY UPDATE `conf_value` = '{$description}', `conf_datestamp` = UNIX_TIMESTAMP()");
$mysqli->query("{$qry} ('meta-keywords','{$keywords}',UNIX_TIMESTAMP()) ON DUPLICATE KEY UPDATE `conf_value` = '{$keywords}', `conf_datestamp` = UNIX_TIMESTAMP()");
$mysqli->query("{$qry} ('heading','{$heading}',UNIX_TIMESTAMP()) ON DUPLICATE KEY UPDATE `conf_value` = '{$heading}', `conf_datestamp` = UNIX_TIMESTAMP()");
$mysqli->query("{$qry} ('sub-heading','{$subheading}',UNIX_TIMESTAMP()) ON DUPLICATE KEY UPDATE `conf_value` = '{$subheading}', `conf_datestamp` = UNIX_TIMESTAMP()");
$mysqli->query("{$qry} ('footer','{$footer}',UNIX_TIMESTAMP()) ON DUPLICATE KEY UPDATE `conf_value` = '{$footer}', `conf_datestamp` = UNIX_TIMESTAMP()");

echo json_encode(array('message' => 'Settings Saved!'));

die();
?>