<html lang="en">
<?php include("connect.php");
include("functions.php"); 
session_start();
if (isset($_SESSION['mail']))
{
?>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All-in SAT Diagnostic Test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <style type="text/css">
    body {
        font-family: 'Roboto', sans-serif;
    }
    table tr td {
    text-align:center;
    height: 5vh;
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
    </style>
    
</head>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="index.php">
    <img src="../images/logo.png" alt="logo" style="width:40px;">
  </a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="student_insert.php">Students</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="check_answer.php">Check Answer</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="school_insert.php">School</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="question_insert.php">Questions</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="rsi_insert.php">R S I</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="key.php">Key</a>
    </li>
  </ul>
  
  <ul class="nav justify-content-end">
    <li class="nav-item">
      <a class="nav-link" href="../sign-out.php">Logout</a>
    </li>
  </ul>
</nav>
<center>
            <h2 class=" text-white m-0" style="background: rgb(23, 162, 183, 1)"> SAT Diagnostic Test</h2>
    </center>
    <div class="container-fluid mt-5">
        <form action="" method="post" onsubmit="return confirm('Do you really want to submit the form?');">
            <center>
                <table name="student">
                    <tr class="text-center">
                        <td width = "20%">
                            <div class="form-group pr-5 pl-0">
                                <label for="test"> Test Name</label>
                                <select class="form-control" name="tipetest" required>
                                    <?php 
                        $x = "SELECT * FROM tbl_typesoal ORDER BY id_typesoal DESC";
                        $y = mysqli_query($conn, $x);
                        while($z  = mysqli_fetch_array($y))
                        {
                            ?>
                                    <option value="<?=$z['id_typesoal']?>"><?=$z['nama_soal'] ?></option>
                                    <?php 
                        }
                    ?>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group pr-5 pl-3">
                                <label for="school"> School Name</label>
                                <select class="form-control" name="schoolname" required>
                                    <?php 
                        $x = "SELECT * FROM tbl_school ORDER BY id_school DESC";
                        $y = mysqli_query($conn, $x);
                        while($z  = mysqli_fetch_array($y))
                        {
                            ?>
                                    <option value="<?=$z['id_school'] ?>"><?=$z['school'] ?></option>
                                    <?php 
                        }
                    ?>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group ">
                                <label for="name"> First Name</label>
                                <input type="text" class="form-control" name="namestudent" placeholder="Required"
                                    required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="lastname"> Last Name</label>
                                <input type="text" class="form-control" name="lname" placeholder="Optional"
                                    required>
                            </div>
                        </td>
                        <td width ="15%">
                            <div class="form-group pl-5 pr-5">
                                <label for="grade "> Grade</label>
                                <input type="number" class="form-control" name="gradestudent" placeholder="10" required
                                    max="12" maxlength="2">
                            </div>
                        </td>
                    </tr>
                </table>
            </center>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card shadow mb-5">
                        <div class="card-header text-center">
                            Section 1 <br> Reading Test
                        </div>
                        <div class="card-body p-0 ">
                            <table class="table table-bordered table-sm">
                                <tr class="bg-dark text-white">
                                    <td rowspan="2" class="align-middle text-center">No</td>
                                    <td colspan="4" class="text-center align-middle">Answer</td>
                                </tr>
                                <tr class="text-white text-center align-middle" style="background:rgb(23, 162, 183, 1)">
                                    <td>A</td>
                                    <td>B</td>
                                    <td>C</td>
                                    <td>D</td>
                                </tr>
                                <?php for($i=0;$i<52;$i++){ ?>
                                <tr >

                                    <td><small><?=$i+1;?></small></td>
                                    <td>
                                        <input type="radio" name="<?='r'.$i;?>" value="A">
                                    </td>
                                    <td>
                                        <input type="radio" name="<?='r'.$i;?>" value="B">
                                    </td>
                                    <td>
                                        <input type="radio" name="<?='r'.$i;?>" value="C">
                                    </td>
                                    <td>
                                        <input type="radio" name="<?='r'.$i;?>" value="D">
                                    </td>

                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow mb-5">
                        <div class="card-header text-center">
                            Section 2 <br> Writing & Language Test
                        </div>
                        <div class="card-body p-0 ">
                            <table class="table table-bordered table-sm">
                                <tr class="bg-dark text-white">
                                    <td rowspan="2" class="align-middle text-center">No</td>
                                    <td colspan="4" class="text-center align-middle">Answer</td>
                                </tr>
                                <tr class="text-white text-center align-middle" style="background:rgb(23, 162, 183, 1)">
                                    <td>A</td>
                                    <td>B</td>
                                    <td>C</td>
                                    <td>D</td>
                                </tr>
                                <?php for($i=0;$i<44;$i++){ ?>
                                <tr >
                                    <td ><small><?=$i+1;?></small></td>
                                    <td ><input type="radio" name="<?='wl'.$i;?>"
                                            value="A">
                                    <td ><input type="radio" name="<?='wl'.$i;?>"
                                            value="B">
                                    <td ><input type="radio" name="<?='wl'.$i;?>"
                                            value="C">
                                    <td ><input type="radio" name="<?='wl'.$i;?>"
                                            value="D">
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow mb-5">
                        <div class="card-header text-center">
                            Section 3 <br> Math Non Calculator
                        </div>
                        <div class="card-body p-0 ">
                            <table class="table table-bordered table-sm">
                                <tr class="bg-dark text-white">
                                    <td rowspan="2" class="align-middle text-center">No</td>
                                    <td colspan="4" class="text-center align-middle">Answer</td>
                                </tr>
                                <tr class="text-white text-center align-middle" style="background:rgb(23, 162, 183, 1)">
                                    <td>A</td>
                                    <td>B</td>
                                    <td>C</td>
                                    <td>D</td>
                                </tr>
                                <?php for($i=0;$i<15;$i++){ ?>
                                <tr >
                                    <td ><small><?=$i+1;?></small></td>
                                    <td ><input type="radio" name="<?='nc'.$i;?>"
                                            value="A">
                                    </td>
                                    <td ><input type="radio" name="<?='nc'.$i;?>"
                                            value="B">
                                    </td>
                                    <td ><input type="radio" name="<?='nc'.$i;?>"
                                            value="C">
                                    </td>
                                    <td ><input type="radio" name="<?='nc'.$i;?>"
                                            value="D">
                                    </td>
                                </tr>
                                <?php } 
                            $op1 = ['','.','0','1','2','3','4','5','6','7','8','9']; 
                            $op2 = ['','/','.','0','1','2','3','4','5','6','7','8','9']; 
                            ?>
                                <?php for($i=15;$i<20;$i++){ ?>
                                <tr >
                                    <td ><small><?=$i+1;?></small></td>
                                    <td >
                                        <select name="oa<?=$i;?>" id="">
                                            <?php foreach($op1 as $o1): ?>
                                            <option value="<?=$o1;?>"><?=$o1;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td >
                                        <select name="ob<?=$i;?>" id="">
                                            <?php foreach($op2 as $o2): ?>
                                            <option value="<?=$o2;?>"><?=$o2;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td >
                                        <select name="oc<?=$i;?>" id="">
                                            <?php foreach($op2 as $o3): ?>
                                            <option value="<?=$o3;?>"><?=$o3;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td >
                                        <select name="od<?=$i;?>" id="">
                                            <?php foreach($op1 as $o4): ?>
                                            <option value="<?=$o4;?>"><?=$o4;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow mb-5">
                        <div class="card-header text-center">
                            Section 4 <br> Math Calculator
                        </div>
                        <div class="card-body p-0 ">
                            <table class="table table-bordered table-sm">
                                <tr class="bg-dark text-white">
                                    <td rowspan="2" class="align-middle text-center">No</td>
                                    <td colspan="4" class="text-center align-middle">Answer</td>
                                </tr>
                                <tr class="text-white text-center align-middle" style="background:rgb(23, 162, 183, 1)">
                                    <td>A</td>
                                    <td>B</td>
                                    <td>C</td>
                                    <td>D</td>
                                </tr>
                                <?php for($i=0;$i<30;$i++){ ?>
                                <tr >
                                    <td><small><?=$i+1;?></small></td>
                                    <td><input type="radio" name="<?='m'.$i;?>"
                                            value="A">
                                    </td>
                                    <td><input type="radio" name="<?='m'.$i;?>"
                                            value="B">
                                    </td>
                                    <td><input type="radio" name="<?='m'.$i;?>"
                                            value="C">
                                    </td>
                                    <td><input type="radio" name="<?='m'.$i;?>"
                                            value="D">
                                    </td>
                                </tr>
                                <?php } 
                            $oq1 = ['','.','0','1','2','3','4','5','6','7','8','9']; 
                            $oq2 = ['','/','.','0','1','2','3','4','5','6','7','8','9']; 
                            ?>
                                <?php for($i=30;$i<38;$i++){ ?>
                                <tr>
                                    <td class=" text-center align-middle"><small><?=$i+1;?></small></td>
                                    <td class=" text-center align-middle">
                                        <select name="oe<?=$i;?>" id="">
                                            <?php foreach($oq1 as $q1): ?>
                                            <option value="<?=$q1;?>"><?=$q1;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td class=" text-center align-middle">
                                        <select name="of<?=$i;?>" id="">
                                            <?php foreach($oq2 as $q2): ?>
                                            <option value="<?=$q2;?>"><?=$q2;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td class=" text-center align-middle">
                                        <select name="og<?=$i;?>" id="">
                                            <?php foreach($oq2 as $q3): ?>
                                            <option value="<?=$q3;?>"><?=$q3;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td class=" text-center align-middle">
                                        <select name="oh<?=$i;?>" id="">
                                            <?php foreach($oq1 as $q4): ?>
                                            <option value="<?=$q4;?>"><?=$q4;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="text-center">
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

                <?php
                
                if(isset($_POST['submit']))
        {
            if(empty($_POST['lname']))
                {
                    $lastname = "-";
                }
                else{
                    $lastname = $_POST['lname'];
                }
            $stquestid = newid('id_stquest','tbl_stquest','Stp');
            $st_id = newid('id_student','tbl_student','Stu');
            $quest_id = $_POST['tipetest'];
            $postseql = "INSERT INTO tbl_stquest (id_stquest, id_student, id_typesoal, date_insert, date_updated) VALUES ('$stquestid','$st_id','$quest_id', now(), now())";
            $conn->query($postseql);
                $school_id = $_POST['schoolname'];
                $namestudent = $_POST['namestudent'];
                $gradestudent = $_POST['gradestudent'];
                $passwordbefore = "sat.all-in";
                $maildefault = $st_id."@all-inedu.com";
                $pass = password_hash($passwordbefore, PASSWORD_DEFAULT);
                $postsiswa = "INSERT INTO tbl_student VALUES ('$st_id','$maildefault','$namestudent','$lastname','$gradestudent','$school_id','$pass')";
                $conn->query($postsiswa);
                
                for($i=0;$i<52;$i++){

                    // reading
                    if(isset($_POST['r'.$i])){
                        $r[$i] = $_POST['r'.$i];
        
                    } else {
                        $r[$i] = "-";
                    }
                    //writing
                    if($i<44)
                    {
                        $auto=$i+52;
                        if(isset($_POST['wl'.$i])){
                            $wl[$auto] = $_POST['wl'.$i];
            
                        } else {
                            $wl[$auto] = "-";
                        }           
                    }
                    //noncalculator
                    if($i<15)
                    {
                        $auto=$i+96;
                        if(isset($_POST['nc'.$i])){
                            $nc[$auto] = $_POST['nc'.$i];
                        } else {
                            $nc[$auto] = "-";
                        } 
                    }
                    if($i>=15 and $i<20)
                    {
                        $auto=$i+111-15;
                        if(empty($_POST['oa'.$i]) and empty($_POST['ob'.$i]) and empty($_POST['oc'.$i]) and empty($_POST['od'.$i])) {
                        $nc[$auto] = "-";
                        
                        } else {
                        
                            $oa = $_POST['oa'.$i];
                            $ob = $_POST['ob'.$i];
                            $oc = $_POST['oc'.$i];
                            $od = $_POST['od'.$i];

                            if ($ob=="/"){
                                $ocd = $oc.$od;
                                $result = $oa/$ocd;
                                $nc[$auto] = number_format((float)$result,2,'.','');
                           
                            }   else  if ($oc=="/"){
                                $oab = $oa.$ob;
                                $result = $oab/$od;
                                $nc[$auto] = number_format((float)$result,2,'.','');
                            } else {
                                $nc[$auto] = $oa.$ob.$oc.$od;
                            }
                        }
                    }
                    //calculator
                    if($i<30)
                    {
                        $auto=$i+116;
                        if(isset($_POST['m'.$i])){
                            $m[$auto] = $_POST['m'.$i];
            
                        } else {
                            $m[$auto] = "-";
                        }
                    }
                    if($i>=30 and $i<38)
                    {
                        $auto=$i+146-30;
                        if(empty($_POST['oe'.$i]) and empty($_POST['of'.$i]) and empty($_POST['og'.$i]) and empty($_POST['oh'.$i])) {
                        $m[$auto] = "-";
                        
                        } else {
                        
                            $oe = $_POST['oe'.$i];
                            $of = $_POST['of'.$i];
                            $og = $_POST['og'.$i];
                            $oh = $_POST['oh'.$i];

                            if ($of=="/"){
                                $ogh = $og.$oh;
                                $result = $oe/$ogh;
                                $m[$auto] = number_format((float)$result,2,'.','');
                           
                            }   else  if ($og=="/"){
                                $oef = $oe.$of;
                                $result = $oef/$oh;
                                $m[$auto] = number_format((float)$result,2,'.','');
                            } else {
                                $m[$auto] = $oe.$of.$og.$oh;
                            }
                        }
                    }
            }
                $ans_wer = array_merge($r,$wl,$nc,$m);
                $id_r = extractray($r,'R',0);
                $id_w = extractray($wl,'W',52);
                $id_n = extractray($nc,'N',96);
                $id_m = extractray($m,'M',116);
                $idanswer = array_merge($id_r,$id_w,$id_n,$id_m);
                for($i=0;$i<154;$i++)
                {
                    $sql="INSERT INTO tbl_answer (id_answer, id_stquest, answer) 
                    VALUES ('$idanswer[$i]','$stquestid','$ans_wer[$i]') ";
                    $x = $conn->query($sql);      
                }
                    if ($x = 1) {
                        $status = "<script type='text/javascript'>alert('New record created successfully!')</script>";
                    } else {
                        $status = "<script type='text/javascript'>alert('.$conn->error.')</script>";
                    }
                echo $status."<br>";
                }  
             }
             else
             {
                 echo "<script type='text/javascript'>alert('Please log-in first!')</script>";
                 echo "<script>document.location='../';</script>";
             } ?>
</body>

</html>