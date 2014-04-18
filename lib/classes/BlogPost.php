<?php

class BlogPost extends Base {

	function __construct($id){
		global $mysqli;
		$id = intval($id);
		$results = $mysqli->query("SELECT * FROM blog_posts WHERE id = {$id} LIMIT 1");
		$row = $results->fetch_object();
		foreach($row as $key => $value){
			$this->{$key} = $value;
		}
	}

	function md($html){
		global $CMS,
			$markdown;
		$html = $markdown->defaultTransform($html);
		return $html;
	}

	function __destruct(){
		return true;
	}
}

?>