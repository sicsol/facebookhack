<?php
session_start();

$DB_SERVER = 'internal-db.s121501.gridserver.com';
$DB_USERNAME = 'db121501_hack';
$DB_PASSWORD = '11111111';
$db = mysql_connect($DB_SERVER , $DB_USERNAME, $DB_PASSWORD);
mysql_select_db('db121501_hackto');

/*
$DB_SERVER = 'localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = 'root';
$db = mysql_connect($DB_SERVER , $DB_USERNAME, $DB_PASSWORD);
mysql_select_db('hackto');
*/
//session_destroy();


include('fb-sdk/facebook.php');


$facebook = new Facebook(array(
  'appId'  => '244733612303557',
  'secret' => 'b72846f9e462787d3a0273a41c785007',
));

// Get User ID
$user = $facebook->getUser();
if ($user) {
	$_SESSION['fbid'] = $user;

	$fbuser = mysql_query("select * from fundraisers where fbid=".mysql_escape_string($_SESSION['fbid']));
	// Setup Global facebook user info
	$fbid 		= mysql_result($fbuser, 0, "fbid");
	$firstname 	= mysql_result($fbuser, 0, "first_name");
	$lastname 	= mysql_result($fbuser, 0, "last_name");
	$fullname	= mysql_result($fbuser, 0, "first_name") . ' ' . mysql_result($fbuser, 0, "last_name");
	
}
?>
