<?php set_title('Sponsoren');
	include_stylesheet('sponsoren');
	default_header(); ?>
Karpe Noktem zou niet kunnen bestaan zonder de steun van onze sponsoren:

<table id="sponsoren">
	<tr class="images">
		<td>
			<a href="http://www.dressmeclothing.nl/" target="_blank">
				<img src="<?php echo curi('img/dressme.png'); ?>" width="250px">
			</a>
		</td>
		<td>
			<a href="http://www.ru.nl/snuf/" target="_blank">
        <img src="<?= curi('img/snuf.gif') ?>" />
			</a>
		</td>
	</tr>
	<tr class="links">
		<td>
			<a href="http://www.dressmeclothing.nl/" target="_blank">
				<div>DressMe Clothing</div>
			</a>
		</td>
		<td>
			<a href="http://www.ru.nl/snuf/" target="_blank">
				<div>Stichting Nijmeegs Universiteitsfonds</div>
			</a>
		</td>
	</tr>
</table>

<?php default_footer(); ?>
