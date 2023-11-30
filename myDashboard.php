<?php
session_start();

include('./db/conn.php');
include_once('./inc/header.php');
include_once('./inc/navbar.php');
include_once('./inc/sidebar.php');

if (isset($_COOKIE['pin']) && isset($_COOKIE['serial'])) {
    $pin = $_COOKIE['pin'];
    $serial = $_COOKIE['serial'];

    // Select query to retrieve user data
    $selectQueryUpload = "SELECT * FROM uploads WHERE Pin = '$pin' AND Serial = '$serial'";
    $resultUploads = $db->query($selectQueryUpload);

    $selectQuery = "SELECT * FROM students WHERE Pin = '$pin' AND Serial = '$serial'";
    $result = $db->query($selectQuery);

    // Check if data is retrieved
    if ($resultUploads->num_rows > 0) {
        $uploads = $resultUploads->fetch_assoc();
        $uploads = $uploads["fileArray"];
        $uploads = json_decode($uploads, true);
    }

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    }
}

$db->close();
?>

        <div class="myDashboard">
            <h1>My Dashboard</h1>
            <div class="dashboard-profile">
                <div class="profile-picture">
                    <img width="140px" height="140px" src="<?= $uploads['passport'] ? $uploads['passport'] : "./images/Frame 3293.png"?>" alt="profile-picture">
                </div>
                <div class="profile-text">
                    <?php if (isset($userData)) : ?>
                        <h2>Welcome, <?php echo $userData['username']; ?></h2>
                        <h3><a class="complete-biodata" href="personalInfo.php">Complete Biodata</a></h3>
                        <h3>Course - Nil</h3>
                        <p><i class="fa fa-envelope"></i> <?php echo $userData['email']; ?></p>
                        <p><i class="fa fa-phone"></i> <?php echo $userData['mobileNumber']; ?></p>
                        <p><i class="fa fa-calendar-check"></i> 2023/2024 Session</p>
                    <?php else : ?>
                        <h2>Welcome, User</h2>
                        <h3><a href="#">Complete Biodata</a></h3>
                        <h3>Course - Nil</h3>
                        <p><i class="fa fa-envelope"></i> example@example.com</p>
                        <p><i class="fa fa-phone"></i> +1234567890</p>
                        <p><i class="fa fa-calendar-check"></i> 2023/2024 Session</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="admission-status">
                <h2>Admission Status</h2>
                <div class="admission-text">
                    <?php if (isset($userData)) : ?>
                        <p>Date Registered: <?php echo date('d/m/Y', strtotime($userData['registrationDate'])); ?></p>
                        <p>Admission Status:<span style="color: goldenrod;"> <?= $userData['status'] == "pending" ? "Pending" : "Approved" ?></span></p>
                        <p>Submission Status:<span style="color:<?= $userData['isSubmitted'] == "1" ? "blue;" : "goldenrod;" ?>"> <?= $userData['isSubmitted'] == "1" ? "Submitted" : "Not Submitted " ?> </span></p>
                    <?php else : ?>
                        <p>Date Registered: Not available</p>
                        <p>Admission Status:<span style="color: goldenrod;"> Pending </span></p>
                        <p>Submission Status:<span style="color: goldenrod;"> Not Submitted </span></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="./js/app.js"></script> -->
</body>
</html>




