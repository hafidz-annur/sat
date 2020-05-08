<html lang="en">
<?php include("connect.php");
include("functions.php");
$id = $_GET['id_typesoal'];
$name = echoarray('nama_soal','tbl_typesoal','id_typesoal',$id);
$newname = substr($name,4);
$type = echoarray('type_soal','tbl_typesoal','id_typesoal',$id);
// error_reporting(0);
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
    <title>All-in Update SAT Test </title>
    <!-- <link rel="stylesheet" href="css/table.css"> -->
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
        body{
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
            <h2 class=" text-white m-0" style="background: #4CAF50"> Questions Update</h2>
    </center>
    <div class="container mt-5">
        <form action="" method="post" onsubmit="return confirm('Do you really want to submit the form?');">
            <center><table name="student">
            <tr class="text-center">
                <td>
                <div class="form-group">
                    <label for="inputname"> Type Test</label>
                    <select class="form-control" name="testtype" required>
                        <option value="<?=$type;?>"><?=$type;?></option>
                        <?php if ($type == "SAT") 
                        {
                            ?>
                            <option value="ACT">ACT</option>
                            <?php
                        }else
                        {
                            ?>
                            <option value="SAT">SAT</option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                </td>
                <td>
                <div class="form-group">
                    <label for="inputname"> Test Name</label>
                    <input type="select" class="form-control" name="testname" value="<?=$newname?>" required>
                </div>
                </td>
            </tr>
            </table>
        <button type="submit" name="submit" class="btn btn-primary" >Save</button>
    </center>
        </form>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 center">
                <?php
                     
            if(isset($_POST['submit']))
        {
                $newquesttype = $_POST['testtype'];
                $newquestname = $_POST['testtype']."-".$_POST['testname'];
                echo $newquestname;
                $post = "UPDATE tbl_typesoal SET
                    type_soal='$newquesttype',
                    nama_soal='$newquestname' 
                    WHERE id_typesoal='$id'";
                
                    if ($conn->query($post) === TRUE) {
                        $status = "New record created successfully";
                        echo "<script>document.location='./question_insert.php';</script>";
                    } else {
                        $status = "Error: <br>" . $conn->error;
                    }
                echo $status."<br>";
                

        }   ?>
            </div>
        </div>
    </div>
<?php 
?>
</body>

</html>