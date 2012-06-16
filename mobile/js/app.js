 function handleReponseChange(response) {
   document.body.className = response.authResponse ? 'connected' : 'not_connected';

   if (response.authResponse) {
     console.log(response);
   }
   
 }

$(document).ready(function() {

	$('#connect').bind('click', function(e) {
		e.preventDefault();
		FB.login(function(response) {
	 		console.log(response); 
	 	}, 
	 		{scope:'publish_actions'});     
	});
		
});
