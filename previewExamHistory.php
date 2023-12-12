<?php
$title = "previewexaminationHistory";
include_once('./inc/header.php');
include_once('./inc/navbar.php');
include_once('./inc/sidebar.php');

$examBodyOptions  = ["WAEC" , "NABTEX"];

$querySubjects = "SELECT id, Name FROM schoolsubjects";
$resultSubjects = mysqli_query($db, $querySubjects) or die(mysqli_error($db));

$queryGrades = "SELECT id, Name FROM schoolgrades";
$resultGrades = mysqli_query($db, $queryGrades) or die(mysqli_error($db));


$olevel = "SELECT * FROM Olevel";
$result = $db->query($olevel);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $examBody = $row['ExamBody'];
        $examDate = $row['ExamDate'];
        $examIndex = $row['ExamIndex'];
        $results = $row['Results'];
        $serial = $row['Serial'];
        $pin = $row['Pin'];
    }
} else {
    echo "0 results";
}

$examBody = json_decode($examBody);
$examIndex = json_decode($examIndex);
$examDate = json_decode($examDate);
$results = json_decode($results, true);




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

   exambody =`["${exambody_1}" , "${exambody_2}"]`;
   examdate =`["${examdate_1}" , "${examdate_2}"]`;
   examindex =`["${examindex_1}" , "${examindex_2}"]`;

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
            // console.log(result);
            // return;
            if (result.includes("200")){
            swal({
                title: "Successful!",
                text: "Examination history saved succesfully!",
                type: "success"
            });
            setTimeout(function() {
              window.location.href = "summary.php?preview=programmechoice";
}, 2000);

          }else if(result.includes("17")){
            swal({
                title: "Successful!",
                text: "Examination history updated succesfully!",
                type: "success"
            });
            setTimeout(function() {
              window.location.href = "summary.php?preview=programmechoice";
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
       <div class="dashboard-result">
        <div class="result-table" style="overflow-x: auto;">
        <h3>Preview</h3>
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
                  <td><input type="number" id="examindex_1" placeholder="Enter Index Number" value="<?= $examIndex[0] ? $examIndex[0] : "" ?>"></td>
                  <td><input type="number" id="examindex_2" placeholder="Enter Index Number" value="<?= $examIndex[1] ? $examIndex[1] : "" ?>"></td>
                </tr>
                <tr>
                  <td></td>
                  <td><b>Exam Year</b></td>
                  <td><input type="date" id="examdate_1" name="" value="<?= $examDate[0] ? $examDate[0] : ""?>"></td>
                  <td><input type="date" id="examdate_2" name="" value="<?= $examDate[1] ? $examDate[1] : ""?>"></td>
                </tr>
                <tr>
                  <td></td>
                  <td><b>Exam body</b></td>
                  <td><select name="" id="exambody_1">
                    <?php
                        $savedOption = $examBody[0] ? $examBody[0] : "";
                        foreach ($examBodyOptions as $examOption) {
                          $selected = ($examOption === $savedOption) ? 'selected' : '';
                          echo "<option value='" . $examOption . "' $selected>" . $examOption . "</option>";
                      }
                    ?>

                  </select></td>
                  <td><select name="" id="exambody_2">
                  <?php
                        $savedOption = $examBody[1] ? $examBody[1] : "";
                        foreach ($examBodyOptions as $examOption) {
                          $selected = ($examOption === $savedOption) ? 'selected' : '';
                          echo "<option value='" . $examOption . "' $selected>" . $examOption . "</option>";
                      }
                    ?>
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


$indexCount = count($results);
$index = 0;

foreach ($rowsSubjects as $subject) {
    $subjectNames = array_keys($results);
    $subjectName = $subjectNames[$index] ?? '';

    $subjectGrades = $results[$subjectName] ?? null;

    echo "<tr>";
    echo "<td>" . $subject['id'] . "</td>";
    echo "<td>";
    echo "<select id='subjects' name='subjects' class='subjects'>";
    echo "<option value=''>Select</option>";

    foreach ($rowsSubjects as $subjectOption) {
        $selected = ($subjectOption['Name'] === $subjectName) ? 'selected' : '';
        echo "<option value='" . $subjectOption['Name'] . "' $selected>" . $subjectOption['Name'] . "</option>";
    }

    echo "</select>";
    echo "</td>";

    echo "<td>";
    echo "<select id='grades-1' class='grades-1' name='grades-1'>";
    echo "<option value=''>Select</option>";

    foreach ($rowsGrades as $grade) {
        $selected = ($subjectGrades && $subjectGrades['grades_1'] === $grade['Name']) ? 'selected' : '';
        echo "<option value='" . $grade['Name'] . "' $selected>" . $grade['Name'] . "</option>";
    }

    echo "</select>";
    echo "</td>";

    echo "<td>";
    echo "<select id='grades-2' class='grades-2' name='grades-2'>";
    echo "<option value=''>Select</option>";

    foreach ($rowsGrades as $grade) {
        $selected = ($subjectGrades && $subjectGrades['grades_2'] === $grade['Name']) ? 'selected' : '';
        echo "<option value='" . $grade['Name'] . "' $selected>" . $grade['Name'] . "</option>";
    }

    echo "</select>";
    echo "</td>";

    echo "</tr>";

    $index++;
}
?>


              </table>
              <div class="submit-form" style="margin-top: .5rem;">
                <button type="button" style="background-color: #dbdada;">
                    <a href="summary.php?preview=biodata" style="color: #000;">Previous</a>
                </button>
                <button class="o-level" style="background-color: #dbdada;">
                    <a href="summary.php?preview=programmechoice" style="color: #000;">Next</a>
                </button>
            </div>
            </form>
        </div>
    </div>
    </div>
</div>
 
    <!-- <script src="./js/app.js"></script> -->
</body>
</html>