<?php

$cfg = array();

if(is_file('config.php'))
	require_once('config.php');

if(is_file('config.release.php'))
	require_once('config.release.php');

?>
