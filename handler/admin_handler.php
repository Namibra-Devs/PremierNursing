<?php
session_start();
include '../db/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['studentId']) && isset($_POST['action'])) {
        $studentId = $_POST['studentId'];
        $action = $_POST['action'];

        if ($action === 'admit') {
            $updateQuery = "UPDATE students SET isApproved = '2' WHERE id = $studentId";
            echo "2";
        } elseif ($action === 'reject') {
            $updateQuery = "UPDATE students SET isApproved = '1' WHERE id = $studentId";
            echo "1";
        }

        try {
            // Execute the query
            if ($db->query($updateQuery) === TRUE) {
                echo "Record updated successfully";
            } else {
                throw new Exception("Error updating record: " . $db->error);
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Retrieve hashed password from the database based on the provided username
        $query = "SELECT * FROM admin WHERE username = '$username'";
        $result = $db->query($query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];

            // Verify the provided password with the hashed password from the database
            if (password_verify($password, $hashedPassword)) {
                // Passwords match - login successful
                $adminId = $row['admin_id'];
                $username = $row['username'];
                
                // Redirect to the admin dashboard or any desired page after successful login
                // header("Location: dashboard.php");
                setcookie("admin_id",$adminId,time()+(60*60*24*7), '/');	
                setcookie("username",$username,time()+(60*60*24*7), '/');	
                echo '200';
                // exit();
            } else {
                // Incorrect password
                echo "Incorrect password";

            }
        } else {
            // Username not found
            echo "Incorrect username";
        }

    
}
}else{
    echo "500";
    // exit()
}
$db->close();
?>
