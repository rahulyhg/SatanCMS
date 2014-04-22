<?php include '../../lib/framework.php';
echo $CMS->parse("{$CMS->SITE['DIR']}admin/inc/header.php"); ?>
<a href="<?=$CMS->SITE['URL'];?>admin/blogs/edit.php" title="New Post" class="header-right"><i class="fa fa-pencil-square-o"></i></a>
<?php foreach($CMS->posts('ids',false) as $id){
	$blogPost = new BlogPost($id);
	include "{$CMS->SITE['DIR']}admin/inc/blog-post.php";
}?>

<script type="text/javascript">
function deletePost(id){
	if(confirm("Are you sure you want to delete this?")){
		ajax('POST',"<?=$CMS->SITE['URL'];?>admin/blogs/delete.php",{"id":id},function(data){
			var response = JSON.parse(data.response);
			if(response.success == true){
				document.getElementById('blog-post-'+id).remove();
				message('Post deleted!','good');
			}else{
				return false;
			}
		});
	}else{
		return false;
	}
}
</script>

<?=$CMS->parse("{$CMS->SITE['DIR']}admin/inc/footer.php"); ?>