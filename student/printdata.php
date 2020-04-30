
<?php 
include("connect.php"); 
include("functions.php");
session_start();
if (empty($_SESSION['mail']))
{
    echo "<script type='text/javascript'>alert('Please log-in first!')</script>";
    echo "<script>document.location='../';</script>";
}
$id_result = $_SESSION['id_result'];
$sql = "SELECT st.st_name as nama_siswa, st_grade as grade, q.nama_soal as jenis_soal, stq.id_stquest as id_soal, sc.school as nama_sekolah
FROM tbl_result r, tbl_stquest stq, tbl_student st, tbl_typesoal q, tbl_school sc
WHERE r.id_result='$id_result'
	AND r.id_stquest = stq.id_stquest
    AND stq.id_student = st.id_student
    AND st.id_school = sc.id_school
    AND stq.id_typesoal = q.id_typesoal";
$y = $conn->query($sql);
while($x = mysqli_fetch_assoc($y))
{
    $studentname = $x['nama_siswa'];
    $studentgrade = $x['grade'];
    $questionanme = $x['jenis_soal'];
    $school = $x['nama_sekolah'];
    $idsoal= $x['id_soal'];
}
//score
$conver ="SELECT s.score_description as Section,rs.score_value as Score, s.id_score as id FROM tbl_result_score rs, tbl_score s WHERE rs.id_result='$id_result' and s.id_score=rs.id_score";
$t = $conn->query($conver);
$arrscoresection = array();
$arrscore = array();
while ($r = mysqli_fetch_assoc($t))
    {
        if ($r['id'] <3)
        {
        $arrscoresection[] = "'".$r['Section']."'";
        $arrscore[] = $r['Score'];
        }
        else
        $string = "Total Score";
        $scoretotal = $r['Score'];
    }
$lscore = implode(", ", $arrscoresection);
$nscore = implode(", ",$arrscore);
if($scoretotal<1070)
{
    $benchmark = "Need Improvement";
}
elseif($scoretotal>= 1070 && $scoretotal<= 1200)
{
    $benchmark = "Above Average";
}
elseif($scoretotal>= 1021 && $scoretotal<= 1300)
{
    $benchmark = "Good";
}
elseif($scoretotal>= 1031 && $scoretotal<= 1400)
{
    $benchmark = "Great";
}
elseif($scoretotal>= 1041 && $scoretotal<= 1500)
{
    $benchmark = "Excellent";
}
else
{
    $benchmark = "Perfect";
}
//category
$category = "SELECT e.category_name as nama,e.id_category as id,e.code as code FROM tbl_categories e, tbl_result_cat r WHERE e.id_category=r.id_category AND r.id_result='$id_result' GROUP BY e.category_name ORDER BY id ASC";
$result = mysqli_query($conn,$category);  
$arrcatname = array();
$arrcatcorrvalue = array();
$arrcatincorrvalue = array();
while ($row = mysqli_fetch_assoc($result))
{
    $catname= $row['nama'];
    $catcode= $row['code'];
    $arrcatname[]="'".$catcode."'";
    $catid = $row['id'];
    $sqlincz = "SELECT r.correct_sum as correct,r.Incorrect_sum as Incorrect FROM tbl_categories e, tbl_result_cat r WHERE e.id_category=r.id_category AND r.id_result='$id_result' and r.id_category='$catid'";
    $resultz = mysqli_query($conn,$sqlincz); 
    $row1 = mysqli_fetch_assoc($resultz);
    $correct = $row1['correct'];
    $incorrect = $row1['Incorrect'];
    $arrcatcorrvalue []=$correct;
    $arrcatincorrvalue[]=$incorrect;
}
$labeltopic = implode(", ",$arrcatname);
$datatopicc = implode(", ",$arrcatcorrvalue);
$datatopici = implode(", ",$arrcatincorrvalue);

//topic
$topic = "SELECT t.topic ,t.id_topic,t.code as topiccode,c.code as ccode FROM tbl_topics t, tbl_result_topic r,tbl_categories c WHERE t.id_topic=r.id_topic AND r.id_result='$id_result' AND t.id_category=c.id_category GROUP BY 1 ORDER BY 2 ASC";
$topica = mysqli_query($conn,$topic);  
$arrtname = array();
$arrtcorrvalue = array();
$arrtincorrvalue = array();
                while ($rtopic = mysqli_fetch_assoc($topica))
                {
                    $rcateg = $rtopic['ccode'];
                    $topicnama= $rtopic['topiccode'];
                    $topicid = $rtopic['id_topic'];
                    $sqltopic = "SELECT r.correct_topic as ct, r.incorrect_topic as it FROM tbl_topics t, tbl_result_topic r WHERE t.id_topic=r.id_topic AND r.id_result='$id_result' and r.id_topic='$topicid'";
                    $topicb = mysqli_query($conn,$sqltopic); 
                    $topicc = mysqli_fetch_assoc($topicb);
                    $ct = $topicc['ct'];
                    $it = $topicc['it'];
                    $arrtname []= "'".$topicnama."'";
                    //";".$rcateg.
                    $arrtcorrvalue[] = $ct;
                    $arrtincorrvalue []= $it;
                }
$labelttopic = implode(", ",$arrtname);
$datattopicc = implode(", ",$arrtcorrvalue);
$datattopici = implode(", ",$arrtincorrvalue);

//english
$english = "SELECT t.topic ,t.id_topic,t.code as topiccode,c.code as ccode FROM tbl_topics t, tbl_result_topic r,tbl_categories c WHERE t.id_topic=r.id_topic AND r.id_result='$id_result' AND t.id_category=c.id_category GROUP BY 1 ORDER BY 2 ASC LIMIT 5";
$englisha = mysqli_query($conn,$english);  
$arrengname = array();
$arrengcorrvalue = array();
$arrengincorrvalue = array();
                while ($renglish = mysqli_fetch_assoc($englisha))
                {
                    $rcateg = $renglish['ccode'];
                    $englishnama= $renglish['topiccode'];
                    $englishid = $renglish['id_topic'];
                    $sqleng = "SELECT r.correct_topic as ct, r.incorrect_topic as it FROM tbl_topics t, tbl_result_topic r WHERE t.id_topic=r.id_topic AND r.id_result='$id_result' and r.id_topic='$englishid'";
                    $engb = mysqli_query($conn,$sqleng); 
                    $engc = mysqli_fetch_assoc($engb);
                    $engct = $engc['ct'];
                    $engit = $engc['it'];
                    $arrengname []= "'".$englishnama."'";
                    //";".$rcateg.
                    $arrengcorrvalue[] = $engct;
                    $arrengincorrvalue []= $engit;
                }
$labeleng = implode(", ",$arrengname);
$dataengc = implode(", ",$arrengcorrvalue);
$dataengi = implode(", ",$arrengincorrvalue);
//math
$math = "SELECT t.topic ,t.id_topic,t.code as topiccode,c.code as ccode FROM tbl_topics t, tbl_result_topic r,tbl_categories c WHERE t.id_topic=r.id_topic AND r.id_result='$id_result' AND t.id_category=c.id_category AND t.id_category='3' ORDER BY 2 ASC";
$matha = mysqli_query($conn,$math);  
$arrmathname = array();
$arrmathcorrvalue = array();
$arrmathincorrvalue = array();
                while ($rmath = mysqli_fetch_assoc($matha))
                {
                    $rcateg = $rmath['ccode'];
                    $mathnama= $rmath['topiccode'];
                    $mathid = $rmath['id_topic'];
                    $sqlmath = "SELECT r.correct_topic as ct, r.incorrect_topic as it FROM tbl_topics t, tbl_result_topic r WHERE t.id_topic=r.id_topic AND r.id_result='$id_result' and r.id_topic='$mathid'";
                    $mathb = mysqli_query($conn,$sqlmath); 
                    $mathc = mysqli_fetch_assoc($mathb);
                    $mathct = $mathc['ct'];
                    $mathit = $mathc['it'];
                    $arrmathname []= "'".$mathnama."'";
                    //";".$rcateg.
                    $arrmathcorrvalue[] = $mathct;
                    $arrmathincorrvalue []= $mathit;
                }
$labelmath = implode(", ",$arrmathname);
$datamathc = implode(", ",$arrmathcorrvalue);
$datamathi = implode(", ",$arrmathincorrvalue);
//subtopic-reading
$subtopic = "SELECT st.sub_topic ,st.id_sub_topic,st.code as code,t.topic as idtopic FROM tbl_sub_topics st, tbl_result_subtopic r, tbl_topics t WHERE st.id_sub_topic=r.id_sub_topic AND st.id_topic=t.id_topic AND r.id_result='$id_result' AND t.id_category ='1' ORDER BY 2 ASC";
$subtopica = mysqli_query($conn,$subtopic);  
$arrsubname = array();
$arrsubcorrvalue = array();
$arrsubincorrvalue = array();
while ($subtopicr = mysqli_fetch_assoc($subtopica))
                {
                    $subtopicnama= $subtopicr['code'];
                    $subtopicid = $subtopicr['id_sub_topic'];
                    $sqlsubtopic = "SELECT r.correct_subtopic as subtopicx ,r.incorrect_subtopic as subtopicy FROM tbl_sub_topics st, tbl_result_subtopic r WHERE st.id_sub_topic=r.id_sub_topic AND r.id_result='$id_result' and r.id_sub_topic='$subtopicid'";
                    $subtopicb = mysqli_query($conn,$sqlsubtopic); 
                    $subtopicc = mysqli_fetch_assoc($subtopicb);
                    $subtopicd = $subtopicc['subtopicx'];
                    $subtopice = $subtopicc['subtopicy'];
                    $arrsubname[]="'".$subtopicnama."'";
                    $arrsubcorrvalue []=$subtopicd;
                    $arrsubincorrvalue[]=$subtopice;
                }
$labelsubtopic = implode(", ",$arrsubname);
$datasubtopicc = implode(", ",$arrsubcorrvalue);
$datasubtopici = implode(", ",$arrsubincorrvalue);
//subtopic-writing
$subw = "SELECT st.sub_topic ,st.id_sub_topic,st.code as code,t.topic as idtopic FROM tbl_sub_topics st, tbl_result_subtopic r, tbl_topics t WHERE st.id_sub_topic=r.id_sub_topic AND st.id_topic=t.id_topic AND r.id_result='$id_result' AND t.id_category ='2' ORDER BY 2 ASC";
$subwa = mysqli_query($conn,$subw);  
$arrsubwname = array();
$arrsubwcorrvalue = array();
$arrsubwincorrvalue = array();
while ($subwr = mysqli_fetch_assoc($subwa))
                {
                    $subwnama= $subwr['code'];
                    $subwid = $subwr['id_sub_topic'];
                    $sqlsubtopic = "SELECT r.correct_subtopic as subtopicx ,r.incorrect_subtopic as subtopicy FROM tbl_sub_topics st, tbl_result_subtopic r WHERE st.id_sub_topic=r.id_sub_topic AND r.id_result='$id_result' and r.id_sub_topic='$subwid'";
                    $subwb = mysqli_query($conn,$sqlsubtopic); 
                    $subwc = mysqli_fetch_assoc($subwb);
                    $subwd = $subwc['subtopicx'];
                    $subwe = $subwc['subtopicy'];
                    $arrsubwname[]="'".$subwnama."'";
                    $arrsubwcorrvalue []=$subwd;
                    $arrsubwincorrvalue[]=$subwe;
                }
$labelsubw = implode(", ",$arrsubwname);
$datasubwc = implode(", ",$arrsubwcorrvalue);
$datasubwi = implode(", ",$arrsubwincorrvalue);
//subtopic-math
$subm = "SELECT st.sub_topic ,st.id_sub_topic,st.code as code,t.topic as idtopic FROM tbl_sub_topics st, tbl_result_subtopic r, tbl_topics t WHERE st.id_sub_topic=r.id_sub_topic AND st.id_topic=t.id_topic AND r.id_result='$id_result' AND t.id_category ='3' ORDER BY 2 ASC";
$subma = mysqli_query($conn,$subm);  
$arrsubmname = array();
$arrsubmcorrvalue = array();
$arrsubmincorrvalue = array();
while ($submr = mysqli_fetch_assoc($subma))
                {
                    $submnama= $submr['code'];
                    $submid = $submr['id_sub_topic'];
                    $sqlsubtopic = "SELECT r.correct_subtopic as subtopicx ,r.incorrect_subtopic as subtopicy FROM tbl_sub_topics st, tbl_result_subtopic r WHERE st.id_sub_topic=r.id_sub_topic AND r.id_result='$id_result' and r.id_sub_topic='$submid'";
                    $submb = mysqli_query($conn,$sqlsubtopic); 
                    $submc = mysqli_fetch_assoc($submb);
                    $submd = $submc['subtopicx'];
                    $subme = $submc['subtopicy'];
                    $arrsubmname[]="'".$submnama."'";
                    $arrsubmcorrvalue []=$submd;
                    $arrsubmincorrvalue[]=$subme;
                }
$labelsubm = implode(", ",$arrsubmname);
$datasubmc = implode(", ",$arrsubmcorrvalue);
$datasubmi = implode(", ",$arrsubmincorrvalue);
//analysis
$analysis = "SELECT d.id_anl,anl FROM tbl_anl d, tbl_result_anl r WHERE d.id_anl=r.id_anl AND r.id_result='$id_result' GROUP BY 1 ORDER BY 1 ASC";
$analysisa = mysqli_query($conn,$analysis); 
$arranlname = array();
$arranlcorrvalue = array();
$arranlincorrvalue = array(); 
while ($analysisr = mysqli_fetch_assoc($analysisa))
                {
                    $analysisnama= $analysisr['anl'];
                    $analysisid = $analysisr['id_anl'];
                    $sqlanalysis = "SELECT r.correct_anl as analysisx , r.incorrect_anls as analysisy FROM tbl_anl d, tbl_result_anl r WHERE d.id_anl=r.id_anl AND r.id_result='$id_result' and r.id_anl='$analysisid'";
                    $analysisb = mysqli_query($conn,$sqlanalysis); 
                    $analysisc = mysqli_fetch_assoc($analysisb);
                    $analysisd = $analysisc['analysisx'];
                    $analysise = $analysisc['analysisy'];
                    $arranlname[]="'".$analysisnama."'";
                    $arranlcorrvalue []=$analysisd;
                    $arranlincorrvalue[]=$analysise;
                }
$labelanl = implode(", ",$arranlname);
$dataanlc = implode(", ",$arranlcorrvalue);
$dataanli = implode(", ",$arranlincorrvalue);

//difficulty
$diff = "SELECT d.id_diff,diff FROM tbl_diff d, tbl_result_dif r WHERE d.id_diff=r.id_diff AND r.id_result='$id_result' GROUP BY 1 ORDER BY 1 ASC";
$diffa = mysqli_query($conn,$diff);  
$arrdiffname = array();
$arrdiffcorrvalue = array();
$arrdiffincorrvalue = array(); 
                while ($diffr = mysqli_fetch_assoc($diffa))
                {
                    $diffnama= $diffr['diff'];
                    $diffid = $diffr['id_diff'];
                    $sqldiff = "SELECT r.correct_diff as diffx ,r.incorrect_diff as diffy FROM tbl_diff d, tbl_result_dif r WHERE d.id_diff=r.id_diff AND r.id_result='$id_result' and r.id_diff='$diffid'";
                    $diffb = mysqli_query($conn,$sqldiff); 
                    $diffc = mysqli_fetch_assoc($diffb);
                    $diffd = $diffc['diffx'];
                    $diffe = $diffc['diffy'];
                    $arrdiffname[]="'".$diffnama."'";
                    $arrdiffcorrvalue []=$diffd;
                    $arrdiffincorrvalue[]=$diffe;
                }
$labeldiff = implode(", ",$arrdiffname);
$datadiffc = implode(", ",$arrdiffcorrvalue);
$datadiffi = implode(", ",$arrdiffincorrvalue);

//answerandtype
//reading
$sqlreading = "SELECT s.soal_id as Nomor, a.answer as 'Your Answer', s.Answer_Key as 'Correct Answer', st.code as Subtopic, t.code as Topic , c.checking as Correction, s.id_diff as difficulty
FROM tbl_check c,tbl_answer a, tbl_soal s, tbl_sub_topics st, tbl_topics t,  tbl_stquest f
WHERE a.id_stquest='$idsoal'
AND c.id_autoans = a.id_autoans
AND a.id_answer = s.ID_Main
AND s.id_sub_topic = st.id_sub_topic
AND s.id_maintopic = t.id_topic
AND a.id_stquest = f.id_stquest
AND f.id_typesoal = s.id_typesoal
AND LEFT(s.ID_Main,1) = 'R'";
$readingcheck = $conn->query($sqlreading);
//Writing
$sqlwriting = "SELECT s.soal_id as Nomor, a.answer as 'Your Answer', s.Answer_Key as 'Correct Answer', st.code as Subtopic, t.code as Topic , c.checking as Correction, s.id_diff as difficulty
FROM tbl_check c,tbl_answer a, tbl_soal s, tbl_sub_topics st, tbl_topics t,  tbl_stquest f
WHERE a.id_stquest='$idsoal'
AND c.id_autoans = a.id_autoans
AND a.id_answer = s.ID_Main
AND s.id_sub_topic = st.id_sub_topic
AND s.id_maintopic = t.id_topic
AND a.id_stquest = f.id_stquest
AND f.id_typesoal = s.id_typesoal
AND LEFT(s.ID_Main,1) = 'W'";
$writingcheck = $conn->query($sqlwriting);
//Noncal
$sqlnoncal = "SELECT s.soal_id as Nomor, a.answer as 'Your Answer', s.Answer_Key as 'Correct Answer', st.code as Subtopic, t.code as Topic , c.checking as Correction, s.id_diff as difficulty
FROM tbl_check c,tbl_answer a, tbl_soal s, tbl_sub_topics st, tbl_topics t,  tbl_stquest f
WHERE a.id_stquest='$idsoal'
AND c.id_autoans = a.id_autoans
AND a.id_answer = s.ID_Main
AND s.id_sub_topic = st.id_sub_topic
AND s.id_maintopic = t.id_topic
AND a.id_stquest = f.id_stquest
AND f.id_typesoal = s.id_typesoal
AND LEFT(s.ID_Main,1) = 'N'";
$noncalcheck = $conn->query($sqlnoncal);
//Cal
$sqlcal = "SELECT s.soal_id as Nomor, a.answer as 'Your Answer', s.Answer_Key as 'Correct Answer', st.code as Subtopic, t.code as Topic , c.checking as Correction, s.id_diff as difficulty
FROM tbl_check c,tbl_answer a, tbl_soal s, tbl_sub_topics st, tbl_topics t,  tbl_stquest f
WHERE a.id_stquest='$idsoal'
AND c.id_autoans = a.id_autoans
AND a.id_answer = s.ID_Main
AND s.id_sub_topic = st.id_sub_topic
AND s.id_maintopic = t.id_topic
AND a.id_stquest = f.id_stquest
AND f.id_typesoal = s.id_typesoal
AND LEFT(s.ID_Main,1) = 'M'";
//Code-TOpic
$sqlcodet = "SELECT  t.code as tcode, t.topic as topic
FROM tbl_topics t
ORDER BY t.id_topic
LIMIT 4";
$codet = $conn->query($sqlcodet);
//Code-TOpic
$sqlcodett = "SELECT  t.code as tcode, t.topic as topic
FROM tbl_topics t
WHERE t.id_topic > 4
ORDER BY t.id_topic";
$codett = $conn->query($sqlcodett);
//Code-subtopic-reading
$rsub = "SELECT st.sub_topic ,st.id_sub_topic,st.code as code,t.topic as idtopic FROM tbl_sub_topics st, tbl_result_subtopic r, tbl_topics t WHERE st.id_sub_topic=r.id_sub_topic AND st.id_topic=t.id_topic AND r.id_result='$id_result' AND t.id_category='1' ORDER BY 2 ASC";
$rsuba = mysqli_query($conn,$rsub);
//Code-subtopic-writing
$wsub = "SELECT st.sub_topic ,st.id_sub_topic,st.code as code,t.topic as idtopic FROM tbl_sub_topics st, tbl_result_subtopic r, tbl_topics t WHERE st.id_sub_topic=r.id_sub_topic AND st.id_topic=t.id_topic AND r.id_result='$id_result' AND t.id_category='2' ORDER BY 2 ASC";
$wsuba = mysqli_query($conn,$wsub);
//Code-subtopic-math
$msub = "SELECT st.sub_topic ,st.id_sub_topic,st.code as code,t.topic as idtopic FROM tbl_sub_topics st, tbl_result_subtopic r, tbl_topics t WHERE st.id_sub_topic=r.id_sub_topic AND st.id_topic=t.id_topic AND r.id_result='$id_result' AND t.id_category='3' ORDER BY 2 ASC";
$msuba = mysqli_query($conn,$msub);

//count-reading
$creading ="SELECT COUNT(c.checking) as correct 
FROM tbl_check c, tbl_answer a
WHERE a.id_stquest='$idsoal'
AND c.id_autoans = a.id_autoans
AND LEFT(a.id_answer,1) = 'R'
AND c.checking = 'Correct'";
$qcreading = $conn->query($creading);
while ($readingsqli = mysqli_fetch_assoc($qcreading))
        {
            $correading = $readingsqli["correct"];
            $incorreading = 52 - $correading;
        }

//count-writing
$cwriting ="SELECT COUNT(c.checking) as correct 
FROM tbl_check c, tbl_answer a
WHERE a.id_stquest='$idsoal'
AND c.id_autoans = a.id_autoans
AND LEFT(a.id_answer,1) = 'W'
AND c.checking = 'Correct'";
$qcwriting = $conn->query($cwriting);
while ($writingsqli = mysqli_fetch_assoc($qcwriting))
        {

            $corwriting = $writingsqli["correct"];
            $incorwriting = 44 - $corwriting;
        }

//count-non
$cnoncal ="SELECT COUNT(c.checking) as correct
FROM tbl_check c, tbl_answer a
WHERE a.id_stquest='$idsoal'
AND c.id_autoans = a.id_autoans
AND LEFT(a.id_answer,1) = 'N'
AND c.checking = 'Correct'";
$qcnoncal = $conn->query($cnoncal);
while ($noncalsqli = mysqli_fetch_assoc($qcnoncal))
        {
            $sqlcountnoncal = "SELECT COUNT(soal_id) as total
            FROM `tbl_soal`
            WHERE LEFT(ID_Main,1)='N'";
            $sqlcountnoncalq = $conn->query($sqlcountnoncal);
            $sqlcountnoncaln = mysqli_fetch_assoc($sqlcountnoncalq);
            $totalcountnoncal = $sqlcountnoncaln['total'];
            $cornoncal = $noncalsqli["correct"];
            $incornoncal = $totalcountnoncal - $cornoncal;
        }
//count-math
$ccal ="SELECT COUNT(c.checking) as correct 
FROM tbl_check c, tbl_answer a
WHERE a.id_stquest='$idsoal'
AND c.id_autoans = a.id_autoans
AND LEFT(a.id_answer,1) = 'M'
AND c.checking = 'Correct'";
$qccal = $conn->query($ccal);
while ($calsqli = mysqli_fetch_assoc($qccal))
        {   
            $sqlcountcal = "SELECT COUNT(soal_id) as total
            FROM `tbl_soal`
            WHERE LEFT(ID_Main,1)='M'";
            $sqlcountcalq = $conn->query($sqlcountcal);
            $sqlcountcaln = mysqli_fetch_assoc($sqlcountcalq);
            $totalcountcal = $sqlcountcaln['total'];
            $corcal = $calsqli["correct"];
            $incorcal = $totalcountcal - $corcal;
        }
//benchmark
$bm = "SELECT * FROM tbl_benchmark";
$qbm = $conn->query($bm);
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

