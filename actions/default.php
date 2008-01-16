<?php use_background('bg-home.png');
	  include_stylesheet('home');
	  require_once('lib/agenda.php');
	  default_header(); ?>
			<ul id="agenda">
				<?php foreach($cfg['agenda'] as $item) { ?>
				<li><div class="title"><a href="<?php echo auri('agenda', '', $item['key']); ?>"><?php echo $item[0]; ?></a></div>
				    <div class="desc"><?php echo $item[1]; ?></div>
				<?php } ?>
			</ul>
<?php default_footer(); ?>
