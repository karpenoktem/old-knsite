<?php use_background('home');
	  include_stylesheet('home');
	  require_once('lib/agenda.php');
	  default_header();
    if(is_array($cfg['agenda'])) { ?>
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
<?php } default_footer(); ?>
