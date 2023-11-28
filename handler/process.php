<?php
session_start();
include '../db/conn.php';
if (isset($_COOKIE['pin']) && isset($_COOKIE['serial'])) {
    $pin = $_COOKIE['pin'];
    $serial = $_COOKIE['serial'];

    if (isset($_POST['result']) && $_POST['exambody']) {
        $exambody = $_POST['exambody'];
        $examdate = $_POST['examdate'];
        $results = $_POST['result'];
        $examindex = $_POST['examindex'];
    
        $qued = "SELECT * FROM Olevel WHERE Serial='$serial'&& Pin='$pin'";
        $resul = mysqli_query($db, $qued);
        $checks = mysqli_num_rows($resul);
        if ($checks == 0) {
            $queryz =
                'INSERT INTO Olevel (ExamBody,ExamDate,ExamIndex,Results,Serial,Pin) ' .
                "VALUES ('$exambody','$examdate','$examindex','$results','$serial','$pin')";
            $db->query($queryz) or die('Error, query failed to upload!');
            echo "Examination History Saved Successfully!";
        }
    }

} else {
      die('Canditate is not logged in!');


}
?>
