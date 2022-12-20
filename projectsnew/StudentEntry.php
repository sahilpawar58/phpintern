<?php
    session_start();
    $con = new mysqli('localhost', 'root', 'Dhamu@2002', 'transcriptDB');
    if($con) {
        $new_student = '
            INSERT INTO students VALUES (
                "'.$_POST['mobile-number'].'", "'.$_POST['name'].'", "'.$_POST['email'].'", "'.
                $_POST['scheme-name'].'", "'.$_POST['department-name'].'");';
        $_SESSION['Username'] = $_POST['name'];
        if($con->query($new_student)) header('location: DataEntry.php');
        else $con->error;
    }
    else {
        echo $con->error;
    }
?>