<?php
/**********************************************************************
 *Contains all the basic Configuration
 *dbHost = Host of your MySQL DataBase Server... Usually it is localhost
 *dbUser = Username of your DataBase
 *dbPass = Password of your DataBase
 *dbName = Name of your DataBase
 **********************************************************************/
 



//error_reporting(0);


error_reporting(E_ALL);

/*
$dbHost = "localhost";
$dbUser = "rajeshj2016";
$dbPass = "!QAZxsw2";
$dbname = "green_kokan"; 
*/
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbname = "green_kokan"; 

$dbC = @mysql_connect("$dbHost", "$dbUser", "$dbPass") or DIE('Connection to host is failed, perhaps the service is down!');
// Select the database
mysql_select_db($dbname , $dbC) or DIE('Database name is not available!');


date_default_timezone_set('Asia/Kolkata');
?>