<html lang="en">
<?php include("connect.php");
include("functions.php");
$id = $_GET['id_school'];
$post = "DELETE FROM tbl_school
        WHERE id_school='$id'";
                    if ($conn->query($post) === TRUE) {
                        $status = "New record created successfully";
                        echo "<script>document.location='./school_insert.php';</script>";
                    } else {
                        $status = "Error: <br>" . $conn->error;
                    }
                echo $status."<br>";
?>