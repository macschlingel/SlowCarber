<?php
$articles = $pages->find('blog')->children()->visible()->flip();

snippet('feed', array(
  'link'  => url('blog'),
  'items' => $articles,
  'descriptionExcerpt' => false,
  'descriptionField'  => $page->text()->kirbytext()->value()
));

?>
