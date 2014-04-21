<?php include '../../lib/framework.php';
echo $CMS->parse("{$CMS->SITE['DIR']}admin/inc/header.php"); ?>

<input type="text" placeholder="Site Title" value="" />

<?=$CMS->parse("{$CMS->SITE['DIR']}admin/inc/footer.php"); ?>