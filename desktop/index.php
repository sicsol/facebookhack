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
		
		<div class="container">
			
			<img src="https://graph.facebook.com/<?= $fbid; ?>/picture">
			<strong><?= $fullname; ?></strong>
			
			<form action="index.php" method="post">
				
				<div class="row">
					Charity <select name="charity">
						<option value="0" <? if($_POST['charity'] == "" || $_POST['charity'] == 0 ) echo 'selected="selected"'; ?>>Select a Charity</option>
						<?
							$i = 0;
							while( $i < mysql_num_rows($query) )
							{
								echo '<option value="'.mysql_result($query, $i, "id").'"';
								if( $_POST['charity'] == mysql_result($query,$i,"id") ) {
									echo ' selected="selected"';
								}
								echo '>'.mysql_result($query, $i, "name").'</option>';
								$i++;
							}
						?>
					</select>
					<? if( isset($charityErr) ) : ?>
					<div class="error"><?= $charityErr; ?></div>
					<? endif; ?>
				</div>

				<div class="row">
					<label>Goal</label>
					<input type="text" name="goal" value="<?= $_POST['goal']; ?>">
					<? if( isset($goalErr) ) : ?>
					<div class="error"><?= $goalErr; ?></div>
					<? endif; ?>
				</div>

				<div class="row">
					<label>About</label>
					<textarea name="about" rows="3" cols="40"><?= $_POST['about']; ?></textarea>
					<? if( isset($aboutErr) ) : ?>
					<div class="error"><?= $aboutErr; ?></div>
					<? endif; ?>
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