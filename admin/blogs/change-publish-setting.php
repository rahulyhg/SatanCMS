<?php include '../../lib/framework.php';

// variables
$id = intval($_POST['id']);
$results = array();

// check for an id
if($id){
	// get current publish setting
	$getPub = $mysqli->query("SELECT published FROM blog_posts WHERE id = {$id} LIMIT 1");
	$pub = $getPub->fetch_assoc();
	// check current publish setting
	if($pub['published']){
		// published, change to draft
		$mysqli->query("UPDATE blog_posts SET published = 0 WHERE id = {$id}");
		$results['pub'] = 0;
		$results['success'] = true;
		$results['message'] = "Set as a draft!";
	}else{
		// draft, change to published
		$mysqli->query("UPDATE blog_posts SET published = 1 WHERE id = {$id}");
		$results['pub'] = 1;
		$results['success'] = true;
		$results['message'] = "Published!";
	}
}else{
	// no ID
	$results['success'] = false;
	$results['message'] = "Something went wrong...";
}

echo json_encode($results);
die();

?>