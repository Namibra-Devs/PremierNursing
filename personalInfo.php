<?php
$title = "personalInfo";
include_once('./inc/header.php');
include_once('./inc/navbar.php');
include_once('./inc/sidebar.php');

?>

<script type="text/javascript">
$(document).on("click", ".bio", function (event) {
    event.preventDefault();
    var data = $("#biodata-form").serialize();
    console.log({data});
    // return

    $.ajax({
        type: 'POST',
        url: "handler/process.php",
        data: data,
        success: function (result) {
            console.log(result);

          if (result == "200"){
            swal({
                title: "Successful!",
                text: "Examination History Saved Successfully!",
                type: "success"
            });
            setTimeout(function() {
              window.location.href = "examinationHistory.php";
}, 2000);

}else if (result.includes("17")){
            swal({
                title: "Successful",
                text: "Examination History Saved Successfully!",
                type: "success"
            });
            setTimeout(function() {
              window.location.href = "examinationHistory.php";
}, 2000);

          }else if (result.includes("401")){
            swal({
                title: "Error!",
                text: "Canditate is not logged in!",
                type: "error"
            });
            setTimeout(function() {
              window.location.href = "confirmation.php";
}, 2000);
          }else{
            swal({
                title: "Error!",
                text: "Server Error. Please Try Again!",
                type: "error"
            });
//             setTimeout(function() {
//               window.location.href = "confirmation.php";
// }, 2000);
          }

        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });

});
</script>

<div class="myDashboard">
<?php include_once('./inc/navlinks.php') ?>

      <div class="bioDataForm">
        <div class="form-instruction">
        <h3>Personal Information</h3>
        <p>All fields are required <span style="color: red;">*</span></p> 
      </div>
        <form id="biodata-form">
            <input type="hidden" name="pagename" value="personalinfo">
            <div class="form-group">
               <div>
                <label for="">Title</label>
               <input name="title" type="text">
               </div>
               <div>
                <label for="">Permanent Home Address</label>
               <input name="address" type="text">
               </div>
            </div>
            <div class="form-group">
                <div>
                <label for="">Surname</label>
               <input name="surname" type="text">
               </div>

                <div>
                <label for="">Other name</label>
               <input name="other_name" type="text">
               </div>
               
            </div>
            <div class="form-group">
                <div>
                <label for="">Gender</label>
                <select name="gender" id="">
                    <?php
                        $genderOptions =  ["male", "female"];
                        foreach ($genderOptions as $option) {
                          echo "<option value='" . $option . "'>" . $option . "</option>";
                      }
                    ?>
                  </select>
               </div>
               <div>
                    <label for="">Local Government Area</label>
                    <input name="lga" type="text">
               </div>

            </div>
            <div class="form-group">
                <div>
                <label for="">Email</label>
               <input name="email" type="email">
               </div>

                <div>
                <label for="">Phone Number</label>
               <input name="phone" type="text">
               </div>

            </div>
            <div class="form-group">
                <div>
                <label for="">Date of Birth</label>
               <input name="dob" type="date">
               </div>

                <div>
                <label for="">Place of Birth</label>
               <input name="pob" type="text">
               </div>

            </div>
            <div class="form-group">
                <div>
                <label for="">Marital Status</label>
               <select name="marital_status" id="">
                    <?php
                        $maritalStatuses = ["single", "married", "divorced", "widowed"];
                        foreach ($maritalStatuses as $option) {
                          echo "<option value='" . $option . "'>" . $option . "</option>";
                      }
                    ?>
                  </select>
               </div>

                <div>
                <label for="">Religion</label>
               <select name="rel" id="">
                    <?php
                        $religionOptions = ["islam", "christianity", "other"];
                        foreach ($religionOptions as $option) {
                          echo "<option value='" . $option . "'>" . $option . "</option>";
                      }
                    ?>
                  </select>
               </div>

            </div>
            <div class="form-group">
                <div>
                <label for="">Nationality</label>
               <input name="country" type="text">
               </div>

                <div>
                <label for="">State of Origin</label>
               <input name="state" type="text">
               </div>

            </div>
           
            <div class="form-group">
                <div>
                <label for="">Home Town</label>
               <input name="town" type="text">
               </div>

                <!-- <div>
                <label for="">Local Government Area</label>
               <input name="lga" type="text">
               </div> -->

            </div>
            <!-- <h2>Departmental Information</h2>
            <div class="form-group">
                <div>
                <label for="">Faculty</label>
               <input name="personal_info" type="text">
               </div>

                <div>
                <label for="">Department</label>
               <input name="department" type="text">
               </div>
            </div>
            <div class="form-group">
                <div>
                <label for="">Level</label>
               <input name="level" type="text">
               </div>

                <div>
                <label for="">Degree Sought</label>
               <input name="degree" type="text">
               </div>
            </div> -->
            <div  class="submit-form bio">
                <button type="submit"><a href="examinationHistory.php">Save and Continue</a></button>
            </div>
        </form>
      </div>
    </div>
</div>
 
    <!-- <script src="./js/app.js"></script> -->
</body>
</html>