$(document).ready(function() {
	$('#submit').click(function() {
		var username = $('#username').val();
		var password = $('#password').val();

		if(username == "") {
			$('#dis').html("<span>Please type Username</span>");
			return false;
		}

		if(password == "") {
			$('#dis').html('<span id="error">Please type Password</span>');
			return false;
		}
	});
});