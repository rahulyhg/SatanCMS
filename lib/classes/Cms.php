<?php
class Cms extends Base {

	function header(){
		return $this->parse("{$this->SITE['DIR']}inc/header.php");
	}

	function footer(){
		return $this->parse("{$this->SITE['DIR']}inc/footer.php");
	}

	function posts($return = 'include', $published = true){
		global $mysqli;
		$qry = "SELECT id FROM blog_posts WHERE 1 ";
		if($published){
			$qry .= " AND published = 1 ";
		}
		$result = $mysqli->query("{$qry} ORDER BY id DESC");
		if($return == 'include'){
			ob_start();
			while($row = $result->fetch_assoc()){
				$blogPost = new BlogPost($row['id']);
				include "{$this->SITE['DIR']}inc/blog-post.php";
			}
			$contents = ob_get_clean();
			return $contents;
		}else{
			$ids = array();
			while($row = $result->fetch_assoc()){
				$ids[] = $row['id'];
			}
			return $ids;
		}
	}

}
?>