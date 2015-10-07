<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="utf-8" />
		<title><?php echo html($page->title()) ?> | <?php echo html($site->title()) ?></title>

		<?php if($page->description() != ''): ?>
		<meta name="description" content="<?php echo html($page->description()) ?>" />
		<?php else: ?>
		<meta name="description" content="<?php echo html($site->description()) ?>" />
		<?php endif ?>

		<meta name="robots" content="index, follow" />
		<meta name="viewport" content="width=600" />
		<link rel="shortcut icon" href="<?php echo url('assets/media/favicon.png') ?>" type="image/png" />
		<link rel="alternate" type="application/rss+xml" href="<?php echo url('feed') ?>" title="Blog Feed" />

		<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

		<?php
			echo css("assets/styles/styles.css");
			echo js("http://code.jquery.com/jquery-latest.js");
			echo js("assets/plugins/mediaelement/mediaelement-and-player.min.js");
			echo css("assets/plugins/mediaelement/mediaelementplayer.min.css");
			echo css("http://cdn.rawgit.com/noelboss/featherlight/master/release/featherlight.min.css");
			echo css("http://cdn.rawgit.com/noelboss/featherlight/master/release/featherlight.gallery.min.css");
		?>

		<script>
			$(document).ready(function(){
				$('.gallery').featherlightGallery();
			});
		</script>

		<script>
      $(document).ready(function(){
        $('audio,video').mediaelementplayer();
      });
    </script>

        <script type="text/javascript">
        /* <![CDATA[ */
        (function() {
            var s = document.createElement('script');
            var t = document.getElementsByTagName('script')[0];

            s.type = 'text/javascript';
            s.async = true;
            s.src = '//api.flattr.com/js/0.6/load.js?mode=auto';

            t.parentNode.insertBefore(s, t);
         })();
        /* ]]> */
        </script>

        <script type="text/javascript" language="javascript">
            if (top.frames.length>0)
            setTimeout("top.location = window.location;",100);
        </script>

	</head>

	<body>

		<div id="site">

			<header id="branding">
				<div id="header_center">
                <a href="/"><img src="/assets/media/header_logo.png"></a>
					<div class="header_text_container"><div class="header_text"><?php echo html($site->description()) ?></div></div></div>
			</header>
