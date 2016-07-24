<?php 
session_start();

//ob_start();
//$application = "dev";
$application = "prod";

//ini_set("dispaly_errors", "1");
error_reporting(E_ALL);



if($application == "dev") {
	define("HST", "localhost");
	define("USR", "root");
	define("PWD", "");
	define("DBN", "green_kokan");
	define("DBTYPE", "mysql");
	define('SITE_URL','http://localhost:81/tour-d-konkan/');
	define('DOC_ROOT','H:/My Programming Stuff/PHP Programming/htdocs/tour-d-konkan');
	define('DOC_ROOT_COMMON','H:/My Programming Stuff/PHP Programming/htdocs/tour-d-konkan/common/');

	define("EXACT_ROOT", realpath(dirname(dirname(__FILE__))));
	define('TEMPLATEDIR',DOC_ROOT.'/default/templates/');
	
	define('SITE_URL_COMMON','http://localhost:81/tour-d-konkan/common');
	define("COMMON_JS_PATH", SITE_URL_COMMON."/js");

	define('DOC_FOLDER' , 'tour-d-konkan/');
	
} else {
	define("HST", "localhost");
	define("USR", "roshand");
	define("PWD", "Test@123");
	define("DBN", "konkan"); 
	define("DBTYPE", "mysql");
	define("EXACT_ROOT", realpath(dirname(dirname(__FILE__))));

	define('SITE_URL','http://www.tourdekonkan.com/');
	define('DOC_ROOT','/home/seaangle/public_html/');
	define('DOC_ROOT_COMMON','/home/seaangle/public_html/common');
	
	define('BASEFOLDER', '/home/seaangle/public_html/');
	
	define('SITE_URL_COMMON','http://www.tourdekonkan.com/common');


	define('TEMPLATEDIR',DOC_ROOT.'/default/templates/');
	define("COMMON_JS_PATH", SITE_URL_COMMON."/js");
	define('DOC_FOLDER' , '');
}
	## Set time zone
	date_default_timezone_set('Asia/Calcutta');
	/*********** Creating Object of Smarty ***********/

	require(DOC_ROOT . '/default/source/common/third-party/smarty-3.1.29/libs/Smarty.class.php');

	$smarty = new Smarty;
	$smarty->setTemplateDir(DOC_ROOT . "/default/templates")
		   ->setCompileDir(DOC_ROOT . '/templates_c');
	//$smarty->force_compile = true;
	/*********** End of Creating Object of Smarty ***********/
	
	## Assign site url to smarty variable
	$smarty->assign("siteroot", SITE_URL);
	$smarty->assign("version", round(microtime(true) * 1000));
	
	
	## Below file contains all the tables of the project
	include_once(DOC_ROOT.'/common/includes/tbl-names.php');
	
	## Below file contains all the contstant which we used in this project
	include_once(DOC_ROOT.'/common/includes/constants.php');
	
	## Assign site title to smarty variable
	$smarty->assign("sitetitle", TITLE);

	## JS files path for local and server in smarty variable
	$smarty->assign("common_js_path", COMMON_JS_PATH);
?>
