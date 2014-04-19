<?php include '../../lib/framework.php';
$id = 0;
if(isset($_GET['id'])){
	$id = intval($_GET['id']);
	$blogPost = new BlogPost($id);
}
echo $CMS->parse("{$CMS->SITE['DIR']}admin/inc/header.php"); ?>

<a href="javascript:void(0);" onclick="cancelPost()" class="header-right"><i class="fa fa-arrow-circle-left"></i></a>

<div id="edit-blog-post">
	<input type="text" id="title" placeholder="Title" value="<?=(isset($blogPost))?$blogPost->title:'';?>" />
	<div class="clear"></div>
	<textarea id="markdown" oninput="this.editor.update()"><?=(isset($blogPost))?$blogPost->content:'';?></textarea>
	<div id="preview"></div>
	<div class="clear"></div>
	<div style="margin-top:10px">
		<?php if($id){
			if(isset($blogPost)){
				if($blogPost->published == 1){
					$pub = true;
				}else{
					$pub = false;
				}
			}else{
				$pub = false;
			} ?>
			<div class="left slide-lock <?php if($pub){?>locked<?php } else { ?>unlocked<?php } ?>" id="slide-lock" onclick="changePub();" style="margin-right:10px">
				<span class="slide-left">Draft</span>
				<span class="slide-right">Published</span>
				<div class="clear"></div>
				<div class="slide-lock-button"></div>
			</div>
		<?php } ?>
		<button onclick="savePost(<?=$id;?>)" class="left">Save</button>
		<div class="clear"></div>
	</div>
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
			}else{
				if(response.success){
					message(response.message,'good');
				}else{
					message(response.message,'bad');
				}
			}
		}
	);
}

function cancelPost(){
	if(confirm("Are you sure you want to go back? Your changes won't be saved!")){
		document.location.href = "<?=$CMS->SITE['URL'];?>admin/blogs/";
	} else {
		return false;
	}
}

function changePub(){
	var id = <?=$id;?>;
	ajax('POST',"<?=$CMS->SITE['URL'];?>admin/blogs/change-publish-setting.php",
		{'id': id},
		function(data){
			var response = JSON.parse(data.response);
			var slide = document.getElementById('slide-lock');
			if(response.success){
				if(response.pub){
					slide.className = 'left slide-lock locked';
				}else{
					slide.className = 'left slide-lock unlocked';
				}
				message(response.message,'good');
			}else{
				message(response.message,'bad');
			}
		}
	);
}
</script>

<?=$CMS->parse("{$CMS->SITE['DIR']}admin/inc/footer.php"); ?>