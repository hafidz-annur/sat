<html lang="en">
<?php include("connect.php");
include("functions.php");
$id = $_GET['id_student'];
$sql = "SELECT * FROM tbl_student WHERE id_student='$id'";
$sql2 = $conn->query($sql);
while ($sql3 = mysqli_fetch_assoc($sql2))
{
    $name = $sql3['st_name'];
    $grade = $sql3['st_grade'];
    $id_school = $sql3['id_school'];
}


?>
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All-in SAT Test </title>
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
            <h2 class=" text-white m-0" style="background: #4CAF50"> Student Update</h2>
    </center>
    <div class="container mt-5">
        <form action="" method="post" onsubmit="return confirm('Do you really want to submit the form?');">
            <center><table name="student">
            <tr class="text-center">
                <td>
                <div class="form-group pr-5 pl-5">
                    <label for="inputname"> Update Name</label>
                    <input type="text" class="form-control" name="studentname" value="<?=$name?>" required>
                </div>
                </td>
                <td>
                <div class="form-group pr-5 pl-5">
                    <label for="inputname"> Update Grade</label>
                    <input type="number" class="form-control" name="studentgrade" value="<?=$grade?>" required>
                </div>
                </td>
                <td>
                <div class="form-group pr-5 pl-5">
                    <label for="inputname"> Update School</label>
                    <select class="form-control" name="schoolname"  required>
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
                $newname = $_POST['studentname'];
                $newgrade = $_POST['studentgrade'];
                $newschool = $_POST['schoolname'];
                $post = "UPDATE tbl_student SET
                    st_name='$newname',
                    st_grade='$newgrade',
                    id_school='$newschool'
                    WHERE id_student='$id'";
                
                    if ($conn->query($post) === TRUE) {
                        $status = "New record created successfully";
                        echo "<script>document.location='../answer/student_insert.php';</script>";
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