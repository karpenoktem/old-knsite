<?php

$page = array('bg' => 'bg.png',
			  'stylesheets' => array('common'));

function auri($action, $qs='') {
	global $cfg;
	return $cfg['auri'] . $action . '?' . $qs; 
}

function curi($content) {
	global $cfg;
	return $cfg['curi'] . $content;
}

function emit_stylesheets() {
	global $page;
	foreach($page['stylesheets'] as $stylesheet) { ?>
		<link href="<?php echo curi("style/{$stylesheet}.css"); ?>"
			  rel="stylesheet" type="text/css" />
	<?php }
}

function use_background($bg) {
	global $page;
	$page['bg'] = $bg;
}

function include_stylesheet($stylesheet) {
	global $page;
	$page['stylesheets'][]= $stylesheet;
}

function default_header() { global $page; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
        "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<html>
	<head>
		<?php emit_stylesheets() ?>
		<script type="text/javascript" src="<?php echo curi('js/common.js'); ?>"></script>
		<title>ASV Karpe Noktem</title>
		<style type="text/css">
			#main { background-image: url(<?php echo curi("img/{$page['bg']}"); ?>); }
		</style>
	</head>
	<body>
		<div id="wrapper">
		<div id="logo"></div>
		
		<div id="main">	
			<div id="body">
			<?php
}

function emit_menu() { ?>
			<ul id="menu">
				<li><a href="<?php echo auri('default'); ?>">Beginpagina</a></li>
				<li><a href="<?php echo auri('watis') ?>"
					>Over ons</a></li>
				<ul>
					<li><a href="<?php echo auri('watis') ?>"
						>Wat is <abbr title="Karpe Noktem">KN</abbr>?</a></li>
					<li><a href="<?php echo auri('geschiedenis') ?>"
						>Geschiedenis</a></li>
					<li><a href="<?php echo auri('activiteiten') ?>"
						>Activiteiten</a></li>
					<li><a href="<?php echo auri('bestuur') ?>"
						>Bestuur</a></li>
					<li><a href="<?php echo auri('contact') ?>"
						>Contact</a></li>
					<li><a href="<?php echo auri('lidworden') ?>"
						>Lid worden</a></li>
				</ul>
				<li><a href="<?php echo auri('agenda') ?>"
				    >Agenda</a></li>
				<li>Fotos</li>
				<ul>
					<li><a href="http://www.flickr.com/photos/12267979@N04/">Karpe Noktem</a></li>
					<li><a href="http://www.flickr.com/photos/12264801@N04/">Pluk het weekend</a></li>
				</ul>
				<li><a href="http://www.ru.nl/karpenoktem/forum">Forum</a></li>
				<li><a href="<?php echo auri('merchandise') ?>"
						>Merchandise</a></li>
				<ul>
					<li><a href="<?php echo auri('merchandise') ?>"
						>Tshirts</a></li>
				</ul>
				<li>Downloaden</li>
				<ul>
					<li><a href="<?php echo auri('an') ?>"
						>Akta Nokturna</a></li>
				</ul>
				<li><a href="<?php echo auri('links') ?>"
					>Links</a></li>
			<ul>
			<?php
}

function default_footer() { ?>
			</div>
			
			<?php emit_menu(); ?>
		</div>
		<div id="footer">&copy;2007 &mdash; Karpe Noktem</div>
		<!-- Source code? Take a look at the .git dir -->
	</body>
</html> <?php
}

function email($email) {
	$bits = explode('@', $email);
	$u = $bits[0];
	$bits = explode('.', $bits[1]);
	$t = $bits[count($bits) - 1];
	$d = implode('.', array_slice($bits, 0, count($bits) - 1));
	return "<script type='text/javascript'>email('$t', '$d', '$u');</script>".
		   "<noscript>[X@Y, waar voor Y=$d.$t en X=$u]</noscript>";
}


?>
