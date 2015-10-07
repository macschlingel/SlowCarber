<?php

kirbytext::$tags['lightbox'] = array (
'attr' => array (
  'group', 'display', 'badge', 'thumbHeight', 'thumbWidth'
),
'html' => function($tag) {
    $name = $tag->attr('lightbox');
    #if(is_object($tag->page()->file($tag->attr('lightbox')))) {
    #  $image = $tag->page()->file($tag->attr('lightbox'))->url();
    #} else {
      $image = $tag->file($tag->attr('lightbox'));
    #}
    $group = $tag->attr('group', "default");
    $display = $tag->attr('display', "inline");
    $badge = $tag->attr('badge', "");
    $thumbHeight = $tag->attr('thumbHeight', 300);
    $thumbWidth = $tag->attr('thumbWidth', 670);
    $crop = $tag->attr('crop', true);
	  return '<a href="' . $image . '" data-featherlight="image" style="display: ' . $display . '; position: relative;" rel="' . $group . '" title="' . $name . '"><img src="' . thumb($tag->page()->file($tag->attr('lightbox')), array('height' => $thumbHeight, 'width' => $thumbWidth, 'crop' => $crop))->url(). '" alt="' . $name . '" />' . $badge . '</a>';
  }
);
?>
