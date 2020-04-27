<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("connect.php");
    include("functions.php");
    // error_reporting(0);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up SAT Diagnostic</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
            <img src="./images/logo.png"  width="250" height="50">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="first name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="First Name" />
                            </div>
                            <div class="form-group">
                                <label for="first name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="lastname" id="lastname" placeholder="Last Name" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="grade"><i class="zmdi zmdi-circle"></i></label>
                                <input type="number" name="grade" id="grade" placeholder="Grade" />
                            </div>
                            <div class="form-group">
                                <label for="school"><i class="zmdi zmdi-graduation-cap"></i></label>
                                <select class="form-control pl-4" name="school" id="school">
                                    <?php 
                        $x = "SELECT * FROM tbl_school ORDER BY id_school DESC";
                        $y = mysqli_query($conn, $x);
                        while($z  = mysqli_fetch_array($y))
                        {
                            ?>
                                    <option value="" disabled selected hidden>Select your school</option>
                                    <option value="<?=$z['id_school'] ?>"><?=$z['school'] ?></option>
                                    <?php 
                        }
                    ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                    statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="./index.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
<?php
        $newid = Newid('id_student','tbl_student','Stu');                
            if(isset($_POST['signup']))
        {
                $name = $_POST['name'];
                $lname = $_POST['lastname'];
                $mail = $_POST['email'];
                $grade = $_POST['grade'];
                $passwordbefore = $_POST['pass'];
                $pass = password_hash($passwordbefore, PASSWORD_DEFAULT);
                echo $pass;
                $school = $_POST['school'];
                $post = "INSERT INTO tbl_student VALUES ('$newid','$mail','$name','$lname','$grade','$school','$pass')";
                    if ($conn->query($post) === TRUE) {
                        $status = "New record created successfully";
                        echo "<script>document.location='./sign-in.php';</script>";
                    } else {
                        $status = "Error: " . $post . "<br>" . $conn->error;
                    }
                echo $status."<br>";
                

        }   ?>

</html>