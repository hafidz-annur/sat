<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("connect.php");
    include("functions.php");
    // error_reporting(0);
    session_start();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In SAT Diagnostic</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
</head>

<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
            <img src="./images/logo.png"  width="250" height="50">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="./sign-up.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_mail"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="your_mail" id="your_mail" placeholder="Your Mail" required />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                    me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                        <!-- <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
<?php
    if(isset($_POST['signin']))
    {
        $mail = $_POST['your_mail'];
        $password = $_POST['your_pass'];
        $_SESSION['mail'] = $mail;
        $password_db = echoarray('st_pass','tbl_student','st_mail',$mail);
        if(password_verify($password,$password_db) == 1)
        {
            echo "<script type='text/javascript'>alert('You will be redirect to test-page!')</script>";
            echo "<script>document.location='student/index.php';</script>";
        }
        else if($mail = "a@dmin" && $password = "a@dmin")
        {
            echo "<script type='text/javascript'>alert('Welcome Admin!')</script>";
            echo "<script>document.location='admin/index.php';</script>";
        }
        else
        {
            echo "<script type='text/javascript'>alert('Your password doesn't match!')</script>";
            echo "<script>document.location='./index.php';</script>";
        }
        // $sql = "SELECT * FROM tbl_student WHERE st_mail='$mail' AND st_pass='$passhash'";
        // $sql1 = $conn->query($sql);
        // if(mysqli_num_rows($sql1) == 1)
        // {
        //     echo $passhash;
        //     echo "OK";
        //     // echo "<script type='text/javascript'>alert('Your password doesn't match!')</script>";
        //     // echo "<script>document.location='./index.php';</script>";
        // }
        // else
        // {
        //     echo $test."<br>";
        //     echo $passhash."\n";
        //     echo "G";
        //     // echo "<script type='text/javascript'>alert('Your password doesn't match!')</script>";
        // }
    }
?>

</html>