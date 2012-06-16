	<div id="fb-root"></div>
	<script src="//connect.facebook.net/en_US/all.js"></script>
	<script>
	  FB.init({
	    appId      : '244733612303557',
	    status     : true, // check login status
	    cookie     : true, // enable cookies to allow the server to access the session
	    xfbml      : true  // parse XFBML
	  });
  
	FB.getLoginStatus(function(response) {
		windowLocation = new String( window.location.href );
		if (response.status === 'connected') {
			push_donation_to_facebook()

		}
		else if (response.status !== 'connected' && windowLocation.indexOf('login') == -1) {
			window.location.href = 'login.php'
    	} 
	});  
	</script>		
		
		<header>
			<img src="assets/images/logo.jpg">
		</header>
