<?php
function isPublishedByTime($article) {
    date_default_timezone_set('Europe/Berlin');
    if($article->date()!="" && $article->publishtime() != ""){
        $pubSecs = strtotime('1970-01-01 ' . $article->publishtime() . ' GMT');
        $timestamp = $article->date() + $pubSecs;
        if (time()>$timestamp) {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}

function articleTimestamp($article) {
    date_default_timezone_set('Europe/Berlin');
    if($article->date()!="" && $article->publishtime() != ""){
        $pubSecs = strtotime('1970-01-01 ' . $article->publishtime() . ' GMT');
        echo $pubSecs;
        $timestamp = $article->date() + $pubSecs;
        return $timestamp;
    } else {
        return 0;
    }
}

?>