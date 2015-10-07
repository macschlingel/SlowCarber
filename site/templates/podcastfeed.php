<?php 

$articles = $pages->find('podcast')->children()->visible()->flip();

snippet('podcastfeed', array(
  'link'  => url('podcast'),
  'items' => $articles,
  'descriptionExcerpt' => true,
  'descriptionField'  => 'text'
));

?>