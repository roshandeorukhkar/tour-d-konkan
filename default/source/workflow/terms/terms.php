<?php
include_once('../../common/internal/inner-header.php');
$smarty->assign('siteTitle', 'Konkan tour');
$smarty->assign('siteName', 'kokan');
$smarty->assign('moduleName', 'terms');
$smarty->display('modules/terms/terms.tpl');
?>