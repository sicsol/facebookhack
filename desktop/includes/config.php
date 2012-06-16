<?

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "gvr";

mysql_connect($dbhost,$dbuser,$dbpass);
@mysql_select_db($dbname) or die( "Unable to select database");

?>