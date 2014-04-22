<?php include '../../lib/framework.php';
echo $CMS->parse("{$CMS->SITE['DIR']}admin/inc/header.php");?>

<div id="settings">

	<input type="text" id="title" placeholder="Site Title" value="<?=$CMS->parseString('{{Title}}');?>" />
	<div class="clear"></div>

	<textarea id="meta-description" placeholder="Meta Description"><?=$CMS->parseString('{{meta-description}}');?></textarea>
	<div class="clear"></div>

	<input type="text" id="meta-keywords" placeholder="Meta Keywords" value="<?=$CMS->parseString('{{meta-keywords}}');?>" />
	<div class="clear"></div>

	<input type="text" id="heading" placeholder="Heading" />
	<div class="clear"></div>

	<input type="text" id="sub-heading" placeholder="Sub-heading" />
	<div class="clear"></div>

	<input type="text" id="footer" placeholder="Footer" />
	<div class="clear"></div>

	<button onclick="saveSettings();">Save</button>
	
</div>


<!-- Scripts -->
<script type="text/javascript">
function saveSettings(){
	var title = document.getElementById('title').value,
		description = document.getElementById('meta-description').value,
		keywords = document.getElementById('meta-keywords').value,
		heading = document.getElementById('heading').value,
		subheading = document.getElementById('sub-heading').value,
		footer = document.getElementById('footer').value;
	ajax('POST',"<?=$CMS->SITE['URL'];?>admin/settings/save.php",
		{'title': title,
		'meta-description': description,
		'meta-keywords': keywords,
		'heading': heading,
		'sub-heading': subheading,
		'footer': footer},
		function(data){
			var response = JSON.parse(data.response);
			message(response.message,'good');
		}
	);
}
</script>


<?=$CMS->parse("{$CMS->SITE['DIR']}admin/inc/footer.php"); ?>