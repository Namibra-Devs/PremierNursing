<?php
$title = 'uploads';
include_once './inc/header.php';
include_once './inc/navbar.php';
include_once './inc/sidebar.php';
?>
    <div class="myDashboard">
    <?php include_once './inc/navlinks.php'; ?>

        <div class="bioDataForm">
            <div class="form-instruction">
                <h3>Passport and Document Upload</h3>
                <p>Note: <span style="color: red;">All uploads should either be in Jpeg or PDF Format</span></p> 
            </div>
            <form id="uploadForm">
                <div class="upload-container"  style="background-color: #eeecec80; padding: 1rem;">
                    <div class="upload">
                        <div class="upload-text">
                            <p>Upload your recent passport</p>
                        </div>
                        <div class="upload-doc">
                            <div class="upload-container">
                                <input type="file" name="passport" style="display: none;">
                                <img style="width: 2rem; margin: 0 auto;" src="images/upload.png" alt="passport">
                                <h3>Drop File Here</h3>
                            </div>
                            <button class="upload-btn">Select Image</button>
                        </div>
                    </div>
                    <div class="upload">
                        <div class="upload-text">
                            <p>Upload your birth Certificate</p>
                        </div>
                        <div class="upload-doc">
                            <div class="upload-container">
                                <input type="file" name="birth_cert" style="display: none;">
                                <img style="width: 2rem; margin: 0 auto;" src="images/upload.png" alt="birth_cert">
                                <h3>Drop File Here</h3>
                            </div>
                            <button class="upload-btn">Select Image</button>
                        </div>
                    </div>
                    <div class="upload">
                        <div class="upload-text">
                            <p>Upload your court affidavit</p>
                        </div>
                        <div class="upload-doc">
                            <div class="upload-container">
                                <input type="file" name="affidavit" style="display: none;">
                                <img style="width: 2rem; margin: 0 auto;" src="images/upload.png" alt="affidavit">
                                <h3>Drop File Here</h3>
                            </div>
                            <button class="upload-btn">Select Image</button>
                        </div>
                    </div>
                </div>
                <div class="submit-form">
                    <button type="button" class="previous-btn" style="background-color: #dbdada;">
                        <a href="previewProgrammeChoice.php" style="color: #000;">Previous</a>
                    </button>
                    <button type="button" class="submit-btn">Save and Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
          var passport = '', birth_cert = '', affidavit = '';
          const uploadedFiles = {passport, birth_cert, affidavit};

            $('.upload-container .upload-btn').on('click', function(e) {
                e.preventDefault();
                var parentUpload = $(this).closest('.upload');
                var fileInput = parentUpload.find('input[type="file"]');
                fileInput.click();

                fileInput.change(function() {
                    var file = fileInput.prop('files')[0];
                    var formData = new FormData();
                    formData.append('file', file);
                    formData.append('display', '1');

                    $.ajax({
                        url: 'handler/process.php',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                          console.log({response});
                            var filePath = response;
                            var h3 = parentUpload.find('h3');
                            h3.addClass('hidden');
                            parentUpload.find('img').attr('src', filePath).show();
                            uploadedFiles[fileInput.attr('name')] = filePath;
                        }
                    });
                });
            });

            $('.submit-btn').on('click', function(e) {
                e.preventDefault();
                const fileArray = JSON.stringify(uploadedFiles)
                $.ajax({
                    url: 'handler/process.php',
                    type: 'POST',
                    data: { files: fileArray, upload:'1' },
                    success: function (result) {

          if (result.includes("200")){
            swal({
                title: "Successful!",
                text: "Files saved to the database successfully!",
                type: "success"
            });
            setTimeout(function() {
              window.location.href = "summary.php?preview=biodata";
}, 2000);
 
          }else if (result.includes("17")){
            swal({
                title: "Successful!",
                text: "Files updated successfully!",
                type: "success"
            });
            setTimeout(function() {
              window.location.href = "summary.php?preview=biodata";
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
          }

        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
                });
            });

            $('.previous-btn').on('click', function(e) {
                
            });
        });
    </script>
</body>
</html>
