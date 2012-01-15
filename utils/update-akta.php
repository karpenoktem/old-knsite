#!/usr/bin/env php
<?php
	chdir(dirname(__FILE__));

	$pdf_dir = "/groups/leden/site-archief/";
	$previews_dir = '../img/akta-previews/';

	if(!is_dir($pdf_dir)) {
		$pdf_dir = '/mnt/phassa/'. $pdf_dir;
	}
	if(!is_dir($pdf_dir)) {
		fwrite(STDERR, "Directory ". $pdf_dir ." not found\n");
		exit(1);
	}

	$aktas = array();

	foreach(scandir($pdf_dir) as $de) {
		if(preg_match('/^akta(\d+).pdf$/', $de, $m)) {
			$preview = $previews_dir . 'akta'. $m[1] .'.png';
			if(!file_exists($preview) || filemtime($pdf_dir . $de) > filemtime($preview)) {
				passthru("convert -resize 150x ". escapeshellarg($pdf_dir . $de .'[0]') .' '. escapeshellarg($preview));
			}
			$aktas[] = $m[1];
		}
	}

	rsort($aktas);

	$out = "<?php\n";
	$out .= "	set_title('Akta Nokturna');\n";
	$out .= "	include_stylesheet('an');\n";
	$out .= "	default_header();\n";
	$out .= "?>\n";
	$out .= "	<p>Hier kun je alle edities van de Akta Nokturna, ons verenigingsblad, downloaden.</p>\n";
	$out .= "	<table id=\"akta\">\n";
	foreach(array_chunk($aktas, 4) as $row) {
		$out .= "		<tr>\n";
		foreach($row as $akta) {
			$out .= "			<td>\n";
			$out .= "				<a href=\"<?php echo curi('archief/akta". $akta .".pdf'); ?>\"><img src=\"<?php echo curi('img/akta-previews/akta". $akta .".png'); ?>\"><div class=\"aktaname\">Akta ". $akta ."</div></a>\n";
			$out .= "			</td>\n";
		}
		$out .= "		</tr>\n";
	}
	$out .= "	</table>\n";
	$out .= "<?php default_footer(); ?>\n";

	echo $out;
?>
