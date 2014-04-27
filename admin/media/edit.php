<?php include '../../lib/framework.php';
echo $CMS->parse("{$CMS->SITE['DIR']}admin/inc/header.php");
if(isset($_GET['id'])){
	$id = intval($_GET['id']);
}else{
	$id = 0;
}?>

<div id="edit-media">
	<?php // display title "upload" or "edit"
	if($id){ ?>
		<h2>Edit Media</h2>
	<?php } else { ?>
		<h2>Upload Media</h2>
	<?php } ?>
	
	<input type="text" id="title" placeholder="Title" />
	<div class="clear"></div>

	<textarea id="description" placeholder="Description"></textarea>
	<div class="clear"></div>

	<input type="file" id="file" class="left" />
	<button onclick="saveMedia()" class="right">Save</button>
	<div class="clear"></div>
</div>


<?=$CMS->parse("{$CMS->SITE['DIR']}admin/inc/footer.php"); ?>