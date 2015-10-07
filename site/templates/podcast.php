<?php snippet('header'); ?>
<?php snippet('menu'); ?>
<?php snippet('checkpubtime'); ?>
<section class="blog">
	<div class="clearfix">
		<?php if(param('category')) {   /*** article overview ***/
			$articles = $pages->find('podcast')
			->children()
			->visible()
			->filterBy('category', param('category'), ',')
			->flip()
			->paginate(5);

			echo ('<h1 class="category_overview">Category Archives: <em>'), (param('category')), ('</em></h1>');
		} else if(param('tag')) {
			$articles = $pages->find('podcast')
			->children()
			->visible()
			->filterBy('tags', param('tag'), ',')
			->flip()
			->paginate(5);

			echo ('<h1 class="category_overview">Articles with tag: <em>'), (param('tag')), ('</em></h1>');
		} else {
			$articles = $pages->find('podcast')
			->children()
			->visible()
			->flip()
			->paginate(5);
		} ?>
		<?php foreach($articles as $article): ?>
		<?php if($article->template() == 'article.podcast' && isPublishedByTime($article)): /*** postformat: PODCAST ***/ ?>
			<article>
				<header class="post-meta">
					<h1><a href="<?php echo $article->url(); ?>">[<?php echo $article->category(); ?>] <?php echo html($article->title()) ?></a></h1>
					Gepostet am <time datetime="<?php echo $article->date('c') ?>"><?php echo $article->date('d.m.Y'); ?></time> von <a href="/geeks#<?php echo $article->author(); ?>"><?php echo $article->author(); ?></a>
				</header>
				<p><?php
					if ($article->hasImages()){
						if ($article->images()->find('99')) {
							$image = $article->images()->find('99');
						} else {
							$image = $article->images()->first();
						}
						echo ('<div class="crop"><p><a href="' . $article->url() . '"><img src="'.thumb($image,array('width' => 670, 'height' => 190, 'crop' => true))->url().'"></a></p></div>');
					}
					echo excerpt($article->text(), 600); ?></p>
					<a class="read_more" href="<?php echo $article->url() ?>">read more →</a>
				</article>
			<?php endif ?>
		<?php endforeach ?>

		<?php if($articles->pagination()->hasPages()): /*** pagination ***/ ?>
		<nav class="pagination">
			<?php if($articles->pagination()->hasNextPage()) { ?>
			<a class="next" href="<?= $articles->pagination()->nextPageURL() ?>">&lsaquo;&lsaquo; older posts</a>
			<?php } else { ?>
			<span class="next">&lsaquo;&lsaquo; older posts</span>
			<?php } ?>
			<?php if($articles->pagination()->hasPrevPage()) { ?>
			<a class="prev" href="<?= $articles->pagination()->prevPageURL() ?>">newer posts &rsaquo;&rsaquo;</a>
			<?php } else { ?>
			<span class="prev">newer posts &rsaquo;&rsaquo;</span>
			<?php } ?>
		</nav>
	<?php endif ?>
</div>
</section>
<?php snippet('footer') ?>
