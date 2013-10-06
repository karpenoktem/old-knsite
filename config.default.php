<?php

$cfg = array('interested-subscribe-uri' => '/'.
		'mailman/subscribe/geinteresseerden');

$cfg['links'] = array();

$base_url = 'https://karpenoktem.nl/';
$cfg['links']['wiki'] = $base_url.'wiki';
$cfg['links']['forum'] = $base_url.'forum';
$cfg['links']['smoelen'] = $base_url.'smoelen';
$cfg['links']['stukken'] = $base_url.'groups/leden';
unset($base_url);

if(is_file('config.php'))
	require_once('config.php');

if(is_file('config.release.php'))
	require_once('config.release.php');

?>
