<?php
$title = 'programmeChoice';
include_once './inc/header.php';
include_once './inc/navbar.php';
include_once './inc/sidebar.php';
?>
    <div class="myDashboard">
    <?php include_once './inc/navlinks.php'; ?>
       <div class="bioDataForm">
        <div class="form-instruction">
        <h3>Preview</h3>
        </div>

<?php

    $query = "SELECT * FROM schoolchoices WHERE Serial = '$serial' AND Pin = '$pin'";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $firstChoice = $row['FirstChoice'] ?? '';
        $secondChoice = $row['SecondChoice'] ?? '';
    } else {
        $firstChoice = '';
        $secondChoice = '';
    }
?>
<form>
    <div class="personal-title">
        <label for="first_choice">First Choice</label>
        <select name="first_choice" id="first_choice">
            <option value="">Select</option>
            <?php
            $query = 'SELECT * FROM programmechoices';
            $result = mysqli_query($db, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $selected = ($firstChoice === $row['choiceName']) ? 'selected' : '';
                    echo "<option value='" . $row['choiceName'] . "' $selected>" . $row['choiceName'] . '</option>';
                }
            }
            ?>
        </select>
    </div>
    <div class="personal-title">
        <label for="second_choice">Second Choice</label>
        <select name="second_choice" id="second_choice">
            <option value="">Select</option>
            <?php
            $query = 'SELECT * FROM programmechoices';
            $result = mysqli_query($db, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $selected = ($secondChoice === $row['choiceName']) ? 'selected' : '';
                    echo "<option value='" . $row['choiceName'] . "' $selected>" . $row['choiceName'] . '</option>';
                }
            }
            ?>
        </select>
    </div>
    <div class="submit-form">
        <button style="background-color: #dbdada;">
            <a href="examinationHistory.php" style="color: #000;">Previous</a>
        </button>
        <button id="saveChoicesBtn" type="button">Save and Continue</button>
    </div>
</form>

      </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        
        $('#saveChoicesBtn').on('click', function(event) {
            event.preventDefault();
            // console.log("Working...");
            var firstChoice = $('#first_choice').val();
            var secondChoice = $('#second_choice').val();
            const pagename = "programmechoices"

            $.ajax({
                url: 'handler/process.php',
                type: 'POST',
                data: {
                    pagename,
                    first_choice: firstChoice,
                    second_choice: secondChoice
                },
                success: function (result) {
                    console.log({result});

if (result.includes("200")){
  swal({
      title: "Successful!",
      text: "Programme choices saved successfully!",
      type: "success"
  });
//             setTimeout(function() {
//               window.location.href = "summary.php";
// }, 2000);

}else if (result.includes("17")){
  swal({
      title: "Success",
      text: "Programme choices updated successfully!",
      type: "success"
  });
  setTimeout(function() {
    window.location.href = "summary.php?preview=uploads";
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
//             setTimeout(function() {
//               window.location.href = "summary.php";
// }, 2000);
}

                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
    <!-- <script src="./js/app.js"></script> -->
</body>
</html>