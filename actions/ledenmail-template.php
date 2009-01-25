<?php set_title('Agenda');
      require_once('lib/agenda.php'); ?>
<html>
	<head>
		<script>
			function email(a,b,c) {
				document.write(c+'@'+b+'.'+a);
			}
		</script>
	</head>
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
	<?php
	mysql_connect('localhost',
		      $cfg['forum']['user'],
		      $cfg['forum']['password']);
	mysql_select_db($cfg['forum']['db']);
	$lw = time() - 60*60*24*7;
	$qr = mysql_query("SELECT subject, id ".
			  "FROM topics ".
			  "WHERE last_post > $lw");
	?>
	<ul>
	<?php while($rr = mysql_fetch_array($qr)) { ?>
	<li><a href="<?php echo $cfg['forum']['topicUri'] . $rr['id'] ?>"
		><?php echo htmlentities($rr['subject']); ?></a></li>
	<?php } ?>
	</ul>
	</body>
</html>
