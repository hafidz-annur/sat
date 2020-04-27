<html lang="en">
<?php include("connect.php"); ?>
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
        body{
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
</nav>
    <center>
    <h2 class=" text-white m-0" style="background: #ff9966"> SAT Input Key</h2>
    </center>
    <br>
        <form action="" method="post" onsubmit="return confirm('Do you really want to submit the form?');">
            <center><table name="student">
            <tr class="text-center">
                <td>
                <div class="form-group pr-5 pl-5">
                <label for="inputname"> Test Name (Only test with "no-key" exist)</label>
                <select class="form-control" name="testtype"  required>
                <?php 
                    $test = "SELECT DISTINCT a.id_typesoal,a.nama_soal FROM tbl_typesoal a, tbl_soal b WHERE a.id_typesoal<>b.id_typesoal";
                    $qtest = mysqli_query($conn, $test);
                    while($arraytest  = mysqli_fetch_array($qtest))
                    {
                        ?>
                            <option value="<?php echo $arraytest['id_typesoal'] ?>"><?php echo $arraytest['nama_soal'] ?></option>                   
                    <?php 
                    }
                ?>
                </select>
                </div>
                </td>
                    <td class="pl-5">
                    <label for="inputname"> Or input new test here</label>
                    <div class="form-group">
                    <a href="./question_insert.php" class="btn btn-info" role="button">Add new Test</a>
                    </div>
                </td>
            </tr>
            </table></center>
            <div class="row">
                <div class="col-md">
                    <div class="card shadow mb-5">
                        <div class="card-header text-center">
                            Section 1 <br> Reading Test
                        </div>
                        <div class="card-body p-0 ">
                            <table class="table table-bordered table-sm table-hover">
                                <tr class="bg-dark text-white">
                                    <td rowspan="2" class="align-middle text-center" width="5%">No</td>
                                    <td colspan="4" class="text-center align-middle" width="12%">Key</td>
                                    <td rowspan="2" class="text-center align-middle" width="10%">Diff</td>
                                    <td rowspan="2" class="text-center align-middle" width="10%">Analysis</td>
                                    <td colspan="2" class="text-center align-middle" width="70%">Topics</td>
                                </tr>
                                <tr style="background: #ff9966" class="text-white text-center align-middle">
                                    <td>A</td>
                                    <td>B</td>
                                    <td>C</td>
                                    <td>D</td>
                                    <td>Main</td>
                                    <td>Sub</td>
                                </tr>
                                <?php 
                                for($i=1;$i<=52;$i++){ ?>
                                <tr>
                                <td class=" text-center align-middle"><small><?=$i;?></small></td>
                                    <td class=" text-center align-middle"><input type="radio" name="<?='r'.$i;?>"
                                            value="A" >
                                    </td>
                                    <td class=" text-center align-middle"><input type="radio" name="<?='r'.$i;?>"
                                            value="B" >
                                    </td>
                                    <td class=" text-center align-middle"><input type="radio" name="<?='r'.$i;?>"
                                            value="C" >
                                    </td>
                                    <td class=" text-center align-middle"><input type="radio" name="<?='r'.$i;?>"
                                            value="D" >
                                    </td>
                <td>
                <div class="form-group">
                <select class="form-control" name="<?='rdifficulty'.$i;?>" required>
                <?php 
                    $difficulty = "SELECT * FROM tbl_diff ORDER BY id_diff";
                    $qdifficulty = mysqli_query($conn, $difficulty);
                    while($arraydifficulty  = mysqli_fetch_array($qdifficulty))
                    {
                    ?>
                            <option value="<?php echo $arraydifficulty['id_diff'] ?>"><?php echo $arraydifficulty['diff'] ?></option>                   
                    <?php 
                    }
                ?> 
                </select>
                </div>
                </td> 
                <td>
                <div class="form-group">
                <select class="form-control" name="<?='ranalysis'.$i;?>" required>
                <?php 
                    $analysis = "SELECT * FROM tbl_anl ORDER BY id_anl";
                    $qanalysis = mysqli_query($conn, $analysis);
                    while($arrayanalysis  = mysqli_fetch_array($qanalysis))
                    {
                    ?>
                            <option value="<?php echo $arrayanalysis['id_anl'] ?>"><?php echo $arrayanalysis['anl'] ?></option>                   
                    <?php 
                    }
                ?> 
                </select>
                </div>
                </td>                    
                <td>
                <div class="form-group">
                <select class="form-control" name="<?='reading_topic'.$i;?>" required>
                <?php 
                    $topics = "SELECT * FROM tbl_topics WHERE id_category in ('1') ORDER BY id_topic ASC";
                    $qtopics = mysqli_query($conn, $topics);
                    while($arraytopics  = mysqli_fetch_array($qtopics))
                    {
                    ?>
                            <option value="<?php echo $arraytopics['id_topic'] ?>"><?php echo $arraytopics['topic'] ?></option>                   
                    <?php 
                    }
                ?>
                </select>
                </div>
                </td>
                <td>
                <div class="form-group">
                <select class="form-control" name="<?='reading_subtopic'.$i;?>" required>
                <?php 
                    $subtopics = "SELECT * FROM tbl_sub_topics WHERE id_topic in ('1','2','3') ORDER BY sub_topic ASC";
                    $qsubtopics = mysqli_query($conn, $subtopics);
                    while($arraysubtopics  = mysqli_fetch_array($qsubtopics))
                    {
                    ?>
                            <option value="<?php echo $arraysubtopics['id_sub_topic'] ?>"><?php echo $arraysubtopics['sub_topic'] ?></option>                   
                    <?php 
                    }
                ?>
                </select>
                </div>
                </td>
                </tr>
                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-6">
                    <div class="card shadow mb-5">
                        <div class="card-header text-center">
                            Section 2 <br> Writing & Language Test
                        </div>
                        <div class="card-body p-0 ">
                            <table class="table table-bordered table-sm table-hover">
                                <tr class="bg-dark text-white">
                                    <td rowspan="2" class="align-middle text-center" width="5%">No</td>
                                    <td colspan="4" class="text-center align-middle" width="12%">Key</td>
                                    <td rowspan="2" class="text-center align-middle" width="10%">Diff</td>
                                    <td rowspan="2" class="text-center align-middle" width="10%">Analysis</td>
                                    <td colspan="2" class="text-center align-middle" width="70%">Topics</td>
                                </tr>
                                <tr style="background: #ff9966" class="text-white text-center align-middle">
                                <td>A</td>
                                <td>B</td>
                                <td>C</td>
                                <td>D</td>
                                <td>Main</td>
                                <td>Sub</td>
                            </tr>
                            <?php for($i=1;$i<=44;$i++){ ?>
                            <tr>
                                <td class=" text-center align-middle"><small><?=$i;?></small></td>
                                    <td class=" text-center align-middle"><input type="radio" name="<?='wl'.$i;?>"
                                            value="A" >
                                    <td class=" text-center align-middle"><input type="radio" name="<?='wl'.$i;?>"
                                            value="B" >
                                    <td class=" text-center align-middle"><input type="radio" name="<?='wl'.$i;?>"
                                            value="C" >
                                    <td class=" text-center align-middle"><input type="radio" name="<?='wl'.$i;?>"
                                            value="D" >
                                    </td>
                                    <td>
                <div class="form-group">
                <select class="form-control" name="<?='wdifficulty'.$i;?>" required>
                <?php 
                    $difficulty = "SELECT * FROM tbl_diff ORDER BY id_diff";
                    $qdifficulty = mysqli_query($conn, $difficulty);
                    while($arraydifficulty  = mysqli_fetch_array($qdifficulty))
                    {
                    ?>
                            <option value="<?php echo $arraydifficulty['id_diff'] ?>"><?php echo $arraydifficulty['diff'] ?></option>                   
                    <?php 
                    }
                ?> 
                </select>
                </div>
                </td> 
                <td>
                <div class="form-group">
                <select class="form-control" name="<?='wanalysis'.$i;?>" required>
                <?php 
                    $analysis = "SELECT * FROM tbl_anl ORDER BY id_anl";
                    $qanalysis = mysqli_query($conn, $analysis);
                    while($arrayanalysis  = mysqli_fetch_array($qanalysis))
                    {
                    ?>
                            <option value="<?php echo $arrayanalysis['id_anl'] ?>"><?php echo $arrayanalysis['anl'] ?></option>                   
                    <?php 
                    }
                ?> 
                </select>
                </div>
                </td>           
                                    <td>
                <div class="form-group ">
                <select class="form-control" name="<?='writing_topic'.$i;?>" placeholder="Select Topic" required>
                <?php 
                    $topics = "SELECT * FROM tbl_topics WHERE id_category in ('2') ORDER BY id_topic ASC";
                    $qtopics = mysqli_query($conn, $topics);
                    while($arraytopics  = mysqli_fetch_array($qtopics))
                    {
                    ?>
                            <option value="<?php echo $arraytopics['id_topic'] ?>"><?php echo $arraytopics['topic'] ?></option>                   
                    <?php 
                    }
                ?>
                </select>
                </div>
                </td>
                <td>
                <div class="form-group">
                <select class="form-control" name="<?='writing_subtopic'.$i;?>" placeholder="Select Topic" required>
                <?php 
                    $subtopics = "SELECT * FROM tbl_sub_topics WHERE id_topic in ('4','5') ORDER BY sub_topic ASC";
                    $qsubtopics = mysqli_query($conn, $subtopics);
                    while($arraysubtopics  = mysqli_fetch_array($qsubtopics))
                    {
                    ?>
                            <option value="<?php echo $arraysubtopics['id_sub_topic'] ?>"><?php echo $arraysubtopics['sub_topic'] ?></option>                   
                    <?php 
                    }
                ?>
                </select>
                </div>
                </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                    <br>
                <div class="col-md-6">
                    <div class="card shadow mb-5">
                        <div class="card-header text-center">
                            Section 3 <br> Math Non Calculator
                        </div>
                        <div class="card-body p-0 ">
                            <table class="table table-bordered table-sm table-hover">
                                <tr class="bg-dark text-white">
                                    <td rowspan="2" class="align-middle text-center" width="5%">No</td>
                                    <td colspan="4" class="text-center align-middle" width="12%">Key</td>
                                    <td rowspan="2" class="text-center align-middle" width="10%">Diff</td>
                                    <td rowspan="2" class="text-center align-middle" width="10%">Analysis</td>
                                    <td colspan="2" class="text-center align-middle" width="63%">Topics</td>
                                </tr>
                                <tr style="background: #ff9966" class="text-white text-center align-middle">
                                <td>A</td>
                                <td>B</td>
                                <td>C</td>
                                <td>D</td>
                                <td>Main</td>
                                <td>Sub</td>
                            </tr>
                            <?php for($i=1;$i<=15;$i++){ ?>
                            
                            <tr>
                                <td class=" text-center align-middle"><small><?=$i;?></small></td>
                                    <td class=" text-center align-middle"><input type="radio" name="<?='nc'.$i;?>"
                                            value="A" >
                                    </td>
                                    <td class=" text-center align-middle"><input type="radio" name="<?='nc'.$i;?>"
                                            value="B" >
                                    </td>
                                    <td class=" text-center align-middle"><input type="radio" name="<?='nc'.$i;?>"
                                            value="C" >
                                    </td>
                                    <td class=" text-center align-middle"><input type="radio" name="<?='nc'.$i;?>"
                                            value="D" >
                                    </td>
                                    <td>
                <div class="form-group">
                <select class="form-control" name="<?='ncdifficulty'.$i;?>" required>
                <?php 
                    $difficulty = "SELECT * FROM tbl_diff ORDER BY id_diff";
                    $qdifficulty = mysqli_query($conn, $difficulty);
                    while($arraydifficulty  = mysqli_fetch_array($qdifficulty))
                    {
                    ?>
                            <option value="<?php echo $arraydifficulty['id_diff'] ?>"><?php echo $arraydifficulty['diff'] ?></option>                   
                    <?php 
                    }
                ?> 
                </select>
                </div>
                </td> 
                <td>
                <div class="form-group">
                <select class="form-control" name="<?='ncanalysis'.$i;?>" required>
                <?php 
                    $analysis = "SELECT * FROM tbl_anl ORDER BY id_anl";
                    $qanalysis = mysqli_query($conn, $analysis);
                    while($arrayanalysis  = mysqli_fetch_array($qanalysis))
                    {
                    ?>
                            <option value="<?php echo $arrayanalysis['id_anl'] ?>"><?php echo $arrayanalysis['anl'] ?></option>                   
                    <?php 
                    }
                ?> 
                </select>
                </div>
                </td>           
                <td>
                <div class="form-group">
                <select class="form-control" name="<?='math_noncal_topic'.$i;?>" required>
                <?php 
                    $mathntopics = "SELECT * FROM tbl_topics WHERE id_category='3' ORDER BY id_topic ASC";
                    $mathnqtopics = mysqli_query($conn, $mathntopics);
                    while($mathnarraytopics  = mysqli_fetch_array($mathnqtopics))
                    {
                    ?>
                            <option value="<?php echo $mathnarraytopics['id_topic'] ?>"><?php echo $mathnarraytopics['topic'] ?></option>                   
                    <?php 
                    }
                ?>
                </select>
                </div>
                </td>
                <td>
                <div class="form-group">
                <select class="form-control" name="<?='math_noncal_subtopic'.$i;?>" required>
                <?php 
                    $subtopics = "SELECT * FROM tbl_sub_topics WHERE id_topic in ('6','7','8','9') ORDER BY sub_topic ASC";
                    $qsubtopics = mysqli_query($conn, $subtopics);
                    while($arraysubtopics  = mysqli_fetch_array($qsubtopics))
                    {
                    ?>
                            <option value="<?php echo $arraysubtopics['id_sub_topic'] ?>"><?php echo $arraysubtopics['sub_topic'] ?></option>                   
                    <?php 
                    }
                ?>
                </select>
                </div>
                </td>
                                </tr>
                                
                                <?php } 
                            $op1 = ['','.','0','1','2','3','4','5','6','7','8','9']; 
                            $op2 = ['','/','.','0','1','2','3','4','5','6','7','8','9']; 
                            ?>
                                <?php for($i=16;$i<=20;$i++){ ?>
                                <tr>
                                    <td class=" text-center align-middle"><small><?=$i;?></small></td>
                                    <td class=" text-center align-middle">
                                        <select name="oa<?=$i;?>" id="" >
                                            <?php foreach($op1 as $o1): ?>
                                            <option value="<?=$o1;?>"><?=$o1;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td class=" text-center align-middle">
                                        <select name="ob<?=$i;?>" id="">
                                            <?php foreach($op2 as $o2): ?>
                                            <option value="<?=$o2;?>"><?=$o2;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td class=" text-center align-middle">
                                        <select name="oc<?=$i;?>" id="">
                                            <?php foreach($op2 as $o3): ?>
                                            <option value="<?=$o3;?>"><?=$o3;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td class=" text-center align-middle">
                                        <select name="od<?=$i;?>" id="">
                                            <?php foreach($op1 as $o4): ?>
                                            <option value="<?=$o4;?>"><?=$o4;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td>
                <div class="form-group">
                <select class="form-control" name="<?='ncdifficulty'.$i;?>" required>
                <?php 
                    $difficulty = "SELECT * FROM tbl_diff ORDER BY id_diff";
                    $qdifficulty = mysqli_query($conn, $difficulty);
                    while($arraydifficulty  = mysqli_fetch_array($qdifficulty))
                    {
                    ?>
                            <option value="<?php echo $arraydifficulty['id_diff'] ?>"><?php echo $arraydifficulty['diff'] ?></option>                   
                    <?php 
                    }
                ?> 
                </select>
                </div>
                </td> 
                <td>
                <div class="form-group">
                <select class="form-control" name="<?='ncanalysis'.$i;?>" required>
                <?php 
                    $analysis = "SELECT * FROM tbl_anl ORDER BY id_anl";
                    $qanalysis = mysqli_query($conn, $analysis);
                    while($arrayanalysis  = mysqli_fetch_array($qanalysis))
                    {
                    ?>
                            <option value="<?php echo $arrayanalysis['id_anl'] ?>"><?php echo $arrayanalysis['anl'] ?></option>                   
                    <?php 
                    }
                ?> 
                </select>
                </div>
                </td>           
                                    <td>
                <div class="form-group">
                <select class="form-control" name="<?='math_noncal_topic'.$i;?>" placeholder="Select Topic" required>
                <?php 
                    $topics = "SELECT * FROM tbl_topics WHERE id_category='3' ORDER BY id_topic ASC";
                    $qtopics = mysqli_query($conn, $topics);
                    while($arraytopics  = mysqli_fetch_array($qtopics))
                    {
                    ?>
                            <option value="<?php echo $arraytopics['id_topic'] ?>"><?php echo $arraytopics['topic'] ?></option>                   
                    <?php 
                    }
                ?>
                </select>
                </div>
                </td>
                <td>
                <div class="form-group">
                <select class="form-control" name="<?='math_noncal_subtopic'.$i;?>" placeholder="Select Topic" required>
                <?php 
                    $subtopics = "SELECT * FROM tbl_sub_topics WHERE id_topic in ('6','7','8','9') ORDER BY sub_topic ASC";
                    $qsubtopics = mysqli_query($conn, $subtopics);
                    while($arraysubtopics  = mysqli_fetch_array($qsubtopics))
                    {
                    ?>
                            <option value="<?php echo $arraysubtopics['id_sub_topic'] ?>"><?php echo $arraysubtopics['sub_topic'] ?></option>                   
                    <?php 
                    }
                ?>
                </select>
                </div>
                </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-6">
                    <div class="card shadow mb-5">
                        <div class="card-header text-center">
                            Section 4 <br> Math Calculator
                        </div>
                        <div class="card-body p-0 ">
                            <table class="table table-bordered table-sm table-hover">
                                <tr class="bg-dark text-white">
                                <td rowspan="2" class="align-middle text-center" width="5%">No</td>
                                    <td colspan="4" class="text-center align-middle" width="12%">Key</td>
                                    <td rowspan="2" class="text-center align-middle" width="12%">Diff</td>
                                    <td rowspan="2" class="text-center align-middle" width="10%">Analysis</td>
                                    <td colspan="2" class="text-center align-middle" width="70%">Topics</td>
                                </tr>
                                <tr style="background: #ff9966" class="text-white text-center align-middle">
                                <td>A</td>
                                <td>B</td>
                                <td>C</td>
                                <td>D</td>
                                <td>Main</td>
                                <td>Sub</td>
                            </tr>
                            <?php for($i=1;$i<=30;$i++){ ?>
                            <tr>
                                <td class=" text-center align-middle"><small><?=$i;?></small></td>
                                    <td class=" text-center align-middle"><input type="radio" name="<?='m'.$i;?>"
                                            value="A" >
                                    </td>
                                    <td class=" text-center align-middle"><input type="radio" name="<?='m'.$i;?>"
                                            value="B" >
                                    </td>
                                    <td class=" text-center align-middle"><input type="radio" name="<?='m'.$i;?>"
                                            value="C" >
                                    </td>
                                    <td class=" text-center align-middle"><input type="radio" name="<?='m'.$i;?>"
                                            value="D" >
                                    </td>
                                    <td>
                <div class="form-group">
                <select class="form-control" name="<?='mdifficulty'.$i;?>" required>
                <?php 
                    $difficulty = "SELECT * FROM tbl_diff ORDER BY id_diff";
                    $qdifficulty = mysqli_query($conn, $difficulty);
                    while($arraydifficulty  = mysqli_fetch_array($qdifficulty))
                    {
                    ?>
                            <option value="<?php echo $arraydifficulty['id_diff'] ?>"><?php echo $arraydifficulty['diff'] ?></option>                   
                    <?php 
                    }
                ?> 
                </select>
                </div>
                </td> 
                <td>
                <div class="form-group">
                <select class="form-control" name="<?='manalysis'.$i;?>" required>
                <?php 
                    $analysis = "SELECT * FROM tbl_anl ORDER BY id_anl";
                    $qanalysis = mysqli_query($conn, $analysis);
                    while($arrayanalysis  = mysqli_fetch_array($qanalysis))
                    {
                    ?>
                            <option value="<?php echo $arrayanalysis['id_anl'] ?>"><?php echo $arrayanalysis['anl'] ?></option>                   
                    <?php 
                    }
                ?> 
                </select>
                </div>
                </td>           
                                    <td>
                <div class="form-group">
                <select class="form-control" name="<?='math_topic'.$i;?>" placeholder="Select Topic" required>
                <?php 
                    $topics = "SELECT * FROM tbl_topics WHERE id_category='3' ORDER BY id_topic ASC";
                    $qtopics = mysqli_query($conn, $topics);
                    while($arraytopics  = mysqli_fetch_array($qtopics))
                    {
                    ?>
                            <option value="<?php echo $arraytopics['id_topic'] ?>"><?php echo $arraytopics['topic'] ?></option>                   
                    <?php 
                    }
                ?>
                </select>
                </div>
                </td>
                <td>
                <div class="form-group">
                <select class="form-control" name="<?='math_subtopic'.$i;?>" placeholder="Select Topic" required>
                <?php 
                    $subtopics = "SELECT * FROM tbl_sub_topics WHERE id_topic in ('6','7','8','9') ORDER BY sub_topic ASC";
                    $qsubtopics = mysqli_query($conn, $subtopics);
                    while($arraysubtopics  = mysqli_fetch_array($qsubtopics))
                    {
                    ?>
                            <option value="<?php echo $arraysubtopics['id_sub_topic'] ?>"><?php echo $arraysubtopics['sub_topic'] ?></option>                   
                    <?php 
                    }
                ?>
                </select>
                </div>
                </td>
                                </tr>
                                <?php } 
                            $oq1 = ['','.','0','1','2','3','4','5','6','7','8','9']; 
                            $oq2 = ['','/','.','0','1','2','3','4','5','6','7','8','9']; 
                            ?>
                                <?php for($i=31;$i<=38;$i++){ ?>
                                <tr>
                                    <td class=" text-center align-middle"><small><?=$i;?></small></td>
                                    <td class=" text-center align-middle">
                                        <select name="oe<?=$i;?>" id="" >
                                            <?php foreach($oq1 as $q1): ?>
                                            <option value="<?=$q1;?>"><?=$q1;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td class=" text-center align-middle">
                                        <select name="of<?=$i;?>" id="">
                                            <?php foreach($oq2 as $q2): ?>
                                            <option value="<?=$q2;?>"><?=$q2;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td class=" text-center align-middle">
                                        <select name="og<?=$i;?>" id="">
                                            <?php foreach($oq2 as $q3): ?>
                                            <option value="<?=$q3;?>"><?=$q3;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td class=" text-center align-middle">
                                        <select name="oh<?=$i;?>" id="">
                                            <?php foreach($oq1 as $q4): ?>
                                            <option value="<?=$q4;?>"><?=$q4;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td>
                <div class="form-group">
                <select class="form-control" name="<?='mdifficulty'.$i;?>" required>
                <?php 
                    $difficulty = "SELECT * FROM tbl_diff ORDER BY id_diff";
                    $qdifficulty = mysqli_query($conn, $difficulty);
                    while($arraydifficulty  = mysqli_fetch_array($qdifficulty))
                    {
                    ?>
                            <option value="<?php echo $arraydifficulty['id_diff'] ?>"><?php echo $arraydifficulty['diff'] ?></option>                   
                    <?php 
                    }
                ?> 
                </select>
                </div>
                </td> 
                <td>
                <div class="form-group">
                <select class="form-control" name="<?='manalysis'.$i;?>" required>
                <?php 
                    $analysis = "SELECT * FROM tbl_anl ORDER BY id_anl";
                    $qanalysis = mysqli_query($conn, $analysis);
                    while($arrayanalysis  = mysqli_fetch_array($qanalysis))
                    {
                    ?>
                            <option value="<?php echo $arrayanalysis['id_anl'] ?>"><?php echo $arrayanalysis['anl'] ?></option>                   
                    <?php 
                    }
                ?> 
                </select>
                </div>
                </td>           
                                    <td>
                <div class="form-group">
                <select class="form-control" name="<?='math_topic'.$i;?>" placeholder="Select Topic" required>
                <?php 
                    $topics = "SELECT * FROM tbl_topics WHERE id_category='3' ORDER BY id_topic ASC";
                    $qtopics = mysqli_query($conn, $topics);
                    while($arraytopics  = mysqli_fetch_array($qtopics))
                    {
                    ?>
                            <option value="<?php echo $arraytopics['id_topic'] ?>"><?php echo $arraytopics['topic'] ?></option>                   
                    <?php 
                    }
                ?>
                </select>
                </div>
                </td>
                <td>
                <div class="form-group">
                <select class="form-control" name="<?='math_subtopic'.$i;?>" placeholder="Select Topic" required>
                <?php 
                    $subtopics = "SELECT * FROM tbl_sub_topics WHERE id_topic in ('6','7','8','9') ORDER BY sub_topic ASC";
                    $qsubtopics = mysqli_query($conn, $subtopics);
                    while($arraysubtopics  = mysqli_fetch_array($qsubtopics))
                    {
                    ?>
                            <option value="<?php echo $arraysubtopics['id_sub_topic'] ?>"><?php echo $arraysubtopics['sub_topic'] ?></option>                   
                    <?php 
                    }
                ?>
                </select>
                </div>
                </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="text-center">
                        <button class="btn btn-primary btn-block" type="submit" name="submit" >Save</button>
                    </div>
                </div>
            </div>
        </form>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 center">
                <?php
                    // Reading Test
                
                
                if(isset($_POST['submit']))
        {
                $quest_id = $_POST['testtype'];
                // reading
                for($i=1;$i<=52;$i++){
                    $ridcategory = '1';
                    $ridmain = 'R'.$i;
                    $rtopics = $_POST['reading_topic'.$i];
                    $rsubtopics = $_POST['reading_subtopic'.$i];
                    $ranalysis = $_POST['ranalysis'.$i];
                    $rdifficulty = $_POST['rdifficulty'.$i];

                    if(isset($_POST['r'.$i])){
                        $rkey = $_POST['r'.$i];
                        $rsql = "INSERT INTO tbl_soal_backup (id_typesoal,id_category,ID_Main,id_maintopic,id_sub_topic,id_anl,id_diff,Answer_Key) VALUES ('$quest_id','$ridcategory','$ridmain','$rtopics','$rsubtopics','$ranalysis','$rdifficulty','$rkey')";        
                    }
                     else {
                        $rkey = "-";
                        $rsql = "INSERT INTO tbl_soal_backup (id_typesoal,id_category,ID_Main,id_maintopic,id_sub_topic,id_anl,id_diff,Answer_Key) VALUES ('$quest_id','$ridcategory','$ridmain','$rtopics','$rsubtopics','$ranalysis','$rdifficulty','$rkey')";
                    }
                    $rinsert = $conn->query($rsql);
                }
                //writing
                for($i=1;$i<=44;$i++){
                    $widcategory = '2';
                    $widmain = 'W'.$i;
                    $wtopics = $_POST['writing_topic'.$i];
                    $wsubtopics = $_POST['writing_subtopic'.$i];
                    $wanalysis = $_POST['wanalysis'.$i];
                    $wdifficulty = $_POST['wdifficulty'.$i];

                    if(isset($_POST['w'.$i])){
                        $wkey = $_POST['w'.$i];
                        $wsql = "INSERT INTO tbl_soal_backup (id_typesoal,id_category,ID_Main,id_maintopic,id_sub_topic,id_anl,id_diff,Answer_Key) VALUES ('$quest_id','$widcategory','$widmain','$wtopics','$wsubtopics','$wanalysis','$wdifficulty','$wkey')";        
                    }
                     else {
                        $wkey = "-";
                        $wsql = "INSERT INTO tbl_soal_backup (id_typesoal,id_category,ID_Main,id_maintopic,id_sub_topic,id_anl,id_diff,Answer_Key) VALUES ('$quest_id','$widcategory','$widmain','$wtopics','$wsubtopics','$wanalysis','$wdifficulty','$wkey')"; 
                    }
                    $winsert = $conn->query($wsql);
                }
                //noncalculator
                //option
                for($i=1;$i<=15;$i++){
                    $nidcategory = '3';
                    $nidmain = 'N'.$i;
                    $ntopics = $_POST['math_noncal_topic'.$i];
                    $nsubtopics = $_POST['math_noncal_subtopic'.$i];
                    $nanalysis = $_POST['ncanalysis'.$i];
                    $ndifficulty = $_POST['ncdifficulty'.$i];

                    if(isset($_POST['nc'.$i])){
                        $nkey = $_POST['nc'.$i];
                              
                    }
                     else {
                        $nkey = "-";
                        
                    }
                    $nsql = "INSERT INTO tbl_soal_backup (id_typesoal,id_category,ID_Main,id_maintopic,id_sub_topic,id_anl,id_diff,Answer_Key) VALUES ('$quest_id','$nidcategory','$nidmain','$ntopics','$nsubtopics','$nanalysis','$ndifficulty','$nkey')"; 
                    $ninsert = $conn->query($nsql);
                }
                //essay
                for($i=16;$i<=20;$i++){
                    $nidcategory = '3';
                    $nidmain = 'N'.$i;
                    $ntopics = $_POST['math_noncal_topic'.$i];
                    $nsubtopics = $_POST['math_noncal_subtopic'.$i];
                    $nanalysis = $_POST['ncanalysis'.$i];
                    $ndifficulty = $_POST['ncdifficulty'.$i];

                    if(empty($_POST['oa'.$i]) and empty($_POST['ob'.$i]) and empty($_POST['oc'.$i]) and empty($_POST['od'.$i])) {
                        $nkey = "-";
                               
                    }
                     else {
                        $oa = $_POST['oa'.$i];
                        $ob = $_POST['ob'.$i];
                        $oc = $_POST['oc'.$i];
                        $od = $_POST['od'.$i];

                        if ($ob=="/"){

                            $ocd = $oc.$od;
                            $result = $oa/$ocd;
                            $nkey = number_format((float)$result,2,'.','');
                        }
                        else  if ($oc=="/"){

                            $oab = $oa.$ob;
                            $result = $oab/$od;
                            $nkey = number_format((float)$result,2,'.','');
                        } 
                        else{
                            $nkey = $oa.$ob.$oc.$od;
                        }
                    }
                    $nsql = "INSERT INTO tbl_soal_backup (id_typesoal,id_category,ID_Main,id_maintopic,id_sub_topic,id_anl,id_diff,Answer_Key) VALUES ('$quest_id','$nidcategory','$nidmain','$ntopics','$nsubtopics','$nanalysis','$ndifficulty','$nkey')"; 
                    $ninsert = $conn->query($nsql);
                }
                        
                //calculator
                //option
                for($i=1;$i<=30;$i++){
                    $midcategory = '3';
                    $midmain = 'M'.$i;
                    $mtopics = $_POST['math_topic'.$i];
                    $msubtopics = $_POST['math_subtopic'.$i];
                    $manalysis = $_POST['manalysis'.$i];
                    $mdifficulty = $_POST['mdifficulty'.$i];

                    if(isset($_POST['m'.$i])){
                        $mkey = $_POST['m'.$i];
                              
                    }
                     else {
                        $mkey = "-";
                        
                    }
                    $msql = "INSERT INTO tbl_soal_backup (id_typesoal,id_category,ID_Main,id_maintopic,id_sub_topic,id_anl,id_diff,Answer_Key) VALUES ('$quest_id','$midcategory','$midmain','$mtopics','$msubtopics','$manalysis','$mdifficulty','$mkey')"; 
                    $minsert = $conn->query($msql);
                }
                //essay
                for($i=31;$i<=38;$i++){
                    $midcategory = '3';
                    $midmain = 'M'.$i;
                    $mtopics = $_POST['math_topic'.$i];
                    $msubtopics = $_POST['math_subtopic'.$i];
                    $manalysis = $_POST['manalysis'.$i];
                    $mdifficulty = $_POST['mdifficulty'.$i];

                    if(empty($_POST['oe'.$i]) and empty($_POST['of'.$i]) and empty($_POST['og'.$i]) and empty($_POST['oh'.$i])) {
                        $mkey = "-";
                               
                    }
                     else {
                        $oe = $_POST['oe'.$i];
                        $of = $_POST['of'.$i];
                        $og = $_POST['og'.$i];
                        $oh = $_POST['oh'.$i];

                        if ($of=="/"){

                            $ogd = $og.$oh;
                            $result = $oe/$ogd;
                            $mkey = number_format((float)$result,2,'.','');
                        }
                        else  if ($og=="/"){

                            $oeb = $oe.$of;
                            $result = $oeb/$oh;
                            $mkey = number_format((float)$result,2,'.','');
                        } 
                        else{
                            $mkey = $oe.$of.$og.$oh;
                        }
                    }
                    $msql = "INSERT INTO tbl_soal_backup (id_typesoal,id_category,ID_Main,id_maintopic,id_sub_topic,id_anl,id_diff,Answer_Key) VALUES ('$quest_id','$midcategory','$midmain','$mtopics','$msubtopics','$manalysis','$mdifficulty','$mkey')"; 
                    $minsert = $conn->query($msql);
                }

                    if ($minsert == 1) {
                        $status = "<script type='text/javascript'>alert('New record created successfully!')</script>";
                    } else {
                        $status = "<script type='text/javascript'>alert('.$conn->error.')</script>";
                    }
                echo $status."<br>";
                }   ?>
            </div>
        </div>
    </div>

</body>

</html>