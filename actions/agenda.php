<?php set_title('Agenda');
	  include_stylesheet('agenda');
	  require_once('lib/agenda.php');
	  default_header(); ?>
<p><a href="http://www.google.com/calendar/embed?src=vssp95jliss0lpr768ec9spbd8%40group.calendar.google.com&ctz=Europe/Paris">Ook op Google Calendar</a>.
Geen, maar wel op de hoogte blijven van onze activiteiten?
Zet jezelf op de geinteresseerden e-mail lijst:</p>
<p><?php echo interested_form(); ?></p>
<ul id="fullagenda">
	<?php foreach($cfg['agenda'] as $item) { ?>
	<li><a name="<?php echo $item['key']; ?>"></a>
	<div class="date"><?php echo $item[2]; ?></div>
	<div class="name"><?php echo $item[3]; ?></div>
	<div class="desc"><?php echo $item[4]; ?></div></li>
	<?php } ?>
</ul>
<?php default_footer(); ?>
