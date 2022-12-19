<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examination Section</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link rel="stylesheet" href="ExamSection_style.css">
    <style>
    input {
        width: 100px;
        font-size: medium;
        text-align: center;
    }
    </style>
</head>

<body>
    <form method="post">
        <!--Here displaying all the necessary informatio of student-->
        <header class="header-container">
            <nav class="navbar navbar-dark bg-dark" style="position: relative;">
                <h3 style="margin-left: 30px; color: white;" id="student-name"></h3>
                <h6
                    style="color: rgba(255, 255, 255, 0.7); margin-left: 20px; position:absolute; right: 10px; font-size: 12px;">
                    Powered By DNM @ Copyright 2022</h6>
            </nav>
            <hr>
            <div class="student-details-container">
                <h5 id="dept">Department : Computer Engineering</h5>
                <h5 id="scheme">Scheme : C-SCHEME</h5>
                <h5>Department Level Optional Course : Internet Programming</h5>
                <h5>Institute Level Optional Course : Distributed Computing</h5>
            </div>
            <!--End of student's details-->
            <hr>
            <!--Here container for displaying semester numbers-->
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups"
                style="display: grid; grid-template-rows: auto auto">
                <span>Select Semester</span>
                <div class="btn-group me-2" role="group" aria-label="First group">
                    <button type="submit" class="btn btn-primary" name="sem1">1</button>
                    <button type="submit" class="btn btn-primary" name="sem2">2</button>
                    <button type="submit" class="btn btn-primary" name="sem3">3</button>
                    <button type="submit" class="btn btn-primary" name="sem4">4</button>
                    <button type="submit" class="btn btn-primary" name="sem5">5</button>
                    <button type="submit" class="btn btn-primary" name="sem6">6</button>
                    <button type="submit" class="btn btn-primary" name="sem7">7</button>
                    <button type="submit" class="btn btn-primary" name="sem8">8</button>
                </div>
            </div>
            <!--End of semester container-->
        </header>
        <!--To keep a track of current semester-->
        <?php
        if (isset($_POST['sem1'])) $_SESSION['sem_no'] = 1;
        elseif (isset($_POST['sem2'])) $_SESSION['sem_no'] = 2;
        elseif (isset($_POST['sem3'])) $_SESSION['sem_no'] = 3;
        elseif (isset($_POST['sem4'])) $_SESSION['sem_no'] = 4;
        elseif (isset($_POST['sem5'])) $_SESSION['sem_no'] = 5;
        elseif (isset($_POST['sem6'])) $_SESSION['sem_no'] = 6;
        elseif (isset($_POST['sem7'])) $_SESSION['sem_no'] = 7;
        if (isset($_POST['sem8'])) $_SESSION['sem_no'] = 8;
        ?>
    </form>
    <!--core part of the page starts here-->
    <!--Here displaying table based on subjects of student in each semester depending on scheme and department-->
    <div class="table-container">
        <form method="post">
            <!--Here input field is provided to enter student's ID and search it's entire data from database-->
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter Student's ID"
                    aria-label="Recipient's username" aria-describedby="basic-addon2" name="id">
                <input type="hidden" name="embedded-id" value="<?php if (isset($_POST['id'])) echo $_POST['id']; ?>">
                <span class="input-group-text" id="basic-addon2">
                    <button type="submit" name="search" style="border:none;">Search</button>
                    <span id="search-icon">
                        <ion-icon name="search"></ion-icon>
                    </span>
                </span>
            </div>
            <!--Paste Here previous code-->
            <div class="m1">
                <h3 id="semester-number" name="semester-no" value="<?php echo $_SESSION['sem_no'] ?>">
                    <input type="hidden" name="semester-no" value="<?php echo $_SESSION['sem_no'] ?>">
                    <?php echo "SEMESETER : " . $_SESSION['sem_no'] ?>
                </h3>
                <table class="table table-dark" style="text-align: center;">
                    <tr>
                        <th style="border: 1px solid gray;" rowspan=2>Subjects</th>
                        <th style="border: 1px solid gray;" colspan=3>LPW</th>
                        <th style="border: 1px solid gray;" rowspan=2>Credits</th>
                        <th style="border: 1px solid gray;" colspan=3>Grade</th>
                        <th style="border: 1px solid gray;" rowspan=2>Credits Earned<br>C</th>
                        <th style="border: 1px solid gray;" rowspan=2>Grade points <br>G</th>
                        <th style="border: 1px solid gray;" rowspan=2>C X G</th>
                    </tr>
                    <tr>
                        <th style="border: 1px solid gray;">L</th>
                        <th style="border: 1px solid gray;">p</th>
                        <th style="border: 1px solid gray;">T</th>
                        <th style="border: 1px solid gray;">ESE/PR/OR</th>
                        <th style="border: 1px solid gray;">IA/TW</th>
                        <th style="border: 1px solid gray;">Overall</th>
                    </tr>
                    <tbody>
                        <!--Here we will fetch data from database based on ID proveded-->
                        <?php
                        $con = new mysqli('localhost', 'root', '', 'transcriptDB');
                        if (isset($_POST['search'])) {
                            $_SESSION['id'] = $_POST['id'];
                            if ($con) {
                                $student_details = mysqli_fetch_assoc($con->query('SELECT name, department, scheme FROM students WHERE sid = "' . $_POST['id'] . '";'));
                                $scheme_dept = mysqli_fetch_assoc($con->query('SELECT scheme, department FROM students WHERE sid = "' . $_POST['id'] . '";'));
                                $scheme_id = mysqli_fetch_assoc($con->query('SELECT scheme_id FROM schemes WHERE scheme_name = "' . $scheme_dept['scheme'] . '";'));
                                $dept_id = mysqli_fetch_assoc($con->query('SELECT dept_id FROM departments WHERE dept_name = "' . $scheme_dept['department'] . '";'));
                                $subjects = $con->query('SELECT subject_name FROM subjects WHERE scheme_id = ' . strval($scheme_id['scheme_id']) . ' AND dept_id = ' . strval($dept_id['dept_id']) . ' AND sem_no = ' . $_SESSION['sem_no'] . ';');
                                $marks = $con->query('SELECT * FROM warehouse WHERE sid = "' . $_POST['id'] . '" AND sem_no = ' . strval($_SESSION['sem_no']) . ';');
                                $i = 0;
                                echo "
                                    <script>    
                                        document.getElementById('student-name').textContent = String('Student Name : " . $student_details['name'] . "')
                                        document.getElementById('dept').textContent = String('Department : " . $student_details['department'] . "')
                                        document.getElementById('scheme').textContent = String('Scheme : " . $student_details['scheme'] . "')
                                    </script>
                                ";
                                //Here we are displaying marks of student according to subjects;
                                while ($row = $subjects->fetch_assoc()) {
                                    while ($col = $marks->fetch_assoc()) {
                        ?>
                        <tr>
                            <th style="border: 1px solid gray;"><?php echo ($col['subject']) ?></th>
                            <input type="hidden" value="<?php echo ($col['subject']) ?>" name="subjects[]">
                            <td style="border: 1px solid gray;">
                                <input type="text" value="Default Value" disabled />
                            </td>
                            <td>
                                <input type="text" value="Default Value" disabled />
                            </td style="border: 1px solid gray;">
                            <td>
                                <input type="text" value="Default Value" disabled />
                            </td>
                            <td style="border: 1px solid gray;">
                                <input type="text" value="Default Value" disabled />
                            </td>
                            <td style="border: 1px solid gray;">
                                <input type="number" value="<?php echo $col['ese'] ?>"
                                    name="<?php echo str_replace(" ",  "-", $col['subject']) ?>[]" />
                            </td>
                            <td style="border: 1px solid gray;">
                                <input type="number" value="<?php echo $col['ia_tw'] ?>"
                                    name="<?php echo str_replace(" ",  "-", $col['subject']) ?>[]" />
                            </td>
                            <td style="border: 1px solid gray;">
                                <input type="number" value="<?php echo $col['overall'] ?>"
                                    name="<?php echo str_replace(" ",  "-", $col['subject']) ?>[]" />
                            </td>
                            <td style="border: 1px solid gray;">
                                <input type="number" value="<?php echo $col['credits_earned'] ?>"
                                    name="<?php echo str_replace(" ",  "-", $col['subject']) ?>[]" />
                            </td>
                            <td style="border: 1px solid gray;">
                                <input type="number" value="<?php echo $col['credits_pts'] ?>"
                                    name="<?php echo str_replace(" ",  "-", $col['subject']) ?>[]" />
                            </td>
                            <td style="border: 1px solid gray;">
                                <input type="number" value="<?php echo $col['cxg'] ?>"
                                    name="<?php echo str_replace(" ",  "-", $col['subject']) ?>[]" />
                            </td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary" style="position: absolute; left: 50%; transform"
                    name="button1" id="button1">Primary</button>
                <?php
                if (isset($_POST["button1"])) {
                    $sem_no = $_POST['semester-no'];
                    $id =  $_POST['embedded-id'];
                    $subjects = $_POST['subjects'];

                    $con = new mysqli('localhost', 'root', '', 'transcriptDB');
                    foreach ($subjects as $subject) {
                        $sql = "DELETE FROM warehouse WHERE sid=" . $id . " && subject='" . $subject . "' && sem_no=" . $sem_no;
                        echo  $sql;
                        if ($con->query($sql) === TRUE) {
                            //echo "Record deleted successfully";
                        } else {
                            //echo "Error deleting record: " . $con->error;
                        }
                    }
                    //update

                    //$sub = str_replace(" ",  "-", $subjects[0]);
                    $i = 0;

                    foreach ($subjects as $subject) {
                        $ese = str_replace(" ",  "-", $subject);
                        $marks = ($_POST[str_replace(" ",  "-", $subjects[$i])]);
                        $sql = "INSERT INTO `warehouse` VALUES ('$id','$subject','C-SCHEME','Computer Engineering','$sem_no',NULL,'$marks[0]','$marks[1]','$marks[2]','$marks[3]','$marks[4]','$marks[5]')";

                        $i++;
                        //echo  $sql;
                        if ($con->query($sql) === TRUE) {
                            //echo "Record deleted successfully";
                        } else {
                            //echo "Error deleting record: " . $con->error;
                        }
                    }
                }


                ?>

            </div>
        </form>
        <form>

        </form>
    </div>
</body>

</html>
