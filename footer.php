<?php
$f = fopen('counter.txt',"r");
$counterVal = fread($f, filesize($counter_name));
fclose($f);
$counterVal = str_pad($counterVal, 5, "0", STR_PAD_LEFT);
$chars = preg_split('//', $counterVal);
?>
<style>
    .footer img{
        height: 20px;
        width: 20px;
    }
</style>
<!--//footer-->
<div class="footer">
    <div class="col-lg-2 pull-right" style="color: #fff;">
        <div class="col-lg-12">Visitors Count</div>
        <img src="counter/<?= $chars[1] ?>.png">
        <img src="counter/<?= $chars[2] ?>.png">
        <img src="counter/<?= $chars[3] ?>.png">
        <img src="counter/<?= $chars[4] ?>.png">
        <img src="counter/<?= $chars[5] ?>.png">
        <div class="col-lg-12 col-md-12" style="font-size: 20px; letter-spacing: 1px;"><?php echo $counterVal; ?></div>
    </div>
    <div class="container">
        <ul class="social">
            <li><a href="#"><i></i></a></li>
            <li><a href="#"><i class="ic1"></i></a></li>
            <li><a href="#"><i class="ic2"></i></a></li>

        </ul>
        <p class="footer-class">&copy; 2016 Gitse. All Rights Reserved | Design by  <a href="http://www.imrokraft.com/" target="_blank">IMROKRAFT</a> </p>

    </div>

</div>
<!--//footer-->