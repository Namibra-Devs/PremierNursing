

$(document).ready(function() {
    $('#signupForm').validate({
        rules: {
            username: {
                required: true
            },
            surname: {
                required: true
            },
            firstname: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                digits: true
            },
            password: {
                required: true
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            username: {
                required: "<span style='color:#a94442;'>Please enter your username!</span>"
            },
            surname: {
                required: "<span style='color:#a94442;'>Please enter your surname!</span>"
            },
            firstname: {
                required: "<span style='color:#a94442;'>Please enter your first name!</span>"
            },
            email: {
                required: "<span style='color:#a94442;'>Please enter your email address!</span>",
                email: "<span style='color:#a94442;'>Please enter a valid email address!</span>"
            },
            mobile: {
                required: "<span style='color:#a94442;'>Please enter your mobile number!</span>",
                digits: "<span style='color:#a94442;'>Please enter only digits!</span>"
            },
            password: {
                required: "<span style='color:#a94442;'>Please enter your password!</span>"
            },
            confirm_password: {
                required: "<span style='color:#a94442;'>Please confirm your password!</span>",
                equalTo: "<span style='color:#a94442;'>Passwords do not match!</span>"
            }
        },
        submitHandler: function(form) {
            $.ajax({
                type : 'POST',
                url  : 'handler/signup_handler.php',
                data: $(form).serialize(),
                success : function(response){	
                    console.log(response);				
                        if(response == "200"){	
                            swal({
                                title: "Successful!",
                                text: "Signup successful!",
                                type: "success"
                            });
                            setTimeout(function() {
                              window.location.href = "myDashboard.php";
                }, 2000);
                        } 
                        else if(response=="401"){									
                            swal({
                                title: "Unauthorized",
                                text: "Candidate not authorized!",
                                type: "error"
                            });
                            setTimeout(function() {
                              window.location.href = "confirmation.php";
                }, 2000);
                        }else if (response == "13" ){									
                            $("#error_container").fadeIn(1000, function(){						
                                $("#error_container").html('<div class="custom-error alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;Email already exists!</div>');
                                $("#login_button").text('Proceed');
                            });
                        
                        }else if (response == "12" ){									
                            $("#error_container").fadeIn(1000, function(){						
                                $("#error_container").html('<div class="custom-error alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;Username already exists!</div>');
                                $("#login_button").text('Proceed');
                            });
                        }
                        else{									
                            $("#error_container").fadeIn(1000, function(){						
                                $("#error_container").html('<div class="custom-error alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;An error occured. Please try again!</div>');
                                $("#login_button").text('Proceed');
                            });
                        }
                    },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
});
