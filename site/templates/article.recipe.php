<?php snippet('header'); ?>
<?php snippet('menu'); ?>
<?php snippet('checkpubtime'); ?>     
<?php snippet('timeFormatter'); ?>  
<?php if($page->guesturl() != "") {
        $AuthorURL = $page->guesturl();
    } else {
        $AuthorURL = '/geeks#'.$page->author();  
    }
?>
				<section class="blog">
					<div class="clearfix">
						<article>
				            <div itemscope itemtype="http://schema.org/Recipe">
							<header class="post-meta">
								<h1><span itemprop="name"><?php echo html($page->title()) ?></span></h1>
								Gepostet am <meta itemprop="datePublished" content="<?php echo $page->date('Y-m-d'); ?>"><time datetime="<?php echo $page->date('c') ?>"><?php echo $page->date('d.m.Y'); ?></time><?php if($page->category() != "") { echo " in "; } ?>
								<a class="category" href="<?php echo url() ?>blog/category:<?php echo $page->category(); ?>"><?php echo $page->category(); ?></a> von <a href="<?php echo $AuthorURL; ?>"><span itemprop="author"><?php echo $page->author(); ?></span></a> <?php if($page->guesturl() != "") { echo("(Gastautor)"); }; ?>
								<?php if(isset($_GET["q"])) { echo '<a class="hidemarker" href="' . str_replace("/blog", "", $page->url()) . '">Such-Markierungen ausblenden</a>'; } ?>
							</header>
							<div>
								<?php if(isset($_GET["q"])) { echo preg_replace('{(' . $_GET["q"] . ')(?!([^<]+)?>)}i', '<span class="marker">$1</span>', kirbytext($page->text())); 
								} else {
								$cooktime = $page->cooktime();
								$preptime = $page->preptime();
								
								echo ('Vorbereitungszeit: <meta itemprop="prepTime" content=PT"'.$preptime.'M">'.timeFormatter($preptime).'<br />');
                                echo ('Kochzeit: <meta itemprop="cookTime" content="PT'.$cooktime.'M">'.timeFormatter($cooktime).'<br />');
                                #print_r($page->preptime());
                                echo "<h2>Zutaten für <span itemprop=\"recipeYield\">".$page->recipeyield()."</span></h2>";
								echo kirbytext($page->ingredients()); 
								echo kirbytext($page->prep()); 
								} ?>
							</div>   
							<?php if($page->hasSounds()): ?>                
							<div id="enclosure">
							<?php foreach($page->sounds() as $enclosure): ?>
							     <audio itemprop="audio" id="<?php echo $enclosure->name() ?>" src="<?php echo $enclosure->url() ?>" type="audio/<?php echo $enclosure->extension() ?>" controls="controls"></audio><br> <a href="<?php echo $enclosure->url() ?>">Folge herunterladen</a>
				            <?php endforeach; ?>
							</div>
							<?php endif; ?>
     
							<footer class="post-sub">

<a href="https://flattr.com/submit/auto?user_id=<?php echo($page->flattr()); ?>&url=<?php echo $page->url(); ?>&title=<?php echo $page->title(); ?>&description=<?php echo $page->description(); ?>&language=german&&hidden=0&category=text"><img src="https://api.flattr.com/button/flattr-badge-large.png" style="border: 0; -webkit-box-shadow: 0px 0px 0px;	/* webkit browser*/ -moz-box-shadow: 0px 0px 0px ;	/* firefox */ box-shadow: 0px 0px 0px;" width="93" height="20"></a>
<br><br><br>
<a href="<?php echo url() ?>">← Zurück</a>
								<br><br>		
				                <?php if($page->isVisible() && isPublishedByTime($page)): ?>
    				                <?php if($page->comments() == "vanilla"): ?>
    				                    <?php snippet('vanilla') ?>
                                    <?php elseif($page->comments() == "disqus"): ?>
                                        <?php snippet('disqus', array('disqus_shortname' => '4hourgeeks')) ?>
                                    <?php else: ?>
                                        Comments disabled.
                                    <?php endif; ?>
                                 <?php else: ?>  
                                    Dear Sir! There will be no comments for invisible posts! U MAD BRO?
                                 <?php endif; ?>
							</footer>             
				            <span itemprop="description" style="visibility: hidden; height: 0px;"><?php echo $page->description(); ?></span>          
						</article>
					</div>
					</div>
				</section>               
<?php snippet('footer'); if(isset($_GET["q"])) { die(); } ?>
