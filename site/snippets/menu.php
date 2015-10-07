<?php
$blog = $pages->find('blog');
#$categories = tagcloud($blog, array("field" => "category", "baseurl" => "", "param" => "category"));
#$tags = tagcloud($blog, array("field" => "tags", "baseurl" => "", "param" => "tag"));
?>
			<div id="wrapper">
				<div id="naviwrapper">
					<button id="togglenav" onclick="if(document.getElementById('mainnav').style.display != 'block') { document.getElementById('mainnav').style.display = 'block'; document.getElementById('naviwrapper').style.marginBottom = '30px' } else { document.getElementById('mainnav').style.display = 'none'; document.getElementById('naviwrapper').style.marginBottom = '0' }">Navigation</button>
					<nav class="menu" id="mainnav">
    					<h4>Abonnieren</h4>
						<ul>
							<li><a href="/feed"><img src="/assets/media/feed-icon-14x14.png" width="14" height="14">RSS-Feed</a></li>
							<li><a href="https://itunes.apple.com/de/podcast/4hourgeeks-podcast-aac/id594532268?l=en&mt=2"><img src="/assets/media/feed-icon-14x14.png" width="14" height="14">Podcast in iTunes</a></li>
							<li><a href="/podcastfeed/mp3"><img src="/assets/media/feed-icon-14x14.png" width="14" height="14">Podcast-Feed (MP3)</a></li>
							<li><a href="/podcastfeed/aac"><img src="/assets/media/feed-icon-14x14.png" width="14" height="14">Podcast-Feed (AAC)</a></li>
						</ul>
						<h4 id="search">Suche</h4>
						<form action="/search">
							<input type="text" placeholder="Suchen…" name="q" value="<?php if (isset($_GET["q"])){ echo $_GET["q"];} ?>" class="searchbox" />
						</form>
						<h4>SlowCarber Email-Updates</h4>
							<form action="//4hourgeeks.us6.list-manage.com/subscribe/post?u=089620cd89&amp;id=dd08a58905" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
							<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email Adresse" required>
					    <input type="hidden" name="b_089620cd89_dd08a58905" tabindex="-1" value="">
							<input type="submit" value="Abonnieren" name="subscribe" id="no.mc-embedded-subscribe" class="button">
							<br><a href="/blog/email-updates">Mehr Infos...</a>
							</form>
						<h4>Seiten</h4>
						<ul>
							<?php foreach($pages->visible() AS $p): ?>
							<li><a<?php echo ($p->isOpen()) ? ' class="active"' : '' ?> href="<?php echo $p->url() ?>"><?php echo html($p->title()) ?></a></li>
							<?php endforeach ?>
						</ul>
						<h4>Hol Dir das Buch</h4>
						<ul>
							<li><a href="http://www.amazon.de/exec/obidos/asin/3570501329/4hg-21">Amazon.de</a></li>
							<li><a href="http://www.amazon.com/exec/obidos/asin/030746363X/4hg-21">Amazon.com</a></li>
						</ul>
				        <h4>Soziale Medien</h4>
						<ul>
							<li><a href="http://www.facebook.com/4hourgeeks">Facebook</a></li>
							<li><a href="http://www.twitter.com/4hourgeeks">Twitter</a></li>
						</ul>
						<h4>Kategorien</h4>
						<ul>
                        <br>
                        <script id='fb2jg0x'>(function(i){var f,s=document.getElementById(i);f=document.createElement('iframe');f.src='//api.flattr.com/button/view/?uid=schlingel&button=compact&url=http%3A%2F%2Fwww.slowcarber.de';f.title='Flattr';f.height=20;f.width=110;f.style.borderWidth=0;s.parentNode.insertBefore(f,s);})('fb2jg0x');</script>
                        </ul>
					</nav>
				</div>
