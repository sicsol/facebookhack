<?
include("Mobile_Detect.php");
$detect = new Mobile_Detect();

if ($detect->isMobile()) {
	header("Location: mobile/");
} else {
	header("Location: desktop/");
}

?>