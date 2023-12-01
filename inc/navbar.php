<?php
include('./db/conn.php');
if (isset($_COOKIE['pin']) && isset($_COOKIE['serial'])) {
    $pin = $_COOKIE['pin'];
    $serial = $_COOKIE['serial'];

    $selectQueryUpload = "SELECT * FROM uploads WHERE Pin = '$pin' AND Serial = '$serial'";
    $resultUploads = $db->query($selectQueryUpload);

    $selectQuery = "SELECT * FROM students WHERE Pin = '$pin' AND Serial = '$serial'";
    $result = $db->query($selectQuery);

    if ($resultUploads->num_rows > 0) {
        $uploads = $resultUploads->fetch_assoc();
        $uploads = $uploads["fileArray"];
        $uploads = json_decode($uploads, true);
    }

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    }
}

?>
<nav class="navbar_1 ">
        <div class="logo">
            <a href="index.php" style="color: gray; font-weight: 800;">
                Premier Nursing College
            </a>
        </div>
        <div class="portal" style="display: flex; align-items: center;" onclick="window.location.href='myDashboard.php'">
            <div class="portal-picture">
            <img width="35px" height="35px" src="<?= $uploads['passport'] ? $uploads['passport'] : "./images/Frame 3293.png"?>" alt="profile-picture">
            </div>
            <div class="portal-text">
                <p><?= $userData ? $userData['surname']." ".$userData['firstName'] : "Student"?><i class="fa fa-angle-down"></i></p>
            </div>
        </div>
    </nav>