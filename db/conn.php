<?php
require_once( 'config.php' );

$db = new mysqli( $host, $username, $password );
if ( $db->connect_errno > 0 ) {
    die( 'Unable to connect to database [' . $db->connect_error . ']' );
} else {
    echo 'Database connected successfully!';
    $db->query( "CREATE DATABASE IF NOT EXISTS `$dbName`" );

    mysqli_select_db( $db, $dbName );
}

?>