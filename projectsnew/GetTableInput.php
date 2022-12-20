<?php
    session_start();
    $con = new mysqli('localhost', 'root', 'Dhamu@2002', 'transcriptDB');
    $subjects = $con->query('SELECT subject_name FROM subjects WHERE scheme_id = 1 AND dept_id = 1 AND sem_no = '.$_SESSION['sem_no'].';');
    $student_details = mysqli_fetch_array($con->query('SELECT * FROM students WHERE name = "'.$_SESSION['Username'].'";'));
    $sem_no = $con->query('SELECT DISTINCT sem_no FROM warehouse WHERE sid = "'.$student_details['sid'].'";');
    $flag = false;
    while ($num = $sem_no->fetch_assoc()) {
        if (strval($num['sem_no']) == $_SESSION['sem_no']) {
            $flag = true;
            break;
        }
    }
    if ($flag) echo "Semester ".$_SESSION['sem_no']." marks already exists!";
    else {
        while($row = $subjects->fetch_assoc()) {
            $marks = $_POST['-'.str_replace(" ", "", $row['subject_name']).'-'];
            $add_row_query = '
            INSERT INTO warehouse
                VALUES("'.$student_details['sid'].'", "'.$row['subject_name'].'", "'.$student_details['scheme'].'" , "'.$student_details['department'].
                '", "'.$_SESSION['sem_no'].'", NULL, '.$marks[0].', '.$marks[1].
                ', '.$marks[2].', '.$marks[3].', '.$marks[4].', '.$marks[5].
                ');';
            // echo $add_row_query."<br>";
            if ($con->query($add_row_query)) echo "success";
            else echo $con->error."<br>";
        }
        header('location: DataEntry.php');
    }
