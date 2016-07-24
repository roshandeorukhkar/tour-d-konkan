<?php
	echo realpath(dirname(dirname(__FILE__)));
include_once($_SERVER['DOCUMENT_ROOT'] . '/includefiles.php');

//print_r($_REQUEST);

$smarty->assign('moduleName', 'Events');
$smarty->display(TEMPLATEDIR . '/modules/events/event-details.tpl');
?>