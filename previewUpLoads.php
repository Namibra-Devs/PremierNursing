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
        <a href="#">Biodata</a>
        <a href="#">Education background</a>
        <a href="#" >Choice of Programme</a>
        <a href="#" >Uploads</a>
        <a href="#">Referee</a>
        <a href="#" class="activePersonalLink">Summary</a>
        <a href="#">Declaration</a>
       </div>
       <div class="bioDataForm">

        <div class="form-instruction">
            <h3>Passport and Document Upload</h3>
            <p>Note: <span style="color: red;">All uploads should either be in Jpeg or PDF Format</span></p> 
          </div>
        <form action="">
            <div class="upload-container"  style="background-color: #eeecec80; padding: 1rem;">
            <div class="upload">
                <div class="upload-text">
                    <p>Upload your recent passport</p>
                </div>
                <div class="upload-doc">
                <div class="upload-container">
                   <img style="width: 2rem; margin: 0 auto;" src="../images/upload.png" alt="">
                   <h3>Drop File Here</h3>
                </div>
                <button type="submit">Select Image</button>
                </div>
              </div>
            <div class="upload">
                <div class="upload-text">
                    <p>Upload your birth Certificate</p>
                </div>
                <div class="upload-doc">
                <div class="upload-container">
                   <img style="width: 2rem; margin: 0 auto;" src="../images/upload.png" alt="">
                   <h3>Drop File Here</h3>
                </div>
                <button type="submit">Select Image</button>
                </div>
              </div>
            <div class="upload">
                <div class="upload-text">
                    <p>Upload your court affidavit</p>
                </div>
                <div class="upload-doc">
                <div class="upload-container">
                   <img style="width: 2rem; margin: 0 auto;" src="../images/upload.png" alt="">
                   <h3>Drop File Here</h3>
                </div>
                <button type="submit">Select Image</button>
                </div>
            </div>
        </div>
            <div class="submit-form">
                <button type="submit" style="background-color: #dbdada;">
                    <a href="previewProgrammeChoice.html" style="color: #000;">Previous</a>
                </button>
                <button type="submit">Save and Submit</button>
            </div>
        </form>
      </div>
    </div>
</div>
 
    <script src="./js/app.js"></script>
</body>
</html>