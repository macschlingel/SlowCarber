<?php
$blog = $pages->find('blog');
$categories = tagcloud($blog, array("field" => "category", "baseurl" => "", "param" => "category"));
$tags = tagcloud($blog, array("field" => "tags", "baseurl" => "", "param" => "tag"));
?>
			<div id="wrapper">