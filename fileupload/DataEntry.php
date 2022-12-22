<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="DataEntry_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>DataEntry</title>
    <style>
    input {
        width: 100px;
        font-size: medium;
        text-align: center;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark" style="position: relative;">
        <div class="student-details-container" style="display: grid; grid-template-rows:auto auto;">
            <h3 style="margin-left: 30px; color: white;">Student Name : <?php echo $_SESSION['Username']; ?></h3>
            <h5 style="color: white; margin-left: 30px;" id="department"></h5>
        </div>
        <span
            style="color: rgba(255, 255, 255, 0.7); display:flex; justify-content:center; position:relative; right:15%;">
            <span>
                <ion-icon name="log-out" id="log-out-icon"></ion-icon>
            </span>
        </span>
        <h6
            style="color: rgba(255, 255, 255, 0.7); margin-left: 20px; position:absolute; right: 10px; font-size: 12px;">
            Powered By DNM @ Copyright 2022
        </h6>
    </nav>
    <form method="post">
        <header class="header-container">
            <div class="col-md-9">
                <label for="inputState" class="form-label">Choose Scheme</label>
                <select id="inputState" class="form-select" name="scheme-name">
                    <option value="C-SCHEME">C-SCHEME</option>
                    <option value="CBCGS">CBCGS</option>
                    <option value="CHSGS">CBSGS</option>
                </select>
            </div>
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
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">University Registration Number</label>
                <input type="text" class="form-control" id="inputEmail4" name="urn" autocomplete="off">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Date of Examination</label>
                <input type="date" class="form-control" id="inputEmail4" name="doe">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Enter department level optional course
                    name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="dloc">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Enter institute level optional course
                    name</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" name="iloc">
            </div>
        </header>
        <hr>
        <?php
        if (isset($_POST['sem1'])) {
            $_SESSION['sem_no'] = 1;
            $_SESSION['scheme'] = $_POST['scheme-name'];
        } elseif (isset($_POST['sem2'])) {
            $_SESSION['sem_no'] = 2;
            $_SESSION['scheme'] = $_POST['scheme-name'];
        } elseif (isset($_POST['sem3'])) {
            $_SESSION['sem_no'] = 3;
            $_SESSION['scheme'] = $_POST['scheme-name'];
        } elseif (isset($_POST['sem4'])) {
            $_SESSION['sem_no'] = 4;
            $_SESSION['scheme'] = $_POST['scheme-name'];
        } elseif (isset($_POST['sem5'])) {
            $_SESSION['sem_no'] = 5;
            $_SESSION['scheme'] = $_POST['scheme-name'];
        } elseif (isset($_POST['sem6'])) {
            $_SESSION['sem_no'] = 6;
            $_SESSION['scheme'] = $_POST['scheme-name'];
        } elseif (isset($_POST['sem7'])) {
            $_SESSION['sem_no'] = 7;
            $_SESSION['scheme'] = $_POST['scheme-name'];
        }
        if (isset($_POST['sem8'])) $_SESSION['sem_no'] = 8;
        ?>
    </form>
    <div class="table-container">
        <form method="post" enctype="multipart/form-data">
            <div class="m1">
                <div id="semester-scheme-container" style="display: grid; grid-template-columns:auto auto;">
                    <h3 id="semester-number"><?php echo "SEMESETER : " . $_SESSION['sem_no'] ?></h3>
                </div>
                <table class="table table-dark" style="text-align: center; border: 2px solid gray; margin-top: 10px;">
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
                        <?php
                        $con = new mysqli('localhost', 'root', '', 'transcriptDB');
                        if ($con) {
                            $department = mysqli_fetch_assoc($con->query('SELECT department FROM students WHERE sid = "' . $_SESSION['id'] . '";'));
                            echo "
                                <script>
                                    document.getElementById('department').textContent = 'Department : " . $department['department'] . "'
                                </script>
                            ";
                            $scheme_dept = mysqli_fetch_assoc($con->query('SELECT department FROM students WHERE sid = "' . $_SESSION['id'] . '";'));
                            $scheme_id = mysqli_fetch_assoc($con->query('SELECT scheme_id FROM schemes WHERE scheme_name = "' . $_SESSION['scheme'] . '";'));
                            $dept_id = mysqli_fetch_assoc($con->query('SELECT dept_id FROM departments WHERE dept_name = "' . $scheme_dept['department'] . '";'));
                            $subjects = $con->query('SELECT subject_name FROM subjects WHERE scheme_id = ' . strval($scheme_id['scheme_id']) . ' AND dept_id = ' . strval($dept_id['dept_id']) . ' AND sem_no = ' . $_SESSION['sem_no'] . ';');
                            while ($row = $subjects->fetch_assoc()) {
                        ?>
                        <tr>
                            <th><?php echo ($row['subject_name']) ?></th>
                            <td style="border: 1px solid gray;">
                                <input type="text" value="Default Value" disabled />
                            </td>
                            <td style="border: 1px solid gray;">
                                <input type="text" value="Default Value" disabled />
                            </td>
                            <td style="border: 1px solid gray;">
                                <input type="text" value="Default Value" disabled />
                            </td>
                            <td style="border: 1px solid gray;">
                                <input type="text" value="Default Value" disabled />
                            </td>
                            <td style="border: 1px solid gray;">
                                <input type="text"
                                    name="-<?php echo str_replace(" ",  "", $row['subject_name']) ?>-[]" />
                            </td>
                            <td style="border: 1px solid gray;">
                                <input type="text"
                                    name="-<?php echo str_replace(" ",  "", $row['subject_name']) ?>-[]" />
                            </td>
                            <td style="border: 1px solid gray;">
                                <input type="text"
                                    name="-<?php echo str_replace(" ",  "", $row['subject_name']) ?>-[]" />
                            </td>
                            <td style="border: 1px solid gray;">
                                <input type="text"
                                    name="-<?php echo str_replace(" ",  "", $row['subject_name']) ?>-[]" />
                            </td>
                            <td style="border: 1px solid gray;">
                                <input type="text"
                                    name="-<?php echo str_replace(" ",  "", $row['subject_name']) ?>-[]" />
                            </td>
                            <td style="border: 1px solid gray;">
                                <input type="text"
                                    name="-<?php echo str_replace(" ",  "", $row['subject_name']) ?>-[]" />
                            </td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="file_upload_container">
                <div class="mb-2">
                    <script>
                    function previewme() {
                        document.getElementById("c1").setAttribute("style", "")
                    }
                    window.addEventListener("load", function() {
                        document.getElementById("formFileMultiple").onchange = function(event) {
                            var reader = new FileReader();
                            var c1 = document.getElementById("c1");
                            reader.readAsDataURL(event.srcElement.files[0]);
                            var me = this;
                            reader.onload = function() {
                                var fileContent = reader.result;
                                c1.setAttribute("src", fileContent)
                                console.log(fileContent);
                            }
                        }
                        $('#formFileMultiple').bind('change', function() {
                            var filesize = this.files[0].size;
                            if (filesize > 262144) {
                                alert("file size too large");
                                document.getElementById("finalsubmit").disabled = true
                                document.getElementById("preview").disabled = true
                            } else {
                                document.getElementById("finalsubmit").disabled = false
                                document.getElementById("preview").disabled = false
                            }
                        })
                    });
                    </script>
                    <label for="formFileMultiple" class="form-label">Upload Marksheet of semester:
                        <?php echo $_SESSION['sem_no'] ?></label>
                    <div class="k1">
                        <input class="form-control" type="file" id="formFileMultiple" name="formFileMultiple"
                            accept=".pdf">
                        <button id="preview" onclick="previewme()" type="button" class="btn btn-primary"
                            disabled>Preview</button>
                    </div>
                </div>
                <iframe src="data:base64..." id="c1" style="display: none;" display="hide" alt="Upoad File"></iframe>
            </div>
            <button type="submit" class="btn btn-success" name="submit" id="finalsubmit" disabled>Submit</button>

            <?php
            $con = new mysqli('localhost', 'root', '', 'transcriptDB');
            if (isset($_POST['submit'])) {
                echo $_SESSION['scheme'] . "<br>";
                try {

                    if ($con) {
                        $scheme_dept = mysqli_fetch_assoc($con->query('SELECT department FROM students WHERE sid = "' . $_SESSION['id'] . '";'));
                        $scheme_id = mysqli_fetch_assoc($con->query('SELECT scheme_id FROM schemes WHERE scheme_name = "' . $_SESSION['scheme'] . '";'));
                        $dept_id = mysqli_fetch_assoc($con->query('SELECT dept_id FROM departments WHERE dept_name = "' . $scheme_dept['department'] . '";'));
                        $subjects = $con->query('SELECT subject_name FROM subjects WHERE scheme_id = ' . strval($scheme_id['scheme_id']) . ' AND dept_id = ' . strval($dept_id['dept_id']) . ' AND sem_no = ' . $_SESSION['sem_no'] . ';');
                        $student_details = mysqli_fetch_array($con->query('SELECT * FROM students WHERE name = "' . $_SESSION['Username'] . '";'));
                        $sem_no = $con->query('SELECT DISTINCT sem_no FROM warehouse WHERE sid = "' . $student_details['sid'] . '";');
                        $flag = false;
                        while ($num = $sem_no->fetch_assoc()) {
                            if (strval($num['sem_no']) == $_SESSION['sem_no']) {
                                $flag = true;
                                break;
                            }
                        }
                        if ($flag) echo "
                                <script>
                                    alert('Semester : " . $_SESSION['sem_no'] . " marks already entered!)
                                </script>
                            ";
                        else {
                            while ($row = $subjects->fetch_assoc()) {
                                $marks = $_POST['-' . str_replace(" ", "", $row['subject_name']) . '-'];
                                $add_row_query = '
                    INSERT INTO warehouse
                        VALUES("' . $student_details['sid'] . '", "' . $row['subject_name'] . '", "' . $_SESSION['scheme'] . '" , "' . $student_details['department'] .
                                    '", "' . $_SESSION['sem_no'] . '", NULL, ' . $marks[0] . ', ' . $marks[1] .
                                    ', ' . $marks[2] . ', ' . $marks[3] . ', ' . $marks[4] . ', ' . $marks[5] .
                                    ');';
                                //echo $add_row_query . "broooo";
                                $con->query($add_row_query);
                                if (isset($_FILES['formFileMultiple']['name'])) {
                                    $file_name = $_FILES['formFileMultiple']['name'];
                                    $file_tmp = $_FILES['formFileMultiple']['tmp_name'];
                                    //$t = time();
                                    if (!defined("t")) {
                                        define("t", time());
                                    }

                                    $new_name = $_SESSION['id'] . "_" . t . ".pdf";
                                    move_uploaded_file($file_tmp, "./pdf/" . $new_name);

                                    $updatequery = "Update files set sem" . $_SESSION['sem_no'] . "='" . $new_name . "' where sid =" . $_SESSION['id'];
                                    //echo $update . "hii";
                                    $iquery = mysqli_query($con, $updatequery);
                                }
                            }
                            echo "
                                        <script>
                                            alert('Details Uploaded Successfully!')
                                        </script>
                                    ";
                        }
                    }
                } catch (Exception $e) {
                }
            }
            ?>
        </form>
    </div>
    <script>
    document.getElementById('log-out-icon').addEventListener('click', () => {
        location.href = 'index.php'
    })
    </script>
</body>

</html>