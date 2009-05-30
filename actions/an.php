<?php set_title('Akta Nokturna');
	  include_stylesheet('an');
	  default_header(); ?>
	<p>Hier kunt u de oudere uitgaven van de Akta Nokturna downloaden</p>
	<ul id="an">
		<li>Jaargang 5</li>
		<ul>
			<li><a href="<?php echo curi('archief/akta12.pdf'); ?>">(Intro) Akta 12</a></li>
			<li><a href="<?php echo curi('archief/akta13.pdf'); ?>">Akta 13</a></li>
			<li><a href="<?php echo curi('archief/akta14.pdf'); ?>">Akta 14</a></li>
			<li><a href="<?php echo curi('archief/akta15.pdf'); ?>">Akta 15</a></li>
		</ul>
		<li>Jaargang 4</li>
		<ul>
			<li><a href="<?php echo curi('archief/akta10.pdf'); ?>">Akta 10</a></li>
			<li><a href="<?php echo curi('archief/akta11.pdf'); ?>">Akta 11</a></li>
		</ul>	
		<li>Jaargang 3</li>
		<ul>	
			<li><a href="<?php echo curi('archief/akta8.pdf'); ?>">Akta 8</a></li>
			<li><a href="<?php echo curi('archief/akta9.pdf'); ?>">Akta 9</a></li>
		</ul>
		<li>Jaargang 2</li>
		<ul>
			<li><a href="<?php echo curi('archief/akta3.pdf'); ?>">Akta 3</a></li>
			<li><a href="<?php echo curi('archief/akta4.pdf'); ?>">Akta 4</a></li>
			<li><a href="<?php echo curi('archief/akta5.pdf'); ?>">Akta 5</a></li>
			<li><a href="<?php echo curi('archief/akta6.pdf'); ?>">Akta 6 &amp; 7</a></li>
		</ul>
		<li>Jaargang 1</li>
		<ul>
			<li><a href="<?php echo curi('archief/akta1.pdf'); ?>">Akta 1</a></li>
			<li><a href="<?php echo curi('archief/akta2.pdf'); ?>">Akta 2</a></li>
		</ul>
	</ul>	
<?php default_footer(); ?>
