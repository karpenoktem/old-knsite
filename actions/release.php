<?php set_title('Website informatie');
	  default_header(); ?>
<dl>
	<dt>Commit</dt>
	<dd><?php echo $cfg['release']['tag']; ?></dd>
	<dt>Commit op</dt>
	<dd><?php echo strftime('%e %B %Y %X', $cfg['release']['date']); ?></dd>
	<dt>Door</dt>
	<dd><?php echo $cfg['release']['by']; ?></dd>
	<dt>Op de branch</dt>
	<dd><?php echo $cfg['release']['branch']; ?></dd>
</dl>

<p><a href="http://github.com/karpenoktem/knsite">Geschiedenis en broncode</a> van karpenoktem.nl</p>

<?php default_footer(); ?>
