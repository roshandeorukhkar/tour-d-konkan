<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/green-kokan/includefiles.php');

//print_r($_REQUEST);

$smarty->assign('moduleName', 'services');
$smarty->display(TEMPLATEDIR . '/modules/services/services.tpl');
?>