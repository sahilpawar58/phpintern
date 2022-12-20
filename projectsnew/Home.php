<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Home_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Home Page</title>
</head>

<body>
    <div class="form-container">
        <form class="row g-3" method="POST">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputEmail4" name="name" required autocomplete="off">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="inputPassword4" name="mobile-number" required
                    autocomplete="off">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputAddress" name="email" required>
                <div class="drop-down-container">
                    <div class="col-md-5">
                        <label for="inputState" class="form-label">Choose Scheme</label>
                        <select id="inputState" class="form-select" name="scheme-name" required>
                            <option selected value="C-SCHEME">C-SCHEME</option>
                            <option value="CBCGS">CBCGS</option>
                            <option value="CHSGS">CBSGS</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="inputState" class="form-label">Choose Department</label>
                        <select id="inputState" class="form-select" name="department-name" required>
                            <option selected value="Computer Engineering">Computer Engineering</option>
                            <option value="Information & Technology">Information & Technology</option>
                            <option value="Electronics And Telecommunication Engineering">Electronics And
                                Telecommunication Engineering</option>
                            <option value="Electrical Engineering">Electrical Engineering</option>
                            <option value="Mechanical Engineering">Mechanical Engineering</option>
                            <option value="Civil Engineering">Civil Engineering</option>
                            <option value="Artificial Intelligence And Machine Learning Engineering">Artificial
                                Intelligence And Machine Learning</option>
                            <option value="Computer Science And Data Science Engineering">Computer Science And Data
                                Science Engineering</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $con = new mysqli('localhost', 'root', '', 'transcriptDB');
        if ($con) {
            $new_student = '
                INSERT INTO students VALUES (
                    "' . $_POST['mobile-number'] . '", "' . $_POST['name'] . '", "' . $_POST['email'] . '", "' .
                $_POST['scheme-name'] . '", "' . $_POST['department-name'] . '");';
            $_SESSION['Username'] = $_POST['name'];
            //Idhar mene changes kiya he_________________________
            $_SESSION['id'] = $_POST['mobile-number'];
            if ($con->query($new_student)) {
                $filesdb = "INSERT INTO `files` (`sid`, `sem1`, `sem2`, `sem3`, `sem4`, `sem5`, `sem6`, `sem7`, `sem8`) VALUES
                ('" . $_POST['mobile-number'] . "', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
                if ($con->query($filesdb)) header('location: DataEntry.php');
            }


            //else $con->error;
        } else {
            echo $con->error;
        }
    }
    ?>
</body>

</html>