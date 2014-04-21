<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="[[URL]]admin/assets/css/styles.css" />
		<?php if($_SERVER['SCRIPT_NAME'] == "/admin/blogs/edit.php"){?>
			<script src="[[URL]]admin/assets/js/markdown.min.js" type="text/javascript"></script>
		<?php } ?>
		<script src="[[URL]]assets/js/cms.js" type="text/javascript"></script>
		<script type="text/javascript">
		function nav(){
			var nav = document.getElementById('navigation');
			if(nav.className == 'closed'){
				nav.className = '';
			}else{
				nav.className = 'closed';
			}
		}
		</script>
	</head>
	<body>
		<div id="header">
			<a href="javascript:void(0);" onclick="nav();"><i class="fa fa-bars left" style="margin:0 0 0 20px"></i></a>
			<h1>Admin</h1>
		</div>
		<div id="navigation" class="closed">
			<ul>
				<li><a href="[[URL]]admin/">Dashboard<i class="fa fa-check"<?php if($_SERVER['SCRIPT_NAME'] == "/admin/index.php"){?> style="display:inline-block"<?php } ?>></i></a></li>
				<li><a href="[[URL]]admin/blogs/">Blogs<i class="fa fa-check"<?php if(strpos($_SERVER['SCRIPT_NAME'],"blogs") > -1){?> style="display:inline-block"<?php } ?>></i></a></li>
				<li><a href="[[URL]]admin/settings/">Settings<i class="fa fa-check"<?php if(strpos($_SERVER['SCRIPT_NAME'],"settings") > -1){?> style="display:inline-block"<?php } ?>></i></a></li>
			</ul>
		</div>
		<div id="body">