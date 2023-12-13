<?php
session_start();
include_once('../db/conn.php');

// Select the username from the admin table
$usernameQuery = "SELECT username FROM admin LIMIT 1"; // You may adjust this query based on your actual table structure

$result = $db->query($usernameQuery);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username'];
} else {
    $username = "Default Username"; // Set a default username if no data is retrieved
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&family=Lobster+Two:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../font-awesome-6/css/all.min.css">
<link rel="stylesheet" href="../css/style.css">
<script src="../js/jquery.js"></script>
<script src="../js/sweetalert.min.js"></script>

<link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
<script type="text/javascript" src="../js/validation.min.js"></script>
<title>Premier Nursing College</title>
<body>
    <nav class="navbar_1 ">
        <div class="logo">
            <a href="dashboard.php" style="color: gray; font-weight: 800;">
                Premier Nursing College
            </a>
        </div>
        <div class="portal" style="display: flex; align-items: center;">
            <div class="portal-picture">
                <!-- <img src="./images/Frame 3293.png" alt=""> -->
            </div>
            <div class="portal-text">
                <p>Welcome, <?=$username?>
                     <!-- <i class="fa fa-angle-down"></i> -->
                </p>
            </div>
        </div>
    </nav>
    <div class="dashboard">