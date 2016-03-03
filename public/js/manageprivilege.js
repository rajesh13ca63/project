$(document).ready(function() {
	  //fist admin values is shows on screen 
	    var username1 = $('#role_name').val();
	        $.ajax({
	                method: "POST",
	                url: "manageprivilegejs.php",
                    data: {
	                       userid: username1
	                },
	                
	                success:function(msg) {
	                	//console.log(JSON.stringify(msg));
	                	   $('#tab').html(msg);
	                 
	                }
	        });

       //Afteer changing the role it will works
	   $("#role_name").on("change", function(){
	       var username = $('#role_name').val();

	        $.ajax({
	                method: "POST",
	                url: "manageprivilegejs.php",
                    data: {
	                       userid: username
	                },
	                
	                success:function(msg) {
	                	//console.log(JSON.stringify(msg));
	                	   $('#tab').html(msg);
	                 
	                }
	        });
	   });
});

//after changing the checkbox value it will works
function changeprivilege(result, role, resource_id, action_id) {   
	console.log(result);
    $.ajax({
        method: 'POST',
        url: 'privilegepost.php',
        dataType: 'json',
        data: {
          result:result,
          resource_id: resource_id,
          role: role,
          action_id: action_id
        },
        success: function(response) {
        }
    });   
}

