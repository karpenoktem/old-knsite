<?php set_title('Bar Agenda');
	  include_stylesheet('agenda');
	  require_once('config.baragenda.php');
	  default_header(); ?>
<ul id="fullagenda">
	<?php foreach($cfg['baragenda'] as $item) { ?>
	<li><a name="<?php echo $item['key']; ?>"></a>
	<div class="date"><?php echo $item[2]; ?></div>
	<div class="name"><?php echo $item[3]; ?></div>
	<div class="desc"><?php echo $item[4]; ?></div></li>
	<?php } ?>
</ul>
<?php default_footer(); ?>
