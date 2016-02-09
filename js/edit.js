//client side validation in javascript
	function validateForm() {
	//geting all the values from the form and validate here
	var username = document.getElementById("username").value.trim();
	//var username = $('#username').val();
	var password = document.getElementById("password").value;
	var repassword = document.getElementById("repassword").value;
	var firstname = document.getElementById("firstname").value.trim();
	var lastname = document.getElementById("lastname").value.trim();
	var sex = document.getElementsByName("sex");
	var dob = document.getElementById("dob").value.trim();
	var phone = document.getElementById("phone").value.trim();
	var email = document.getElementById("email").value.trim();

	console.log(sex);

	var error_message = "";
	// validating the fields and displaying the appropriate error message
	var letters = /^[A-Za-z]+$/g;
	var check_email = /^([a-zA-Z0-9.])+@([a-zA-Z0-9-])+[.]([a-zA-Z0-9]{2,4})+$/g;  //email allows letters, numbers and periods
	var date = /^\d{4}-\d{1,2}-\d{1,2}$/g;
	
	//checking for alphabets 
	if (username == "" || username == "None" || !username.match(letters)) {  //checking for alphabets too
		error_message += "Enter username (alphabets only)\n";
	}

	if (password == "" || password == "None") {
		error_message += "Enter password\n";
	}

	if (repassword == "" || repassword == "None") {
		error_message += "Enter confirm password\n";
		}
	if (firstname == "" || firstname == "None" || !firstname.match(letters)) {  
		error_message += "Enter first name (alphabets only)\n";
	}

	 //checking for alphabets too
	if (lastname == "" || lastname == "None" || !lastname.match(letters)) { 
		error_message += "Enter last name (alphabets only)\n";
	}

	if (sex[0].checked == false && sex[1].checked == false) {
		error_message += "Please select gender\n";
	}

	if (dob == "" || dob == "None" || !dob.match(date)) {
		error_message += "Enter valid date of birth (yyyy-mm-dd)\n";
	}

	//checking for digits and length of 10, in the contact number field
	if (phone == "" || phone == "None" || !phone.match(/^[0-9]{10}$/g)) {
		error_message += "Enter contact number (10 digits only)\n";
	}

	if (email == "" || email == "None" || !email.match(check_email)) {
		error_message += "Enter valid email address (letters,numbers and periods)\n";
	}
  
	if (password != repassword) {
		
		error_message += "Password did not match\n";
         	
	}
	
	/*if (checkbox_accept.checked == false){
		error_message += "Please accept before proceeding\n";
	
	}
   */
  
   //profile picture validation
   	var image = document.getElementById("fileChooser").value;
	var ext = image.substring(image.lastIndexOf('.') + 1);

	if (ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG") {
		            
	}else {
		alert ("Please upload 'jpeg' or 'png' files only");
		
	}
//email id validation client side
var email = document.getElementById("email").value;
	// email allows letters, numbers and periods
	var check_email = /^([a-zA-Z0-9.])+@([a-zA-Z0-9-])+[.]([a-zA-Z0-9]{2,4})+$/g;
	if (email == "" || email == "None" || !email.match(check_email)) {
		alert("Enter valid email address (letters,numbers and periods)");
	}
 
//showing all errors message on screen
	if (error_message!=""){
    	alert(error_message);
		return false;
	}

}

	