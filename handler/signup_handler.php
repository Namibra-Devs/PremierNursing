<?php
session_start();

include( '../db/conn.php' );

if ( isset( $_COOKIE[ 'pin' ] ) && isset( $_COOKIE[ 'serial' ] ) ) {
    $pin = $_COOKIE[ 'pin' ];
    $serial = $_COOKIE[ 'serial' ];

    if ( isset( $_POST[ 'signup_button' ] ) ) {
        $username = $_POST[ 'username' ];
        $surname = $_POST[ 'surname' ];
        $firstName = $_POST[ 'firstname' ];
        $middleName = $_POST[ 'middlename' ];
        $email = $_POST[ 'email' ];
        $mobileNumber = $_POST[ 'mobile' ];
        $password = $_POST[ 'password' ];

        $checkExisting = "SELECT username, email FROM students WHERE username='$username' OR email='$email'";
        $result = $db->query( $checkExisting );

        if ( $result->num_rows > 0 ) {
            while ( $row = $result->fetch_assoc() ) {
                if ( $row[ 'username' ] === $username ) {
                    echo '12';
                } elseif ( $row[ 'email' ] === $email ) {
                    echo '13';
                }
            }
        } else {
            $sql = "INSERT INTO students (username, surname, firstName, middleName, email, mobileNumber, password, Serial, Pin)
                    VALUES ('$username', '$surname', '$firstName', '$middleName', '$email', '$mobileNumber', '$password', '$serial', '$pin')";

            if ( $db->query( $sql ) === TRUE ) {
                
                setcookie("username",$username,time()+(60*60*24*7), '/');	
                echo '200';
            } else {
                echo 'Error: ' . $sql . '<br>' . $db->error;
            }
        }
    }

    $db->close();
} else {
    echo '401';
}
?>