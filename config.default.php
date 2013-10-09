<?php

$base_url = 'https://karpenoktem.nl/';

$cfg = array('interested-subscribe-uri' => $base_url.
		'mailman/subscribe/geinteresseerden');

$cfg['links'] = array();

$cfg['links']['wiki'] = $base_url.'wiki/Hoofdpagina';
$cfg['links']['forum'] = $base_url.'forum';
$cfg['links']['smoelen'] = $base_url.'smoelen';
$cfg['links']['stukken'] = $base_url.'groups/leden';
$cfg['links']['fotos'] = $base_url.'fotos/';
$cfg['links']['fotos-pdn'] = $base_url.'fotos/index.php?album=pdn';

unset($base_url);

if(is_file('config.php'))
	require_once('config.php');

if(is_file('config.release.php'))
	require_once('config.release.php');

?>
