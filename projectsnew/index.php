<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Arimo&family=Baloo+Bhai+2&family=PT+Serif:wght@700&display=swap" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js" defer></script>
    <title>Login page</title>
</head>

<body>
    <div class="maingrid">
        <div class="grid">
            <div class="img">
                <div class="gradient">

                </div>
            </div>
            <form method="post">
                <div class="reg-container" id="regconid">
                    <h1>Register</h1>
                    <br><br><br>
                    <div>
                        <label for="name">Name:</label>
                        <br>
                        <input type="text" id="name" placeholder=" Enter your name" name="name">
                    </div>
                    <div>
                        <label for="phone">Mobile No.:</label>
                        <br>
                        <input type="tel" name="contact" id="phone" placeholder="&#x260E; Contact details">
                    </div>
                    <div>
                        <label for="email">Email:</label> <br><input type="email" id="email" placeholder="&#x2709; Enter your email" name="email">
                    </div>
                    <div>
                        <label for="regPassword">Password:</label> <br><input type="password" id="regPassword" placeholder="Enter your Password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="register">Register</button>
                    <div>
                        <span> Already registered?</span>
                        <a href="#" id="alreadyreg" onclick="loginpage()">Login</a>
                    </div>
                </div>
                <?php
                    $con = new mysqli('localhost', 'root', 'Dhamu@2002', 'transcriptDB');
                    // $name = $_POST['name'];
                    // $mobno = $_POST['contact'];
                    // $email = $_POST['email'];
                    // $password = $_POST['password'];
                    // echo $name."<br>".$mobno."<br>".$email."<br>".$password;
                ?>
            </form>
            <div class="log-container" id="logconid">
                <!-- <form action="#"> -->
                <h1>Login</h1>
                <br><br><br>
                <div>
                    <label for="username">Mobile No.:</label> <br><input type="text" id="username" placeholder="Enter your Contact No.">
                </div>
                <div>
                    <label for="pass">Password:</label>
                    <br>
                    <input type="password" id="pass" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn btn-primary" name="register">Register</button>
                <div>
                    <span> Not Registered?</span>
                    <a href="#" id="not-registered" onclick="regpage()">Register</a>
                </div>
                <!-- </form> -->
            </div>
            <!-- </section> -->
        </div>
        <div class="g1"></div>
        <div class="g2"></div>
    </div>
</body>

</html>