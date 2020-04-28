<html lang="en">
<?php include("connect.php");
include("functions.php");
session_start();
if (empty($_SESSION['mail']))
{
    echo "<script type='text/javascript'>alert('Please log-in first!')</script>";
    echo "<script>document.location='../';</script>";
}
$id = $_GET['id_student'];
$post = "DELETE FROM tbl_student
        WHERE id_student='$id'";
                    if ($conn->query($post) === TRUE) {
                        $status = "New record created successfully";
                        echo "<script>document.location='./student_insert.php';</script>";
                    } else {
                        $status = "Error: <br>" . $conn->error;
                    }
                echo $status."<br>";
?>