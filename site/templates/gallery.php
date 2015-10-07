<?php snippet('header') ?>
<?php snippet('menu') ?>

				<section class="page">
					<article>
						<h1><?php echo html($page->title()) ?></h1>
						<div><?php echo kirbytext($page->text()) ?></div>
						<div class="gallery">
						<?php if($page->hasImages()): ?>
							  <?php foreach($page->images() as $image): ?>
							    <a title="<?php echo $image->title(); ?>" rel="gallery" href="<?php echo $image->url() ?>"><?php echo thumb($image, array('width' => 315, 'height' => 150, 'crop' => true)) ?></a>
							  <?php endforeach ?>
						<?php endif ?>
						</div>
					</article>
				</section>

<?php snippet('footer') ?>
