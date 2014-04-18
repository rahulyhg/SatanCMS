<?php include '../../lib/framework.php';

// Variables
$id = intval($_POST['id']);
$title = $mysqli->escape_string($_POST['title']);
$content = $mysqli->escape_string($_POST['content']);
$time = time();
$response = array();

// save
if($id){ // update
	$mysqli->query("UPDATE blog_posts SET title = '{$title}', content = '{$content}', datestamp = {$time} WHERE id = {$id}");
	$response['type'] = 'update';
}else{ // insert
	$mysqli->query("INSERT INTO blog_posts (`title`,`content`,`published`,`datestamp`) VALUES ('{$title}','{$content}',1,{$time})");
	$response['type'] = 'new';
	$id = $mysqli->insert_id;
}

if(!$mysqli->errno){
	$response['message'] = "Saved!";
}else{
	$response['message'] = "There was a problem saving your post...";
}

$response['id'] = $id;

echo json_encode($response);
die();

?>