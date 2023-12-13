$(document).on("click", ".logout", function (event) {
    event.preventDefault();
    $.ajax({
        type: 'GET',
        url: "../handler/signout_handler.php?type=admin",
        success: function (result) {
            console.log({result})
          if (result == "200"){
            swal({
                title: "Successful",
                text: "Logout successful!",
                type: "success"
            });
            setTimeout(function() {
              window.location.href = "adminLogin.php";
}, 2000);
          }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });

});