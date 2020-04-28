<html lang="en">
<?php include("connect.php"); 
include("functions.php");
session_start();
if (empty($_SESSION['mail']))
{
    echo "<script type='text/javascript'>alert('Please log-in first!')</script>";
    echo "<script>document.location='../';</script>";
}

$id_result = $_GET['id_result'];
$sql = "SELECT DISTINCT id_stquest FROM tbl_result r WHERE r.id_result='$id_result'";
$x = $conn->query($sql);
$y = mysqli_fetch_assoc($x);
$id_stquest = $y['id_stquest'];
$_SESSION['id_result'] = $id_result;
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
  <!-- <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="student_insert.php">Students</a>
    </li>
  </ul> -->
  
<ul class="nav justify-content-end">
    <li class="nav-item">
      <a class="nav-link" href="../sign-out.php">Logout</a>
    </li>
  </ul>
</nav>
<center>
    <h2 class=" text-white m-0" style="background: #4CAF50"> Analyze</h2>
    </center>
    <center>
        <div class="container">
            <div class="row">
                <div class="col-md-12 center">
                    <form action="analysis-student2.php?" method="post" align="center">
                        <h5 class="bg-secondary text-white m-0 "> Scoring</h5>
                            <table name="category" class="table table-sm table-hover" on border="1" cellpadding="0">
                                <thead style="background: #4CAF50" class="text-white">
                                    <tr align="center">
                                        <th width=55%> Section </th>
                                        <th width=45%> Score </th>
                                    </tr>
                                </thead>
                                <?php 
                                
                    $conver ="SELECT s.score_description as Section,rs.score_value as Score FROM tbl_result_score rs, tbl_score s WHERE rs.id_result='$id_result' and s.id_score=rs.id_score";
                    $t = $conn->query($conver);
                    while ($r = mysqli_fetch_assoc($t))
                    {
                        ?>
                        <tr>
                                <td><?=$r['Section']?></td>
                                <td><?=$r['Score']?></td>
                                <?php
                    }
                    
                    ?>
                                    </tr>
                                </table>
                                <input type="hidden" name="id_stquest" value="<?=$id_stquest?>">
                                <input type="hidden" name="id_result" value="<?=$id_result?>">
                                <input type="submit" name="submit" value="Details">
                            </form>

                        </div>
                </div>
            </div>
        </div>
        </div>
    </center>
</body>

</html>