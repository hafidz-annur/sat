<?php 
session_start();
if (empty($_SESSION['mail']))
{
    echo "<script type='text/javascript'>alert('Please log-in first!')</script>";
    echo "<script>document.location='../';</script>";
}
function successinsert($x)
{
    include("connect.php");
    if ($x = 1) {
        $status = "<script type='text/javascript'>alert('New record created successfully!')</script>";
    } else {
        $status = "<script type='text/javascript'>alert('.$conn->error.')</script>";
    }
    echo $status."<br>";
}
function countresult($sql,$correctorincorrect)
{
    include("connect.php");
    $x = $conn->query($sql);
    $v = mysqli_fetch_assoc($x);
    $z = $v[$correctorincorrect];
    return $z;
}
function Newid($column,$table,$char)
        {
            include("connect.php");
            $query = "SELECT max($column) as maxx FROM $table";
            $sql = $conn->query($query);
            $array = mysqli_fetch_array($sql);
            $newkode = $array['maxx'];
            $idbaru = (int) substr($newkode, 3, 3);
            $idbaru++;
            $chartambahan = "$char";
            $kodebaru = $chartambahan . sprintf("%03s",$idbaru);
            return $kodebaru;
        }
function echoarray($column,$table,$columnid,$nilaiid)
{
    include("connect.php");
    $query = "SELECT $column FROM $table WHERE $columnid = '$nilaiid'";
    $sql = $conn->query($query);
    $array = mysqli_fetch_array($sql);
    $echo = $array[$column];
    return $echo;
}
function panggilsemuaaray($column,$table)
{
    include("connect.php");
    $query = "SELECT $column FROM $table";
    $sql = $conn->query($query);
    while ($array = mysqli_fetch_array($sql))
    {
        echo $arrayid[] = $array["$column"];
    }
    return $arrayid;
}
function hitunganls($countz)
        {
            $newvalue = [];
            foreach($countz as $key => $value)
            {
                array_push($newvalue,$key,$value);
            }
            return $newvalue;
        }
            
function hitung($sql,$countid,$column)
        {
            $newvalue = [];
            include("connect.php");
            $x = $conn->query($sql);
            while($row = $x->fetch_assoc())
            {
                foreach($countid as $key => $value)
                {
                    if($row[$column] == $key)
                    {
                        // echo $row[$column]."  ".$key. "<br>";
                        array_push($newvalue,$row[$column],$value);
                    }     
                }
            }
            return $newvalue; 
        }
function tampilarraytop($x)
        {
            foreach($x as $y => $z)
            {
                if($y % 2 == 0)
                {
                    echo $z. " = ";
                }
                else
                {
                    echo $z."<br>";
                }
            }
        }
function tampilarray($x)
        {
            foreach($x as $y => $z)
            {
                echo $y." = ".$z. " <br> ";
            }
        }
function extractray($array,$code,$pengurangan)
{
    foreach($array as $key => $value)
        {
            $key1 = (int)$key + 1;
            $key2 = $key1 - $pengurangan;
            $id_r[] = $code.$key2;
        }
        return $id_r;
}
function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    $value = $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    $value = $y;
  }
  return $value;
}
?>