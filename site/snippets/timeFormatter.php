<?php
function timeFormatter($minutes) {
    $hours = (int)($minutes / 60);
    $minutes -= $hours * 60;
    return 'sprintf("%d:%02.0f", $hours, $minutes);
}
?>
