<?php

require_once('config.agenda.php');

for($i = 0; $i < count($cfg['agenda']); $i++)
	$cfg['agenda'][$i]['key'] = 
		substr(md5(implode('', $cfg['agenda'][$i])), 0, 5);

?>
