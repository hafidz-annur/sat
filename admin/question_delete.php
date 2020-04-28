<html lang="en">
<?php include("connect.php");
include("functions.php");
session_start();
if (empty($_SESSION['mail']))
{
    echo "<script type='text/javascript'>alert('Please log-in first!')</script>";
    echo "<script>document.location='../';</script>";
}
$id = $_GET['id_typesoal'];
$post = "DELETE FROM tbl_typesoal
        WHERE id_typesoal='$id'";
                    if ($conn->query($post) === TRUE) {
                        $status = "New record created successfully";
                        echo "<script>document.location='./question_insert.php';</script>";
                    } else {
                        $status = "Error: <br>" . $conn->error;
                    }
                echo $status."<br>";
?>