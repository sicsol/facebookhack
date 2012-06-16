<?
include('includes/config.php');
$query = mysql_query("SELECT * FROM causes ORDER BY name");
?>
<!DOCTYPE html>
<html>
	<head>
		<? include('includes/title.php'); ?>
	</head>
	<body>
		
		<? include('includes/header.php'); ?>
		
		<div class="container">
			<img src="http://placehold.it/50x50">
			<strong>Facebook Name</strong>
			
			<form action="" method="post">
				
				<div class="row">
					Charity <select name="">
						<option value="">Select a Charity</option>
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
		
		<? include('includes/footer.php'); ?>

	</body>
</html>