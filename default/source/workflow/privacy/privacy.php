<?php
include_once('../../common/internal/inner-header.php');

$smarty->assign('siteTitle', 'Konkan tour');
$smarty->assign('siteName', 'kokan');
$smarty->assign('moduleName', 'privacy');
$smarty->display('modules/privacy/privacy.tpl');
?>