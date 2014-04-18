<?php

// make include path
define('APPLICATION_PATH', __DIR__);
set_include_path(implode(PATH_SEPARATOR,array(
	APPLICATION_PATH.'/inc',
	APPLICATION_PATH.'/admin'
)));

include_once "classes/Base.php";
include_once "classes/BlogPost.php";
include_once "classes/Cms.php";
include_once "config.php";
include_once "{$CMS->SITE['DIR']}lib/functions.php";

// markdown
require "{$CMS->SITE['DIR']}lib/Michelf/MarkdownInterface.php";
require "{$CMS->SITE['DIR']}lib/Michelf/Markdown.php";

use \Michelf\Markdown;

$markdown = new Markdown();

?>