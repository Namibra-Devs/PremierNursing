
<?php
include_once('inc/header.php');
?>
      <div class="sidebar">
        <div class="sidebar_toggle">
            <i class="fa fa-bars"></i>
        </div>
        <ul class="sidebar-list">
          <li>
            <a href="dashboard.php">
                <img src="../images/home.png" alt="">
                <span class="link_name">Dashboard</span>
            </a>
         </li>
          <li class="active-sidebar-list">
            <a href="#" class="active-li">
                <img class="active-li" src="../images/record.png" alt="">
                <span class="link_name">Prospective Students</span>
            </a>
         </li>

         <div class="logout">
            <a>
                <img src="../images/Logout.png" alt="">
                <span> Logout</span>
            </a>
        </div>
        </ul>

        
    </div>
    <div class="myDashboard">
        <div class="prospectiveStudentsBar">
            <h1>Prospective Students</h1>
         </div>
       <div class="dashboard-result">
        <div class="result-table admission-table" style="overflow-x: auto;">
              <table>
                 <tr style="background-color: #E8E8E8;">
                  <th style="width:10%">S/N</th>
                  <th>Name</th>
                  <th>Reg No.</th>
                  <th>First Choice</th>
                  <th>Second Choice</th>
                  <th>Document</th>
                  <th>Admission Status</th>
                  <th>Action</th>
                 </tr>
                 <?php


// Query to retrieve student data
$query = "SELECT s.id AS studentId, s.surname AS surname, s.firstName AS firstName, s.MatricNumber AS MatricNumber, sc.FirstChoice AS firstchoice, sc.SecondChoice AS secondchoice, s.isSubmitted AS SubmissionStatus, s.isApproved AS AdmissionStatus
          FROM students s
          INNER JOIN schoolchoices sc ON s.Pin = sc.Pin AND s.Serial = sc.Serial"; // Adjust the query based on your table structure
$result = mysqli_query($db, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $studentId = $row['studentId'];
        $name = $row['surname']. " ".$row['firstName'];
        $matricNumber = $row['MatricNumber'];
        $firstChoice = $row['firstchoice'];
        $secondChoice = $row['secondchoice'];
        $submissionStatus = $row['SubmissionStatus'] === "1" ? "Submitted" : "Not Submitted";
        $admissionStatus = $row['AdmissionStatus'] === "0" ? "Pending" : ($row['AdmissionStatus'] === "1" ? "Not Admitted" : "Admitted");
        
        $submissionStyle = $submissionStatus === 'Submitted' ? 'color: blue;' : 'color: #DD9221;';
        $admissionStyle = $admissionStatus === 'Admitted' ? 'color: #0BBD5D;' : ($admissionStatus === 'Not Admitted' ? 'color: #B42828;' : 'color: #DD9221;');

        echo "<tr>";
        echo "<td>$studentId</td>";
        echo "<td>$name</td>";
        echo "<td>$matricNumber</td>";
        echo "<td>$firstChoice</td>";
        echo "<td>$secondChoice</td>";
        echo "<td style='$submissionStyle'>$submissionStatus</td>";
        echo "<td id='admission-status' style='$admissionStyle'>$admissionStatus</td>";
        echo "<td class='admission-action'><i class='fa fa-list-dots'></i>
                <ul class='action-details'>
                    <li id='admit' style='color: #0BBD5D;'>Admit</li>
                    <li id='reject' style='color: #B42828;'>Reject</li>
                </ul>
            </td>";
        echo "</tr>";
    }
} else {
    echo "No records found"; 
}

mysqli_close($db);
?>

              </table>
        </div>
    </div>
    </div>
</div>
 
    <script>
        $(document).ready(function(){
            $('.admission-action ul li').click(function(){
                var action = $(this).text().toLowerCase();
                var studentId = $(this).closest('tr').find('td:first').text();
                var $this = $(this);
                var update = $this.closest('tr').find('#admission-status');

                $.ajax({
                    type: 'POST',
                    url: "../handler/admin_handler.php",
                    data: { studentId, action },
                    success: function(response) {
                        if (response.includes("2")){
                            console.log(2);
                            // Update Admission Status on the client side asynchronously
                            update.text("Admitted");
                            update.attr('style', 'color: #0BBD5D'); 


                        }else if (response.includes("1")){
                            update.text("Not Admitted");
                            update.attr('style', 'color: #B42828'); 
        
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>



    <!-- <script src="./js/app.js"></script> -->
    <script src="js/signout.js"></script>
</body>
</html>