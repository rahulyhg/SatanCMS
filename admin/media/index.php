<?php include '../../lib/framework.php';
echo $CMS->parse("{$CMS->SITE['DIR']}admin/inc/header.php"); ?>
<a href="<?=$CMS->SITE['URL'];?>admin/media/edit.php" title="Upload Media" class="header-right"><i class="fa fa-upload"></i></a>



<?=$CMS->parse("{$CMS->SITE['DIR']}admin/inc/footer.php"); ?>