<?php
include_once('./inc/header.php');
include_once('./inc/navbar.php');
include_once('./inc/sidebar.php');

?>
    <div class="myDashboard">
    <div class="toggle-bars">
        <i class="fa fa-bars"></i>
       </div>
       <div class="personalInfoMenuLinks">
        <a href="personalInfo.html" class="activePersonalLink">Biodata</a>
        <a href="examinationHistory.html">Education background</a>
        <a href="#">Choice of Programme</a>
        <a href="#">Uploads</a>
        <a href="#">Referee</a>
        <a href="#">Summary</a>
        <a href="#">Declaration</a>
       </div>
      <div class="bioDataForm">
        <div class="form-instruction">
        <h3>Personal Information</h3>
        <p>All fields are required <span style="color: red;">*</span></p> 
      </div>
        <form action="">
            <div class="personal-title">
                <label for="">Title</label>
               <input type="text">
            </div>
            <div class="form-group">
                <div>
                <label for="">Surname</label>
               <input type="text">
               </div>

                <div>
                <label for="">Other name</label>
               <input type="text">
               </div>
               
            </div>
            <div class="form-group">
                <div>
                <label for="">Reg./Matric No</label>
               <input type="text">
               </div>

                <div>
                <label for="">Gender</label>
               <input type="text">
               </div>

            </div>
            <div class="form-group">
                <div>
                <label for="">Email</label>
               <input type="email">
               </div>

                <div>
                <label for="">Phone Number</label>
               <input type="text">
               </div>

            </div>
            <div class="form-group">
                <div>
                <label for="">Date of Birth</label>
               <input type="date">
               </div>

                <div>
                <label for="">Place of Birth</label>
               <input type="text">
               </div>

            </div>
            <div class="form-group">
                <div>
                <label for="">Marital Status</label>
               <input type="text">
               </div>

                <div>
                <label for="">Religion</label>
               <input type="text">
               </div>

            </div>
            <div class="form-group">
                <div>
                <label for="">Nationality</label>
               <input type="text">
               </div>

                <div>
                <label for="">State of Origin</label>
               <input type="text">
               </div>

            </div>
           
            <div class="form-group">
                <div>
                <label for="">Home Town</label>
               <input type="text">
               </div>

                <div>
                <label for="">Local Government Area</label>
               <input type="text">
               </div>

            </div>
            <div class="form-group">
                <div>
                <label for="">Permanent Home Address</label>
               <input type="text">
               </div>
            </div>
           
            <h2>Departmental Information</h2>
            <div class="form-group">
                <div>
                <label for="">Faculty</label>
               <input type="text">
               </div>

                <div>
                <label for="">Department</label>
               <input type="text">
               </div>
            </div>
            <div class="form-group">
                <div>
                <label for="">Level</label>
               <input type="text">
               </div>

                <div>
                <label for="">Degree Sought</label>
               <input type="text">
               </div>
            </div>
            <div class="submit-form">
                <button type="submit"><a href="examinationHistory.html">Save and Continue</a></button>
            </div>
        </form>
      </div>
    </div>
</div>
 
    <script src="./js/app.js"></script>
</body>
</html>