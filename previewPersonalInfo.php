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
            console.log({result});

          if (result.includes("200")){
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
              window.location.href = "summary.php?preview=examhistory";
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

      <div class="bioDataForm">
        <div class="form-instruction">
        <h3>Preview</h3>
        <p>All fields are required <span style="color: red;">*</span></p> 
      </div>
        <!-- <form id="biodata-form">
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
                <label for="">Reg./Matric No</label>
               <input name="matric" type="text">
               </div>

                <div>
                <label for="">Gender</label>
               <input name="gender" type="text">
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
               <input name="marital_status" type="text">
               </div>

                <div>
                <label for="">Religion</label>
               <input name="rel" type="text">
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

                <div>
                <label for="">Local Government Area</label>
               <input name="lga" type="text">
               </div>

            </div>
            <h2>Departmental Information</h2>
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
            </div>
            <div class="submit-form bio">
                <button type="submit" style="background-color: #dbdada; float: right;">
                    <a style="color: #000;">Next</a>
                </button>
            </div>
        </form> -->

        <?php
// Establish database connection


    // Fetch data from the BioData table based on the serial and pin
    $query = "SELECT * FROM BioData WHERE serial = '$serial' AND pin = '$pin'";
    $result = $db->query($query);

    // Check if data is available
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Assign fetched data to variables
        $title = $row['title'];
        $surname = $row['surname'];
        $other_name = $row['other_name'];
        $matric = $row['matric'];
        $gender = $row['gender'];
        $email = $row['email'];
        $phone = $row['phone'];
        $dob = $row['dob'];
        $pob = $row['pob'];
        $marital_status = $row['marital_status'];
        $rel = $row['rel'];
        $country = $row['country'];
        $state = $row['state'];
        $town = $row['town'];
        $lga = $row['lga'];
        $address = $row['address'];
        $personal_info = $row['faculty'];
        $department = $row['department'];
        $level = $row['level'];
        $degree = $row['degree'];

        // Output HTML form with populated values
        ?>
        <form id="biodata-form">
            <input type="hidden" name="pagename" value="personalinfo">
            <div class="form-group">
                <div>
                    <label for="title">Title</label>
                    <input name="title" type="text" value="<?php echo $row['title'] ?? ''; ?>">
                </div>
                <div>
                    <label for="address">Permanent Home Address</label>
                    <input name="address" type="text" value="<?php echo $row['address'] ?? ''; ?>">
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="surname">Surname</label>
                    <input name="surname" type="text" value="<?php echo $row['surname'] ?? ''; ?>">
                </div>
                <div>
                    <label for="other_name">Other Name</label>
                    <input name="other_name" type="text" value="<?php echo $row['other_name'] ?? ''; ?>">
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="matric">Reg./Matric No</label>
                    <input name="matric" type="text" value="<?php echo $row['matric'] ?? ''; ?>">
                </div>
                <div>
                    <label for="gender">Gender</label>
                    <input name="gender" type="text" value="<?php echo $row['gender'] ?? ''; ?>">
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="email">Email</label>
                    <input name="email" type="email" value="<?php echo $row['email'] ?? ''; ?>">
                </div>
                <div>
                    <label for="phone">Phone Number</label>
                    <input name="phone" type="text" value="<?php echo $row['phone'] ?? ''; ?>">
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="dob">Date of Birth</label>
                    <input name="dob" type="date" value="<?php echo $row['dob'] ?? ''; ?>">
                </div>
                <div>
                    <label for="pob">Place of Birth</label>
                    <input name="pob" type="text" value="<?php echo $row['pob'] ?? ''; ?>">
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="marital_status">Marital Status</label>
                    <input name="marital_status" type="text" value="<?php echo $row['marital_status'] ?? ''; ?>">
                </div>
                <div>
                    <label for="rel">Religion</label>
                    <input name="rel" type="text" value="<?php echo $row['rel'] ?? ''; ?>">
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="country">Nationality</label>
                    <input name="country" type="text" value="<?php echo $row['country'] ?? ''; ?>">
                </div>
                <div>
                    <label for="state">State of Origin</label>
                    <input name="state" type="text" value="<?php echo $row['state'] ?? ''; ?>">
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="town">Home Town</label>
                    <input name="town" type="text" value="<?php echo $row['town'] ?? ''; ?>">
                </div>
                <div>
                    <label for="lga">Local Government Area</label>
                    <input name="lga" type="text" value="<?php echo $row['lga'] ?? ''; ?>">
                </div>
            </div>
            <h2>Departmental Information</h2>
            <div class="form-group">
                <div>
                    <label for="faculty">Faculty</label>
                    <input name="facultyo" type="text" value="<?php echo $row['faculty'] ?? ''; ?>">
                </div>
                <div>
                    <label for="department">Department</label>
                    <input name="department" type="text" value="<?php echo $row['department'] ?? ''; ?>">
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="level">Level</label>
                    <input name="level" type="text" value="<?php echo $row['level'] ?? ''; ?>">
                </div>
                <div>
                    <label for="degree">Degree Sought</label>
                    <input name="degree" type="text" value="<?php echo $row['degree'] ?? ''; ?>">
                </div>
            </div>
            <div class="submit-form bio">
                <button type="submit" style="background-color: #dbdada; float: right;">
                    <a style="color: #000;">Next</a>
                </button>
            </div>
        </form>
        <?php
    }

?>


      </div>
    </div>
</div>
 
    <!-- <script src="./js/app.js"></script> -->
</body>
</html>