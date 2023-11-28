$('document').ready(function() { 
	/* handling form validation */
	$("#login_form").validate({
		rules: {
			pin: {
				required: true,
			},
			serial_no: {
				required: true,
				email: false
			},
		},
		messages: {
			pin:{
			  required: "<span style='color:#a94442;'>please enter your pin number!</span>"
			 },
			serial_no: {
				required: "<span style='color:#a94442;'>please enter your serial number!</span>"
			}
		},
		submitHandler: submitForm	
	});	   
	/* Handling login functionality */
	function submitForm() {		
		var data = $("#login_form").serialize();;				
		 $.ajax({				
			type : 'POST',
			url  : 'handler/confirmation_handler.php',
			data : data,
			beforeSend: function(){	
				$("#error-container").fadeOut();
				$("#login_button").text(' Loading ...');
			},
		success : function(response){	
			console.log(response);				
				if(response == "ok"){									
					$("#login_button").text('Details verified sucessfully!');
					setTimeout(' window.location.href = "personalInfo.php"; ',500);
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
						$("#login_button").text('Proceed');
					});
				}
			}
		});
		return false;
	}   
});