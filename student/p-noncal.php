<?php
 include("connect.php");
 include("functions.php");        
session_start();
    $_SESSION['status'] = 3;
    if(empty($_SESSION['stquestid'])){
        echo "<script type='text/javascript'>alert('Select question first!')</script>";
        echo "<script>document.location='../';</script>";
    }
    else
    {
        $stquestid = $_SESSION['stquestid'];
    }
    
    for($i=0;$i<15;$i++){
        $o = $i + 1;
        $id = 'N'. $o;
        // reading
        if(isset($_POST['nc'.$i])){
            $nc[$i] = $_POST['nc'.$i];
        } else {
            $nc[$i] = "-";
        }
        
        $sql="INSERT INTO tbl_answer (id_answer, id_stquest, answer) 
        VALUES ('$id','$stquestid','$nc[$i]') ";
        $x = $conn->query($sql); 
        echo $id." ".$nc[$i]."<br>";
    }
    for($i=15;$i<20;$i++)
    {
        $o = $i + 1;
        $id = 'N'. $o;
        if(empty($_POST['oa'.$i]) and empty($_POST['ob'.$i]) and empty($_POST['oc'.$i]) and empty($_POST['od'.$i])) {
        $nc[$i] = "-";
        
        } else {
        
            $oa = $_POST['oa'.$i];
            $ob = $_POST['ob'.$i];
            $oc = $_POST['oc'.$i];
            $od = $_POST['od'.$i];

            if ($ob=="/"){
                $ocd = $oc.$od;
                $result = $oa/$ocd;
                $nc[$i] = number_format((float)$result,2,'.','');
           
            }   else  if ($oc=="/"){
                $oab = $oa.$ob;
                $result = $oab/$od;
                $nc[$i] = number_format((float)$result,2,'.','');
            } else {
                $nc[$i] = $oa.$ob.$oc.$od;
            }
        }
        $sql="INSERT INTO tbl_answer (id_answer, id_stquest, answer) 
        VALUES ('$id','$stquestid','$nc[$i]') ";
        $x = $conn->query($sql); 
        echo $id." ".$nc[$i]."<br>";
    }
    // echo "<script>document.location='./test-cal.php';</script>";

?>
<a href="./test-cal.php">Calculator session</a>