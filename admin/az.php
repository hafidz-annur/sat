<html lang="en">
<?php include("connect.php"); 
include("functions.php");
$id_result = $_POST['id_result'];
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
    <center><img src="../images/logo.png"  width="250" height="50">
        <div class="container">
            <h3 class=" text-white m-0 mb-3" style="background: #4CAF50"> Analyze Details <?=$id_result?></h3>
            <div class="row">
                <div class="col-md-12 center">
                    <form action="analysis_view2.php" method="post" align="center">
                    <input type="hidden" name="id_result" value="<?=$id_result?>">
                        <h5 class="bg-secondary text-white m-0 "> Category</h5>
                        <table name="category" class="table table-sm table-hover" border="1" cellpadding="0">
                            <thead style="background: #4CAF50" class="text-white">
                                <tr align="center">
                                    <th width=70%> Section </th>
                                    <th width=15%> Correct Score </th>
                                    <th width=15%> Incorrect Score </th>
                                </tr>
                            </thead>
                            <?php
                $category = "SELECT e.category_name as nama,e.id_category as id FROM tbl_categories e, tbl_result_cat r WHERE e.id_category=r.id_category AND r.id_result='$id_result' GROUP BY e.category_name ORDER BY id ASC";
                $result = mysqli_query($conn,$category);  
                while ($row = mysqli_fetch_assoc($result))
                {
                    $catname= $row['nama'];
                    $catid = $row['id'];
                    $sqlincz = "SELECT r.correct_sum as correct,r.Incorrect_sum as Incorrect FROM tbl_categories e, tbl_result_cat r WHERE e.id_category=r.id_category AND r.id_result='$id_result' and r.id_category='$catid'";
                    $resultz = mysqli_query($conn,$sqlincz); 
                    $row1 = mysqli_fetch_assoc($resultz);
                    $correct = $row1['correct'];
                    $incorrect = $row1['Incorrect'];
                    ?>
                            <tr>
                                <td><?=$catname?></td>
                                <td><?=$correct?></td>
                                <td><?=$incorrect?></td>
                                <?php } ?>
                            </tr>
                        </table>
                        <h5 class="bg-secondary text-white m-0 "> Topic</h5>
                        <table name="topic" class="table table-sm table-hover" border="1" cellpadding="0"
                            cellpadding="0" align="center">
                            <thead style="background: #4CAF50" class="text-white">
                                <tr align="center">
                                    <th width=70%> Topics </th>
                                    <th width=15%> Correct Score </th>
                                    <th width=15%> Incorrect Score </th>
                                </tr>
                            </thead>
                            <?php
                $topic = "SELECT t.topic ,t.id_topic FROM tbl_topics t, tbl_result_topic r WHERE t.id_topic=r.id_topic AND r.id_result='$id_result' GROUP BY 1 ORDER BY 2 ASC";
                $topica = mysqli_query($conn,$topic);  
                while ($rtopic = mysqli_fetch_assoc($topica))
                {
                    $topicnama= $rtopic['topic'];
                    $topicid = $rtopic['id_topic'];
                    $sqltopic = "SELECT r.correct_topic as ct, r.incorrect_topic as it FROM tbl_topics t, tbl_result_topic r WHERE t.id_topic=r.id_topic AND r.id_result='$id_result' and r.id_topic='$topicid'";
                    $topicb = mysqli_query($conn,$sqltopic); 
                    $topicc = mysqli_fetch_assoc($topicb);
                    $ct = $topicc['ct'];
                    $it = $topicc['it'];
                    ?>
                            <tr>
                                <td><?=$topicnama;?></td>
                                <td><?=$ct?></td>
                                <td><?=$it?></td>
                                <?php } ?>
                            </tr>
                        </table>
                        <h5 class="bg-secondary text-white m-0 "> Sub Topic</h5>
                        <table name="subtopic" class="table table-sm table-hover" border="1" cellpadding="0"
                            cellpadding="0" align="center">
                            <thead style="background: #4CAF50" class="text-white">
                                <tr align="center">
                                    <th width=70%> Sub Topics </th>
                                    <th width=15%> Correct Score </th>
                                    <th width=15%> Incorrect Score </th>
                                </tr>
                            </thead>
                            <?php
                $subtopic = "SELECT st.sub_topic ,st.id_sub_topic FROM tbl_sub_topics st, tbl_result_subtopic r WHERE st.id_sub_topic=r.id_sub_topic AND r.id_result='$id_result' GROUP BY 1 ORDER BY 2 ASC";
                $subtopica = mysqli_query($conn,$subtopic);  
                while ($subtopicr = mysqli_fetch_assoc($subtopica))
                {
                    $subtopicnama= $subtopicr['sub_topic'];
                    $subtopicid = $subtopicr['id_sub_topic'];
                    $sqlsubtopic = "SELECT r.correct_subtopic as subtopicx ,r.incorrect_subtopic as subtopicy FROM tbl_sub_topics st, tbl_result_subtopic r WHERE st.id_sub_topic=r.id_sub_topic AND r.id_result='$id_result' and r.id_sub_topic='$subtopicid'";
                    $subtopicb = mysqli_query($conn,$sqlsubtopic); 
                    $subtopicc = mysqli_fetch_assoc($subtopicb);
                    $subtopicd = $subtopicc['subtopicx'];
                    $subtopice = $subtopicc['subtopicy'];
                    ?>
                            <tr>
                                <td><?=$subtopicnama?></td>
                                <td><?=$subtopicd?></td>
                                <td><?=$subtopice?></td>
                                <?php } ?>
                            </tr>
                        </table>
                        <h5 class="bg-secondary text-white m-0 "> Difficulty</h5>
                        <table name="subtopic" class="table table-sm table-hover" border="1" cellpadding="0"
                            cellpadding="0" align="center">
                            <thead style="background: #4CAF50" class="text-white">
                                <tr align="center">
                                    <th width=70%> Difficulty Level </th>
                                    <th width=15%> Correct Score </th>
                                    <th width=15%> Incorrect Score </th>
                                </tr>
                            </thead>
                            <?php
                $diff = "SELECT d.id_diff,diff FROM tbl_diff d, tbl_result_dif r WHERE d.id_diff=r.id_diff AND r.id_result='$id_result' GROUP BY 1 ORDER BY 1 ASC";
                $diffa = mysqli_query($conn,$diff);  
                while ($diffr = mysqli_fetch_assoc($diffa))
                {
                    $diffnama= $diffr['diff'];
                    $diffid = $diffr['id_diff'];
                    $sqldiff = "SELECT r.correct_diff as diffx ,r.incorrect_diff as diffy FROM tbl_diff d, tbl_result_dif r WHERE d.id_diff=r.id_diff AND r.id_result='$id_result' and r.id_diff='$diffid'";
                    $diffb = mysqli_query($conn,$sqldiff); 
                    $diffc = mysqli_fetch_assoc($diffb);
                    $diffd = $diffc['diffx'];
                    $diffe = $diffc['diffy'];
                    ?>
                            <tr>
                                <td><?=$diffnama?></td>
                                <td><?=$diffd?></td>
                                <td><?=$diffe?></td>
                                <?php } ?>
                            </tr>
                        </table>
                        <h5 class="bg-secondary text-white m-0 "> Analysis</h5>
                        <table name="subtopic" class="table table-sm table-hover" border="1" cellpadding="0"
                            cellpadding="0" align="center">
                            <thead style="background: #4CAF50" class="text-white">
                                <tr align="center">
                                    <th width=70%> Analysis </th>
                                    <th width=15%> Correct Score </th>
                                    <th width=15%> Incorrect Score </th>

                                </tr>
                            </thead>
                            <?php
                $analysis = "SELECT d.id_anl,anl FROM tbl_anl d, tbl_result_anl r WHERE d.id_anl=r.id_anl AND r.id_result='$id_result' GROUP BY 1 ORDER BY 1 ASC";
                $analysisa = mysqli_query($conn,$analysis);  
                while ($analysisr = mysqli_fetch_assoc($analysisa))
                {
                    $analysisnama= $analysisr['anl'];
                    $analysisid = $analysisr['id_anl'];
                    $sqlanalysis = "SELECT r.correct_anl as analysisx , r.incorrect_anls as analysisy FROM tbl_anl d, tbl_result_anl r WHERE d.id_anl=r.id_anl AND r.id_result='$id_result' and r.id_anl='$analysisid'";
                    $analysisb = mysqli_query($conn,$sqlanalysis); 
                    $analysisc = mysqli_fetch_assoc($analysisb);
                    $analysisd = $analysisc['analysisx'];
                    $analysise = $analysisc['analysisy'];
                    ?>
                            <tr>
                                <td><?=$analysisnama?></td>
                                <td><?=$analysisd?></td>
                                <td><?=$analysise?></td>
                                <?php } ?>
                            </tr>
                        </table>
                        <button class="btn btn-primary" type="submit" name="report">Report</button>
                    </form>
                </div>
            </div>
        </div>
    </center>
</body>

</html>