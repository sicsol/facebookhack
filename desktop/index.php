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