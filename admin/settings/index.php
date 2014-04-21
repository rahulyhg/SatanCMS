<?php include '../../lib/framework.php';
echo $CMS->parse("{$CMS->SITE['DIR']}admin/inc/header.php");?>

<input type="text" id="title" placeholder="Site Title" value="<?=$CMS->parseString('{{Title}}');?>" />
<div class="clear"></div>

<textarea id="meta-description" placeholder="Meta Description"><?=$CMS->parseString('{{meta-description}}');?></textarea>
<div class="clear"></div>

<input type="text" id="meta-keywords" placeholder="Meta Keywords" value="<?=$CMS->parseString('{{meta-keywords}}');?>" />
<div class="clear"></div>

<button onclick="saveSettings();">Save</button>

<!-- Scripts -->
<script type="text/javascript">
function saveSettings(){
	var title = document.getElementById('title'),
		description = document.getElementById('meta-description'),
		keywords = document.getElementById('meta-keywords');
	ajax('POST',"<?=$CMS->SITE['URL'];?>admin/settings/save.php",
		{'title': title,
		'meta-description': description,
		'meta-keywords': keywords},
		function(data){
			var response = JSON.parse(data.reponse);
			console.log(response);
		}
	);
}
</script>


<?=$CMS->parse("{$CMS->SITE['DIR']}admin/inc/footer.php"); ?>