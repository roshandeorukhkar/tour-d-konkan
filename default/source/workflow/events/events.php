<?php
	
	//echo realpath(dirname('../../../../../')); die;
include_once(realpath(dirname('../../../../../')) . '/includefiles.php');

//print_r($_REQUEST);

$smarty->assign('moduleName', 'Events');
$smarty->display(TEMPLATEDIR . '/modules/events/events.tpl');
?>