<?php
include_once('./inc/header.php');
include_once('./inc/navbar.php');
include_once('./inc/sidebar.php');
?>
    <div class="myDashboard">
       <div class="personalInfoMenuLinks">
        <a href="#">Biodata</a>
        <a href="#">Examination History</a>
        <a href="#" >Choice of Programme</a>
        <a href="#">Uploads</a>
        <a href="#" class="activePersonalLink">Summary</a>
       </div>
       <div class="bioDataForm">
        <div class="form-instruction">
        <h3>Choice of Programme</h3>
        </div>
        <form action="">
            <div class="choiceProgramme-container" style="background-color: #eeecec80; padding: 1rem;">
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
           </div>
            <div class="submit-form" style="margin-top: .5rem;">
                <button type="submit" style="background-color: #dbdada;">
                    <a href="previewExamHistory.html" style="color: #000;">Previous</a>
                </button>
                <button type="submit" style="background-color: #dbdada;">
                    <a href="programmeChoice.html" style="color: #000;">Next</a>
                </button>
            </div>
        </form>
      </div>
    </div>
</div>
 
    <script src="./js/app.js"></script>
</body>
</html>