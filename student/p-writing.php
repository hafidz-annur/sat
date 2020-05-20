<?php
 include("connect.php");
 include("functions.php");        
session_start();
    $_SESSION['status'] = 2;
    if(empty($_SESSION['stquestid'])){
        echo "<script type='text/javascript'>alert('Select question first!')</script>";
        echo "<script>document.location='../';</script>";
    }
    else
    {
        $stquestid = $_SESSION['stquestid'];
    }
    
    for($i=0;$i<44;$i++){
        $o = $i + 1;
        $id = 'W'. $o;
        // reading
        if(isset($_POST['wl'.$i])){
            $wl[$i] = $_POST['wl'.$i];
        } else {
            $wl[$i] = "-";
        }
        
        $sql="INSERT INTO tbl_answer (id_answer, id_stquest, answer) 
        VALUES ('$id','$stquestid','$wl[$i]') ";
        $x = $conn->query($sql); 
        echo $id." ".$wl[$i]."<br>";
    }
    // echo "<script>document.location='./test-noncal.php';</script>";

?>
<a href="./test-noncal.php">Non Calculator session</a>