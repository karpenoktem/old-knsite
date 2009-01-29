<?php

$page = array('bg' => 'rest',
			  'stylesheets' => array('bare'),
			  'title' => '',
			  'bare' => false);

function auri($action, $qs='', $an='') {
	global $cfg;
	$r = $cfg['auri'] . $action;
	if(!empty($qs)) $r .= '?' . $qs; 
	if(!empty($an)) $r .= '#' . $an;
	return $r;
}

function curi($content) {
	global $cfg;
	return $cfg['curi'] . $content;
}

function emit_stylesheets() {
	global $page;
	if(!$page['bare']) { $page['stylesheets'][]= 'common'; }
	foreach($page['stylesheets'] as $stylesheet) { ?>
		<link href="<?php echo curi("style/{$stylesheet}.css"); ?>"
			  rel="stylesheet" type="text/css" />
	<?php }
}

function set_title($title) {
	global $page;
	$page['title'] = $title;
}

function bare_page() {
	global $page;
	$page['bare'] = true;
}

function use_background($bg) {
	global $page;
	$page['bg'] = $bg;
}

function include_stylesheet($stylesheet) {
	global $page;
	$page['stylesheets'][]= $stylesheet;
}

function default_header() { 
	global $page, $cfg; 
	$img = $page['bg'].'.'.$cfg['bgs'][rand(0, count($cfg['bgs'])-1)];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
        "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<html>
	<head>
		<?php emit_stylesheets() ?>
		<script type="text/javascript" src="<?php echo curi('js/common.js'); ?>"></script>
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<?php if(!$page['bare']) { ?>
		<style type="text/css">
			#main { background-image: url(<?php echo curi("img/bgs/$img"); ?>); }
		</style>
		<?php } ?>
		<!--[if lte IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo curi('style/iehacks.css'); ?>" />
		<![endif]-->
		<title>ASV Karpe Noktem <?php
			if(!empty($page['title'])) { ?>- <?php echo $page['title']; } 
		?></title>
	</head>
	<body>
		<div id="wrapper">
		<?php if(!$page['bare']) { ?>
		<div id="logo"></div>
		<?php } ?>
		
		<div id="main">	
			<div id="body">
				<?php if(!$page['bare']) { ?>
				<?php if(!empty($page['title'])) { ?><h2><?php echo $page['title']; ?></h2><?php } ?>
				<?php } ?>
			<?php
}

function emit_menu() { global $page; ?>
			<ul id="menu">
				<li><a href="<?php echo auri('home'); ?>">Beginpagina</a></li>
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
				<li><a href="<?php echo auri('media') ?>">Fotos/videos</a></li>
				<ul>
					<li><a href="http://karpenoktem.nl/fotos/">Karpe Noktem</a></li>
					<li><a href="http://karpenoktem.nl/fotos/index.php?album=pdn">Pluk de Nacht</a></li>
					<li><a href="<?php echo auri('media') ?>"
						>...meer</a></li>
				</ul>
				<li><a href="<?php echo auri('forum') ?>">Forum</a></li>
				<li><a href="<?php echo auri('merchandise') ?>"
						>Merchandise</a></li>
				<ul>
					<li><a href="<?php echo auri('merchandise') ?>"
						>Tshirts</a></li>
				</ul>
				<li><a href="<?php echo auri('commissies'); ?>">Commissies</a></li>
				<li>Downloaden</li>
				<ul>
					<li><a href="<?php echo auri('an') ?>"
						>Akta Nokturna</a></li>
				</ul>
				<li><a href="<?php echo auri('links') ?>"
					>Links</a></li>
				<ul>
				<li><a href="<?php echo auri('zusjes') ?>"
					>Zusjes</a></li>
				</ul>
			<ul>
			<?php
}

function default_footer() { global $cfg, $page; ?>
			</div>
			<?php if(!$page['bare']) { ?>
			<?php emit_menu(); ?>
			<?php } ?>
		</div>
		<div id="footer"><!--[if IE]>
		Internet Explorer is 
		<a href="http://www.google.com/search?q=ie+sucks">smerige rotzooi</a>. Gebruik een
		fatsoenlijke browser zoals 
		<a href="http://www.mozilla.com/en-US/firefox/">Firefox</a>.<br/>
		<![endif]--><a href="<?php echo auri('lustrum'); ?>" 
			       id="lustrumCountDown"></a><br/>
		&copy;2007&mdash;2009, Karpe Noktem<?php
		if(isset($cfg['release'])) {
			echo "; <a href='".auri('release')."'>".
			     date('d M' ,$cfg['release']['date'])."</a>";
		}
		?></div>
		<!-- Source code? Take a look at the .git dir -->
		<script type="text/javascript">
			common_init();
		</script>
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

function interested_form() {
	global $cfg;
	$t = "<form method='post' action='{$cfg['interested-subscribe-uri']}'>".
		"<input name='email' type='text' value='jouw@email.com' />".
		"<input type='submit' value='voeg toe' /></form>";
	$t = str_replace('"', '\\"', $t);
	return "<script type='text/javascript'>".
		"document.write(\"{$t}\");</script>";
}

?>
