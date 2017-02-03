<?php snippet('header'); ?>
<?php snippet('menu'); ?>
<?php snippet('checkpubtime'); ?>
				<section class="blog">
					<div class="clearfix">
						<?php var_dump($roots); ?>
					</div>
				</section>
<?php snippet('footer'); if(isset($_GET["q"])) { die(); } ?>
