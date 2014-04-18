<?php include '../../lib/framework.php';
$id = 0;
if(isset($_GET['id'])){
	$id = intval($_GET['id']);
	$blogPost = new BlogPost($id);
}
echo $CMS->parse("{$CMS->SITE['DIR']}admin/inc/header.php"); ?>

<div id="edit-blog-post">
	<input type="text" id="title" placeholder="Title" value="<?=(isset($blogPost))?$blogPost->title:'';?>" />
	<div class="clear"></div>
	<textarea id="markdown" oninput="this.editor.update()"><?=(isset($blogPost))?$blogPost->content:'';?></textarea>
	<div id="preview"></div>
	<div class="clear"></div>
	<button onclick="savePost(<?=$id;?>)">Save</button>
</div>

<script type="text/javascript">
function Editor(input,preview){
	this.update = function(){
		preview.innerHTML = markdown.toHTML(input.value);
	};
	input.editor = this;
	this.update();
}
new Editor(document.getElementById("markdown"),document.getElementById("preview"));

function savePost(){
	var id = <?=$id;?>;
	var title = document.getElementById('title').value;
	var content = document.getElementById('markdown').value;
	ajax('POST',"<?=$CMS->SITE['URL'];?>admin/blogs/save.php",
		{'id': id,
		'title': title,
		'content': content},
		function(data){
			var response = JSON.parse(data.response);
			if(response.type == 'new'){
				document.location.href = "<?=$CMS->SITE['URL'];?>admin/blogs/edit.php?id="+response.id;
			}
		}
	);
}
</script>

<?=$CMS->parse("{$CMS->SITE['DIR']}admin/inc/footer.php"); ?>