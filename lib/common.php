<?php

setlocale(LC_TIME, 'nl_NL');

$page = array('bg' => 'rest',
			  'stylesheets' => array('bare'),
			  'title' => '',
                          'unsafe-email' => false,
			  'bare' => false);

function auri($action, $qs='', $an='') {
	global $cfg;
        $r = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://')
                                 . $cfg['auri'] . $action;
	if(!empty($qs)) $r .= '?' . $qs; 
	if(!empty($an)) $r .= '#' . $an;
	return $r;
}

function curi($content) {
	global $cfg;
        return (isset($_SERVER['HTTPS']) ? 'https://' : 'http://')
                . $cfg['curi'] . $content;
}

function emit_stylesheets() {
	global $page;
	if(!$page['bare']) { $page['stylesheets'][]= 'common'; }
	foreach($page['stylesheets'] as $stylesheet) { ?>
		<link href="<?php echo curi("style/{$stylesheet}.css"); ?>"
			  rel="stylesheet" type="text/css" />
	<?php }
}

function unsafe_emails() {
	global $page;
	$page['unsafe-email'] = true;
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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<?php emit_stylesheets() ?>
		<script type="text/javascript" src="<?php echo curi('js/common.js'); ?>"></script>
		<link rel="icon" href="/favicon.ico" type="image/x-icon" />
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
		<meta name="google-site-verification" content="l0qIUe2C4DlhszFe3hyN3f26uMMLNL9-VPqErQBa-fY" />
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
				<li><a href="<?php echo auri('agenda') ?>"
				    >Agenda</a></li>
				<li><a href="<?php echo auri('watis') ?>"
					>Over ons</a>
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
				</ul></li>
				<li><a href="<?php echo auri('media') ?>">Fotos/videos</a>
				<ul>
					<li><a href="http://karpenoktem.nl/fotos/">Fotogalerij</a></li>
					<li><a href="http://karpenoktem.nl/fotos/index.php?album=pdn">Pluk de Nacht</a></li>
				</ul></li>
                                <li><a href="<?php echo auri('smoelen') ?>">Leden</a>
				<ul>
					<li><a href="<?php echo auri('smoelen') ?>">Smoelenboek</a></li>
					<li><a href="<?php echo auri('wiki') ?>">Wiki</a></li>
					<li><a href="<?php echo auri('forum') ?>">Forum</a></li>
					<li><a href="<?php echo auri('groups/leden') ?>">Stukken</a></li>
				</ul></li>
				<li><a href="<?php echo auri('merchandise') ?>"
						>Merchandise</a></li>
                                <li><a href="<?php echo auri('aktanokturna') ?>"
						>Akta Nokturna</a></li>
				<li><a href="<?php echo auri('links') ?>"
					>Links</a>
				<ul>
				<li><a href="<?php echo auri('zusjes') ?>"
					>Zusjes</a></li>
				<li><a href="<?php echo auri('sponsoren') ?>"
					>Sponsoren</a></li>
				</ul></li>
			</ul>
			<?php
}

function default_footer() { global $cfg, $page; ?>
			</div>
			<?php if(!$page['bare']) { ?>
			<?php emit_menu(); ?>
			<?php } ?>
		</div>
		<div id="footer"><!--[if IE]>
		Internet Explorer is moeilijk te ondersteunen.
		Gebruik <a href="http://www.mozilla.com/en-US/firefox/">een</a>
		open browser voor een beter resultaat.<br/>
		<![endif]-->
		&copy;2007&mdash;2013, Karpe Noktem<?php
		if(isset($cfg['release'])) {
			echo "; <a href='".auri('release')."'>".
			     strftime('%e %b' ,$cfg['release']['date'])."</a>";
		}
		?></div>
		</div>
		<!-- Source code? Take a look at the .git dir -->
		<script type="text/javascript">
			common_init();
		</script>
		<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		try {
			var pageTracker = _gat._getTracker("UA-11922614-1");
			pageTracker._trackPageview();
		} catch(err) {}</script>
	</body>
</html> <?php
}

function email($email) {
	global $page;
	if($page['unsafe-email'])
		return "<a href='mailto:$email'>$email</a>";
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
	$t = "<form method='post' action='{$cfg['interested-subscribe-uri']}'>" .
		"<input name='email' type='text' placeholder='jouw@email.com' />" .
		"<input type='submit' value='voeg toe' /></form>";
	$t = str_replace('"', '\\"', $t);
	return "<script type='text/javascript'>".
		"document.write(\"{$t}\");</script>";
}

?>
