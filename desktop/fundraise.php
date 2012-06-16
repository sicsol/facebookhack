<?
include('includes/db.php');
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
			<article>
				<img src="https://graph.facebook.com/<?= $fbid; ?>/picture">
				<strong><?= $fullname; ?></strong>
				
				<h1>Charity Name</h1>
				<h2>Goal: XXXXXXX</h2>
				<h3>Raised: XXXXX</h3>
			</article>
			
			<div class="">
				<h3>Recent Pledges</h3>
				
				<article>
					<img src="http://placehold.it/25x25">
					<strong>Pledge Name</strong>
					<h5>Amount: XXXXXX</h5>
				</article>

				<article>
					<img src="http://placehold.it/25x25">
					<strong>Pledge Name</strong>
					<h5>Amount: XXXXXX</h5>
				</article>

				<article>
					<img src="http://placehold.it/25x25">
					<strong>Pledge Name</strong>
					<h5>Amount: XXXXXX</h5>
				</article>

				<article>
					<img src="http://placehold.it/25x25">
					<strong>Pledge Name</strong>
					<h5>Amount: XXXXXX</h5>
				</article>
			</div>
		</div>
		
		<? include('includes/footer.php'); ?>

	</body>
</html>