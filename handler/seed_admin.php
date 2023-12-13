<?php
include '../db/conn.php';

$username = 'admin';
$password = 'password';

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$insertQuery = "INSERT INTO admin (username, password, role) VALUES ('$username', '$hashedPassword', '1')";

if ($db->query($insertQuery) === TRUE) {
    echo "New admin record created successfully";
} else {
    echo "Error: " . $insertQuery . "<br>" . $db->error;
}

$db->close();
?>
