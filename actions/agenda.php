<?php set_title('Agenda');
	  include_stylesheet('agenda');
	  require_once('lib/agenda.php');
	  default_header(); ?>
<div id="agendaHeader">
<?php if(is_array($cfg['agenda'])) { ?>
<ul id="shortagenda">
	<?php foreach($cfg['agenda'] as $item) { ?>
	<li><a href="#<?php echo $item['key']; ?>"
		><?php echo $item[1]; ?>: <?php echo $item[3]; ?></a></li>
	<?php } ?>
</ul>
<?php } ?>
<p><a href="http://www.google.com/calendar/embed?src=vssp95jliss0lpr768ec9spbd8%40group.calendar.google.com&ctz=Europe/Paris">Ook op Google Calendar</a>.
Geen lid, maar wel op de hoogte blijven van onze activiteiten?
Zet jezelf op de geinteresseerden e-mail lijst:</p>
<p><?php echo interested_form(); ?></p>
</div>
<?php if(is_array($cfg['agenda'])) { ?>
<ul id="fullagenda">
	<?php foreach($cfg['agenda'] as $item) { ?>
	<li><a name="<?php echo $item['key']; ?>"></a>
	<div class="date"><?php echo $item[2]; ?></div>
	<div class="name"><?php echo $item[3]; ?></div>
	<div class="desc"><?php echo $item[4]; ?></div></li>
	<?php } ?>
</ul>
<?php } else { ?>
<p>Onze agenda is momenteel stuk. Dit zou zichzelf
binnen een uur moeten oplossen. Zo niet kun je
mailen met
<?php echo email('webcie@karpenoktem.nl'); ?>.</p>
<?php } ?>
<?php default_footer(); ?>
