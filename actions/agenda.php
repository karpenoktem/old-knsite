<?php set_title('Agenda');
	  include_stylesheet('agenda');
	  require_once('lib/agenda.php');
	  default_header(); ?>
<ul id="fullagenda">
	<?php foreach($cfg['agenda'] as $item) { ?>
	<li><div class="date"><?php echo $item[2]; ?></div>
	<div class="name"><?php echo $item[3]; ?></div>
	<div class="desc"><?php echo $item[4]; ?></div></li>
	<?php } ?>
</ul>

<?php default_footer(); ?>
