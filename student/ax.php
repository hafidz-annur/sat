<?php
session_start();
if(isset($_SESSION["mulai_waktu"])){
 $telah_berlalu = time() - $_SESSION["mulai_waktu"];
 }
else {
 $_SESSION["mulai_waktu"] = time();
 $telah_berlalu = 0;
 }
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"> </script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.countdown-id.js"></script>
<div id="tempat_timer">
    <span id="timer">00 : 00 : 00</span>
    <?php echo $telah_berlalu." ".time() ?></div>
<script type="text/javascript">
function waktuHabis() {
    alert("selesai dikerjakan ......");
}

function hampirHabis(periods) {
    if ($.countdown.periodsToSeconds(periods) == 60) {
        $(this).css({
            color: "red"
        });
    }
}
$(function() {
    var waktu = 180; // 3 menit
    var sisa_waktu = waktu - <? $telah_berlalu ?>;
    var longWayOff = sisa_waktu;
    $("#timer").countdown({
        until: longWayOff,
        compact: true,
        onExpiry: waktuHabis,
        onTick: hampirHabis
    });
})
</script>
<style>
#tempat_timer {
    margin: 0 auto;
    text-align: center;
}

#timer {
    border-radius: 7px;
    border: 2px solid gray;
    padding: 7px;
    font-size: 2em;
    font-weight: bolder;
}
</style>
<script>
// Set the date we're counting down to

var countDownDate = now_basic + 35 * 60 * 1000;

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
    document.location='./test-writing.php'
  }
}, 1000);
</script>