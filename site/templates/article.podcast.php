<?php $enablePodtrac = false; ?>
<?php snippet('header'); ?>
<?php snippet('menu'); ?>
<?php snippet('checkpubtime'); ?>
				<section class="blog">
					<div class="clearfix">
						<article>
							<header class="post-meta">
								<h1><?php echo html($page->title()) ?></h1>
								Gepostet am <time datetime="<?php echo $page->date('c') ?>"><?php echo $page->date('d.m.Y'); ?></time><?php if($page->category() != "") { echo " in "; } ?>
								<a class="category" href="<?php echo url() ?>blog/category:<?php echo $page->category(); ?>"><?php echo $page->category(); ?></a> von <a href="/geeks#<?php echo $page->author(); ?>"><?php echo $page->author(); ?></a>

								<?php if(isset($_GET["q"])) { echo '<a class="hidemarker" href="' . str_replace("/blog", "", $page->url()) . '">Such-Markierungen ausblenden</a>'; } ?>
							</header>
							<div>
								<?php if(isset($_GET["q"])) { echo preg_replace('{(' . $_GET["q"] . ')(?!([^<]+)?>)}i', '<span class="marker">$1</span>', kirbytext($page->text())); } else { echo kirbytext($page->text()); } ?>
							</div>
							<?php if($page->hasAudio()): ?>
                                <br><br>
                                <div id="enclosure">
                                <audio src="<?php echo 'http://www.podtrac.com/pts/redirect.mp3/' . $page->audioUri('mp3') ?>" type="audio/mp3" controls="controls"></audio><br>
                                
                                <?php foreach($page->audioFormats() as $format):
                                if ($enablePodtrac){
                                	echo ('<a href="http://www.podtrac.com/pts/redirect.mp3/'. $page->audioUri($format).'">Folge herunterladen ('.$format.')</a><br>');
                                } else {
                                	echo ('<a href="http://'. $page->audioUri($format).'">Folge herunterladen ('.$format.')</a><br>');
                                }
                                endforeach ?>
                                </div>
							<?php endif; ?>
							<footer class="post-sub">
								<script id='fb4k5tu'>(function(i){var f,s=document.getElementById(i);f=document.createElement('iframe');f.src='//api.flattr.com/button/view/?uid=<?php echo($page->flattr()); ?>&button=compact&url=<?php echo $page->url(); ?>';f.title='Flattr';f.height=20;f.width=110;f.style.borderWidth=0;s.parentNode.insertBefore(f,s);})('fb4k5tu');</script>
    <br><br><br>
    <a href="<?php echo url() ?>">← Zurück</a>

								<br><br>
								<?php if($page->isVisible() && isPublishedByTime($page)): ?>
                                    <?php if($page->comments() == "vanilla"): ?>
                                        <?php snippet('vanilla'); ?>
                                    <?php elseif($page->comments() == "disqus"): ?>
                                        <?php snippet('disqus', array('disqus_shortname' => '4hourgeeks')); ?>
                                    <?php else: ?>
                                        Comments disabled.
                                    <?php endif; ?>
                                 <?php else: ?>
                                    Dear Sir! There will be no comments for invisible posts! U MAD BRO?!
                                 <?php endif; ?>
							</footer>
						</article>
					</div>
				</section>
<?php snippet('footer'); if(isset($_GET["q"])) { die(); } ?>
