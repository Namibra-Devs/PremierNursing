<?php
include_once('./inc/header.php');
include_once('./inc/navbar.php');
include_once('./inc/sidebar.php');
?>
    <div class="myDashboard">
       <div class="personalInfoMenuLinks">
        <a href="#">Biodata</a>
        <a href="#">Examination History</a>
        <a href="#">Choice of Programme</a>
        <a href="#">Uploads</a>
        <a href="#" class="activePersonalLink">Summary</a>
       </div>
      <div class="bioDataForm">
        <div class="form-instruction">
        <h3>Personal Information</h3>
        <p>All fields are required <span style="color: red;">*</span></p> 
      </div>
        <form action="">
            <div class="personalInfo-container" style="background-color: #eeecec80; padding: 1rem;">
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
        </div>
            <div class="submit-form">
                <button type="submit" style="background-color: #dbdada;">
                    <a href="previewExamHistory.html" style="color: #000;">Next</a>
                </button>
            </div>
        </form>
      </div>
    </div>
</div>
 
    <script src="./js/app.js"></script>
</body>
</html>