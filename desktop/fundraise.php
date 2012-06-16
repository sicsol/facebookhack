<?
include('includes/db.php');
$query = mysql_query("SELECT * FROM causes ORDER BY name");
?>

<!DOCTYPE html>
<html>
	<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# giver_fb: http://ogp.me/ns/fb/giver_fb#">
		<meta property="fb:app_id" content="244733612303557" /> 
		<meta property="og:type"   content="giver_fb:friend" /> 
		<meta property="og:url"    content="http://hack.am-dv.com/desktop/fundraise.php?user=4" /> 
		<meta property="og:title"  content="Sample Friend" /> 
		<meta property="og:image"  content="https://s-static.ak.fbcdn.net/images/devsite/attachment_blank.png" /> 
		<meta property="giver_fb:cause" content="http://hack.am-dv.com/desktop/cause.php"/>
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