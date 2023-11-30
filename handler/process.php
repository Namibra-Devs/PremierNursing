<?php
session_start();
try {
    include '../db/conn.php';
    if ( isset( $_COOKIE[ 'pin' ] ) && isset( $_COOKIE[ 'serial' ] ) ) {
        $pin = $_COOKIE[ 'pin' ];
        $serial = $_COOKIE[ 'serial' ];

        if (isset($_POST['pagename']) && $_POST['pagename'] == 'examhistory') {
            $exambody = $_POST['exambody'];
            $examdate = $_POST['examdate'];
            $results = $_POST['result'];
            $examindex = $_POST['examindex'];
        
            $qued = "SELECT * FROM Olevel WHERE Serial='$serial' && Pin='$pin'";
            $resul = mysqli_query($db, $qued);
            $checks = mysqli_num_rows($resul);
        
            if ($checks == 0) {
                $queryz =
                    'INSERT INTO Olevel (ExamBody, ExamDate, ExamIndex, Results, Serial, Pin) ' .
                    "VALUES ('$exambody', '$examdate', '$examindex', '$results', '$serial', '$pin')";
                $db->query($queryz) or die('Error, query failed to upload!');
                echo '200';
            } else {
                // Use an UPDATE query to update existing records
                $updateQuery = "UPDATE Olevel SET ExamBody='$exambody', ExamDate='$examdate', ExamIndex='$examindex', Results='$results' WHERE Serial='$serial' && Pin='$pin'";
                if ($db->query($updateQuery) === TRUE) {
                    echo '17';
                } else {
                    echo '500';
                }
            }
        }
        

        if ( isset( $_POST[ 'pagename' ] ) && $_POST[ 'pagename' ] == 'personalinfo' ) {

            $title = isset( $_POST[ 'title' ] ) ? trim( $_POST[ 'title' ] ) : '';
            $surname = isset( $_POST[ 'surname' ] ) ? trim( $_POST[ 'surname' ] ) : '';
            $other_name = isset( $_POST[ 'other_name' ] ) ? trim( $_POST[ 'other_name' ] ) : '';
            $matric = isset( $_POST[ 'matric' ] ) ? trim( $_POST[ 'matric' ] ) : '';
            $gender = isset( $_POST[ 'gender' ] ) ? trim( $_POST[ 'gender' ] ) : '';
            $email = isset( $_POST[ 'email' ] ) ? trim( $_POST[ 'email' ] ) : '';
            $phone = isset( $_POST[ 'phone' ] ) ? trim( $_POST[ 'phone' ] ) : '';
            $dob = isset( $_POST[ 'dob' ] ) ? trim( $_POST[ 'dob' ] ) : '';
            $pob = isset( $_POST[ 'pob' ] ) ? trim( $_POST[ 'pob' ] ) : '';
            $marital_status = isset( $_POST[ 'marital_status' ] ) ? trim( $_POST[ 'marital_status' ] ) : '';
            $rel = isset( $_POST[ 'rel' ] ) ? trim( $_POST[ 'rel' ] ) : '';
            $country = isset( $_POST[ 'country' ] ) ? trim( $_POST[ 'country' ] ) : '';
            $state = isset( $_POST[ 'state' ] ) ? trim( $_POST[ 'state' ] ) : '';
            $town = isset( $_POST[ 'town' ] ) ? trim( $_POST[ 'town' ] ) : '';
            $lga = isset( $_POST[ 'lga' ] ) ? trim( $_POST[ 'lga' ] ) : '';
            $address = isset( $_POST[ 'address' ] ) ? trim( $_POST[ 'address' ] ) : '';
            $personal_info = isset( $_POST[ 'personalinfo' ] ) ? trim( $_POST[ 'personalinfo' ] ) : '';
            $department = isset( $_POST[ 'department' ] ) ? trim( $_POST[ 'department' ] ) : '';
            $level = isset( $_POST[ 'level' ] ) ? trim( $_POST[ 'level' ] ) : '';
            $degree = isset( $_POST[ 'degree' ] ) ? trim( $_POST[ 'degree' ] ) : '';

            try {
                $sql = "SELECT * FROM BioData  WHERE serial='$serial' && pin='$pin'";
                $resultn = mysqli_query( $db, $sql );
                $rowcount = mysqli_num_rows( $resultn );

                if ( $rowcount == 0 )
 {

                    $query = "INSERT INTO BioData (title, surname, other_name, matric, gender, email, phone, dob, pob, marital_status, rel, country, state, town, lga, address, personal_info, department, level, degree, serial, pin) 
                VALUES ('$title', '$surname', '$other_name', '$matric', '$gender', '$email', '$phone', '$dob', '$pob', '$marital_status', '$rel', '$country', '$state', '$town', '$lga', '$address', '$personal_info', '$department', '$level', '$degree', '$serial', '$pin')";

                    $result = $db->query( $query );
                    if ( $result ) {
                        echo '200';
                    } else {
                        die( 'Error, query failed to upload!' );
                    }

                } else {
                    $updateQuery = "UPDATE BioData SET title='$title', surname='$surname', other_name='$other_name', matric='$matric', gender='$gender', email='$email', phone='$phone', dob='$dob', pob='$pob', marital_status='$marital_status', rel='$rel', country='$country', state='$state', town='$town', lga='$lga', address='$address', personal_info='$personal_info', department='$department', level='$level', degree='$degree' WHERE serial='$serial' && pin='$pin'";

                    if ($db->query($updateQuery) === TRUE) {
                        echo '17';
                    } else {
                        die('Error, query failed to update!');
                    }

                }

            } catch ( Throwable $th ) {
                echo '500';
                //Server error
            }
        }

        if ( isset( $_FILES[ 'file' ] ) && isset( $_POST[ 'display' ] ) ) {
            // Handle file upload for display
            $targetDirectory = '../uploads/';
            $extension = pathinfo( $_FILES[ 'file' ][ 'name' ], PATHINFO_EXTENSION );
            $uniqueFilename = uniqid() . '_' . time() . '.' . $extension;
            $targetFile = $targetDirectory . $uniqueFilename;

            if ( move_uploaded_file( $_FILES[ 'file' ][ 'tmp_name' ], $targetFile ) ) {
                $targetFile = str_replace( [ '../', '\r', '\n' ], '', $targetFile );
                echo $targetFile;
                exit;

            } else {
                echo 'Error uploading file.';
                exit;
            }
        } 
        
    
if (isset($_POST['files']) && json_decode($_POST['files'], true) && isset($_POST['upload']) ) {
    $shouldSave = isset($_POST['save']) && $_POST['save'];
    $fileArray = $_POST['files'];

    $qued = "SELECT * FROM uploads WHERE Serial='$serial' && Pin='$pin'";
    $resul = mysqli_query($db, $qued);
    $checks = mysqli_num_rows($resul);

    if ($checks == 0) {
        $sql = "INSERT INTO uploads (fileArray, Serial, Pin) VALUES ('$fileArray', '$serial', '$pin')";

        if ($db->query($sql) === TRUE) {
            echo 'File array saved to the database successfully.';
            echo '200';
        } else {
            echo '500';
        }
    } else {
        $sql = "UPDATE uploads SET fileArray='$fileArray' WHERE Serial='$serial' && Pin='$pin'";

        if ($db->query($sql) === TRUE) {

            if($shouldSave){ // Set the isSubmitted to 1 to update submission status
                $updateQuery = "UPDATE students SET isSubmitted = 1 WHERE Pin = '$pin' AND Serial = '$serial'";
    
                if ($db->query($updateQuery) === TRUE) {
                    echo '18'; //Response code for successful submission
                } else {
                    echo 'Error updating isSubmitted field: ' . $db->error;
                }
            }else{
                echo '17';  //Response code for successful update query
            }

        } else {
            echo '500';
        }

    }
}



if ( isset( $_POST[ 'pagename' ] ) && $_POST[ 'pagename' ] == 'programmechoices' ) {

    $firstChoice = $_POST['first_choice'];
    $secondChoice = $_POST['second_choice'];

    $qued = "SELECT * FROM schoolchoices WHERE Serial='$serial' && Pin='$pin'";
    $resul = mysqli_query($db, $qued);
    $checks = mysqli_num_rows($resul);

    if ($checks == 0) {
        $query = "INSERT INTO schoolchoices (Serial, Pin, FirstChoice, SecondChoice)
        VALUES ('$serial', '$pin', '$firstChoice', '$secondChoice')";

        if (mysqli_query($db, $query)) {
            echo "200";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($db);
        }
    }else{
        $query = "UPDATE schoolchoices SET FirstChoice = '$firstChoice', SecondChoice = '$secondChoice'
        WHERE Serial = '$serial' AND Pin = '$pin'";

if ($db->query($query) === TRUE) {
echo "17";
} else {
echo "Error updating record: " . $db->error;
}
    }


}





    } else {
        echo '401';
        // Canditate is not logged in!

    }
} catch ( Throwable $th ) {
    echo '500';
}
?>



