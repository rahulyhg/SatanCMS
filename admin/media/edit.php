<?php include '../../lib/framework.php';
echo $CMS->parse("{$CMS->SITE['DIR']}admin/inc/header.php");
if(isset($_GET['id'])){
	$id = intval($_GET['id']);
}else{
	$id = 0;
}
// display title "upload" or "edit"
if($id){ ?>
	<h2>Edit Media</h2>
<?php } else { ?>
	<h2>Upload Media</h2>
<?php } ?>





<?=$CMS->parse("{$CMS->SITE['DIR']}admin/inc/footer.php"); ?>