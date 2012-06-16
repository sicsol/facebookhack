<!DOCTYPE html>
<html>
	<head>
		<? include('includes/title.php'); ?>
	</head>
	<body>
		
		<? include('includes/header.php'); ?>
		
		<div class="container">
						

		</div>
		
		<? include('includes/footer.php'); ?>

	<script type="text/javascript">
	var fbid = 4;
	var name = 'Andrew Munro';
	var about = 'blahblahblah';
	var event = 'Event Name';
	var url =  'https://apps.facebook.com/giver_fb/fundraise.html?userid='+fbid;
	function push_donation_to_facebook () {
		$.post(
			'https://graph.facebook.com/me/giver_fb:fundraise?access_token='+ FB._authResponse.accessToken,
			{ 
				friend: url,
				ref: 'fb_action' 
			}, 
			function(response) {} //Success
		)
	}
	function sendRequestViaMultiFriendSelector() {
		FB.ui({method: 'apprequests',
			message: (name +' is raising money for the '+ about +' and would really appreciate your support!'),
		});
	} 	
	function publishStory() {
		FB.ui({
			method: 'feed',
			name: 'Help support '+ name +'!',
			description: about,
			link: url,
			picture: 'http://solutions.artez.com/facebook/new/image_proxy.php?id=561985113',
			actions: [{ name: 'Pledge Now', link: url }],
		});
	}
	</script>

	</body>
</html>