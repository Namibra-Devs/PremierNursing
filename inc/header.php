<?php
 include_once('./db/conn.php');
 if ( !isset( $_COOKIE[ 'pin' ] ) && !isset( $_COOKIE[ 'serial' ] ) ) {
    header("Location: confirmation.php");
    exit;
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
<link rel="stylesheet" href="./css/style.css">
<script src="js/jquery.js"></script>
<script src="js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<script type="text/javascript" src="js/validation.min.js"></script>
<title>Premier Nursing College</title>
</head>
<body>

  