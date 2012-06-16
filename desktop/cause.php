<?php
if (!preg_match('#facebook#', $_SERVER['HTTP_USER_AGENT'])){
	header('location: http://giver.am-dv.com/desktop/fundraise.php');
}
?>

<!DOCTYPE html>
<html>
	<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# giver_fb: http://ogp.me/ns/fb/giver_fb#">
	  <meta property="fb:app_id" content="244733612303557" /> 
	  <meta property="og:type"   content="giver_fb:cause" /> 
	  <meta property="og:url"    content="http://giver.am-dv.com/desktop/cause.php" /> 
	  <meta property="og:title"  content="Canadian Red Cross" /> 
	  <meta property="og:image"  content="http://www.redcross.ca/crc2008/images/logo.gif" />
	</head>
	<body>
	
	</body>
</html>