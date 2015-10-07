<?php snippet('header') ?>
<?php snippet('menu') ?>

<?php
$results = $site->search(get('q'),'title|text|description')->visible();

$first = "first";
?>
				<section class="page_search">
					<?php if($results): ?>

					<dl>
					<?php foreach($results as $result): ?>
					<?php if(!$result->isVisible()) { continue; } ?>
						<dt class="<?php echo $first; ?>"><a href="<?php echo str_replace("/blog", "", $result->url()) . "?q=" . $_GET["q"] ?>"><?php echo $result->title() ?></a></dt>
						<dd><?php echo preg_replace('{(' . $_GET["q"] . ')}i', '<span class="marker">$1</span>', excerpt($result->text(), 300)) ?></dd><br>
					<?php $first = "following"; endforeach ?>
					</dl>
				</section>
					<?php else: ?>
					Sorry, no results for "<?php echo get('q'); ?>" found.
					<?php endif ?>
				</section>

<?php snippet('footer') ?>
