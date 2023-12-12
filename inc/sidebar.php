<div class="dashboard">
<div class="sidebar">
  <div class="sidebar_toggle">
      <i class="fa fa-bars"></i>
  </div>
  <ul class="sidebar-list">
    <li class="active-sidebar-list">
      <a href="myDashboard.php" class=" active active-li">
          <img class="active-li" src="./images/home.png" alt="">
          <span class="link-name">Dashboard</span>
      </a>
   </li>
    <li>
      <a href="personalInfo.php">
          <img src="./images/record.png" alt="">
          <span class="link-name">Student's Biodata</span>
      </a>
   </li>

   <div class="logout">
      <a>
          <img src="./images/Logout.png" alt="">
          <span> Logout</span>
      </a>
  </div>
  </ul>

  
</div>
<script type="text/javascript">
$(document).on("click", ".logout", function (event) {
    event.preventDefault();
    $.ajax({
        type: 'GET',
        url: "handler/signout_handler.php",
        success: function (result) {

          if (result == "200"){
            swal({
                title: "Successful",
                text: "Logout successful!",
                type: "success"
            });
            setTimeout(function() {
              window.location.href = "studentSignin.php";
}, 2000);
          }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });

});
</script>