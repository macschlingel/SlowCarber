<?php snippet('header'); ?>
<?php snippet('menu'); ?>
<?php snippet('checkpubtime'); ?>
<section class="blog">
	<div class="clearfix">

		<article class="showroom">
			<?php snippet('showroom'); ?>
		</article>

		<?php if(param('category')) {   /*** article overview ***/
			$articles = $pages->find('blog')
			->children()
			->visible()
			->filterBy('category', param('category'), ',')
			->flip()
			->paginate(5);

			echo ('<h1 class="category_overview">Category Archives: <em>'), (param('category')), ('</em></h1>');
		} else if(param('tag')) {
			$articles = $pages->find('blog')
			->children()
			->visible()
			->filterBy('tags', param('tag'), ',')
			->flip()
			->paginate(5);

			echo ('<h1 class="category_overview">Articles with tag: <em>'), (param('tag')), ('</em></h1>');
		} else {
			$articles = $pages->find('blog','podcast')
			->children()
			->visible()
			->sortBy('date', 'desc')
			->paginate(5);
		}
		?>

		<?php foreach($articles as $article):
		if($article->guesturl() != "") {
			$AuthorURL = $article->guesturl();
		} else {
			$AuthorURL = '/geeks#'.$article->author();
		}
		if($article->template() == 'article.podcast' && isPublishedByTime($article)): /*** postformat: PODCAST ***/
			if(time() - ($article->date()) < 432000): ?>
		<article class="podcast">
			<header class="post-meta">
				<h1><a href="<?php echo $article->url() ?>">[<?php echo $article->category(); ?>] <?php echo html($article->title()) ?></a></h1>
				Gepostet am <time datetime="<?php echo $article->date('c') ?>"><?php echo $article->date('d.m.Y'); ?></time><?php if($article->category() != "") { echo " in "; } ?>
				<a class="category" href="<?php echo url() ?>category:<?php echo $article->category(); ?>"><?php echo $article->category(); ?></a> von <a href="<?php echo $AuthorURL; ?>"><?php echo $article->author(); ?></a>  <?php if($article->guesturl() != "") { echo("(Gastautor)"); }; ?>

			</header>
			<p><?php
				if ($article->hasImages()){
					if ($article->images()->find("preview.jpg")) {
						$image = $article->images()->find("preview.jpg");
					} else if ($article->images()->find("preview.png")) {
						$image = $article->images()->find("preview.png");
					} else {
						$image = $article->images()->first();
					}

					echo ('<div class="blogHero"><p><a href="' . $article->url() . '">'.thumb($image, array("width" => 670, "height" => 190, "crop" => true)).'</a></p></div>');
				}
				echo excerpt($article->text(), 600); ?></p>
				<a class="read_more" href="<?php echo $article->url() ?>">weiterlesen →</a>
			</article>
		<?php endif ?>
	<?php endif ?>
<?php endforeach ?>
<?php foreach($articles as $article):
if($article->guesturl() != "") {
	$AuthorURL = $article->guesturl();
} else {
	$AuthorURL = '/geeks#'.$article->author();
}
?>
<?php if($article->template() == 'article.text' && isPublishedByTime($article)): /*** postformat: TEXT ***/
	?>

	<article>
		<header class="post-meta">
			<h1><a href="<?php echo $article->url() ?>">[<?php echo $article->category(); ?>] <?php echo html($article->title()) ?></a></h1>
			Gepostet am <time datetime="<?php echo $article->date('c') ?>"><?php echo $article->date('d.m.Y'); ?></time><?php if($article->category() != "") { echo " in "; } ?>
			<a class="category" href="<?php echo url() ?>category:<?php echo $article->category(); ?>"><?php echo $article->category(); ?></a> von <a href="<?php echo $AuthorURL; ?>"><?php echo $article->author(); ?></a> <?php if($article->guesturl() != "") { echo("(Gastautor)"); }; ?>
		</header>
		<p><?php
			if ($article->hasImages()){
				if ($article->images()->find("preview.jpg")) {
					$image = $article->images()->find("preview.jpg");
				} else if ($article->images()->find("preview.png")) {
					$image = $article->images()->find("preview.png");
				} else {
					$image = $article->images()->first();
				}
				echo ('<div class="blogHero"><p><a href="' . $article->url() . '">'.thumb($image, array("width" => 670, "height" => 190, "crop" => true)).'</a></p></div>');
			}
			echo excerpt($article->text(), 600); ?></p>
			<a class="read_more" href="<?php echo $article->url() ?>">weiterlesen →</a>

		<?php elseif($article->template() == 'article.podcast' && isPublishedByTime($article)): /*** postformat: PODCAST ***/
		if(time() - ($article->date()) > 432000): ?>
		<article>
			<header class="post-meta">
				<h1><a href="<?php echo $article->url() ?>">[<?php echo $article->category(); ?>] <?php echo html($article->title()) ?></a></h1>
				Gepostet am <time datetime="<?php echo $article->date('c') ?>"><?php echo $article->date('d.m.Y'); ?></time><?php if($article->category() != "") { echo " in "; } ?>
				<a class="category" href="<?php echo url() ?>category:<?php echo $article->category(); ?>"><?php echo $article->category(); ?></a> von <a href="<?php echo $AuthorURL; ?>"><?php echo $article->author(); ?></a>
			</header>
			<p><?php
				if ($article->hasImages()){
					if ($article->images()->find("preview.jpg")) {
						$image = $article->images()->find("preview.jpg");
					} else if ($article->images()->find("preview.png")) {
						$image = $article->images()->find("preview.png");
					} else {
						$image = $article->images()->first();
					}
					echo ('<div class="blogHero"><p><a href="' . $article->url() . '">'.thumb($image, array("width" => 670, "height" => 190, "crop" => true)).'</a></p></div>');
				}
				echo excerpt($article->text(), 600); ?></p>
				<a class="read_more" href="<?php echo $article->url() ?>">weiterlesen →</a>
			<?php endif ?>
		<?php elseif($article->template() == 'article.foodsnap' && isPublishedByTime($article)): /*** postformat: FOODSNAP ***/ ?>
			<article>
				<header class="post-meta">
					<h1><a href="<?php echo $article->url() ?>">[<?php echo $article->category(); ?>] <?php echo html($article->title()) ?></a></h1>
					Gepostet am <time datetime="<?php echo $article->date('c') ?>"><?php echo $article->date('d.m.Y'); ?></time><?php if($article->category() != "") { echo " in "; } ?>
					<a class="category" href="<?php echo url() ?>category:<?php echo $article->category(); ?>"><?php echo $article->category(); ?></a> von <a href="/geeks#<?php echo $article->author(); ?>"><?php echo $article->author(); ?></a>
				</header>
				<?php
				foreach($article->images() as $image):
					$imagethumb = $image->fitWidth(250, false);
					?>
					<img src="<?php echo $imagethumb->url() ?>" style="float: left; height: <?php echo $imagethumb->height() ?>px; width: <?php echo $imagethumb->width() ?>px; margin: 0; padding: 0;" width="<?php echo $image->width() ?>" height="<?php echo $imagethumb->height() ?>" alt="<?php echo $imagethumb->name() ?>" />
				<?php endforeach ?>
				<div class="clearfix"></div>
				<a class="read_more" href="<?php echo $article->url() ?>">In voller Größe anzeigen →</a><br><br>
			<?php endif ?>
		</article>
	<?php endforeach ?>

	<?php if($articles->pagination()->hasPages()): /*** pagination ***/ ?>
	<nav class="pagination">
		<?php if($articles->pagination()->hasNextPage()) { ?>
		<a class="next" href="<?= $articles->pagination()->nextPageURL() ?>">&lsaquo;&lsaquo; Ältere Posts</a>
		<?php } else { ?>
		<span class="next">&lsaquo;&lsaquo; Ältere Posts</span>
		<?php } ?>
		<?php if($articles->pagination()->hasPrevPage()) { ?>
		<a class="prev" href="<?= $articles->pagination()->prevPageURL() ?>">Neuere Posts &rsaquo;&rsaquo;</a>
		<?php } else { ?>
		<span class="prev">Neuere Posts &rsaquo;&rsaquo;</span>
		<?php } ?>
	</nav>
<?php endif ?>
</div>
</section>
<?php snippet('footer') ?>
