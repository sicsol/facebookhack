<?php

session_start();

$DB_SERVER = 'localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = 'root';
$db = mysql_connect($DB_SERVER , $DB_USERNAME, $DB_PASSWORD);
mysql_select_db('hackto');

//session_destroy();

$_SESSION['fbid'] = 28106434;

$fbuser = mysql_query("select * from fundraisers where fbid=".mysql_escape_string($_SESSION['fbid']));

// Setup Global facebook user info
$fbid 		= mysql_result($fbuser, 0, "fbid");
$firstname 	= mysql_result($fbuser, 0, "first_name");
$lastname 	= mysql_result($fbuser, 0, "last_name");
$fullname	= mysql_result($fbuser, 0, "first_name") . ' ' . mysql_result($fbuser, 0, "last_name");

?>