<?php
kirbytext::$tags['gallery'] = array (
'attr' => array (
  'title', 'thumbWidth', 'thumbHeight'
),
  'html' => function($tag) {
	  $galleryTitle = $tag->attr('title', 'Gallery');
    $thumbWidth = $tag->attr('thumbWidth', '100');
    $thumbHeight = $tag->attr('thumbHeight', '100');
    $images = explode("|", $tag->attr('gallery'));
    $return = '<h3>'.$galleryTitle.'</h3>';
	  foreach($images as $image) {
		  $return .= '<a class="thumbnail gallery" href="'.$tag->file($image)->url().'"><img src="'.thumb($tag->file($image), array('height' => $thumbHeight, 'width' => $thumbWidth, 'crop' => true))->url().'"></a>';
	  }
	  return $return;
  }
);
?>
