<?php
 include("connect.php");
 include("functions.php");        
session_start();
    $_SESSION['status'] = 1;
    $stquestid = newid('id_stquest','tbl_stquest','Stp');
    $_SESSION['stquestid'] = $stquestid;
    $st_id = $_SESSION['st_id'];
    $q_id = $_SESSION['tipetest'];
    $postseql = "INSERT INTO tbl_stquest VALUES ('$stquestid','$st_id','$q_id',now(),now())";
    $conn->query($postseql);
    
    for($i=0;$i<52;$i++){
        $o = $i + 1;
        $id = 'R'. $o;
        // reading
        if(isset($_POST['r'.$i])){
            $r[$i] = $_POST['r'.$i];
        } else {
            $r[$i] = "-";
        }
        
        $sql="INSERT INTO tbl_answer (id_answer, id_stquest, answer) 
        VALUES ('$id','$stquestid','$r[$i]') ";
        $x = $conn->query($sql); 
        // echo $id." ".$r[$i]."<br>";
    }
    echo "<script>document.location='./test-writing.php';</script>";

?>
<!-- <a href="./test-writing.php">Writing session</a> -->