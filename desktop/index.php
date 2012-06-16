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
	) $error++;
	
	if( 
		empty($_POST['goal']) || 
		$_POST['goal'] == "" || 
		$_POST['goal']  == NULL 
	) $error++;
	
	if( empty(
		$_POST['date']) || 
		$_POST['date'] == "" || 
		$_POST['date']  == NULL 
	) $error++;
	
	if( $error > 0 ) echo "error";
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
		
		<div class="container">
			
			<img src="https://graph.facebook.com/<?= $fbid; ?>/picture">
			<strong><?= $fullname; ?></strong>
			
			<form action="index.php" method="post">
				
				<div class="row">
					Charity <select name="charity">
						<option value="0">Select a Charity</option>
						<?
							$i = 0;
							while( $i < mysql_num_rows($query) )
							{
								echo '<option value="'.mysql_result($query, $i, "id").'">'.mysql_result($query, $i, "name").'</option>';
								$i++;
							}
						?>
					</select>
				</div>

				<div class="row">
					<label>Goal</label>
					<input type="text" name="goal">
				</div>

				<div class="row">
					<label>End Date</label>
					<input type="text" name="date">
				</div>

				<button type="submit">Save</button>
				
			</form>
		</div>
		
		<? else : ?>
		
		not logged in
		
		<? endif; ?>
		
		<? include('includes/footer.php'); ?>

	</body>
</html>