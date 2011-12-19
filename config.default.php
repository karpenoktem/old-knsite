<?php

$cfg = array('interested-subscribe-uri' => 'https://karpenoktem.nl/'.
		'mailman/subscribe/geinteresseerden');

if(is_file('config.php'))
	require_once('config.php');

if(is_file('config.release.php'))
	require_once('config.release.php');

?>
