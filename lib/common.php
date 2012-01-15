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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
        "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<?php emit_stylesheets() ?>
		<script type="text/javascript" src="<?php echo curi('js/common.js'); ?>"></script>
		<link rel="icon" href="/favicon.ico" type="image/x-icon" />
		<!--[if lte IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo curi('style/iehacks.css'); ?>" />
		<![endif]-->
		<title>ASV Karpe Noktem <?php
			if(!empty($page['title'])) { ?>- <?php echo $page['title']; } 
		?></title>
		<meta name="copyright" content="Copyright (c) 2012 Karpe Noktem" />
		<meta name="google-site-verification" content="l0qIUe2C4DlhszFe3hyN3f26uMMLNL9-VPqErQBa-fY" />
	</head>
	<body>
		<div id="wrapper">
		<?php if(!$page['bare']) { ?>
		<div id="logoContainer">
			<a href="<?php echo auri('home'); ?>">
				<img src="<?php echo curi('img/logo.png'); ?>" alt="ASV Karpe Noktem" />
			</a>
		</div>
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
				<li><a href="<?php echo auri('agenda') ?>">Agenda</a></li>
				<li><a href="<?php echo auri('watis') ?>">Over Karpe Noktem</a>
				<ul>
					<li><a href="<?php echo auri('watis') ?>">Wat zijn we?</a></li>
					<li><a href="<?php echo auri('activiteiten') ?>">Wat doen we?</a></li>
					<li><a href="<?php echo auri('oprichting') ?>">Oprichting</a></li>
					<li><a href="<?php echo auri('bestuur') ?>">Bestuur</a></li>
					<li><a href="<?php echo auri('zusjes') ?>">Zusjes</a></li>
					<li><a href="<?php echo auri('aktanokturna') ?>">Akta Nokturna</a></li>
					<li><a href="<?php echo auri('links') ?>">Links</a></li>
				</ul></li>
				<li><a href="<?php echo auri('fotos') ?>">Fotogalerij</a>
				<li><a href="<?php echo auri('plukdenacht') ?>">Pluk de Nacht</a>
				<li><a href="<?php echo auri('sponsoren') ?>">Sponsoren</a></li>
				<li><a href="<?php echo auri('contact') ?>">Contact</a></li>
                <li><a href="<?php echo auri('lidworden') ?>">Lid worden</a></li>
                <li id="loginContainer">Inloggen
                    <form action="<?php echo auri('accounts/login'); ?>" method="post">
                        <ul>                        
                            <li><input name="username" type="text" placeholder="Gebruikersnaam" size="15"></li>
                            <li><input name="password" type="password" placeholder="Wachtwoord" size="15"></li>
                            <li><input type="submit" value="Login"></li>
                        </ul>
                    </form>
                </li>
			</ul>
			<?php
}

function default_footer() { global $cfg, $page; ?>
			</div>
			<?php if(!$page['bare']) { ?>
			<?php emit_menu(); ?>
			<?php } ?>
		</div>
		<div id="footer">
			Meer weten? Mail naar: <a href="mailto:info@karpenoktem.nl">info@karpenoktem.nl</a>
		</div>
		</div>
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
	$t = "<form method='post' action='{$cfg['interested-subscribe-uri']}'>".
		"<input name='email' type='text' value='jouw@email.com' />".
		"<input type='submit' value='voeg toe' /></form>";
	$t = str_replace('"', '\\"', $t);
	return "<script type='text/javascript'>".
		"document.write(\"{$t}\");</script>";
}

?>
