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
                <h3>Preview</h3>
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
                                <img style="width: 2rem; margin: 0 auto;" src="" alt="passport">
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
                                <img style="width: 2rem; margin: 0 auto;" src="" alt="birth_cert">
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
                                <img style="width: 2rem; margin: 0 auto;" src="" alt="affidavit">
                                <h3>Drop File Here</h3>
                            </div>
                            <button class="upload-btn">Select Image</button>
                        </div>
                    </div>
                </div>
            <div class="submit-form">
                <button type="submit" style="background-color: #dbdada;">
                    <a href="summary.php?preview=programmechoice" style="color: #000;">Previous</a>
                </button>
                <button class="submit-btn" type="submit">Save and Submit</button>
            </div>
        </form>
      </div>
    </div>
</div>
<?php

    $query = "SELECT * FROM uploads WHERE Serial = '$serial' AND Pin = '$pin'";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $fileArray = json_decode($row['fileArray'], true);

        foreach ($fileArray as $key => $value) {
            echo '<script>document.querySelector("img[alt=' . $key . ']").src = "' . $value . '";</script>';
        }
    }

?>
<script>
        $(document).ready(function() {
            var passport = $("img[alt='passport']").attr("src");
            var birth_cert = $("img[alt='birth_cert']").attr("src");
            var affidavit = $("img[alt='affidavit']").attr("src");  
            
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
                    console.log({formData});

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
                            console.log({uploadedFiles});
                        }
                    });
                });
            });

            $('.submit-btn').on('click', function(e) {
                e.preventDefault();
                const fileArray = JSON.stringify(uploadedFiles)
                console.log({fileArray});
                $.ajax({
                    url: 'handler/process.php',
                    type: 'POST',
                    data: { files: fileArray, upload:'1', save: '1'  },
                    success: function (result) {
                        console.log({result});

          if (result.includes("200")){
            swal({
                title: "Successful!",
                text: "Files saved to the database successfully!",
                type: "success"
            });

          }else if (result.includes("17")){
            swal({
                title: "Successful!",
                text: "Files updated database successfully!",
                type: "success"
            });
          }else if (result.includes("18")){
            swal({
                title: "Successful!",
                text: "Application submitted successfully!",
                type: "success"
            });
            setTimeout(function() {
              window.location.href = "myDashboard.php";
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
