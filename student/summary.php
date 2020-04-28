<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All-in SAT Diagnostic Test</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style type="text/css">
    body {
        min-height: 100vh;
        position: relative;
        margin: 0;
        font-family: 'Cambria', sans-serif;
        font-size: 25pt;
        color: royalblue;
    }

    body:before {
        content: "";
        position: absolute;
        z-index: -9999;
        width: 100%;
        height: 100%;
        background: url('background1.png');
        background-size: 500px 500px;
        opacity: 0.5;
    }
    </style>
</head>

<body onload="printer()">
    <?php
    if (empty($_SESSION['mail']))
    {
        echo "<script type='text/javascript'>alert('Please log-in first!')</script>";
        echo "<script>document.location='../';</script>";
    }
    include('printdata.php');
    ?>
    <div class="container center">
        
       <center><h5 class="text-white bg-secondary -m-0 mb-1 center" style="font-size:27pt; color:royalblue; text-align:center">
       <b><a class="pb-2"><?=$questionanme." | ".custom_echo($studentname,7)." | ".$studentgrade;?></a></b>
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
                <div class="card card-sec m-b-30 pl-0 shadow">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="text card-title">Benchmark Score</h5>
                    </div>
                    <div class="card-body">
                        <h5 ><b><?=$benchmark?></b></h5>
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
            <div class="card card-sec m-b-30 shadow">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="text card-title">English Score</h5>
                    </div>
                    <div class="card-body">
                        <a class="text" style="font-size: 25pt"><b><?=$arrscore[0]?></b></a>
                    </div>
                </div>
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
        <div class="row pt-1 pb-3">
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
    </div>
    </center> 
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
        datalabels: {
            font: {
                weight: 'bold',
                size: 20,
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
</script>