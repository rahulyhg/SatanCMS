<div class="blog-post">
	<div class="left">
		<h3><?=$blogPost->title;?></h3>
		<?=nl2br($blogPost->content);?>
	</div>
	<div class="meta right">
		Uploaded on <?=date('m/d/Y',$blogPost->datestamp);?>
	</div>
	<div class="clear"></div>
</div>