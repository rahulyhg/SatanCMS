<?php include '../../lib/framework.php';

$response = array();

$id = 0;
if(isset($_POST['id'])){
	$id = intval($_POST['id']);
	if($mysqli->query("DELETE FROM blog_posts WHERE id = {$id}")){
		$response['success'] = true;
		$response['message'] = "Post deleted!";
	} else {
		$response['success'] = false;
		$response['message'] = "Problem deleting post...";
	}
}else{
	$response['success'] = false;
	$response['message'] = "Problem deleting post...";
}

echo json_encode($response);

?>