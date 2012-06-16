		<div id="fb-root"></div>
		<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '244733612303557', // App ID
		      status     : true, // check login status
		      cookie     : true, // enable cookies to allow the server to access the session
		      xfbml      : true  // parse XFBML
		    });

    		// Additional initialization code here
		  };
		  // Load the SDK Asynchronously
		  (function(d){
		     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement('script'); js.id = id; js.async = true;
		     js.src = "//connect.facebook.net/en_US/all.js";
		     ref.parentNode.insertBefore(js, ref);
		   }(document));
		</script>
		<header>
			
			<div class="logo">
				<img src="assets/images/logo.jpg">
			</div>
			<div class="title">
				<div class="user">Peter, welcome to Gvr</div>
				<div class="slogan">Make your charity social! Promote, Raise, Post!</div>
			</div>			
		</header>
