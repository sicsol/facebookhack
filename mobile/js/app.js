$(document).ready(function() {

	$('#connect').bind('click', function(e) {
		e.preventDefault();
		FB.login(function(response) {
			localStorage.setItem('fbuser', JSON.stringify(response));
			FB.api('/me', function(response) {
  				alert(response.name);
			});	
	 	}, 
	 		{scope:'publish_actions'});     
	});
		
});
