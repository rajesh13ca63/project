$(document).ready(function() {
	
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
		var user = "";
		var pass = repass=fname=lname=mname="";
		var error="";
		var cnterror=0;

   		if(username == "") {
			$('#user').text("Please type Username");
			 cnterror++;
		}else if (!nameReg.test(username)) {
			$('#user').text("");
            $('#user').test("Please type alphabets only");
            error="Please type alphabets only";
           cnterror++;
        }

		if(password == "") {
			$('#pass').text("Please type Password");
			//return false;
			cnterror++;
		}

		if (repassword == "") {
			$('#repass').text("Please type Repassword");
			//return false;
			cnterror++;
		}

		if(firstname == "") {
			$('#fname').text("Please type firstname");
			cnterror++;
			//return false;
		}else if (!nameReg.test(firstname)) {
			$('#fname').text("");
            $('#fname').text("Please type alphabets only");
           cnterror++;
            //return false;
        }

		if(lastname == "") {
			$('#lname').text("Please type lastname");
		    cnterror++;
			//return false;
		}else if (!nameReg.test(lastname)) {
			$('#lname').text("");
            $('#lname').text("Please type alphabets only");
            cnterror++;
            //return false;
        }
        if(midname == "")
        {}
        else if (!nameReg.test(midname)) {
            $('#mname').text("Please type alphabets only");
            cnterror++;
            //return false;
        }
       
		// if(sex == "") {
		// 	$('#sex').text("Please check the gender");
			
		// }
     
    if(marital == "") {
			$('#mar').text("Please check the marital status");
			return false;
		}
		if(dob == ""){
			$('#db').text("Please selct date of birth");
		}

		
    //jquery validation for residence address
        if(street == "") {
			$('#st').text("Please write street");
			cnterror++;
			//return false;
		}

		if(city == "") {
			$('#cty').text("Please write city");
			cnterror++;
			//return false;
		}
		if(state == "") {
			$('#stat').text("Please write state");
			cnterror++;
			//return false;
		}
		if(zip == "") {
			$('#zp').text("Please enter zip code");
			cnterror++;
			//return false;
		}

		if (phone == "") {
			$('#ph').text("Please enter contact no");
			cnterror++;
			//return false;
		}else if ((phone.length < 10) || (phone.length >10) || (!numberReg.test(phone))) {
			$('#ph').text("Please enter a valid phone number");
			cnterror++;
            }

		if (email == "") {
			$('#eml').text("Please enter emailid");
			cnterror++;
			//return false;
		}else if (!emailReg.test(email) || email == '') {
           alert('Please enter a valid email address.');
           cnterror++;
           //return false;
        }

    //jquery validation for office address
    if(offstreet == "") {
			$('#st1').text("Please write street");
			cnterror++;
		}

		if(offcity == "") {
			$('#cty1').text("Please write city");
			cnterror++;
			//return false;
		}
		if(offstate == "") {
			$('#stat1').text("Please write state");
			cnterror++;
			//return false;
		}
		if(offzip == "") {
			$('#zp1').text("Please enter zip code");
			cnterror++;
			//return false;
		}

		if(offphone == "") {
			$('#ph1').text("Please enter contact no");
			cnterror++;
			//return false;
		}

		if(offemail == "") {
			$('#eml1').text("Please enter emailid");
			cnterror++;
			 //return false;
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
	    	//return false;
	    }
      console.log(cnterror);
		if (cnterror != 0) {
			return false;
		} else {
				console.log('All good');
           	    $.ajax({
                method: "POST",
                url: "validate_registration.php",
                dataType: 'json',
                //cache: false,
                data: {
                    user_name: username, 
                    pass_word: password, 
                    repass_word:repassword,
                    first_name:firstname,
                    mid_name:midname,
                    last_name:lastname,
                    dob:dob,
                    gender:sex,
                    marital:marital,
                    street:street,
                    city:city,
                    state:state,
                    zip:zip,
                    phone:phone,
                    email:email,
                    off_street:offstreet,
                    off_city:offcity,
                    off_state:offstate,
                    off_zip:offzip,
                    off_phone:offphone,
                    off_email:offemail,
                    image:image,
                    

                },
                success: function( response ) {
                	   
                    // 	window.location.replace("registration_insert.php");
                    
                    if (response.username) {
                       $('#user').text(response.username);
                       }else if(response.password) {
                       $('#pass').text(response.password);	
                    }
                    if(response.repassword) {
                       $('#repass').text(response.repassword);	
                    }
                    if(response.firstname) {
                       $('#fname').text(response.firstname);	
                    }
                    if(response.lastname) {
                       $('#lname').text(response.lastname);	
                    }
                    if(response.midname) {
                       $('#mname').text(response.midname);	
                    }
                    if(response.sex) {
                       $('#sex').text(response.sex);	
                    }
                    if(response.marital) {
                       $('#mar').text(response.marital);	
                    }
            //Residence address information errors shows
                    if(response.street) {
                       $('#st').text(response.street);	
                    }
                    if(response.city) {
                       $('#cty').text(response.city);	
                    }
                    if(response.state) {
                       $('#stat').text(response.state);	
                    }
                    if(response.zip) {
                       $('#zp').text(response.zip);	
                    }
                    if(response.phone) {
                       $('#ph').text(response.phone);	
                    }
                    if(response.email) {
                       $('#eml').text(response.email);	
                    }

            //Office Address errosr showing on the screen 
                    if(response.offstreet) {
                       $('#st1').text(response.offstreet);	
                    }
                    if(response.offcity) {
                       $('#cty1').text(response.offcity);	
                    }
                    if(response.offstate) {
                       $('#stat1').text(response.offstate);	
                    }
                    if(response.offzip) {
                       $('#zp1').text(response.offzip);	
                    }
                    if(response.offphone) {
                       $('#ph1').text(response.offphone);	
                    }
                    if(response.offemail) {
                       $('#eml1').text(response.offemail);	
                    }
                    if(response.image) {
                    	$('#im').text(response.image);
                    }
                                 
                },
                 error: function(response) {
                // 	//if(response.invalid == "Invalid")
                // 	//console.log(response);
                     //alert('error');
                 }
            });

    	 }//end of else part	


	});
});

