<?
include('includes/db.php');

$query = mysql_query("SELECT * FROM causes ORDER BY name");

// Check for incoming charity post
if( isset($_POST['charity']) ) {
	// check required
	$error = 0;
	
	if( empty(
		$_POST['charity']) || 
		$_POST['charity'] == "" || 
		$_POST['charity']  == NULL || 
		!is_numeric($_POST['charity']) || 
		$_POST['charity'] == 0 
	) {
		 $charityErr = "Please select a charity";
		 $error++;
	}
	
	if( 
		empty($_POST['goal']) || 
		$_POST['goal'] == "" || 
		$_POST['goal']  == NULL 
	) {
		 $goalErr = "Please enter your goal amount";
		 $error++;
	}
	
	if( empty(
		$_POST['about']) || 
		$_POST['about'] == "" || 
		$_POST['about']  == NULL 
	) {
		 $aboutErr = "Please enter about text";
		 $error++;
	}
	
	if( $error == 0 ) {
		
		$charity 	= mysql_escape_string($_POST['charity']);
		$goal		= mysql_escape_string( str_replace(",", "", $_POST['goal'] ));
		$about		= mysql_escape_string($_POST['about']);
		
		mysql_query(
			"INSERT INTO fundraisers 
			( fbid, first_name, last_name, email, event, goal, about) 
			VALUES 
			( '".$fbid."', '".$firstname."', '".$lastname."', '".$email."', '".$charity."', '".$goal."', '".$about."' )"
		);
		
		$id = mysql_insert_id();
		
		if( empty($id) ) {
			echo mysql_error(); exit;
		} else {
			header("Location: fundraise.php?id=".$id);
		}
		
	}
	
}

?>
<!DOCTYPE html>
<html>
	<head>
		<? include('includes/title.php'); ?>
	</head>
	<body>
		
		<? include('includes/header.php'); ?>
		
		<? if( isset($_SESSION['fbid']) && is_numeric($_SESSION['fbid']) ) : ?>
		
		<? include('dashboard.php'); ?>
		
		<? else : ?>
		
		<? include('login.php'); ?>
		
		<? endif; ?>
		
		<? include('includes/footer.php'); ?>

	</body>
</html>