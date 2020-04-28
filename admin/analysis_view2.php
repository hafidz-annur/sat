<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All-in SAT Diagnostic Test</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style type="text/css">

    body {
        min-height: 300vh;
        position: relative;
        margin: 0;
        font-family: 'Cambria', sans-serif;
        font-size: 32pt;
        color: royalblue;
    }
    body:before {
    content: "";
    position: absolute;
    z-index: -9999;
    width: 100%;
    height: 100%;
    background: url('background1.png') 0 0/100% 100vh;
    background-size: 1000px 1000px;
    opacity: 0.3;
    }
    .table-sheet{
        width:100%; 
        color:rgba(0, 0, 0, 0.8); 
        font-size:12pt;
        padding: .75rem;
    }
    .table-sheet thead{
        margin-bottom: 3px;
    }
    .table-sheet thead th{
        font-size: 14pt;
        vertical-align: middle;
        text-align: center;
        position: relative;
        color: #fff;
        background-color: rgba(0, 0, 32, 0.6);
        margin-bottom: 3px;
    }
    .table-sheet tr{
        border-bottom: 1px dotted rgba(0, 0, 0, 0.3);
    }
    .table-sheet td{
        vertical-align: middle;
        text-align: center;
        position: relative;
        padding-right: 5px;
        padding-left: 5px;
        padding-top: 4px;
    }
    .table-sheet td.incorrect {
        background-color: #f5c6cb;
    }
    </style>
</head>

<body onload="printer()">
    <?php
    session_start();
    if (empty($_SESSION['mail']))
    {
        echo "<script type='text/javascript'>alert('Please log-in first!')</script>";
        echo "<script>document.location='../';</script>";
    }
    include('printdata.php');
    ?>
    <div class="container center">
        <center><img src="../images/logo.png"  width="250" height="50">
            <h5 class="text-m-0 mb-1 pt-5" style="font-size:32pt; color:royalblue">
                <b><a class="pb-5"><?=$questionanme." Review<br>"?></a></b>
            </h5>
            <img class="pt-5 pb-5 center" src="../images/arc.jpg" width="700" height="700" alt="SAT Test">
            <h5 class="text-m-0 mb-1 pt-5 pb-5" style="font-size:32pt; color:royalblue">
                <b><a class="pb-5"><?=$studentname?></a></b>
            </h5>
            <h5 class="text-m-0 mb-1 pt-3 pb-3" style="font-size:32pt; color:royalblue">
                <b><a class="pb-5"><?="Grade : ".$studentgrade?></a></b>
            </h5>
            <h5 class="text-m-0 mb-1 pb-3" style="font-size:32pt; color:royalblue">
                <b> <a class="pb-5"><?=$school?></a></b>
            </h5>
            <div class="row pt-5" style="page-break-after: always">
                <div class="col pt-5 ">
                    <img src="../images/instagram-logo.png" width="70" height="70" alt="" href="instagram.com/allineduspace">
                    <a class="text" style="font-size: 25pt;">@allineduspace</a>
                </div>
                <div class="col pt-5 ">
                    <img src="../images/www.png" alt="" width="70" height="70" href="all-inedu.com/">
                    <a class="text" style="font-size: 25pt;">all-inedu.com</a>
                </div>
            </div>
 
 
            <h5 class="text-m-0 mb-1 pt-5" style="font-size:32pt; color:royalblue; text-align:left">
                <b><a class="pb-0">Overview</a></b>
            </h5>
            <div class="row pt-3 pb-0">
                <div class="col-sm-3">
                    <div class="card card-sec m-b-30 mb-3 shadow ">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">Composite Score</h5>
                        </div>
                        <div class="card-body">
                            <b><?=$scoretotal?></b>
                            <p class="text-muted m-b-0"><small class="text-sm" style="font-size: 20pt"> Out of
                                    1600</small>
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card card-sec m-b-30 mb-3 shadow ">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">Overall Chart</h5>
                        </div>
                        <div class="card-body">
                            <div class="col-sm-10 text-center">
                                <canvas id='score'></canvas>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 pl-3">
                    <div class="card card-sec m-b-30 pl-0 shadow">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title" >Benchmark Score</h5>
                        </div>
                        <div class="card-body" >
                            <h2><b><?=$benchmark?></b></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-0">
                <div class="col">
                    <div class="card card-sec m-b-30 shadow">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">English Score</h5>
                        </div>
                        <div class="card-body">
                            <a class="text" style="font-size: 25pt"><b><?=$arrscore[0]?></b></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-sec m-b-30 shadow">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">Math Score</h5>
                        </div>
                        <div class="card-body">
                            <a class="text" style="font-size: 25pt"><b><?=$arrscore[1]?></b></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-0 pb-0">
                <div class="col text-center mx-auto">
                    <div class="card card-sec m-b-30 shadow">

                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">Overall Breakdown</h5>
                        </div>
                        <div class="card-body">
                            <div class="pb-0 mb-0" style="width:68vw;">
                                <canvas id="topict"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-0">
                <div class="col">
                    <div class="card card-sec m-b-30 shadow" style="height: 23vh">
                        <div class="card-header  bg-secondary text-white">
                            <h5 class="text card-title">Topic Legend</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 text-center mx-auto">
                                    <div class="table-responsive-sm ">
                                        <table class="table" name="topicl1" align="left"
                                            style=" width:40vw; font-size: 15px">
                                            <tr>
                                                <td class="align-middle text-center col-md-auto">No</td>
                                                <td class="text-center align-middle col-md-auto">Code</td>
                                                <td class="text-center align-middle col-md-auto">Topic</td>
                                            </tr>
                                            <?php
                        $no =1;
                        while($l = mysqli_fetch_array($codet))
                            {
                                        ?>
                                            <tr>
                                                <td class="text-center align-middle col-md-auto"><?=$no?></td>
                                                <td class="text-center align-middle col-md-auto"><?=$l['tcode']?></td>
                                                <td class="text-center align-middle col-md-auto"><?=$l['topic']?></td>
                                            </tr>
                                            <?php 
                        $no++;
                            }
                        ?>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-6 text-center mx-auto">
                                    <div class="table-responsive-sm ">
                                        <table class="table" name="topicl2" align="center"
                                            style="width:40vw; font-size: 15px">
                                            <tr>
                                                <td class="align-middle text-center col-md-auto">No</td>
                                                <td class="text-center align-middle col-md-auto">Code</td>
                                                <td class="text-center align-middle col-md-auto">Topic</td>
                                            </tr>
                                            <?php
                        $no =5;
                        while($k = mysqli_fetch_array($codett))
                            {
                                        ?>
                                            <tr>
                                                <td class="text-center align-middle col-md-auto"><?=$no?></td>
                                                <td class="text-center align-middle col-md-auto"><?=$k['tcode']?></td>
                                                <td class="text-center align-middle col-md-auto"><?=$k['topic']?></td>
                                            </tr>
                                            <?php 
                        $no++;
                            }
                        ?>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <h5 class="text-m-0 mb-1 pt-5"
                style="font-size:32pt; color:royalblue; text-align:left;page-break-before: always;">
                <b><a class="pb-5">English</a></b>
            </h5>
            <div class="row pt-3 pb-2">
                <div class="col-sm-3">
                    <div class="card card-sec m-b-30 mb-3 shadow ">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">Score</h5>
                        </div>
                        <div class="card-body">
                            <b><?=$arrscore[0]?></b>
                            <p class="text-muted m-b-0"><small class="text-sm" style="font-size: 20pt"> Out of
                                    800</small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="card card-sec m-b-30 mb-3 shadow ">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">English Chart</h5>
                        </div>
                        <div class="card-body">
                            <div class="col-sm-10 text-center">
                                <canvas id='english'></canvas>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card card-sec shadow">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">English Section Breakdown</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-sm ">
                                <table class="table" name="engbreak" style="width:19vw; font-size: 20px">
                                <tr>
                                        <td class="align-middle text-center col-md-auto">Section</td>
                                        <td class="text-center align-middle col-md-auto">Correct</td>
                                        <td class="text-center align-middle col-md-auto">Incorrect</td>
                                </tr>
                                    <tr>
                                        <td class="align-middle text-center col-md-auto">Reading</td>
                                        <td class="align-middle text-center col-md-auto"><?=$correading?></td>
                                        <td class="align-middle text-center col-md-auto"><?=$incorreading?></td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-center col-md-auto">Writing</td>
                                        <td class="align-middle text-center col-md-auto"><?=$corwriting?></td>
                                        <td class="align-middle text-center col-md-auto"><?=$incorwriting?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-3 pb-3">
                <div class="col text-center mx-auto">
                    <div class="card card-sec m-b-30 shadow">

                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">English Topic Analysis</h5>
                        </div>
                        <div class="card-body">
                            <div class="" style="width:65vw">
                                <canvas id="englishb"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 bf" style="page-break-before:always">
                <div class="col-sm text-center ">
                    <div class="card card-sec shadow">
                        <div class="card-header bg-secondary text-white">
                            
                            <h5 class="text card-title">Reading Section Sheet</h5>
                        </div>
                        <div class="card-body">

                            
                                <table class="table-sheet" name="Reading">
                                    <thead>
                                        <th >No</th>
                                        <th >Your answer</th>
                                        <th >Key</th>
                                        <th >Result</th>
                                        <th >Sub Topic</th>
                                        <th >Topic</th>
                                        <th >Difficulty</th>
                                    </thead>
                                    <?php
                    $no =1;
                    while($k = mysqli_fetch_array($readingcheck))
                        {
                                if($k['Correction'] == "Incorrect")
                                {
                                    ?>
                                    <tr>
                                        <td ><?=$no?></td>
                                        <td class="incorrect"><?=$k['Your Answer']?></td>
                                        <td ><?=$k['Correct Answer']?></td>
                                        <td ><?=$k['Correction']?></td>
                                        <td ><?=$k['Subtopic']?></td>
                                        <td ><?=$k['Topic']?></td>
                                        <td ><?=$k['difficulty']?></td>
                                    </tr>
                                    <?php
                                }
                                else
                                {
                                ?>
                                    <tr>
                                        <td ><?=$no?></td>
                                        <td ><?=$k['Your Answer']?></td>
                                        <td ><?=$k['Correct Answer']?></td>
                                        <td ><?=$k['Correction']?></td>
                                        <td ><?=$k['Subtopic']?></td>
                                        <td ><?=$k['Topic']?></td>
                                        <td ><?=$k['difficulty']?></td>
                                    </tr>
                                    <?php 
                                }
                    $no++;
                        }
                    ?>
                                </table>
                            

                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-3 pb-3" style="page-break-before: always">
                <div class="col text-center mx-auto">
                    <div class="card card-sec m-b-30 shadow">

                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">Reading Section Subtopic Analysis</h5>
                        </div>
                        <div class="card-body">
                            <div class="" style="width:65vw">
                                <canvas id="horbar"></canvas>
                                <!-- <?=$labelsubtopic."<br>".$datasubtopicc."<br>".$datasubtopici?> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col">
                    <div class="card card-sec m-b-30 shadow">
                        <div class="card-header  bg-secondary text-white">
                            <h5 class="text card-title">Reading Section Subtopic Legend</h5>
                        </div>
                        <div class="card-body">
                        <?php
                        $no =1;
                            ?>
                                    <div class="table-responsive-sm ">
                                        <table class="table" name="rsub">
                                            <tr>
                                                <td class="align-middle text-center col-md-auto">No</td>
                                                <td class="text-center align-middle col-md-auto">Code</td>
                                                <td class="text-center align-middle col-md-auto">Subtopic</td>
                                                <td class="text-center align-middle col-md-auto">Topic</td>
                                            </tr>
                                            <?php
                        $no =1;
                        while($k = mysqli_fetch_assoc($rsuba))
                            {
                                        ?>
                                            <tr>
                                                <td class="text-center align-middle col-md-auto"><?=$no?></td>
                                                <td class="text-center align-middle col-md-auto"><?=$k['code']?></td>
                                                <td class="text-center align-middle col-md-auto"><?=$k['sub_topic']?></td>
                                                <td class="text-center align-middle col-md-auto"><?=$k['idtopic']?></td>
                                            </tr>
                                            <?php 
                        $no++;
                            }
                        ?>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row mt-3 bf" style="page-break-before:always">
                <div class="col-sm text-center ">
                    <div class="card card-sec shadow">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">Writing Section Sheet</h5>
                        </div>
                        <div class="card-body">

                            <div>
                                <table class="table-sheet" name="Writing" >
                                <thead>
                                        <th >No</th>
                                        <th >Your answer</th>
                                        <th >Key</th>
                                        <th >Result</th>
                                        <th >Sub Topic</th>
                                        <th >Topic</th>
                                        <th >Difficulty</th>
                                </thead>
                                    <?php
                    $no =1;
                    while($k = mysqli_fetch_array($writingcheck))
                        {
                                if($k['Correction'] == "Incorrect")
                                {
                                    ?>
                                    <tr >
                                        <td ><?=$no?></td>
                                        <td class="incorrect" ><?=$k['Your Answer']?></td>
                                        <td ><?=$k['Correct Answer']?></td>
                                        <td ><?=$k['Correction']?></td>
                                        <td ><?=$k['Subtopic']?></td>
                                        <td ><?=$k['Topic']?></td>
                                        <td ><?=$k['difficulty']?></td>
                                    </tr>
                                    <?php
                                }
                                else
                                {
                                ?>
                                    <tr >
                                        <td><?=$no?></td>
                                        <td><?=$k['Your Answer']?></td>
                                        <td><?=$k['Correct Answer']?></td>
                                        <td><?=$k['Correction']?></td>
                                        <td><?=$k['Subtopic']?></td>
                                        <td><?=$k['Topic']?></td>
                                        <td><?=$k['difficulty']?></td>
                                    </tr>
                                    <?php 
                                }
                    $no++;
                        }
                    ?>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-3 pb-3" style="page-break-before: always">
                <div class="col text-center mx-auto">
                    <div class="card card-sec m-b-30 shadow">

                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">Writing Section Subtopic Analysis</h5>
                        </div>
                        <div class="card-body">
                            <div class="" style="width:65vw">
                                <canvas id="subw"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col">
                    <div class="card card-sec m-b-30 shadow">
                        <div class="card-header  bg-secondary text-white">
                            <h5 class="text card-title">Writing Section Subtopic Legend</h5>
                        </div>
                        <div class="card-body">
                        <?php
                        $no =1;
                            ?>
                                    <div class="table-responsive-sm ">
                                        <table class="table" name="rsub">
                                            <tr>
                                                <td class="align-middle text-center col-md-auto">No</td>
                                                <td class="text-center align-middle col-md-auto">Code</td>
                                                <td class="text-center align-middle col-md-auto">Subtopic</td>
                                                <td class="text-center align-middle col-md-auto">Topic</td>
                                            </tr>
                                            <?php
                        $no =1;
                        while($k = mysqli_fetch_assoc($wsuba))
                            {
                                        ?>
                                            <tr>
                                                <td class="text-center align-middle col-md-auto"><?=$no?></td>
                                                <td class="text-center align-middle col-md-auto"><?=$k['code']?></td>
                                                <td class="text-center align-middle col-md-auto"><?=$k['sub_topic']?></td>
                                                <td class="text-center align-middle col-md-auto"><?=$k['idtopic']?></td>
                                            </tr>
                                            <?php 
                        $no++;
                            }
                        ?>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
            </div>
            <h5 class="text-m-0 mb-1 pt-5"
                style="font-size:32pt; color:royalblue; text-align:left;page-break-before: always;">
                <b><a class="pb-5">Math</a></b>
            </h5>
            <div class="row pt-3 pb-2">
                <div class="col-sm-3">
                    <div class="card card-sec m-b-30 mb-3 shadow ">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">Score</h5>
                        </div>
                        <div class="card-body">
                            <b><?=$arrscore[1]?></b>
                            <p class="text-muted m-b-0"><small class="text-sm" style="font-size: 20pt"> Out of
                                    800</small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="card card-sec m-b-30 mb-3 shadow ">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">Math Chart</h5>
                        </div>
                        <div class="card-body">
                            <div class="col-sm-10 text-center">
                                <canvas id='math'></canvas>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card card-sec shadow">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">Math Section Breakdown</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-sm ">
                                <table class="table" name="mathbreak" style="width:19vw; font-size: 18px">
                                <tr>
                                        <td class="align-middle text-center col-md-auto">Section</td>
                                        <td class="text-center align-middle col-md-auto">Correct</td>
                                        <td class="text-center align-middle col-md-auto">Incorrect</td>
                                </tr>
                                    <tr>
                                        <td class="align-middle text-center col-md-auto">Non-Cal</td>
                                        <td class="align-middle text-center col-md-auto"><?=$cornoncal?></td>
                                        <td class="align-middle text-center col-md-auto"><?=$incornoncal?></td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-center col-md-auto">Calculator</td>
                                        <td class="align-middle text-center col-md-auto"><?=$corcal?></td>
                                        <td class="align-middle text-center col-md-auto"><?=$incorcal?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-3 pb-3">
                <div class="col text-center mx-auto">
                    <div class="card card-sec m-b-30 shadow">

                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">Math Topic Analysis</h5>
                        </div>
                        <div class="card-body">
                            <div class="" style="width:65vw">
                                <canvas id="mathb"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 bf" style="page-break-before:always">
                <div class="col-sm text-center ">
                    <div class="card card-sec shadow">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">Non-Calculator Section Sheet</h5>
                        </div>
                        <div class="card-body">

                            <div>
                                <table class="table-sheet" name="Non-cal">
                                    <thead >
                                        <th >No</th>
                                        <th>Your answer</th>
                                        <th>Key</th>
                                        <th>Result</th>
                                        <th>Sub Topic</th>
                                        <th>Topic</th>
                                        <th>Difficulty</th>
                                    </thead>
                                    <?php
                    $no =1;
                    while($k = mysqli_fetch_array($noncalcheck))
                        {
                                if($k['Correction'] == "Incorrect")
                                {
                                    ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td class="incorrect"><?=$k['Your Answer']?></td>
                                        <td><?=$k['Correct Answer']?></td>
                                        <td><?=$k['Correction']?></td>
                                        <td><?=$k['Subtopic']?></td>
                                        <td><?=$k['Topic']?></td>
                                        <td><?=$k['difficulty']?></td>
                                    </tr>
                                    <?php
                                }
                                else
                                {
                                ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$k['Your Answer']?></td>
                                        <td><?=$k['Correct Answer']?></td>
                                        <td><?=$k['Correction']?></td>
                                        <td><?=$k['Subtopic']?></td>
                                        <td><?=$k['Topic']?></td>
                                        <td><?=$k['difficulty']?></td>
                                    </tr>
                                    <?php 
                                }
                    $no++;
                        }
                    ?>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 bf" style="page-break-before:always">
                <div class="col-sm text-center ">
                    <div class="card card-sec shadow">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">Calculator Section Sheet</h5>
                        </div>
                        <div class="card-body">

                            <div>
                                <table class="table-sheet" name="Cal" >
                                    <thead >
                                        <th  >No</th>
                                        <th >Your answer</th>
                                        <th >Key</th>
                                        <th >Result</th>
                                        <th >Sub Topic</th>
                                        <th >Topic</th>
                                        <th >Difficulty</th>
                                    </thead>
                                    <?php
                    $no =1;
                    while($k = mysqli_fetch_array($calcheck))
                        {
                                if($k['Correction'] == "Incorrect")
                                {
                                    ?>
                                    <tr >
                                        <td ><?=$no?></td>
                                        <td class="incorrect"><?=$k['Your Answer']?></td>
                                        <td ><?=$k['Correct Answer']?></td>
                                        <td ><?=$k['Correction']?></td>
                                        <td ><?=$k['Subtopic']?></td>
                                        <td ><?=$k['Topic']?></td>
                                        <td ><?=$k['difficulty']?></td>
                                    </tr>
                                    <?php
                                }
                                else
                                {
                                ?>
                                    <tr >
                                        <td ><?=$no?></td>
                                        <td ><?=$k['Your Answer']?></td>
                                        <td ><?=$k['Correct Answer']?></td>
                                        <td ><?=$k['Correction']?></td>
                                        <td ><?=$k['Subtopic']?></td>
                                        <td ><?=$k['Topic']?></td>
                                        <td ><?=$k['difficulty']?></td>
                                    </tr>
                                    <?php 
                                }
                    $no++;
                        }
                    ?>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-3 pb-3" style="page-break-before: always">
                <div class="col text-center mx-auto">
                    <div class="card card-sec m-b-30 shadow">

                        <div class="card-header bg-secondary text-white">
                            <h5 class="text card-title">Math Section Subtopic Analysis</h5>
                        </div>
                        <div class="card-body">
                            <div class="" style="width:65vw">
                                <canvas id="subm"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col">
                    <div class="card card-sec m-b-30 shadow">
                        <div class="card-header  bg-secondary text-white">
                            <h5 class="text card-title">Math Section Subtopic Legend</h5>
                        </div>
                        <div class="card-body">
                        <?php
                        $no =1;
                            ?>
                                    <div class="">
                                        <table name="msub" style="width:100%; color:rgba(0, 0, 0, 0.8); font-size:12pt">
                                            <tr >
                                                <td class="align-middle text-center col-md-auto">No</td>
                                                <td class="text-center align-middle col-md-auto">Code</td>
                                                <td class="text-center align-middle col-md-auto">Subtopic</td>
                                                <td class="text-center align-middle col-md-auto">Topic</td>
                                            </tr>
                                            <?php
                        $no =1;
                        while($k = mysqli_fetch_assoc($msuba))
                            {
                                        ?>
                                            <tr  style="border-bottom: 1px dotted rgba(0, 0, 0, 0.3);">
                                                <td class="text-center align-middle col-md-auto"><?=$no?></td>
                                                <td class="text-center align-middle col-md-auto"><?=$k['code']?></td>
                                                <td class="text-center align-middle col-md-auto"><?=$k['sub_topic']?></td>
                                                <td class="text-center align-middle col-md-auto"><?=$k['idtopic']?></td>
                                            </tr>
                                            <?php 
                        $no++;
                            }
                        ?>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row pt-2" style="page-break-before: always">
                <div class="col">
                    <div class="card card-sec m-b-30 shadow">
                        <div class="card-header  bg-secondary text-white">
                            <h5 class="text card-title">Benchmark</h5>
                        </div>
                        <div class="card-body">
                        <?php
                        $no =1;
                            ?>
                                    <div class="">
                                        <table class="table table-bordered" name="msub" border="1px">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col" class="align-middle text-center col-md-auto">Benchmark</th>
                                                    <th scope="col" colspan="3" class="text-center align-middle col-md-auto">Score Range</th>
                                                    <th scope="col" class="text-center align-middle col-md-auto">Description</th>
                                                </tr> 
                                            </thead>
                                            <?php
                        
                        while($k = mysqli_fetch_assoc($qbm))
                            {
                                        ?>
                                        <tbody>
                                            <tr >
                                                <th scope="row" class="text-center align-middle col-md-auto"><?=$k['benchmark']?></th>
                                                <td class="text-center align-middle col-md-auto"><?=$k['score_min']?></td>
                                                <td class="table-borderless text-center align-middle col-md-auto"> - </td>
                                                <td class="text-center align-middle col-md-auto"><?=$k['score_max']?></td>
                                                <td class="text-center align-middle col-md-auto"><?=$k['description']?></td>
                                            </tr>
                                        </tbody>
                                            <?php 
                        
                            }
                        ?>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
            </div>            
        </center>
    </div>
</body>
<script>
function printer() {
    window.print();
}

Chart.defaults.global.animation = 0;
Chart.defaults.global.defaultFontFamily = "Cambria";

Chart.Legend.prototype.afterFit = function() {
    this.height = this.height + 10;
};



var topictCanvas = document.getElementById("topict");
var Topict_C = {
    label: '# Correct',
    data: [ <?= $datattopicc ?> ],
    backgroundColor: 'rgba(0, 16, 32, 0.6)',
    borderWidth: 1,
    borderColor: 'white',
    datalabels: {
        anchor: 'start',
        align: 'top',
        labels: {
            value: {
                color: 'white',

            },
        }
    }
};
var Topict_I = {
    label: '# Incorrect',
    data: [ <?= $datattopici ?> ],
    backgroundColor: 'rgba(224, 96, 0, 0.6)',
    borderWidth: 1,
    borderColor: 'white',
    datalabels: {
        align: 'top',
        labels: {
            value: {
                color: 'rgba(0, 16, 32, 0.6)',

            },
        }
    }
};
var topictData = {
    labels: [ <?= $labelttopic ?> ],
    datasets: [Topict_C, Topict_I]
};

var topicOptions = {
    responsive: true,
    title: {
        display: true,
        text: '             Reading                 |        Writing     |                        Math                          ',
        position: 'bottom',
        fontSize: 30,
        padding: 0
    },
    scales: {
        xAxes: [{
            display: true,
            gridLines: {
                display: true,
                lineWidth: 1,
                color: 'rgba(0, 0, 0, 0.5)'
            },
            ticks: {
                display: true,
                autoSkip: true,
                fontSize: 20
            },
            scaleLabel: {
                display: true,
            },
            stacked: true,
        }],
        yAxes: [{
            gridLines: {
                display: false,

            },
            ticks: {
                display: false,

            },
            stacked: true,

        }]
    },
    legend: {
        display: true,
        labels: {
            padding: 20
        }

    },
    layout: {
        padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 15,
        }
    },
    plugins: {
        datalabels:{
            font:{
                weight: 'bold',
                size : 20,
            }
        }
    }
};
var topictChart = new Chart(topictCanvas, {
    type: 'bar',
    data: topictData,
    options: topicOptions
});

var scoreCanvas = document.getElementById("score");
var Scoring = {
    label: 'Score',
    data: [ <?= $nscore ?> ],
    backgroundColor: ['rgba(0, 16, 32, 0.6)', 'rgba(224, 96, 0, 0.6)'],
    borderWidth: 3,

};

var scoreData = {
    labels: [ <?= $lscore ?> ],
    datasets: [Scoring]
};
var doughnutOptions = {
    responsive: true,
    legend: {
        display: true,
        position: 'right',
        labels: {
            fontSize: 14,
        }
    },
    plugins: {
        datalabels: {
            display: false,
            anchor: 'center',
            align: 'center',
            color: '#fff',
            labels: {
                value: {
                    font: {
                        size: 14,
                        weight: 'bold'
                    },
                    color: 'white',
                }
            }
        }
    }
}
var doughChart = new Chart(scoreCanvas, {
    type: 'doughnut',
    data: scoreData,
    options: doughnutOptions
});
//
var engCanvas = document.getElementById("english");
var englishscoring = {
    label: 'English',
    data: [ <?= $correading ?> , <?= $corwriting ?> ],
    backgroundColor: ['rgba(0, 16, 32, 0.6)', 'rgba(224, 96, 0, 0.6)'],
    borderWidth: 3,

};

var engscoreData = {
    labels: ['Reading', 'Writing'],
    datasets: [englishscoring]
};

var doChart = new Chart(engCanvas, {
    type: 'doughnut',
    data: engscoreData,
    options: doughnutOptions
});
//
var mathCanvas = document.getElementById("math");
var mathscoring = {
    label: 'Math',
    data: [ <?= $cornoncal ?> , <?= $corcal ?> ],
    backgroundColor: ['rgba(0, 16, 32, 0.6)', 'rgba(224, 96, 0, 0.6)'],
    borderWidth: 3,

};

var mathscoreData = {
    labels: ['Non Calculator', 'Calculator'],
    datasets: [mathscoring]
};

var doChart = new Chart(mathCanvas, {
    type: 'doughnut',
    data: mathscoreData,
    options: doughnutOptions
});
//
var englishbCanvas = document.getElementById("englishb");
var englishb_C = {
    label: '# Correct',
    data: [ <?= $dataengc ?> ],
    backgroundColor: 'rgba(0, 16, 32, 0.6)',
    barThickness :75,
    borderWidth: 1,
    borderColor: 'white',
    datalabels: {
        anchor: 'start',
        align: 'top',
        labels: {
            value: {
                color: 'white',

            },
            font: {
                weight: 'bold',
                size: 20,
            }
        }
    }
};
var englishb_I = {
    label: '# Incorrect',
    data: [ <?= $dataengi ?> ],
    backgroundColor: 'rgba(224, 96, 0, 0.6)',
    borderWidth: 1,
    barThickness :75,
    borderColor: 'white',
    datalabels: {
        align: 'top',
        labels: {
            value: {
                color: 'rgba(0, 16, 32, 0.6)',

            },
            font: {
                weight: 'bold',
                size: 30,
            }
        }
    }
};
var englishbData = {
    labels: [ <?= $labeleng ?> ],
    datasets: [englishb_C, englishb_I]
};
var englishOptions = {
    responsive: true,
    title: {
        display: true,
        text: '         Reading                                      |               Writing     ',
        position: 'bottom',
        fontSize: 30,
        padding: 0
    },
    scales: {
        xAxes: [{
            display: true,
            gridLines: {
                display: true,
                lineWidth: 1,
                color: 'rgba(0, 0, 0, 0.5)'
            },
            ticks: {
                display: true,
                autoSkip: true,
                fontSize: 20,
            },
            stacked: true,
        }],
        yAxes: [{
            gridLines: {
                display: false,

            },
            ticks: {
                display: false,

            },
            stacked: true,

        }]
    },
    legend: {
        display: true,
        labels: {
            padding: 20
        }

    },
    layout: {
        padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 15,
        }
    },
    plugins: {
        datalabels:{
            font:{
                weight: 'bold',
                size: 17
            }
        }
    },
};
var topictChart = new Chart(englishbCanvas, {
    type: 'bar',
    data: englishbData,
    options: englishOptions
});
//

var ctx = document.getElementById('horbar');
var sub_C = {
    label: '# Correct',
    data: [ <?=$datasubtopicc ?> ],
    backgroundColor: 'rgba(0, 16, 32, 0.6)',
    borderWidth: 0,
    datalabels: {
        anchor: 'start',
        align: 'top',
        labels: {
            value: {
                color: 'white',

            },
            font: {
                weight: 'bold'
            }
        }
    }
};
var sub_I = {
    label: '# Incorrect',
    data: [ <?=$datasubtopici ?> ],
    backgroundColor: 'rgba(224, 96, 0, 0.6)',
    borderWidth: 0,
    datalabels: {
        align: 'top',
        labels: {
            value: {
                color: 'rgba(0, 16, 32, 0.6)',

            },
            font: {
                weight: 'bold'
            }
        }
    }
};
var subData = {
    labels: [ <?=$labelsubtopic ?> ],
    datasets: [sub_C, sub_I]
};
var barOptions = {
    responsive: true,
    scales: {
        xAxes: [{
            display: true,
            gridLines: {
                display: true,
                lineWidth: 1,
                color: 'rgba(0, 0, 0, 0.5)'
            },
            ticks: {
                display: true,
                autoSkip: true,
                fontSize: 20,
            },
            stacked: true,
        }],
        yAxes: [{
            gridLines: {
                display: false,

            },
            ticks: {
                display: false,

            },
            stacked: true,

        }]
    },
    legend: {
        display: true,
        labels: {
            padding: 20
        }

    },
    layout: {
        padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 15,
        }
    },
    plugins: {
        datalabels:{
            font:{
                weight: 'bold',
                size: 17
            }
        }
    },
};
var topictChart = new Chart(horbar, {
    type: 'bar',
    data: subData,
    options: barOptions
});
var ctx = document.getElementById('subw');
var subw_C = {
    label: '# Correct',
    data: [ <?=$datasubwc ?> ],
    backgroundColor: 'rgba(0, 16, 32, 0.6)',
    borderWidth: 0,
    datalabels: {
        anchor: 'start',
        align: 'top',
        labels: {
            value: {
                color: 'white',

            },
            font: {
                weight: 'bold'
            }
        }
    }
};
var subw_I = {
    label: '# Incorrect',
    data: [ <?=$datasubwi ?> ],
    backgroundColor: 'rgba(224, 96, 0, 0.6)',
    borderWidth: 0,
    datalabels: {
        align: 'top',
        labels: {
            value: {
                color: 'rgba(0, 16, 32, 0.6)',

            },
            font: {
                weight: 'bold'
            }
        }
    }
};
var subwData = {
    labels: [ <?=$labelsubw ?> ],
    datasets: [subw_C, subw_I]
};
var topictChart = new Chart(subw, {
    type: 'bar',
    data: subwData,
    options: barOptions
});
//
var mathbCanvas = document.getElementById("mathb");
var mathb_C = {
    label: '# Correct',
    data: [ <?= $datamathc ?> ],
    backgroundColor: 'rgba(0, 16, 32, 0.6)',
    barThickness :75,
    borderWidth: 1,
    borderColor: 'white',
    datalabels: {
        anchor: 'start',
        align: 'top',
        labels: {
            value: {
                color: 'white',

            },
            font: {
                weight: 'bold',
                size: 20,
            }
        }
    }
};
var mathb_I = {
    label: '# Incorrect',
    data: [ <?= $datamathi ?> ],
    backgroundColor: 'rgba(224, 96, 0, 0.6)',
    borderWidth: 1,
    barThickness :75,
    borderColor: 'white',
    datalabels: {
        align: 'top',
        labels: {
            value: {
                color: 'rgba(0, 16, 32, 0.6)',

            },
            font: {
                weight: 'bold',
                size: 30,
            }
        }
    }
};
var mathbData = {
    labels: [ <?= $labelmath ?> ],
    datasets: [mathb_C, mathb_I]
};
var mathOptions = {
    responsive: true,

    scales: {
        xAxes: [{
            display: true,
            gridLines: {
                display: true,
                lineWidth: 1,
                color: 'rgba(0, 0, 0, 0.5)'
            },
            ticks: {
                display: true,
                autoSkip: true,
                fontSize: 20,
            },
            stacked: true,
        }],
        yAxes: [{
            gridLines: {
                display: false,

            },
            ticks: {
                display: false,

            },
            stacked: true,

        }]
    },
    legend: {
        display: true,
        labels: {
            padding: 20
        }

    },
    layout: {
        padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 15,
        }
    },
    plugins: {
        datalabels:{
            font:{
                weight: 'bold',
                size: 17
            }
        }
    },
};
var topictChart = new Chart(mathbCanvas, {
    type: 'bar',
    data: mathbData,
    options: mathOptions
});
//
var ctx = document.getElementById('subm');
var subm_C = {
    label: '# Correct',
    data: [ <?=$datasubmc ?> ],
    backgroundColor: 'rgba(0, 16, 32, 0.6)',
    borderWidth: 0,
    datalabels: {
        anchor: 'start',
        align: 'top',
        labels: {
            value: {
                color: 'white',

            },
            font: {
                weight: 'bold'
            }
        }
    }
};
var subm_I = {
    label: '# Incorrect',
    data: [ <?=$datasubmi ?> ],
    backgroundColor: 'rgba(224, 96, 0, 0.6)',
    borderWidth: 0,
    datalabels: {
        align: 'top',
        labels: {
            value: {
                color: 'rgba(0, 16, 32, 0.6)',

            },
            font: {
                weight: 'bold'
            }
        }
    }
};
var submData = {
    labels: [ <?=$labelsubm ?> ],
    datasets: [subm_C, subm_I]
};
var mathsubOptions = {
    responsive: true,
    scales: {
        xAxes: [{
            display: true,
            gridLines: {
                display: true,
                lineWidth: 1,
                color: 'rgba(0, 0, 0, 0.5)'
            },
            ticks: {
                display: true,
                autoSkip: true,
                fontSize: 12,
            },
            stacked: true,
        }],
        yAxes: [{
            gridLines: {
                display: false,

            },
            ticks: {
                display: false,

            },
            stacked: true,

        }]
    },
    legend: {
        display: true,
        labels: {
            padding: 20
        }

    },
    layout: {
        padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 15,
        }
    },
    plugins: {
        datalabels:{
            font:{
                weight: 'bold',
                size: 12
            }
        }
    },
};
var topictChart = new Chart(subm, {
    type: 'bar',
    data: submData,
    options: mathsubOptions
});
</script>