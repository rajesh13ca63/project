$(document).ready(function() {
	  //username existing checking 
	   $("#users").on("change", function(){
	        $('#user').val();
	        var username = $('#users').val();
	        $.ajax({
	                method: "POST",
	                url: "rolechange",
	                data: {
	                       userid: username
	                },
               
	                success:function(msg) {
	                        $('#user').val(msg);
	                 
	                }
	        });
	   });
	});
