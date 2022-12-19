<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <script type="text/javascript" language="javascript">
    $(document).ready(function(e) {
        $("#form1").on('submit', function(event) {
            console.log($("#scheme").val());
            console.log($("#department").val());
            console.log($("#semester").val());
            event.preventDefault();
        });

    });
    </script>
</head>

<body>
    <?php
    // if(isset($_POST['submit']))
    // {
    //     $name =$_POST['name'];
    //  $seatno=$_POST['seatno'];
    // }
    // include_once('connection.php');
    $con = mysqli_connect("localhost", "root", "", "phpintern");
    global $department;
    global $scheme;
    global $semester;

    //dept






    ?>
    <!-- <div class="hd"><label for="">Name : <?php echo ($name) ?></label>
<div class="hd"><label for="">Seat-No : <?php echo ($seatno) ?></label> -->

    <caption>Hello MEllo</caption>
    <?php

    //  while($row=mysqli_fetch_array($result)){
    //     echo '<tr>';
    //     echo '<td>' .$row['subject']. '<td>' ;
    //     echo '<br>';
    //     echo '</tr>';
    //  }

    ?>
    </div>
    <div class="frm">
        <form id="form1">
            <select name="department" id="department" class="m1">


                <?php
                $query = "SELECT dept_id,dept_name FROM `departments`";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) { ?>
                <option value="<?php echo $row['dept_id']; ?>"><?php echo $row['dept_name']; ?></option>

                <?php } ?>
            </select>
            <br><br><br>
            <label for="">Scheme</label>
            <select name="scheme" id="scheme">
                <?php
                $query = "SELECT scheme_id,scheme_name FROM `schemes`";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) { ?>
                <option value="<?php echo $row['scheme_id']; ?>"><?php echo $row['scheme_name']; ?></option>

                <?php } ?>
            </select><br><br>
            <br>
            <select name="semester" id="semester" class="m1">
                <option value="">Semester</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <button name="submit2" type="submit" id="submit2">Submit</button>

        </form>

    </div>
    <div class="tbl">
        <div class="tbl2">
            <br><br>
            <th rowspan=2>Head of passing</th><br><br>
            <?php
            $query = "SELECT * FROM `subjects` WHERE dept_id='$department' and scheme_id='$scheme' and sem_no='$semester' ";
            $result = mysqli_query($con, $query);

            while ($row = mysqli_fetch_array($result)) {
                echo '<tr>';
                echo '<br>';
                echo '<td>' . $row['subject'] . '<td>';

                echo '</tr>';
                echo '<br>';
            }
            ?>
        </div>
        <div class="tbl1">
            <form action="next2.php" method="POST">
                <table class="tbl">
                    <tr>

                        <th colspan=3>LPW</th>
                        <th rowspan=2>Credits</th>
                        <th colspan=3>Grade</th>
                        <th rowspan=2>Credits Earned<br>C</th>
                        <th rowspan=2>Grade points <br>G</th>
                        <th rowspan=2>C X G</th>
                    </tr>
                    <tr>
                        <th>L</th>
                        <th>p</th>
                        <th>t</th>
                        <th>ESE/PR/OR</th>
                        <th>IA/TW</th>
                        <th>Overall</th>
                    </tr>

                    <tr>

                        <td><input type="text" name=""></td>
                        <td><input type="text" name=""></td>
                        <td><input type="text" name=""></td>
                        <td><input type="text" name="sub1ese"></td>
                        <td><input type="text" name="sub1ia"></td>
                        <td><input type="text" name="sub1o"></td>
                        <td><input type="text" name="sub1ce"></td>
                        <td><input type="text" name="sub1gp"></td>
                        <td><input type="text" name="sub1cxg"></td>

                    </tr>
                    <tr>

                        <td><input type="text" name=""></td>
                        <td><input type="text" name=""></td>
                        <td><input type="text" name=""></td>
                        <td><input type="text" name="sub2ese"></td>
                        <td><input type="text" name="sub2ia"></td>
                        <td><input type="text" name="sub2o"></td>
                        <td><input type="text" name="sub2ce"></td>
                        <td><input type="text" name="sub2gp"></td>
                        <td><input type="text" name="sub2cxg"></td>

                    </tr>
                    <tr>

                        <td><input type="text" name=""></td>
                        <td><input type="text" name=""></td>
                        <td><input type="text" name=""></td>
                        <td><input type="text" name="sub3ese"></td>
                        <td><input type="text" name="sub3ia"></td>
                        <td><input type="text" name="sub3o"></td>
                        <td><input type="text" name="sub3ce"></td>
                        <td><input type="text" name="sub3gp"></td>
                        <td><input type="text" name="sub3cxg"></td>

                    </tr>
                    <tr>

                        <td><input type="text" name=""></td>
                        <td><input type="text" name=""></td>
                        <td><input type="text" name=""></td>
                        <td><input type="text" name="sub4ese"></td>
                        <td><input type="text" name="sub4ia"></td>
                        <td><input type="text" name="sub4o"></td>
                        <td><input type="text" name="sub4ce"></td>
                        <td><input type="text" name="sub4gp"></td>
                        <td><input type="text" name="sub4cxg"></td>

                    </tr>
                    <tr>

                        <td><input type="text" name=""></td>
                        <td><input type="text" name=""></td>
                        <td><input type="text" name=""></td>
                        <td><input type="text" name="sub5ese"></td>
                        <td><input type="text" name="sub5ia"></td>
                        <td><input type="text" name="sub5o"></td>
                        <td><input type="text" name="sub5ce"></td>
                        <td><input type="text" name="sub5gp"></td>
                        <td><input type="text" name="sub5cxg"></td>

                    </tr>
                    <tr>

                        <td><input type="text" name=""></td>
                        <td><input type="text" name=""></td>
                        <td><input type="text" name=""></td>
                        <td><input type="text" name="sub6ese"></td>
                        <td><input type="text" name="sub6ia"></td>
                        <td><input type="text" name="sub6o"></td>
                        <td><input type="text" name="sub6ce"></td>
                        <td><input type="text" name="sub6gp"></td>
                        <td><input type="text" name="sub5cxg"></td>

                    </tr>






                </table>
                <button type="submit1" name="submit1">Submit</button>
            </form>
        </div>
    </div>


</body>

</html>