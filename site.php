<?php

$kirby = kirby();

// Change the accounts directory if existing outside of the repo
$kirby->roots->accounts = dirname(dirname(__DIR__)) . DS . 'data' . DS . 'accounts';
