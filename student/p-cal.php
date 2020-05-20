<?php
include("connect.php");
include("functions.php");        
session_start();
$_SESSION['status'] = 4;
if(empty($_SESSION['stquestid'])){
    echo "<script type='text/javascript'>alert('Select question first!')</script>";
    echo "<script>document.location='../';</script>";
}
else{
    $stquestid = $_SESSION['stquestid'];
}
    
for($i=0;$i<30;$i++){
    $o = $i + 1;
    $id = 'M'. $o;
    if(isset($_POST['c'.$i])){
            $c[$i] = $_POST['c'.$i];
    }
    else{
            $c[$i] = "-";
    }
    $sql="INSERT INTO tbl_answer (id_answer, id_stquest, answer) 
    VALUES ('$id','$stquestid','$c[$i]') ";
    $x = $conn->query($sql); 
    // echo $id." ".$c[$i]."<br>";
    }
for($i=30;$i<38;$i++){
    $o = $i + 1;
    $id = 'M'. $o;
    if(empty($_POST['oa'.$i]) and empty($_POST['ob'.$i]) and empty($_POST['oc'.$i]) and empty($_POST['od'.$i])) {
        $c[$i] = "-";
        
    }
    else{
        $oa = $_POST['oa'.$i];
        $ob = $_POST['ob'.$i];
        $oc = $_POST['oc'.$i];
        $od = $_POST['od'.$i];

        if ($ob=="/"){
            $ocd = $oc.$od;
            $result = $oa/$ocd;
            $c[$i] = number_format((float)$result,2,'.','');

        }
        else  if($oc=="/"){
            $oab = $oa.$ob;
            $result = $oab/$od;
            $c[$i] = number_format((float)$result,2,'.','');

        }
        else{
            $c[$i] = $oa.$ob.$oc.$od;

        }
    }
    $sql="INSERT INTO tbl_answer (id_answer, id_stquest, answer) 
    VALUES ('$id','$stquestid','$c[$i]') ";
    $x = $conn->query($sql); 
    // echo $id." ".$c[$i]."<br>";
    }
    echo  "<script>document.location='./check_answer-student.php';</script>";
?>
<!-- <a href="./check_answer-student.php">Check answer</a> -->