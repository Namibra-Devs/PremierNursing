<?php
include_once( 'inc/header.php' );
?>
<div class = 'sidebar'>
<div class = 'sidebar_toggle'>
<i class = 'fa fa-bars'></i>
</div>
<ul class = 'sidebar-list'>
<li class = 'active-sidebar-list'>
<a href = '#' class = 'active-li'>
<img class = 'active-li' src = '../images/home.png' alt = ''>
<span class = 'link_name'>Dashboard</span>
</a>
</li>
<li>
<a href = '#'>
<img src = '../images/record.png' alt = ''>
<span class = 'link_name'>Student</span>
</a>
</li>
<li>
<a href = 'prospectiveStudents.php'>
<img src = '../images/record.png' alt = ''>
<span class = 'link_name'>Prospective Students</span>
</a>
</li>

<div class = 'logout'>
<a>
<img src = '../images/Logout.png' alt = ''>
<span> Logout</span>
</a>
</div>
</ul>

</div>

<?php

$countTotalQuery = 'SELECT COUNT(*) AS totalStudents FROM students';
$countAdmittedQuery = "SELECT COUNT(*) AS admittedStudents FROM students WHERE isApproved = '2'";
$countPendingQuery = "SELECT COUNT(*) AS pendingStudents FROM students WHERE isApproved = '0'";
$countRejectedQuery = "SELECT COUNT(*) AS rejectedStudents FROM students WHERE isApproved = '1'";
$countSubmittedQuery = "SELECT COUNT(*) AS submittedStudents FROM students WHERE isSubmitted = '1'";
$countNotSubmittedQuery = "SELECT COUNT(*) AS notSubmittedStudents FROM students WHERE isSubmitted = '0'";

function getCount( $db, $query, $name )
 {
    $result = $db->query( $query );
    return $result && $result->num_rows > 0 ? $result->fetch_assoc()[ $name ] : 0;
}

$totalStudents = getCount( $db, $countTotalQuery, 'totalStudents' );
$admittedStudents = getCount( $db, $countAdmittedQuery, 'admittedStudents' );
$pendingStudents = getCount( $db, $countPendingQuery, 'pendingStudents' );
$rejectedStudents = getCount( $db, $countRejectedQuery, 'rejectedStudents' );
$submittedStudents = getCount( $db, $countSubmittedQuery, 'submittedStudents' );
$notSubmittedStudents = getCount( $db, $countNotSubmittedQuery, 'notSubmittedStudents' );

$db->close();
?>

<div class = 'applicants_container'>
<div class = 'applicants_box' style = 'background-color: #D8D7DD;'>
<img style = 'width: 2.5rem;' src = '../images/Profile.png' alt = ''>
<p>Total No. of Applicants</p>
<h3><?php echo $totalStudents;
?></h3>
</div>
<div class = 'applicants_box' style = 'background-color: #6bf3aa;'>
<img style = 'width: 2.5rem;' src = '../images/group.png' alt = ''>
<p>Applicants Admitted</p>
<h3><?php echo $admittedStudents;
?></h3>
</div>
<div class = 'applicants_box' style = 'background-color: #F2DBC1;'>
<img style = 'width: 2.5rem;' src = '../images/group.png' alt = ''>
<p>Applicants Pending</p>
<h3><?php echo $pendingStudents;
?></h3>
</div>
<div class = 'applicants_box' style = 'background-color: #F0CFCF;'>
<img style = 'width: 2.5rem;' src = '../images/group.png' alt = ''>
<p>Applicants Rejected</p>
<h3><?php echo $rejectedStudents;
?></h3>
</div>
<div class = 'applicants_box' style = 'background-color: #D9D5EE;'>
<img style = 'width: 2.5rem;' src = '../images/record.png' alt = ''>
<p>Applications Submitted</p>
<h3><?php echo $submittedStudents;
?></h3>
</div>
<div class = 'applicants_box' style = 'background-color: #F2DBC1;'>
<img style = 'width: 2.5rem;' src = '../images/Category.png' alt = ''>
<p>Applications Not Submitted</p>
<h3><?php echo $notSubmittedStudents;
?></h3>
</div>
</div>

</div>

<!-- <script src = '../js/app.js'></script> -->
<script src = 'js/signout.js'></script>
</body>
</html>