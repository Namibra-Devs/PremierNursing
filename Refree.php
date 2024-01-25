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
        <a href="#">Education background</a>
        <a href="#">Choice of Programme</a>
        <a href="#">Uploads</a>
        <a href="#">Referee</a>
        <a href="#">Summary</a>
        <a href="#">Declaration</a>
       </div>
       <div class="bioDataForm">
        <div class="form-instruction">
        <h3>Referees</h3>
        <!-- <p>All fields are required <span style="color: red;">*</span></p>  -->
      </div>
        <form action="">
            <div class="form-group">
                <div>
                <label for="">Name</label>
               <input type="text">
               </div>

                <div>
                <label for="">Address</label>
               <input type="text">
               </div>
               
            </div>
            <div class="form-group">
                <div>
                <label for="">Contact</label>
               <input type="text">
               </div>

                <div>
                <label for="">Signature</label>
               <input type="text">
               </div>

            </div>
            <div class="form-group">
                <div>
                <label for="">Date</label>
               <input type="email">
               </div>

                <div>
                <label for="">Refree Class</label>
               <input type="text">
               </div>

            </div>
            <div class="submit-form">
                <button type="submit"><a href="examinationHistory.html">Previous</a></button>
                <button type="submit"><a href="examinationHistory.html">Save and Continue</a></button>
            </div>
        </form>
      </div>
    </div>
</div>
 
    <script src="./js/app.js"></script>
</body>
</html>