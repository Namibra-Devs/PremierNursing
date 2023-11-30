<?php
session_start();
$title = "examinationHistory";
include_once('./inc/header.php');
include_once('./inc/navbar.php');
include_once('./inc/sidebar.php');

if(isset($_COOKIE['pin'])&&$_COOKIE['serial']){
	
$pin=$_COOKIE['pin'];
$serial=$_COOKIE['serial'];

}else{
	//  header('location:index.php');
      // exit;
}

$querySubjects = "SELECT id, Name FROM schoolsubjects";
$resultSubjects = mysqli_query($db, $querySubjects) or die(mysqli_error($db));

$queryGrades = "SELECT id, Name FROM schoolgrades";
$resultGrades = mysqli_query($db, $queryGrades) or die(mysqli_error($db));

?>

<script type="text/javascript">
$(document).on("click", ".o-level", function (event) {
    event.preventDefault();

    var subjects = []; // Array to store subjects
    var grades_1 = []; // Array to store grades
    var grades_2 = []; // Array to store grades

    // Loop through each subject and grade element
    $('.subjects').each(function() {
        subjects.push($(this).val());
    });

    $('.grades-1').each(function() {
        grades_1.push($(this).val());
    });

    $('.grades-2').each(function() {
        grades_2.push($(this).val());
    });

    var grades = {};

for (var i = 0; i < subjects.length; i++) {
    var subject = subjects[i];
    var grade1 = grades_1[i];
    var grade2 = grades_2[i];

    if (grade1 !== '' || grade2 !== '') {
        grades[subject] = {
            grades_1: grade1,
            grades_2: grade2
        };
    }
}

    var result = JSON.stringify(grades);

    var pagename = document.getElementById('exam_history').value;
    var exambody_1 = document.getElementById('exambody_1').value;
    var exambody_2 = document.getElementById('exambody_2').value;
    var examindex_1 = document.getElementById('examindex_1').value;
    var examindex_2 = document.getElementById('examindex_2').value;
    var examdate_1 = document.getElementById('examdate_1').value;
    var examdate_2 = document.getElementById('examdate_2').value;

//Index 1 for 1st sitting and index 2 for second
   var exambody = [exambody_1, exambody_2]; 
   var examdate = [examdate_1, examdate_2];
   var examindex = [examindex_1, examindex_2];  

   exambody = '[' + exambody.join(', ') + ']'
   examdate = '[' + examdate.join(', ') + ']'
   examindex = '[' + examindex.join(', ') + ']'

    var dataToSend = {
      pagename,
      result,
       exambody,
       examindex,
       examdate,
    };

    console.log(dataToSend);
    $.ajax({
        type: 'POST',
        url: "handler/process.php",
        data: dataToSend,
        success: function (result) {
            console.log(result);
            // return;
          if (result.includes("200")){
            swal({
                title: "Successful!",
                text: "Examination history saved succesfully!",
                type: "success"
            });
            setTimeout(function() {
              window.location.href = "programmechoice.php";
}, 2000);

          }else if(result.includes("17")){
            swal({
                title: "Successful!",
                text: "Examination history updated succesfully!",
                type: "success"
            });
            setTimeout(function() {
              window.location.href = "programmechoice.php";
}, 2000);
          
          }else if(result.includes("401")){
            swal({
                title: "Error!",
                text: "Canditate is not logged in!",
                type: "error"
            });
            setTimeout(function() {
              window.location.href = "confirmation.php";
}, 2000);
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
       <div class="dashboard-result">
        <div class="result-table" style="overflow-x: auto;">
        <h3>Examination History</h3>
        <form>
            <input type="hidden" id="exam_history" value="examhistory" name="exam_history">
            <table border="1">
                <tr>
                  <th style="width:10%"></th>
                  <th></th>
                  <th>1<sup>st</sup> Sitting.</th>
                  <th>2<sup>nd</sup> Sitting (if available)</th>
                </tr>
                <tr>
                  <td></td>
                  <td><b>Index Number</b></td>
                  <td><input type="number" id="examindex_1" placeholder="Enter Index Number"></td>
                  <td><input type="number" id="examindex_2" placeholder="Enter Index Number"></td>
                </tr>
                <tr>
                  <td></td>
                  <td><b>Exam Year</b></td>
                  <td><input type="date" id="examdate_1" name=""></td>
                  <td><input type="date" id="examdate_2" name=""></td>
                </tr>
                <tr>
                  <td></td>
                  <td><b>Exam body</b></td>
                  <td><select name="" id="exambody_1">
                    <option value="WAEC">WAEC</option>
                    <option value="NABTEX">NABTEX</option>
                  </select></td>
                  <td><select name="" id="exambody_2">
                  <option value="WAEC">WAEC</option>
                    <option value="NABTEX">NABTEX</option>
                  </select></td>
                </tr>
                <tr>
                  <td></td>
                  <td><b>Subjects</b></td>
                  <td><b>Grades</b></td>
                  <td><b>Grades</b></td>
                </tr>

                <?php
$rowsSubjects = [];
$rowsGrades = [];

// Fetch rows into arrays
while ($row = mysqli_fetch_assoc($resultSubjects)) {
    $rowsSubjects[] = $row;
}
while ($row = mysqli_fetch_assoc($resultGrades)) {
    $rowsGrades[] = $row;
}

foreach ($rowsSubjects as $subject) {
    echo "<tr>";
    echo "<td>" . $subject['id'] . "</td>";
    echo "<td>";
    echo "<select id='subjects' name='subjects' class='subjects'>";
    echo "<option value=''>Select</option>";

    foreach ($rowsSubjects as $subjectOption) {
        echo "<option value='" . $subjectOption['Name'] . "'>" . $subjectOption['Name'] . "</option>";
    }

    echo "</select>";
    echo "</td>";

    echo "<td>";
    echo "<select id='grades-1' class='grades-1' name='grades-1'>";
    echo "<option value=''>Select</option>";

    foreach ($rowsGrades as $grade) {
        echo "<option value='" . $grade['Name'] . "'>" . $grade['Name'] . "</option>";
    }

    echo "</select>";
    echo "</td>";

    echo "<td>";
    echo "<select id='grades-2' class='grades-2' name='grades-2'>";
    echo "<option value=''>Select</option>";

    foreach ($rowsGrades as $grade) {
        echo "<option value='" . $grade['Name'] . "'>" . $grade['Name'] . "</option>";
    }

    echo "</select>";
    echo "</td>";

    echo "</tr>";
}
?>

              </table>
              <div class="submit-form" style="margin-top: .5rem;">
                <button type="submit" style="background-color: #dbdada;">
                    <a href="personalInfo.php" style="color: #000;">Previous</a>
                </button>
                <button class='o-level'>Save and Continue</button>
            </div>
            </form>
        </div>
    </div>
    </div>
</div>
 
    <!-- <script src="./js/app.js"></script> -->
</body>
</html>