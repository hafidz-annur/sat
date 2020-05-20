<html lang="en">
<?php include("connect.php");
include("functions.php"); 
session_start();
if (empty($_SESSION['mail']))
{
    echo "<script type='text/javascript'>alert('Please log-in first!')</script>";
    echo "<script>document.location='../';</script>";
}

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
    <script src="http://code.jquery.com/jquery-3.5.1.min.js">
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

    table tr td {
        padding: 11px;
        text-align: center;
        height: 5vh;
        top: -5px;
        vertical-align: middle;
    }
    </style>

</head>

<body>
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
        <h2 class=" text-white m-0" style="background:rgb(23, 162, 183, 1)"> SAT Diagnostic Test</h2>

        <div class="container mt-4">
            <form action="test-reading.php" method="post" onsubmit="return confirm('Do you want to start the test ?');">
                <table name="student">
                    <tr>
                        <td>
                            <div class="form-group text-center">
                                <h5 class="text-dark"> You login as : <?=$name?> </h5>
                            </div>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td width="90%">
                            <div class="form-group ">
                                <label for="inputname"> Choose your Test First</label>
                                <select class="form-control" name="tipetest" id="tipetest" required>
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
                        <input type="hidden" name="waktu_mulai" id="waktu_mulai" value="<?=time()?>">
                        <td width="10%" class="align-middle"><input class="btn btn-dark btn-block" width="100"
                                type="submit" name="idtest" value="Start" id='search'></td>
                    </tr>
                </table>
            </form>
        </div>
    </center>
</body>
</html>