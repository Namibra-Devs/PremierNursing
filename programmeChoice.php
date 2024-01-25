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
        <a href="personalInfo.html">Biodata</a>
        <a href="examinationHistory.html">Examination History</a>
        <a href="programmeChoice.html" class="activePersonalLink">Choice of Programme</a>
        <a href="#">Uploads</a>
        <a href="#">Refree</a>
        <a href="#">Summary</a>
       </div>
       <div class="bioDataForm">
        <div class="form-instruction">
        <h3>Choice of Programme</h3>
        </div>
        <form action="">
            <div class="personal-title">
                <label for="">Fisrt Choice</label>
                <select name="" id="">
                    <option value="">Select</option>
                    <option value="">Nursing</option>
                    <option value="">Midwifery</option>
                    <option value="">Nutrition</option>
                    <option value="">Medical Laboratory Technology</option>
                   </select>
            </div>
            <div class="personal-title">
                <label for="">Second Choice</label>
               <select name="" id="">
                <option value="">Select</option>
                <option value="">Nursing</option>
                <option value="">Midwifery</option>
                <option value="">Nutrition</option>
                <option value="">Medical Laboratory Technology</option>
               </select>
            </div>
            <div class="submit-form">
                <button type="submit" style="background-color: #dbdada;">
                    <a href="examinationHistory.html" style="color: #000;">Previous</a>
                </button>
                <button type="submit"><a href="upLoads.html">Save and Continue</a></button>
            </div>
        </form>
      </div>
    </div>
</div>
 
    <script src="./js/app.js"></script>
</body>
</html>