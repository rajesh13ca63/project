
$(document).ready(function() {

    var nameReg = /^[A-Za-z]+$/;
    var numberReg =  /^[0-9]+$/;
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var c=0;

	$('#submit').click(function() {
		var username = $('#username').val();
		var password = $('#password').val();
		var error = "";

		if(username == "") {
             c++;
			 error = 'Please type Username \n';
			 $('#dis1').text(error);
		}else if (!nameReg.test(username)) {
			c++;
            error +=' Please type Letters only \n';

        }

		if(password == "") {
			c++;
			error +=' Please type Password \n';
			$('#dis1').text(error);
		}

		if (error != "") {
			//alert(error);

			return false;

		} else if (c == 0) {

			$.ajax({
                method: "POST",
                url: "var/www/phpproject/assignment/validate_login.php",
                dataType: 'json',
               // cache: false,
                data: {
                    username: username, 
                    password: password, 
                },
                success: function( response ) {
                	   //return false;
                    if (response.login == "correct") {
                        window.location.replace("home.php");
                         
                    }else if (response.active) {  
                    $('#dis1').text(response.active);

                    }else if (response.invalid) {
                    $('#dis1').text(response.invalid);
                     
                    }
                },
                error: function(response) {
                	
                }
            });


		}
      
	});
});


        