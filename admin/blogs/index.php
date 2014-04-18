<?php include '../../lib/framework.php';
echo $CMS->parse("{$CMS->SITE['DIR']}admin/inc/header.php");
foreach($CMS->posts('ids') as $id){
	$blogPost = new BlogPost($id);
	include "{$CMS->SITE['DIR']}admin/inc/blog-post.php";
}
echo $CMS->parse("{$CMS->SITE['DIR']}admin/inc/footer.php"); ?>