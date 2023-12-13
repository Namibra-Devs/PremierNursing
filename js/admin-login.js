$('document').ready(function() { 
	/* handling form validation */
	$("#login_form").validate({
		rules: {
			username: {
				required: true,
			},
			password: {
				required: true,
			},
		},
        messages: {
            username: {
                required: "<span style='color:#a94442;'>Please enter your username!</span>"
            },
            password: {
                required: "<span style='color:#a94442;'>Please enter your password!</span>"
            },
		},
		submitHandler: submitForm	
	});	   
	/* Handling login functionality */
	function submitForm() {		
		var data = $("#login_form").serialize();
		console.log({data});		
		 $.ajax({				
			type : 'POST',
			url  : '../handler/admin_handler.php',
			data : data,
			beforeSend: function(){	
				$("#error-container").fadeOut();
				$("#login_button").text(' Signing in ...');
			},
		success : function(response){	
            // console.log({response});		
				if(response == "200"){									
					$("#login_button").text('Login successful!');
					setTimeout(' window.location.href = "Applicants.php"; ',500);
				} 
				else if(response=="member"){									
					$("#login_button").html('<img src="js/ajax-loader.gif" /> &nbsp; Signing In ...');
					setTimeout(' window.location.href = "print.php"; ',3000);
				}
				else if(response=="user"){									
					$("#login_button").html('<img src="js/ajax-loader.gif" /> &nbsp; Signing In ...');
					setTimeout(' window.location.href = "user.php"; ',3000);
				}else {									
					$("#error_container").fadeIn(1000, function(){						
						$("#error_container").html('<div class="custom-error alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+'</div>');
						$("#login_button").text('Login');
					});
				}
			}
		});
		return false;
	}   
});