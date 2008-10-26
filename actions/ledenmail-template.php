<?php set_title('Agenda');
	  require_once('lib/agenda.php'); ?>
<html>
	<head></head>
	<body>
	<ul>
	<?php foreach($cfg['agenda'] as $item) { ?>
	<li><em><?php echo $item[2]; ?></em>: <?php echo $item[3]; ?></li>
	<?php } ?>
	</ul>
	<?php foreach($cfg['agenda'] as $item) { ?>
	<p><strong><?php echo $item[3]; ?></strong><br/>
	<em><?php echo $item[2]; ?></em><br/>
	<?php echo $item[4]; ?>
	<?php } ?>
	</body>
</html>
