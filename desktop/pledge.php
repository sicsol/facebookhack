<?
include('includes/db.php');

if( isset($_GET['id']) ) {
	$pledgeID = $_GET['id'];
} else if ( isset($_POST['id']) ) {
	$pledgeID = $_POST['id'];
} else {
	$pledgeID = 0;
}

$query = mysql_query("SELECT * FROM causes ORDER BY name");
$result = mysql_query("SELECT * FROM requests WHERE request_id='".mysql_escape_string($pledgeID)."'");

// If the ID isn't found show a 404 error
if( mysql_num_rows($result) == 0 ) {
	echo "404 Not Found";
	exit;
} else {

	$fundraiser = mysql_query("SELECT * FROM fundraisers WHERE id='".mysql_result($result, 0, 'fundraiser')."'");

	// Get charity info	
	$charity = mysql_query("SELECT * FROM causes WHERE id='".mysql_result($fundraiser, 0,'event')."'");
	
}

if( isset($_POST['pledge']) ) {
	
	if( 
		$_POST['pledge'] != "" &&  
		$_POST['pledge'] != "0" &&  
		$_POST['pledge'] != NULL  
	) {
		mysql_query("
			INSERT INTO pledges 
			( fundraiser, friend, amount, date ) 
			VALUES 
			( '".mysql_result($result, 0, 'fundraiser')."', '".mysql_result($result, 0, 'friendid')."', '".mysql_escape_string($_POST['pledge'])."', '".time()."' )
		");
		
		header('Location: fundraise.php?id='.mysql_result($result, 0, 'fundraiser'));
	} else {
		$pledgeErr = "Enter an amount to pledge for this cause";
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
		
		<div class="container">
			<article>
				<img src="<?= mysql_result($charity, 0, "image"); ?>">
				<h1><?= mysql_result($charity, 0, "name"); ?></h1>
				
				<a href="<?= mysql_result($charity, 0, "url"); ?>" target="_blank"><?= mysql_result($charity, 0, "url"); ?></a>
			</article>

			<article>
				<img src="https://graph.facebook.com/<?= $fbid; ?>/picture">
				<strong><?= $fullname; ?></strong>
				<p><?= mysql_result($fundraiser, 0, 'about'); ?></p>
			</article>			

			<article>
				<img src="https://graph.facebook.com/<?= mysql_result($result,0,'friendid'); ?>/picture">
				<?
						$facebookUrl = "https://graph.facebook.com/".mysql_result($result,0,'friendid');
						$str = file_get_contents($facebookUrl);
						$result = json_decode($str);
				?>
				<h2><?= $result->first_name . " " . $result->last_name; ?></h2>
			</article>			
			
			<form action="pledge.php" method="post">
				<input type="hidden" name="id" value="<?= $pledgeID; ?>">
				<label>Pledge Amount</label>
				<input type="text" name="pledge" value="<?= $_POST['pledge'] ?>">
				<? if( isset($pledgeErr) ): ?>
				<div class="error"><?= $pledgeErr; ?></div>
				<? endif; ?>
				
				<button type="submit">Pledge</button>
			</form>
		</div>
		
		<? include('includes/footer.php'); ?>

	</body>
</html>