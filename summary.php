<?php
session_start();
$title = "summary";
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
            console.log(result);

          if (result == "200"){
            swal({
                title: "Successful!",
                text: "Examination History Saved Successfully!",
                type: "success"
            });
            setTimeout(function() {
              window.location.href = "examinationHistory.php";
}, 2000);

          }else if (result == "401"){
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
<?php include_once('./inc/navlinks.php') ?>

<?php
if ( isset( $_GET[ 'preview' ] )){
    if ( $_GET[ 'preview' ] == "biodata"){
       include_once('previewPersonalInfo.php');
    } elseif ($_GET[ 'preview' ] == "examhistory") {
        include_once('previewExamHistory.php');
    } elseif ($_GET[ 'preview' ] == "programmechoice") {
        include_once('previewProgrammeChoice.php');
    } elseif ($_GET[ 'preview' ] == "uploads") {
        include_once('previewUploads.php');
    }
}

?>


      </div>
    </div>
</div>
 
    <!-- <script src="./js/app.js"></script> -->
</body>
</html>