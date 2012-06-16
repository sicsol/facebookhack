<?
include('includes/db.php');
$query = mysql_query("SELECT * FROM causes ORDER BY name");

$result = mysql_query("SELECT * FROM fundraisers WHERE id='".mysql_escape_string($_GET['id'])."'");

// If the ID isn't found show a 404 error
if( mysql_num_rows($result) == 0 ) {
	echo "404 Not Found";
	exit;
} else {
	// Get charity info	
	$charity = mysql_query("SELECT * FROM causes WHERE id='".mysql_result($result, 0,'event')."'");
	
	// Get all pledges
	$pledges = mysql_query("SELECT * FROM pledges WHERE fundraiser='".$_GET['id']."' ORDER BY date DESC");
	
	// Get Pledge Sum
	$pledgeAmount = mysql_query("SELECT SUM(amount) as total FROM pledges WHERE fundraiser='".$_GET['id']."'");
	
}

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
				
				<img src="<?= mysql_result($charity, 0, "image"); ?>">
				<h1><?= mysql_result($charity, 0, "name"); ?></h1>
				<h2>Goal: $<?= mysql_result($result, 0, 'goal'); ?></h2>
				<h3>Raised: $<?= mysql_result($pledgeAmount, 0, 'total'); ?></h3>
				
				<a href="<?= mysql_result($charity, 0, "url"); ?>" target="_blank"><?= mysql_result($charity, 0, "url"); ?></a>
				
				<p><?= mysql_result($result, 0, 'about'); ?></p>
			</article>
			
			<div class="">
				<h3>Recent Pledges</h3>
				
				<?
					$i = 0;
					while( $i < mysql_num_rows($pledges) )
					{
						$facebookUrl = "https://graph.facebook.com/".mysql_result($pledges,$i,'friend');
						$str = file_get_contents($facebookUrl);
						$result = json_decode($str);
						 
						echo '
							<article>
								<img src="https://graph.facebook.com/'.mysql_result($pledges,$i,'friend').'/picture">
								<strong>'.$result->first_name.' '.$result->last_name.'</strong>
								<h5>Amount: $'.mysql_result($pledges, $i,'amount').'</h5>
								Pledged On: '.date('M. j, Y',mysql_result($pleges, $i,'date')).'
							</article>
						';
						
						$i++;
					}
				?>

			</div>
		</div>
		
		<? include('includes/footer.php'); ?>

	</body>
</html>