<html lang="en">
<?php include("connect.php"); 
include("functions.php");
session_start();
if (empty($_SESSION['mail']))
{
    echo "<script type='text/javascript'>alert('Please log-in first!')</script>";
    echo "<script>document.location='../';</script>";
}
// $answer = $_GET['ans_id'];
?>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All-in SAT Diagnostic Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
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
    </style>
</head>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="index.php">
    <img src="../images/logo.png" alt="logo" style="width:40px;">
  </a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="student_insert.php">Students</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="school_insert.php">School</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="question_insert.php">Questions</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="rsi_insert.php">R S I</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="key.php">Key</a>
    </li>
  </ul>
  
  <ul class="nav justify-content-end">
    <li class="nav-item">
      <a class="nav-link" href="sign-out.php">Logout</a>
    </li>
  </ul>
</nav>
<center>
            <h2 class=" text-white m-0" style="background: rgb(23, 162, 183, 1)"> Check Answer</h2>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-12 center">
                <center>
                    <br>
                    <form name="checksoal" action="" method="post" align="center">
                        <table class="table table-sm"  cellpadding="0" cellpadding="0" align="center">
                            <thead style="background: #4CAF50" class="text-white">
                                <tr align="center">
                                    <th colspan="2"> Students </th>

                                    <th> Question </th>

                                </tr>
                            </thead>
                            <?php
                            if(isset($_POST['students']))
                            {
                            $idst = $_POST['students'];
                            }
                            ?>
                            <tr align="center">
                                <td width="54%" class="align-middle">
                                    <div class="form-group">
                                        <select id="stname" class="form-control" name="students" onclick="" required>

                                            <?php 
                            $key= "SELECT * FROM tbl_student ORDER BY id_student";
                            $qkey = mysqli_query($conn,$key);
                            while($rowkey  = mysqli_fetch_array($qkey))
                            {
                                $nilai = $rowkey['id_student'];
                            ?>

                                            <option value="<?=$rowkey['id_student'] ?>">
                                                <?php echo $rowkey['st_name']; ?></option>
                                            <?php 
                            }
                            
                        ?>
                                        </select>
                                    </div>
                                </td>
                                <td width="1%" class="align-middle"><input class="btn btn-light" width="100" type="submit" name="idsiswa"
                                        value="Ceksoal" ></td>
                    </form>
                    <?php
                            if(isset($_POST['students']))
                            {
                                $idstudent = $_POST['students'];
                            }
                             ?>
                    <form name="checkjawaban" action="" method="get">
                        <input type="hidden" name="students" value="<?=$idstudent?>">
                        <td width="45%" class="align-middle">
                            <div class="form-group">
                                <select class="form-control" name="questions" required>
                                    <?php 
                            $sql = "SELECT a.id_stquest,b.nama_soal FROM tbl_stquest a,tbl_typesoal b WHERE a.id_student='$idstudent' and a.id_typesoal=b.id_typesoal";
                            $qkey = mysqli_query($conn,$sql);
                            while($rowkey  = mysqli_fetch_array($qkey))
                            {
                            ?>
                                    <option value="<?php echo $rowkey['id_stquest'] ?>">
                                        <?php echo $rowkey['nama_soal']; ?></option>
                                    <?php 
                            }
                        ?>
                                </select>
                            </div>
                        </td>
                        </table>
                        <input class="btn btn-success" type="submit" name="submit" value="Check">
                    </form>

                    <?php
    if(isset($_GET['submit']))
    {
        $student = $_GET['students'];
        $sqlstudent = "SELECT a.st_name as 'Student Name' FROM tbl_student a WHERE a.id_student='$student'";
        $studentx = $conn->query($sqlstudent);
        $studenty = mysqli_fetch_assoc($studentx);
        $stname = $studenty['Student Name'];
        ?>
                    <div class="card shadow mb-5">
                        <div class="card-header text-center">
                            <br>
                            <h4> Result Test <?=$stname?></h4>
                        </div>
                        <div class="card-body p-0 ">
                            <div class="table-responsive-sm">
                            <div style="overflow-y:auto;overflow-x:auto;"> 
                                <table class="table table-hover table-bordered table-sm" align="center">
                                    <tr class="bg-dark text-white">
                                        <td class="align-middle text-center col-md-auto">No</td>
                                        <td class="text-center align-middle col-md-auto">Answer</td>
                                        <td class="text-center align-middle col-md-auto">Key</td>
                                        <td class="text-center align-middle col-md-auto">Result</td>
                                    </tr>
                                    <tr><?php
                                    $id_stquest=$_GET['questions'];
                                    
                                    $sql = "SELECT tbl_answer.answer,tbl_soal.Answer_Key FROM tbl_answer LEFT JOIN tbl_stquest ON tbl_answer.id_stquest=tbl_stquest.id_stquest INNER JOIN tbl_soal ON tbl_answer.id_answer=tbl_soal.ID_Main WHERE tbl_stquest.id_stquest='$id_stquest'";
                                    $result = $conn->query($sql);
                                    $no = 1;
                                    while($row = mysqli_fetch_assoc($result))
                                    { 
                                        if($row['answer'] == $row['Answer_Key'])
                                        {
                                            $value = "Correct";
                                        }
                                        else
                                        {
                                            $value = "Incorrect";
                                        }
                                        if($no==1)
                                        {
                                            ?>
                                        <td colspan="4" class=" text-center align-middle md-auto bg-dark text-white">
                                            Reading
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" text-center align-middle md-auto"> <?php echo $no ?></td>
                                        <td class=" text-center align-middle md-auto"> <?php echo $row['answer'] ?></td>
                                        <td class=" text-center align-middle md-auto"> <?php echo $row['Answer_Key']?>
                                        </td>
                                        <td class=" text-center align-middle md-auto">
                                            <?php echo $value?>
                                        </td>
                                    </tr>
                                    <?php
                                        } 
                                        elseif ($no<53){
                                    ?>
                                    <tr>
                                        <td class=" text-center align-middle md-auto"> <?php echo $no ?></td>
                                        <td class=" text-center align-middle md-auto"> <?php echo $row['answer'] ?></td>
                                        <td class=" text-center align-middle md-auto"> <?php echo $row['Answer_Key']?>
                                        </td>
                                        <td class=" text-center align-middle md-auto">
                                            <?php echo $value?>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                        elseif ($no==53){
                                            $wno = $no-52;
                                            ?>
                                    <td colspan="4" class=" text-center align-middle md-auto bg-dark text-white">
                                        Writing
                                    </td>
                                    </tr>
                                    <tr>
                                        <td class=" text-center align-middle md-auto"> <?php echo $wno ?></td>
                                        <td class=" text-center align-middle md-auto"> <?php echo $row['answer'] ?></td>
                                        <td class=" text-center align-middle md-auto"> <?php echo $row['Answer_Key']?>
                                        </td>
                                        <td class=" text-center align-middle md-auto">
                                            <?php echo $value?>
                                        </td>
                                    </tr>
                                    <?php
                                        } 
                                        elseif ($no>=53 && $no<=96){
                                            $wno = $no-52;
                                    ?>
                                    <tr>
                                        <td class=" text-center align-middle md-auto"> <?php echo $wno ?></td>
                                        <td class=" text-center align-middle md-auto"> <?php echo $row['answer'] ?></td>
                                        <td class=" text-center align-middle md-auto"> <?php echo $row['Answer_Key']?>
                                        </td>
                                        <td class=" text-center align-middle md-auto">
                                            <?php echo $value?>
                                        </td>
                                    </tr>
                                    <?php
                                                }elseif ($no==97){
                                                    $ncno = $no-96;
                                                    ?>
                                    <td colspan="4" class=" text-center align-middle md-auto bg-dark text-white">
                                        Non Calculator
                                    </td>
                                    </tr>
                                    <tr>
                                        <td class=" text-center align-middle md-auto"> <?php echo $ncno ?></td>
                                        <td class=" text-center align-middle md-auto"> <?php echo $row['answer'] ?></td>
                                        <td class=" text-center align-middle md-auto"> <?php echo $row['Answer_Key']?>
                                        </td>
                                        <td class=" text-center align-middle md-auto">
                                            <?php echo $value?>
                                        </td>
                                    </tr>
                                    <?php
                                                } 
                                                elseif ($no>=97 && $no<117){
                                                    $ncno = $no-96;
                                            ?>
                                    <tr>
                                        <td class=" text-center align-middle md-auto"> <?php echo $ncno ?></td>
                                        <td class=" text-center align-middle md-auto"> <?php echo $row['answer'] ?></td>
                                        <td class=" text-center align-middle md-auto"> <?php echo $row['Answer_Key']?>
                                        </td>
                                        <td class=" text-center align-middle md-auto">
                                            <?php echo $value?>
                                        </td>
                                    </tr>
                                    <?php
                                                        }
                                                        elseif ($no==117){
                                                            $cno = $no-116;
                                                            ?>
                                    <td colspan="4" class=" text-center align-middle md-auto bg-dark text-white">
                                        Calculator
                                    </td>
                                    </tr>
                                    <tr>
                                        <td class=" text-center align-middle md-auto"> <?php echo $cno ?></td>
                                        <td class=" text-center align-middle md-auto"> <?php echo $row['answer'] ?></td>
                                        <td class=" text-center align-middle md-auto"> <?php echo $row['Answer_Key']?>
                                        </td>
                                        <td class=" text-center align-middle md-auto">
                                            <?php echo $value?>
                                        </td>
                                    </tr>
                                    <?php
                                                        } 
                                                        elseif ($no>=117){
                                                            $cno = $no-116;
                                                    ?>
                                    <tr>
                                        <td class=" text-center align-middle md-auto"> <?php echo $cno ?></td>
                                        <td class=" text-center align-middle md-auto"> <?php echo $row['answer'] ?></td>
                                        <td class=" text-center align-middle md-auto"> <?php echo $row['Answer_Key']?>
                                        </td>
                                        <td class=" text-center align-middle md-auto">
                                            <?php echo $value?>
                                        </td>
                                    </tr>
                                    <?php
                                                                }
                                         $no++;
                                        }
                                         ?>
                                    </tr>
                                </table>

                            </div> 
                        </div>
                    </div>
                        <form action="" method="post"
                            onsubmit="return confirm('Do you really want to submit the form?');">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit" name="save" value="Save">Save</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['save']))
                        {
                        $id_stquest=$_GET['questions'];
                        $sql_cek_row = "SELECT * FROM tbl_answer a, tbl_check b  
                        WHERE a.id_stquest='$id_stquest'
                        AND b.id_autoans= a.id_autoans";
                        $sqlcekrow = $conn->query($sql_cek_row);
                        if (mysqli_num_rows($sqlcekrow) >=154)
                            {
                                $x = "<script type='text/javascript'>alert('Your data already saved to database for this test!')</script>";
                                echo $x;
                                $sqlresultexist = "SELECT * FROM `tbl_result`
                                WHERE id_stquest='$id_stquest'";
                                $sqlresultexistconn = $conn->query($sqlresultexist);
                                $sqlresultexistfetch = mysqli_fetch_assoc($sqlresultexistconn);
                                $idresult = $sqlresultexistfetch['id_result'];
                                $status = "<script>document.location='./az2.php?id_result=";
                                $status .= urlencode($idresult);
                                $status .= "';</script>";
                                echo $status;
                            }
                        else{

                        $sql = "SELECT tbl_answer.answer,id_autoans,tbl_soal.Answer_Key FROM tbl_answer LEFT JOIN tbl_stquest ON tbl_answer.id_stquest=tbl_stquest.id_stquest INNER JOIN tbl_soal ON tbl_answer.id_answer=tbl_soal.ID_Main WHERE tbl_stquest.id_stquest='$id_stquest'";
                        $result = $conn->query($sql);
                        while($row = mysqli_fetch_assoc($result))
                        {            
                            $id = $row['id_autoans'];    
                            if($row['answer'] == $row['Answer_Key'])
                            {
                                $value = "Correct";
                            }
                            else
                            {
                                $value = "Incorrect";
                            }
                            $sqlinsert = "INSERT INTO tbl_check (id_autoans,checking) VALUES ('$id','$value')";
                            $x = $conn->query($sqlinsert); 
                        }
                //category
                $category = "SELECT e.category_name,e.id_category as id FROM tbl_check a,tbl_answer b,tbl_soal c,tbl_topics d, tbl_categories e WHERE b.id_stquest='$id_stquest' and a.id_autoans = b.id_autoans and b.id_answer = c.ID_Main and c.id_maintopic = d.id_topic and d.id_category=e.id_category GROUP BY e.category_name";
                $result = mysqli_query($conn,$category);
                $newid = Newid('id_result','tbl_result','Rst');  
                $sqlrslt = "INSERT INTO tbl_result VALUES('$newid','$id_stquest',now(),now())";
                $conn->query($sqlrslt); 
                while ($row = mysqli_fetch_assoc($result))
                {
                    $catname= $row['category_name'];
                    $catid = $row['id'];
                    $catcorr = "SELECT COUNT(a.checking) as correct FROM tbl_check a,tbl_answer b,tbl_soal c,tbl_topics d, tbl_categories e WHERE b.id_stquest='$id_stquest' and a.id_autoans = b.id_autoans and b.id_answer = c.ID_Main and c.id_maintopic = d.id_topic and d.id_category=e.id_category and a.checking='Correct' and e.id_category='$catid'";
                    $resultz = mysqli_query($conn,$catcorr); 
                    $row = mysqli_fetch_assoc($resultz);
                    $correct = $row['correct'];
                    $sql = "INSERT INTO tbl_result_cat (id_result, id_category, correct_sum, Incorrect_sum) VALUES ('$newid','$catid','$correct','')";
                    $conn->query($sql);
                    $catincorr = "SELECT COUNT(a.checking) as Incorrect FROM tbl_check a,tbl_answer b,tbl_soal c,tbl_topics d, tbl_categories e WHERE b.id_stquest='$id_stquest' and a.id_autoans = b.id_autoans and b.id_answer = c.ID_Main and c.id_maintopic = d.id_topic and d.id_category=e.id_category and a.checking='Incorrect' and e.id_category='$catid'";
                    $resultzs = mysqli_query($conn,$catincorr); 
                    $rowz = mysqli_fetch_assoc($resultzs);
                    $incorrect = $rowz['Incorrect'];
                    $sql2 = "UPDATE tbl_result_cat SET Incorrect_sum='$incorrect' WHERE id_category='$catid'";
                    $conn->query($sql2);
                    $sqlscorer = "SELECT r.rsi_value as r FROM tbl_stquest stq, tbl_rsi_idname ri, tbl_rsi r WHERE stq.id_stquest='$id_stquest' AND stq.id_typesoal=ri.id_typesoal AND ri.rsi_idname=r.rsi_idname AND r.id_category='$catid' and r.rsi_numb='$correct'";
                    $t = $conn->query($sqlscorer);
                    $r = mysqli_fetch_assoc($t);
                    if($catid==1)
                    {
                        
                        $reading = $r['r'];
                    }
                    elseif ($catid==2)
                    {
                        
                        $writing = $r['r'];
                    }
                    else
                    {
                        
                        $math = $r['r'];
                    }
                }
                $englishs = ($reading+$writing)*10;
                $maths = $math * 10;
                $total = $englishs + $maths;
                $sqlscorecat = "SELECT * from tbl_score";
                $abc = $conn->query($sqlscorecat);
                while ($def = mysqli_fetch_assoc($abc))
                {
                    $id_score = $def['id_score'];
                    if($id_score == 1)
                    {
                        $sqlscore = "INSERT INTO tbl_result_score (id_result, id_score, score_value) VALUES ('$newid','$id_score','$englishs')";
                    }
                    elseif($id_score == 2)
                    {
                        $sqlscore = "INSERT INTO tbl_result_score (id_result, id_score, score_value) VALUES ('$newid','$id_score','$maths')";
                    }
                    else
                    {
                    $sqlscore = "INSERT INTO tbl_result_score (id_result, id_score, score_value) VALUES ('$newid','$id_score','$total')";
                    }
                    $conn->query($sqlscore);
                }
                //analysis
                $anl = "SELECT d.id_anl FROM tbl_check a,tbl_answer b,tbl_soal c, tbl_anl d WHERE b.id_stquest='$id_stquest' and a.id_autoans = b.id_autoans and b.id_answer = c.ID_Main and c.id_anl=d.id_anl GROUP BY d.anl";
                $result1 = mysqli_query($conn,$anl);   
                while ($row = mysqli_fetch_assoc($result1))
                {
                    $anlid = $row['id_anl'];
                    $anlcorr = "SELECT d.anl,d.id_anl, COUNT(a.checking) as correct FROM tbl_check a,tbl_answer b,tbl_soal c, tbl_anl d WHERE b.id_stquest='$id_stquest' and a.id_autoans = b.id_autoans and b.id_answer = c.ID_Main and c.id_anl=d.id_anl and a.checking = 'Correct' and d.id_anl='$anlid'";
                    $correctanl = countresult($anlcorr,'correct');
                    $insanlcorr ="INSERT INTO tbl_result_anl (id_result,id_anl,correct_anl,incorrect_anls) VALUES ('$newid','$anlid','$correctanl','')";
                    $conn->query($insanlcorr);
                    $anlincorr = "SELECT d.anl,d.id_anl, COUNT(a.checking) as incorrect FROM tbl_check a,tbl_answer b,tbl_soal c, tbl_anl d WHERE b.id_stquest='$id_stquest' and a.id_autoans = b.id_autoans and b.id_answer = c.ID_Main and c.id_anl=d.id_anl and a.checking = 'Incorrect' and d.id_anl='$anlid'";
                    $incorrectanl = countresult($anlincorr,'incorrect');
                    $sql3 = "UPDATE tbl_result_anl SET incorrect_anls='$incorrectanl' WHERE id_anl='$anlid'";
                    $conn->query($sql3);
                }
                //difficulty
                $diff = "SELECT d.diff FROM tbl_check a,tbl_answer b,tbl_soal c, tbl_diff d WHERE b.id_stquest='$id_stquest' and a.id_autoans = b.id_autoans and b.id_answer = c.ID_Main and c.id_diff=d.id_diff GROUP BY d.diff";
                $rdiff = mysqli_query($conn,$diff);   
                while ($row = mysqli_fetch_assoc($rdiff))
                {
                    $diffid = $row['diff'];
                    $sqldiff = "SELECT d.diff, COUNT(a.checking) as correct FROM tbl_check a,tbl_answer b,tbl_soal c, tbl_diff d WHERE b.id_stquest='$id_stquest' and a.id_autoans = b.id_autoans and b.id_answer = c.ID_Main and c.id_diff=d.id_diff and a.checking = 'Correct' and d.diff='$diffid'";
                    $correctdiff = countresult($sqldiff,'correct');
                    $insdiffcorr ="INSERT INTO tbl_result_dif (id_result,id_diff,correct_diff,incorrect_diff) VALUES ('$newid','$diffid','$correctdiff','')";
                    $conn->query($insdiffcorr);
                    $sqlindiff = "SELECT d.diff, COUNT(a.checking) as incorrect FROM tbl_check a,tbl_answer b,tbl_soal c, tbl_diff d WHERE b.id_stquest='$id_stquest' and a.id_autoans = b.id_autoans and b.id_answer = c.ID_Main and c.id_diff=d.id_diff and a.checking = 'Incorrect' and d.diff='$diffid'";
                    $incorrectdiff = countresult($sqlindiff,'incorrect');
                    $sql4 = "UPDATE tbl_result_dif SET incorrect_diff='$incorrectdiff' WHERE id_diff='$diffid'";
                    $conn->query($sql4);
                }
                //topic
                $topicselect = "SELECT d.id_topic,topic FROM tbl_check a, tbl_answer b, tbl_soal c, tbl_topics d WHERE b.id_stquest='$id_stquest' and a.id_autoans = b.id_autoans and b.id_answer = c.ID_Main and c.id_maintopic = d.id_topic GROUP BY d.topic";
                $rxyz = mysqli_query($conn,$topicselect);
                while ($rtopic = mysqli_fetch_assoc($rxyz))
                {
                    $topicid = $rtopic['id_topic'];
                    $sqltopic = "SELECT d.id_topic, COUNT(a.checking) as correct FROM tbl_check a,tbl_answer b,tbl_soal c,tbl_topics d WHERE b.id_stquest='$id_stquest' and a.id_autoans = b.id_autoans and b.id_answer = c.ID_Main and c.id_maintopic = d.id_topic and a.checking='Correct' and d.id_topic='$topicid'";
                    $correcttopic = countresult($sqltopic,'correct');
                    $instopiccorr ="INSERT INTO tbl_result_topic (id_result,id_topic,correct_topic,incorrect_topic) VALUES ('$newid','$topicid','$correcttopic','')";
                    $conn->query($instopiccorr);
                    $sqltopicinc = "SELECT d.id_topic, COUNT(a.checking) as incorrect FROM tbl_check a,tbl_answer b,tbl_soal c,tbl_topics d WHERE b.id_stquest='$id_stquest' and a.id_autoans = b.id_autoans and b.id_answer = c.ID_Main and c.id_maintopic = d.id_topic and a.checking='Incorrect' and d.id_topic='$topicid'";
                    $incorrecttopic = countresult($sqltopicinc,'incorrect');
                    $sql5 = "UPDATE tbl_result_topic SET incorrect_topic='$incorrecttopic' WHERE id_topic='$topicid'";
                    $conn->query($sql5);
                }
                //subtopic
                $subtopicselect = "SELECT d.id_sub_topic,sub_topic FROM tbl_check a, tbl_answer b, tbl_soal c, tbl_sub_topics d WHERE b.id_stquest='$id_stquest' and a.id_autoans = b.id_autoans and b.id_answer = c.ID_Main and c.id_sub_topic=d.id_sub_topic GROUP BY d.sub_topic";
                $querysubtopic = mysqli_query($conn,$subtopicselect);
                while ($rsubtopic = mysqli_fetch_assoc($querysubtopic))
                {
                    $subtopicid = $rsubtopic['id_sub_topic'];
                    $sqlsubtopic = "SELECT d.id_sub_topic,sub_topic, COUNT(a.checking) as correct FROM tbl_check a, tbl_answer b, tbl_soal c, tbl_sub_topics d WHERE b.id_stquest='$id_stquest' and a.id_autoans = b.id_autoans and b.id_answer = c.ID_Main and c.id_sub_topic=d.id_sub_topic and a.checking='Correct' and d.id_sub_topic='$subtopicid'";
                    $corrsubtopic = countresult($sqlsubtopic,'correct');
                    $inssubtopic ="INSERT INTO tbl_result_subtopic (id_result,id_sub_topic,correct_subtopic,incorrect_subtopic) VALUES ('$newid','$subtopicid','$corrsubtopic','')";
                    $conn->query($inssubtopic);
                    $sqlsubinc = "SELECT d.id_sub_topic,sub_topic, COUNT(a.checking) as incorrect FROM tbl_check a, tbl_answer b, tbl_soal c, tbl_sub_topics d WHERE b.id_stquest='$id_stquest' and a.id_autoans = b.id_autoans and b.id_answer = c.ID_Main and c.id_sub_topic=d.id_sub_topic and a.checking='Incorrect' and d.id_sub_topic='$subtopicid'";
                    $incorrectsub = countresult($sqlsubinc,'incorrect');
                    $sql6 = "UPDATE tbl_result_subtopic SET incorrect_subtopic='$incorrectsub' WHERE id_sub_topic='$subtopicid'";
                    $conn->query($sql6);
                }
                        if ($x = 1)
                        {
                            $status = "<script type='text/javascript'>alert('New record created successfully!')</script>";
                            $status .= "<script>document.location='./az2.php?id_result=";
                            $status .= urlencode($newid);
                            $status .= "';</script>";
                            } else {
                            $status = "<script type='text/javascript'>alert('.$conn->error.')</script>";
                            }
                        echo $status."<br>";
                        }
                    }
    }
        ?>
                </center>
            </div>
        </div>
    </div>
</body>
<script>
$(document).ready(function() {
    var stid = '<?=$idst;?>';
    console.log(stid);
    $('#stname').val(stid);
})
</script>
</html>
