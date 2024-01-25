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
        <a href="examinationHistory.html">Examination History</a>
        <a href="#">Choice of Programme</a>
        <a href="#">Uploads</a>
        <a href="#">Referee</a>
        <a href="#">Summary</a>
        <a href="#">Declaration</a>
       </div>
      <div class="bioDataForm">
        <div class="form-instruction">
        <h3>Declaration</h3>
        <p>I hereby declare that all information given above is true</p> 
      </div>
        <form action="">
            <div class="form-group">
                <div>
                <label for="">Full name</label>
               <input type="text">
               </div>

                <div>
                <label for="">Date</label>
               <input type="text">
               </div>
               
            </div>
            <div class="submit-form">
                <!-- <button type="submit"><a href="examinationHistory.html">Previous</a></button> -->
                <button type="submit"><a href="examinationHistory.html">Finish</a></button>
            </div>
        </form>
      </div>
    </div>
</div>
 
    <script src="./js/app.js"></script>
</body>
</html>