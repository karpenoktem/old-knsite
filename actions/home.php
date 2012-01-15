<?php use_background('home');
	  include_stylesheet('home');
	  require_once('lib/agenda.php');
	  default_header();
?>
	  <div id="homeContent">
	  	<img src="<?php echo curi('img/dansend.jpg'); ?>" width="475" />
		<p>
	  		Welkom bij ASV Karpe Noktem. Hier staat wat vrolijke tekst waarin kort uitleg wordt gegeven over wat KN is. En een mooie foto waaraan je in 1 keer ziet dat KN cool is.
		</p>
	  </div>
<?php
    if(is_array($cfg['agenda'])) { ?>
			<div id="agenda">
			<h1>Agenda</h1>
			<ul id="agenda">
			<?php
	    		$i = 0;
			foreach($cfg['agenda'] as $item) {
				$i++;
				if ($i == 9) {
					?>
					<li><a class="more" href="<?php echo auri('agenda'); ?>">...</a></li>
					<?php
					break;
				}
			?>
				<li><div class="title"><a href="<?php echo auri('agenda', '', $item['key']); ?>"><?php echo $item[0]; ?></a></div>
				    <div class="desc"><?php echo $item[1]; ?></div></li>
				<?php } ?>
			</ul>
			</div>
<?php } default_footer(); ?>
