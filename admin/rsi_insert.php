<html lang="en">
<?php include("connect.php"); 
include("functions.php");
session_start();
if (empty($_SESSION['mail']))
{
    echo "<script type='text/javascript'>alert('Please log-in first!')</script>";
    echo "<script>document.location='../';</script>";
}
?>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All-in SAT Diagnostic Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
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
</nav>
<center>
            <h2 class=" text-white m-0" style="background: #4CAF50"> Raw Score Index Insert</h2>
    </center>
    <form action="" method="POST" onsubmit="return confirm('Do you really want to submit the form?');">
        <div class="container">
            <div class="card shadow mt-3 mb-3">
                <table name="inputan" class="table table-sm" border="1" cellpadding="0" cellpadding="0" align="center">
                    <tr class="bg-secondary text-white" align="center">
                        <th width="60%" class="align-middle">Select Question</th>
                        <th width="40%" class="align-middle">Input RSI Name</th>
                        
                    </tr>
                    <tr class="text-black" align="center">
                        <td>
                            <select class="form-control" name="questions" required>
                                <?php 
                            $sql = "SELECT * FROM tbl_typesoal ORDER BY id_typesoal DESC";
                            $qkey = mysqli_query($conn,$sql);
                            while($rowkey  = mysqli_fetch_array($qkey))
                            {
                            ?>
                                <option value="<?php echo $rowkey['id_typesoal'] ?>">
                                    <?php echo $rowkey['nama_soal']; ?></option>
                                <?php 
                            }
                        ?>
                            </select>
                        </td>
                        <td> <input class="form-control text-center p-0" type="text" name="rsiname" placeholder="RSI Diagnostic" required></td>
                        
                    </tr>
                </table>

            </div>
            <div class="card-body shadow p-0 ">
                <table name="tampil" class="table table-bordered table-sm">
                    <tr class="bg-dark text-white">
                        <td rowspan="2" class="align-middle text-center" width="10%">Number of Correct</td>
                        <td colspan="3" class="text-center align-middle" width="90%">Input Value of</td>
                    </tr>
                    <tr class="bg-secondary text-white text-center align-middle">
                        <td width="30%">Reading</td>
                        <td width="30%">Writing</td>
                        <td width="30%">Math</td>
                    </tr>
                    <?php for($m=10;$m<=40;$m++)
    {
        $value [] = $m;
        
    }
    for($m=20;$m<=80;$m++)
    {
    $valuem [] = $m;
    }
    array_unshift($value,0);
    for($i=0;$i<=58;$i++){
    ?>
                    <tr>
                        <td class="text-center align-middle"><small><?=$i;?></small></td>
                        <td class="text-center align-middle">
                            <div class="form-group">
                                <select class="form-control" name="reading_value<?=$i;?>">
                                    <!-- <option value="-"> - </option> -->
                                    <?php foreach($value as $q1): ?>
                                    <option value="<?=$q1;?>"><?=$q1;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </td>
                        <td class="text-center align-middle">
                            <div class="form-group">
                                <select class="form-control" name="writing_value<?=$i;?>">
                                    <!-- <option value="-"> - </option> -->
                                    <?php foreach($value as $q1): ?>
                                    <option value="<?=$q1;?>"><?=$q1;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </td>
                        <td class="text-center align-middle">
                            <div class="form-group">
                                <select class="form-control" name="math_value<?=$i;?>">
                                    <!-- <option value="-"> - </option> -->
                                    <?php foreach($valuem as $q1): ?>
                                    <option value="<?=$q1;?>"><?=$q1;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <center><button type="submit" name="submit" class="btn btn-primary">Save</button></center>
            </div>
    </form>
    
    <?php
                if(isset($_POST['submit']))
        {
            $rsiname = $_POST['rsiname'];
            $question = $_POST['questions'];
            $newid = Newid('rsi_idname','tbl_rsi_idname','Rsi');
            $sqlid = "INSERT INTO tbl_rsi_idname VALUES ('$newid','$rsiname','$question')";
            $conn->query($sqlid);
            for($i=0;$i<=58;$i++)
            {
                $a = $_POST['reading_value'.$i];
                $sql = "INSERT INTO tbl_rsi (rsi_idname,rsi_numb,id_category,rsi_value) VALUES ('$newid','$i','1','$a')";
                $x = $conn->query($sql);
            }
            for($i=0;$i<=58;$i++)
            {
                $b= $_POST['writing_value'.$i];
                $sql = "INSERT INTO tbl_rsi (rsi_idname,rsi_numb,id_category,rsi_value) VALUES ('$newid','$i','2','$b')";
                $x = $conn->query($sql);
            }
            for($i=0;$i<=58;$i++)
            {
                $c = $_POST['math_value'.$i];
                $sql = "INSERT INTO tbl_rsi (rsi_idname,rsi_numb,id_category,rsi_value) VALUES ('$newid','$i','3','$c')";
                $x = $conn->query($sql);
            }
                if ($x = 1) {
                        $status = "<script type='text/javascript'>alert('New record created successfully!')</script>";
                        $back = "<script>document.location='./rsi_insert.php';</script>"; 
                        
                    } else {
                        $status = "<script type='text/javascript'>alert('.$conn->error.')</script>";
                    }
                echo "<br>".$status."<br>";
                echo $back;
        }   ?>
</body>

</html>