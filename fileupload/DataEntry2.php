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
        <h3 style="margin-left: 30px; color: white;">Student Name : <?php echo $_SESSION['Username']; ?></h3>
        <h6
            style="color: rgba(255, 255, 255, 0.7); margin-left: 20px; position:absolute; right: 10px; font-size: 12px;">
            Powered By DNM @ Copyright 2022</h6>
    </nav>
    <form method="post">
        <header class="header-container">
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
                <input type="text" class="form-control" id="inputEmail4" name="name" autocomplete="off">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Date of Examination</label>
                <input type="date" class="form-control" id="inputEmail4" name="name">
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
    <div class="table-container">
        <form method="post">
            <div class="m1">
                <h3 id="semester-number"><?php echo "SEMESETER : " . $_SESSION['sem_no'] ?></h3>
                <table class="table table-dark" style="text-align: center; border: 2px solid gray;">
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
                            $scheme_dept = mysqli_fetch_assoc($con->query('SELECT scheme, department FROM students WHERE name = "' . $_SESSION['Username'] . '";'));
                            $scheme_id = mysqli_fetch_assoc($con->query('SELECT scheme_id FROM schemes WHERE scheme_name = "' . $scheme_dept['scheme'] . '";'));
                            $dept_id = mysqli_fetch_assoc($con->query('SELECT dept_id FROM departments WHERE dept_name = "' . $scheme_dept['department'] . '";'));
                            // $query = 'SELECṇT subject_name FROM subjects WHERE scheme_id = ' . strval($scheme_id['scheme_id']) . ' AND dept_id = ' . strval($dept_id['dept_id']) . ' AND sem_no = ' . $_SESSION['sem_no'] . ';';
                            // echo $query;
                            $subjects = $con->query('SELECT subject_name FROM subjects WHERE scheme_id = ' . strval($scheme_id['scheme_id']) . ' AND dept_id = ' . strval($dept_id['dept_id']) . ' AND sem_no = ' . $_SESSION['sem_no'] . ';');
                            // echo print_r($subjects);
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
                                c1.setAttribute("src", fileContent);
                                document.getElementById("realfile").setAttribute("value", fileContent);
                                //c1.setAttribute("style", "")
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

                        <!-- <button id="preview" onclick="previewme()" type="button">ervv</button> -->

                    </div>
                </div>
                <iframe src="data:base64..." id="c1" style="display: none;" display="hide" alt="Upoad File"></iframe>
                <input src="data:base64..." id="realfile" name="realfile" style="display: none;" display="hide"
                    alt="Upoad File"></iframe>


            </div>
            <button type="submit" class="btn btn-success" name="submit" id="finalsubmit" disabled>Submit</button>
            <?php
            // session_start();
            $con = new mysqli('localhost', 'root', '', 'transcriptDB');



            if (isset($_POST['submit'])) {
                echo 'hii';
                //echo $_POST['realfile'];
                $filedata =  base64_encode($_POST['realfile']);

                if ($con) {
                    $scheme_dept = mysqli_fetch_assoc($con->query('SELECT scheme, department FROM students WHERE sid = "' . $_SESSION['id'] . '";'));
                    $scheme_id = mysqli_fetch_assoc($con->query('SELECT scheme_id FROM schemes WHERE scheme_name = "' . $scheme_dept['scheme'] . '";'));
                    $dept_id = mysqli_fetch_assoc($con->query('SELECT dept_id FROM departments WHERE dept_name = "' . $scheme_dept['department'] . '";'));
                    $subjects = $con->query('SELECT subject_name FROM subjects WHERE scheme_id = ' . strval($scheme_id['scheme_id']) . ' AND dept_id = ' . strval($dept_id['dept_id']) . ' AND sem_no = ' . $_SESSION['sem_no'] . ';');
                    $student_details = mysqli_fetch_array($con->query('SELECT * FROM students WHERE name = "' . $_SESSION['Username'] . '";'));
                    echo $scheme_id['scheme_id'] . "<br>" . $dept_id['dept_id'] . "<br>" . $_SESSION['id'];
                    $sem_no = $con->query('SELECT DISTINCT sem_no FROM warehouse WHERE sid = "' . $student_details['sid'] . '";');
                    $flag = false;
                    while ($num = $sem_no->fetch_assoc()) {
                        if (strval($num['sem_no']) == $_SESSION['sem_no']) {
                            $flag = true;
                            break;
                        }
                    }
                    echo $flag;
                    //echo "bruh";
                    if ($flag) echo "
                            <script>
                                alert('Semester : " . $_SESSION['sem_no'] . " marks already entered!)
                            </script>
                        ";
                    else {

                        // while ($row = $subjects->fetch_assoc()) {
                        //     $marks = $_POST['-' . str_replace(" ", "", $row['subject_name']) . '-'];
                        //     $add_row_query = '
                        // INSERT INTO warehouse
                        //     VALUES("' . $student_details['sid'] . '", "' . $row['subject_name'] . '", "' . $student_details['scheme'] . '" , "' . $student_details['department'] .
                        //         '", "' . $_SESSION['sem_no'] . '", NULL, ' . $marks[0] . ', ' . $marks[1] .
                        //         ', ' . $marks[2] . ', ' . $marks[3] . ', ' . $marks[4] . ', ' . $marks[5] .
                        //         ');';
                        //     // echo $add_row_query."<br>";
                        //     if ($con->query($add_row_query)) echo "success";
                        //     else echo $con->error . "<br>";
                        //     //echo "bruh";
                        //     //$sem_no = $con->query('SELECT DISTINCT sem_no FROM warehouse WHERE sid = "' . $student_details['sid'] . '";');
                        // }


                        if (!empty($_FILES["realfile"]["name"])) {
                            // Get file info 
                            $fileName = basename($_FILES["realfile"]["name"]);
                            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

                            // Allow certain file formats 
                            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                            if (in_array($fileType, $allowTypes)) {
                                $image = $_FILES['realfile']['tmp_name'];
                                $imgContent = addslashes(file_get_contents($image));
                                echo  $imgContent;

                                // Insert image content into database 
                                $insert = $db->query("INSERT into images (image, created) VALUES ('$imgContent', NOW())");

                                if ($insert) {
                                    $status = 'success';
                                    $statusMsg = "File uploaded successfully.";
                                } else {
                                    $statusMsg = "File upload failed, please try again.";
                                }
                            } else {
                                $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
                            }
                        } else {
                            $statusMsg = 'Please select an image file to upload.';
                        }
                        // $fileupload = "UPDATE files SET sem" . $_SESSION['sem_no'] . "='$filedata' WHERE sid='" . $student_details['sid'] . "'";
                        // //echo $fileupload;
                        // if ($con->query($fileupload)) echo "uploaded";
                    }
                }
            }
            ?>
        </form>
    </div>
</body>

</html>