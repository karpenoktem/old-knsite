<?php 
// KARPENOKTEM.NL UCI HOSTING HACK
// karpenoktem.nl verwijst alle verzoeken direct naar ru.nl/karpenoktem
// ongeacht van de uri erachter.  Zijn we op deze pagina via karpenoktem.nl
// gekomen, verwijs dan door naar de bedoelde pagina.

$ref = false;
$ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $ref;
$ref = isset($in['referer']) ? $in['referer'] : $ref;

if($ref and 
   preg_match('/^https?:\/\/([^\/]+)\/(.*)$/', $ref, $matches) and
   $matches[1] == 'karpenoktem.nl') {
	Header("location: http://ru.nl/karpenoktem/{$matches[2]}");
	exit();
}


$page['bg'] = 'bg-home.png';
	  default_header(); ?>
			<ul id="agenda">
				<li><div class="title"><a href="<?php echo auri('agenda'); ?>">
						Pakjesavond bij Bram</a></div>
				    <div class="desc">5 Dec</div>
				<li><div class="title"><a href="<?php echo auri('agenda'); ?>">
						Sinterklaasborrel</a></div>
				    <div class="desc">12 Dec, Cafe Dollars</div>
				<li><div class="title"><a href="<?php echo auri('agenda'); ?>">
						CoCo: Stropdasdrinken</a></div>
				    <div class="desc">13 Dec</div>

				<li><div class="title"><a href="<?php echo auri('agenda'); ?>">
						Karpe Rockt'em</a></div>
				    <div class="desc">19 Dec, Cafe Merleyn</div>
				<li><div class="title"><a href="<?php echo auri('agenda'); ?>">
						Nieuwjaarsborrel</a></div>
				    <div class="desc">2 Jan, Cafe Dollars</div>
				<li><div class="title"><a href="<?php echo auri('agenda'); ?>">
						Extreme Playbackshow</a></div>
				    <div class="desc">9 Jan</div>
				<li><div class="title"><a href="<?php echo auri('agenda'); ?>">
						Borrel</a></div>
				    <div class="desc">16 Jan</div>
				<li><div class="title"><a href="<?php echo auri('agenda'); ?>">
						Winterweekend</a></div>
				    <div class="desc">25 Jan</div>
			</ul>
<?php default_footer(); ?>
