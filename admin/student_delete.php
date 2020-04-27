<html lang="en">
<?php include("connect.php");
include("functions.php");
$id = $_GET['id_student'];
$post = "DELETE FROM tbl_student
        WHERE id_student='$id'";
                    if ($conn->query($post) === TRUE) {
                        $status = "New record created successfully";
                        echo "<script>document.location='../answer/student_insert.php';</script>";
                    } else {
                        $status = "Error: <br>" . $conn->error;
                    }
                echo $status."<br>";
?>