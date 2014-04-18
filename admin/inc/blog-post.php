<div class="blog-post" id="blog-post-<?=$blogPost->id;?>">
	<div class="title"><?=$blogPost->title;?></div>
	<div class="options">
		<a href="<?=$CMS->SITE['URL'];?>admin/blogs/edit.php?id=<?=$blogPost->id;?>" title="Edit Post"><i class="fa fa-pencil-square-o"></i></a>
		<a href="javascript:void(0);" onclick="deletePost(<?=$blogPost->id;?>);" title="Delete Post"><i class="fa fa-times-circle"></i></a>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>