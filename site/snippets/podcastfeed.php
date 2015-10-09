<?php
snippet('checkpubtime');
// defaults
if(!isset($descriptionExcerpt)) $descriptionExcerpt = true;

// send the right header
header('Content-type: application/rss+xml; charset="utf-8"');

//loading getID3 Library
require_once('assets/plugins/getid3/getid3.php');

//Enable/disable Podtrac Tracking (only use if you have set up an account/Show at podtrac.com)
$enablePodtrac = false; 
if($enablePodtrac){
	$URLPrefix = "http://www.podtrac.com/pts/redirect.mp3/";
} else {
	$URLPrefix = "http://";
}
?>

?>
<rss version="2.0"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns:wfw="http://wellformedweb.org/CommentAPI/"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:atom="http://www.w3.org/2005/Atom"
    xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"
    xml:lang="de-DE">

  <channel>
    <title><?php echo (isset($title)) ? xml($title) : xml($page->title()) ?></title>
    <link><?php echo (isset($link)) ? xml($link) : xml(url()) ?></link>
    <generator><?php echo c::get('feed.generator', 'Kirby') ?></generator>
    <lastBuildDate><?php echo (isset($modified)) ? date('r', $modified) : date('r', $site->modified()) ?></lastBuildDate>
    <atom:link href="<?php echo xml($page->url()) ?>" rel="self" type="application/rss+xml" />

    <?php if($page->description() || isset($description)): ?>
    <description><?php echo (isset($description)) ? xml($description) : xml($page->description()) ?></description>
    <?php endif ?>

     <itunes:author>Bastian Woelfle</itunes:author>
    <itunes:subtitle>Abnehmen mit der "4 Stunden Körper Diät" von Tim Ferris</itunes:subtitle>
    <itunes:summary>SlowCarber - Einfach, erfolgreich und dauerhaft abhnehmen mit der "4 Stunden Körper Diät" von Tim Ferris - Von Geeks, für Geeks und alle die Abnehmen und gesünder leben wollen</itunes:summary>
    <description><?php echo (isset($description)) ? xml($description) : xml($page->description()) ?></description>
    <itunes:owner>
           <itunes:name>Bastian Woelfle</itunes:name>
           <itunes:email>info@slowcarber.de</itunes:email>
    </itunes:owner>
    <itunes:keywords>slow carb, low carb, 4 hour body, 4 hour geeks, 4hg, ferris, 4 stunden körper, diät, abhnehmen, ernährung, gadgets, geeks, fitness</itunes:keywords>

<itunes:explicit>No</itunes:explicit>

<itunes:image href="<?php echo url('assets/media/iTunes.png') ?>/>

<itunes:category text="Health">
     <itunes:category text="Fitness &amp; Nutrition"/>
</itunes:category>

    <?php foreach($items as $item): ?>
        <?php if($item->hasAudio()): ?>
            <?php if(isPublishedByTime($item)): ?>
            <item>
              <title>4HourGeeks: <?php echo xml($item->title()) ?></title>
              <link><?php echo xml($item->url()) ?></link>
              <guid><?php echo xml($item->url()) ?></guid>
              <pubDate><?php echo ($item->date()) ? date('r', $item->date()) : date('r', $item->modified()) ?></pubDate>

              <description><![CDATA[<?php echo kirbytext($item->text()) ?>]]></description>

               <?php
                   //get mp3 duration
                  $getID3 = new getID3;
                  $filename = $item->audioPath('mp3');
                  $ThisFileInfo = $getID3->analyze($filename);
                  getid3_lib::CopyTagsToComments($ThisFileInfo);
                  $duration = $ThisFileInfo['playtime_string'];
                ?>

                <itunes:author>Bastian Woelfle</itunes:author>
                <itunes:explicit>No</itunes:explicit>
                <itunes:subtitle><?php echo $item->description() ?></itunes:subtitle>
                <itunes:summary><?php $summary; ?></itunes:summary>
                <itunes:duration><?php echo $duration; ?></itunes:duration>
                <itunes:keywords><?php echo $item->keywords(); ?></itunes:keywords>
                <?php
                        $MP3enclosureURL = $URLPrefix . $item->audioUri('mp3');
                        $AACenclosureURL = $URLPrefix . $item->audioUri('m4a');
                ?>

                <?php if ($page->mediatype() == 'mp3'): ?>
                   <enclosure url="<?php echo $MP3enclosureURL; ?>" length="<?php echo filesize($item->audioPath('mp3')); ?>" type="audio/mpeg"/>
                <?php else: ?>
                    <enclosure url="<?php echo $AACenclosureURL; ?>" length="<?php echo filesize($item->audioPath('m4a')); ?>" type="audio/mpeg"/>
                <?php endif; ?>
                <atom:link rel="payment" href="https://flattr.com/submit/auto?user_id=schlingel&amp;url=http%3A%2F%2F4hourgeeks.de%2F&amp;language=de_DE&amp;category=audio&amp;title=4HourGeeks" type="text/html" />
                </item>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach ?>

  </channel>
</rss>