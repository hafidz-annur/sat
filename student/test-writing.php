<html lang="en">
<?php include("connect.php");
include("functions.php"); 
session_start();

if (empty($_SESSION['mail']))
{
    echo "<script type='text/javascript'>alert('Please log-in first!')</script>";
    echo "<script>document.location='../';</script>";
}
if(isset($_POST['tipetest']) && isset($_POST['waktu_mulai']))
{
    $quest_id = $_POST['tipetest'];
    $_SESSION['tipetest'] = $quest_id;
    $waktu_mulai = $_POST['waktu_mulai'];
    $_SESSION['waktu_mulai'] = $waktu_mulai;
}
else{
    $quest_id = $_SESSION['tipetest'];
    $waktu_mulai = $_SESSION['waktu_mulai'];
}
if(empty($_SESSION['status']))
{
    $_SESSION['status'] = 0;
    echo "<script type='text/javascript'>alert('Finish reading session first!')</script>";
    echo "<script>document.location='./test-reading.php';</script>";
}
else
{
    $status = $_SESSION['status'];
    if($status > 1)
    {
        echo "<script type='text/javascript'>alert('You only have 1 chance to input answer for each sessions, please continue to next sessions!')</script>";
        echo "<script>document.location='./test-noncal.php';</script>";
    }
    else{

    }
}

$quest = echoarray('nama_soal','tbl_typesoal','id_typesoal',$quest_id);
$_SESSION['quest_name'] = $quest;
$mail = $_SESSION['mail'];
$sqlmail = "SELECT * FROM tbl_student WHERE st_mail='$mail'";
$sqlmail2 = $conn->query($sqlmail);
while ($sqlmail3 = mysqli_fetch_assoc($sqlmail2))
{
    $studentid = $sqlmail3['id_student'];
    $name = $sqlmail3['st_name'];
    $grade = $sqlmail3['st_grade'];
    $schoolid = $sqlmail3['id_school'];
    $school = echoarray('school','tbl_school','id_school','$schoolid');
}
$_SESSION['st_id'] = $studentid;
$_SESSION['st_name'] = $name;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All-in SAT Diagnostic Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: 'Roboto', sans-serif;
        }

        table tr td {
            padding: 11px;
            text-align: center;
            height: 5vh;
            top: -5px;
            vertical-align: middle;
        }

        input[type='radio']:after {
            width: 25px;
            height: 25px;
            border-radius: 25px;
            left: -5px;
            position: relative;
            background-color: #d1d3d1;
            content: '';
            display: inline-block;
            visibility: visible;
            border: 2px solid white;
        }

        input[type='radio']:checked:after {
            width: 25px;
            height: 25px;
            border-radius: 25px;
            left: -5px;
            position: relative;
            background-color: rgb(23, 162, 183, 1);
            content: '';
            display: inline-block;
            visibility: visible;
            border: 2px solid white;
        }

        #tempat_timer {
            margin: 0 auto;
            text-align: center;
        }

        #timer {
            border-radius: 7px;
            border: 2px solid gray;
            padding: 7px;
            font-size: 2em;
            font-weight: bolder;
        }
    </style>


</head>

<body  >
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="index.php">
            <img src="../images/logo.png" alt="logo" style="width:40px;">
        </a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="../sign-out.php">Logout</a>
            </li>
        </ul>
    </nav>
    <center>
        <h2 class=" text-white m-0" style="background:rgb(23, 162, 183, 1)">SAT Test id :<?=$quest?>
        </h2>
        <div class="container mt-4">
            <div id="tempat_timer mb-3">
                <span id="timer"><a id="demo">Your time</a></span>
            </div>
            <form action="p-writing.php"
            method="post"
            id="form"
            name="form">
                <div class="row mt-5">
                    <div class="col-md">
                        <div class="card shadow mb-5">
                            <div class="card-header text-center">
                                <h4>Section 2 <br> Writing Test</h4>
                            </div>
                            <div class="card-body p-0 ">
                                <table class="table table-bordered table-sm">
                                    <tr class="bg-dark text-white" >
                                        <td rowspan="2" widht="20%">No</td>
                                        <td colspan="4" widht="80%">Answer</td>
                                    </tr>
                                    <tr class="text-white text-center align-middle"
                                        style="background:rgb(23, 162, 183, 1)">
                                        <td>A</td>
                                        <td>B</td>
                                        <td>C</td>
                                        <td>D</td>
                                    </tr>
                                    <?php for($i=0;$i<44;$i++){ ?>
                                    <tr>
                                        <td><small><?=$i+1;?></small></td>
                                        <div>
                                        <td><input type="radio" name="<?='wl'.$i;?>" value="A">
                                        </td>
                                        <td><input type="radio" name="<?='wl'.$i;?>" value="B">
                                        </td>
                                        <td><input type="radio" name="<?='wl'.$i;?>" value="C">
                                        </td>
                                        <td><input type="radio" name="<?='wl'.$i;?>" value="D">
                                        </td>
                                        </div>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <button onclick="submitAction()" class="btn btn-lg btn-primary btn-block" type="submit" name="submit_value" id="submit_value" value="Submit">Submit</button>
            </form>
        </div>
    </center>
</body>


</html>
<script>
// Set the date we're counting down to
var now_basic = <?=$waktu_mulai ?>;
var countDownDate = (now_basic + 35.3 * 60) * 1000;
function submitAction() {
                document.reading.btnSubmit();
            }

// Update the count down every 1 second
var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();
    //now.toPrecision(10);
    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("demo").innerHTML = hours + "h " +
        minutes + "m " + seconds + "s ";
    
    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED, You'll be redirect for next session";
        document.getElementById("form").submit();      
        }
}, 1000);
</script>