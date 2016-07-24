<?php
include_once('includefiles.php');

$smarty->assign('siteTitle', 'Tour de konkan');
$smarty->assign('siteName', 'tour-de-konkan');

$smarty->display(TEMPLATEDIR . '/index.tpl');
?>