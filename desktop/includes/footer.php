		<footer>
			footer
		</footer>
	
	<script type="text/javascript">
	var fbid = <?= $fbid ?>;
	var name = '<?= $fullname ?>';
	var about = 'blahblahblah';
	var event = 'Event Name';
	var url =  'http://giver.am-dv.com/desktop/cause.php?userid='+fbid;
	function push_donation_to_facebook () {
		$.post(
			'https://graph.facebook.com/me/giver_fb:fundraise?access_token='+ FB._authResponse.accessToken,
			{ 
				cause: url,
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
			actions: [{ name: 'Pledge Now', link: url }],
		});
	}		
	</script>