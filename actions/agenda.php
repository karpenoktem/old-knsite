<?php set_title('Agenda');
	  include_stylesheet('agenda');
	  require_once('lib/agenda.php');
	  default_header(); ?>
<ul id="fullagenda">
	<?php foreach($cfg['agenda'] as $item) { ?>
	<li><a name="<?php echo $item['key']; ?>"></a>
	<div class="date"><?php echo $item[2]; ?></div>
	<div class="name"><?php echo $item[3]; ?></div>
	<div class="desc"><?php echo $item[4]; ?></div></li>
	<?php } ?>
</ul>

<p>We houden ook <a href="http://www.google.com/calendar/embed?src=vssp95jliss0lpr768ec9spbd8%40group.calendar.google.com&ctz=Europe/Paris">een Google Calendar</a> bij.</p>
<?php default_footer(); ?>
