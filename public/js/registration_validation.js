	$(document).ready(function() {
	  //username existing checking 
	   $("#username").keyup(function() {
	        $('#user_exist').hide();
	        var username = $('#username').val();
	        $.ajax({
	                method: "POST",
	                url: "registration_useremail_validation.php",
	                dataType: 'json',

	                data: {
	                       username: username
	                },
	                success: function(msg) {
	                    if (msg.status == '1') {
	                        $('#user_exist').show();
	                        $('#user_exist').text("Username Already Exist !").css("color","red");
	                    }
	                }
	        });
	   });

	$("#email").keyup(function() {
	        $('#email_exist').hide();
	        $('#email_format').hide();
	        var email = $('#email').val();
	        if(email.match( /^([a-zA-Z0-9.])+@([a-zA-Z0-9-])+[.]([a-zA-Z0-9]{2,4})+$/)) {
	            $.ajax({
	                    method: "POST",
	                    url: "registration_useremail_validation.php",
	                    dataType: 'json',

	                    data: {
	                           email: email
	                    },
	                    success: function(msg) {
	                        if(msg.status == '1') {
	                            $('#email_exist').show();
	                            $('#email_exist').text("Email Id Already Exist !").css("color","red");
	                        }
	                    }
	            });

	        }else {
	            $('#email_format').show();
	            
	            $('#email_format').text("Write in abc@xyz.com format.").css("color","red");
	        }
	});

   //after clicking the button this function will work
	$('#submit').click(function() {

		var nameReg = /^[A-Za-z]+$/;
        var numberReg =  /^[0-9]+$/;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

		var username = $('#username').val();
		var password = $('#password').val();
		var repassword = $('#repassword').val();
		var firstname = $('#firstname').val();
		var midname = $('#midname').val();
		var lastname = $('#lastname').val();
		var dob = $('#dob').val();
		var sex = $('#sex').val();
		var marital = $('#marital').val();
    
		var street = $('#street').val();
		var city = $('#city').val();
		var state = $('#state').val();
		var zip = $('#zip').val();
		var phone = $('#phone').val();
		var email = $('#email').val();

		var offstreet = $('#offstreet').val();
		var offcity = $('#offcity').val();
		var offstate = $('#offstate').val();
		var offzip = $('#offzip').val();
		var offphone = $('#offphone').val();
		var offemail = $('#offemail').val();
		var image = $('#fileChooser').val();

		// declaring some variables
		var cnterror=0;
    
  	    if(username == "") {
			$('#user').text("Please type Username");
		 	 cnterror++;
		}else if (!nameReg.test(username)) {
			$('#user').text("");
            $('#user').test("Please type alphabets only");
            cnterror++;
        }

	    if(password == "") {
			$('#pass').text("Please type Password");
			cnterror++;
		}

		if (repassword == "") {
			$('#repass').text("Please type Repassword");
			cnterror++;
		}

		if(firstname == "") {
			$('#fname').text("Please type firstname");
			cnterror++;

		}else if (!nameReg.test(firstname)) {
			$('#fname').text("");
            $('#fname').text("Please type alphabets only");
            cnterror++;
        }

		if(lastname == "") {
			$('#lname').text("Please type lastname");
			cnterror++;
		   
		}else if (!nameReg.test(lastname)) {
			$('#lname').text("");
            $('#lname').text("Please type alphabets only");
             cnterror++;
        }

	    if(midname == ""){
	        
	    }else if (!nameReg.test(midname)) {
	            $('#mname').text("Please type alphabets only");
	             cnterror++;
	    }
       
		if(sex == "") {
			$('#sex').text("Please check the gender");
			
		}
     
        if(marital == "") {
			$('#mar').text("Please check the marital status");
			 cnterror++;
		}

		if(dob == ""){
			$('#db').text("Please selct date of birth");
			 cnterror++;
		}
       //jquery validation for residence address
        if(street == "") {
			$('#st').text("Please write street");
			 cnterror++;
		}

		if(city == "") {
			$('#cty').text("Please write city");
			 cnterror++;
		}

		if(state == "") {
			$('#stat').text("Please write state");
			 cnterror++;
		}

		if(zip == "") {
			$('#zp').text("Please enter zip code");
			 cnterror++;
		}

		if (phone == "") {
			$('#ph').text("Please enter contact no");
			
		}else if ((phone.length < 10) || (phone.length >10) || (!numberReg.test(phone))) {
			$('#ph').text("Please enter a valid phone number");
			
        }

		if (email == "") {
			$('#email_exist').text("Please enter emailid");
			 cnterror++;
		}else if (!emailReg.test(email) || email == '') {
               alert('Please enter a valid email address.');
               cnterror++;
        }

	    //jquery validation for office address
	    if(offstreet == "") {
			$('#st1').text("Please write street");
		    cnterror++;	
		}

		if(offcity == "") {
			$('#cty1').text("Please write city");
			cnterror++;
		}
		if(offstate == "") {
			$('#stat1').text("Please write state");
			cnterror++;
		}
		if(offzip == "") {
			$('#zp1').text("Please enter zip code");
			cnterror++;
		}

		if(offphone == "") {
			$('#ph1').text("Please enter contact no");
			cnterror++;
		}

		if(offemail == "") {
			$('#eml1').text("Please enter emailid");
			cnterror++;
		}else if (!emailReg.test(offemail) || offemail == '') {
           $('#eml1').text("Please enter a valid email address");
           cnterror++;
        }

	    //jquery validation for image 
	    if (image == "") {
	        $('#im').text("select an image ");
	        cnterror++;
	    }else {    	
	    	   var length = image.length;
	    	   var last = image.lastIndexOf(".");
	    	   var imageFileType = image.substring(last+1, length);
	    	   if (imageFileType != "jpg" && imageFileType != "png" && imageFileType != "jpeg" && imageFileType != "gif" ) {
	    		   $('#im').text("Sorry, only JPG, JPEG, PNG & GIF files are allowed");
	    		   cnterror++;
	    		}

        }
        //password matching equal or not
        if (password != repassword) {
	    	alert('password does not match');
	    	cnterror++;
	    }
	    
	    //Checking condition if no any errors found then it returns true
	    
	    if( cnterror==0) {
	    	console.log("test_true");
	       return true;
	    } else{
	    	console.log("test_false");
           return false;
        }
 		
    });
});

