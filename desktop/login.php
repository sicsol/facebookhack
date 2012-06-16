<?
include('includes/db.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<? include('includes/title.php'); ?>
	</head>
	<body>
		
		<? include('includes/header.php'); ?>
		
		<? if( !isset($_SESSION['fbid']) && is_numeric($_SESSION['fbid']) ) : ?>
		
		<div class="container">
			
			<fb:login-button></fb:login-button>
			
		</div>
		
		<? endif; ?>
		<? include('includes/footer.php'); ?>

	</body>
</html>