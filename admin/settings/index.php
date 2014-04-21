<?php include '../../lib/framework.php';
echo $CMS->parse("{$CMS->SITE['DIR']}admin/inc/header.php");?>

<input type="text" id="title" placeholder="Site Title" value="<?=$CMS->parseString('{{Title}}');?>" />
<div class="clear"></div>

<textarea id="meta-description" placeholder="Meta Description"><?=$CMS->parseString('{{meta-description}}');?></textarea>
<div class="clear"></div>

<input type="text" id="meta-keywords" placeholder="Meta Keywords" value="<?=$CMS->parseString('{{meta-keywords}}');?>" />
<div class="clear"></div>

<?=$CMS->parse("{$CMS->SITE['DIR']}admin/inc/footer.php"); ?>