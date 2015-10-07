<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

// Include license configuration from outside repo
$licenseFile = dirname(dirname(kirby()->roots()->index())) . DS . 'data' . DS . 'config.php';
if(is_file($licenseFile)) require_once($licenseFile);

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

// The blog is the homepage
c::set('home', 'blog');

// Set timezone
c::set('timezone', 'Europe/Berlin');

// Redirect old blog links (/*) to /blog/*
// Created 2014-10-09 Lukas Bestle <lukasbestle.com>
// Updated 2015-10-07 Lukas Bestle <lukasbestle.com>
c::set('routes', array(
	array(
		'pattern' => '(:any)',
		'action'  => function($uid) {
			$page = page($uid);
			
			// Don't do anything to existing pages
			if($page) return site()->visit($page);
			
			// Check if it is a blog post
			$page = page('blog/' . $uid);
			if($page) {
				go($page);
				return;
			}
			
			// Error
			return site()->errorPage();
		}
	)
));
