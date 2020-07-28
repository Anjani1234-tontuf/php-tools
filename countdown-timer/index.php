<?php
error_reporting(0);
    $diff = $_POST['timer'];
    $hr = $_POST['hrs'];
    $mn = $_POST['mins'];
    $se = $_POST['secs'];
    $time = $hr.":".$mn.":".$se;
    $dtime = $diff." ".$time;
    
    $tz_object = new DateTimeZone('Asia/Kolkata');
    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    $yt= $datetime->format('Y');
    $mt= $datetime->format('m');
    $dt= $datetime->format('d');
    $hours= $datetime->format('H');
    $minutes= $datetime->format('i');
    $seconds= $datetime->format('s');
    $now = $yt."-".$mt."-".$dt." ".$hours.":".$minutes.":".$seconds;
    $today =  $yt."-".$mt."-".$dt;
    $date3 = date_create($now);
    $date4 = date_create($dtime);
    $diff34 = date_diff($date4, $date3);
    $months = $diff34->m;
    $years = $diff34->y;
    $h=$diff34->h;
    $m=$diff34->i;
    $s=$diff34->s;
    $date0 = date_create($today);
    $date1 = date_create($diff);
    $differ = date_diff($date0, $date1);
    $d = $differ->format("%a");
if (isset($_POST['submit'])) {		
    $time1 = strtotime($now);
    $time2 = strtotime($dtime);
    $diffdhg = $time2-$time1;
    gmdate("d H:i:s",$diffdhg);
    $days = $diffdhg / 86400;
    $day_explode = explode(".", $days);
    $d = $day_explode[0];
    
    $hours = '.'.$day_explode[1].'';
    $hour = $hours * 24;
    $hourr = explode(".", $hour);
    $h = $hourr[0];
    
    $minute = '.'.$hourr[1].'';
    $minutes = $minute * 60;
    $minute = explode(".", $minutes);
    $m = $minute[0];
    
    $seconds = '.'.$minute[1].'';
    $second = $seconds * 60;
    $s = round($second);
}
else
{
	$newyear = $yt+1;
		$mt = 01;
		$dt = 01;
		$hours = 00;
		$minutes =00;
		$seconds =00;
		$time2 = $newyear."-".$mt."-".$dt." ".$hours.":".$minutes.":".$seconds;
	$time1 = strtotime($now);
		$time2 = strtotime($time2);
		$diffdhg = $time2-$time1;
		gmdate("d H:i:s",$diffdhg);
		$days = $diffdhg / 86400;
		$day_explode = explode(".", $days);
		$d = $day_explode[0];
		
		$hours = '.'.$day_explode[1].'';
		$hour = $hours * 24;
		$hourr = explode(".", $hour);
		$h = $hourr[0];
		
		$minute = '.'.$hourr[1].'';
		$minutes = $minute * 60;
		$minute = explode(".", $minutes);
		$m = $minute[0];
		
		$seconds = '.'.$minute[1].'';
		$second = $seconds * 60;
		$s = round($second);	
}
?>
<title>PHP Countdown Timer Script</title>
<link rel="stylesheet" type="text/css" href="style.css">
<center><b>PHP Countdown Timer</b></center>
<div class="container" align='center' id='maindiv'>   
    <ul class="flip1">
        <li>
            <a href="#">
                <div class="up1">
                    <div class="shadow1"></div>
                    <div class="inn1" id='days'></div>
                </div>
                <div class="down1">
                    <div class="shadow1"></div>
                    <div class="inn1" id='days1'></div>
                </div>
            </a>
        </li>
    </ul>
    <ul class="flip hourplay" id='wrapper2'>
        <li>
            <a href="#">
                <div class="up">
                    <div class="shadow"></div>
                    <div class="inn" id='year'></div>
                </div>
                <div class="down">
                    <div class="shadow"></div>
                    <div class="inn" id='year1'></div>
                </div>
            </a>
        </li>
    </ul>
    <ul class="flip minutePlay" id='wrapper1'>
        <li>
            <a href="#">
                <div class="up">
                    <div class="shadow"></div>
                    <div class="inn" id='minutes'></div>
                </div>
                <div class="down">
                    <div class="shadow"></div>
                    <div class="inn" id='minutes1'></div>
                </div>
            </a>
        </li>
    </ul> 
    <ul class="flip secondPlay" id='wrapper'>
    </ul> 
</div>
<div id="strclock"></div>
<div align='right' style='position:absolute;' id='msgdiv'>
<span class='days'><b>Days</b></span>
<span class='hrr'><b>Hours</b></span>
<span class='mint'><b>Mins</b></span>
<span class='see'><b>Secs</b></span>
</div><br><br><br>
<script src='jquery.js'></script>
<script src='script.js'></script>
<script>
      var day = <?php echo $d; ?>;
	  var hour = <?php echo $h; ?>;
	  var min = <?php echo $m; ?>;
	  var sec = <?php echo $s; ?>;
function validate()
 {
    var date = document.getElementById('timer').value;
	var hr = document.getElementById('hr').value;
	var mn = document.getElementById('mn').value;
	var ss = document.getElementById('ss').value;
	
	var d = new Date();
	var h = d.getHours();
	var m = d.getMinutes();
	
	var dd = d.getDate();
    var mm = d.getMonth()+1; //January is 0!
    var yyyy = d.getFullYear();
	today = yyyy+'-'+mm+'-'+dd;
	
	if (hr=='' || mn=='' || ss=='') {
	document.getElementById('hr').value=h;
	document.getElementById('mn').value=m;
	document.getElementById('ss').value='00';
	}
    var regex = /^(19|20)\d\d[\-\/.](0[1-9]|1[012])[\-\/.](0[1-9]|[12][0-9]|3[01])$/;
    var dt = date.match(regex);
    if (date=='') {
        alert("Check date");
        return false;
    }
 }
    function resett()
    {
        document.getElementById('timer').value='';
        document.getElementById('hr').value='';
        document.getElementById('mn').value='';
        document.getElementById('ss').value='';
		
		
        
		var a = new Date();
		var n = a.getFullYear(); 
		var newyear = n + 1;
		var futurestring="01 01,"+newyear;
		var dd=Date.parse(futurestring)-Date.parse(a);
		var dday=Math.floor(dd/(60*60*1000*24)*1);
		var dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1);
		var dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);
		var dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);
		var pat = /^[0-9]{1}$/;
		dsec = (pat.test(dsec) == true) ? '0'+dsec : dsec;
		dmin = (pat.test(dmin) == true) ? '0'+dmin : dmin;
		dhour = (pat.test(dhour) == true) ? '0'+dhour : dhour;
		var india=dday+"::"+dhour+": "+dmin+": "+dsec;
		//alert(india);
		day = dday;
		hour = dhour;
		min = dmin;
		sec = dsec;
		countdown();
        //document.getElementById("maindiv").style.display = "none";
		//document.getElementById("msgdiv").style.display = "none";
    }
function countdown() {   
   sec--;
  if (sec < 0){
      min--;
      sec = 59
  }
  if (min < 0){
      hour--;
      min = 59
  }
  if (hour < 0){
      hour = 23
      day--;
  }
    var pat = /^[0-9]{1}$/;
    sec = (pat.test(sec) == true) ? '0'+sec : sec;
    min = (pat.test(min) == true) ? '0'+min : min;
    hour = (pat.test(hour) == true) ? '0'+hour : hour;
    //alert(hour);
    //document.getElementById('strclock').innerHTML = day+":"+hour+":"+min+":"+sec;
    document.getElementById('days').innerHTML = day;
    document.getElementById('days1').innerHTML = day;
     if (hour=='00' && min=='00' && sec=='00' && day=='0' ) {
      alert("Times Out!");
    }
    else{      
        $('#wrapper').append('<li>\
            <a href="#">\
                <div class="up">\
                    <div class="shadow"></div>\
                    <div class="inn">'+sec+'</div>\
                </div>\
                <div class="down">\
                    <div class="shadow"></div>\
                    <div class="inn">'+sec+'</div>\
                </div>\
            </a>\
        </li>');    
      secondPlay();     
         SD=window.setTimeout("countdown()",1000);
      
      if (sec=='59') {
            $('#wrapper1').append('<li>\
                  <a href="#">\
                      <div class="up">\
                          <div class="shadow"></div>\
                          <div class="inn">'+min+'</div>\
                      </div>\
                      <div class="down">\
                          <div class="shadow"></div>\
                          <div class="inn">'+min+'</div>\
                      </div>\
                  </a>\
              </li>');
            minutePlay();
            }   
    else{     
        document.getElementById('minutes').innerHTML = min;
        document.getElementById('minutes1').innerHTML = min;
    }
     if (min=='00' && sec=='59' && hour!='') {
      $('#wrapper2').append('<li>\
            <a href="#">\
                <div class="up">\
                    <div class="shadow"></div>\
                    <div class="inn">'+hour+'</div>\
                </div>\
                <div class="down">\
                    <div class="shadow"></div>\
                    <div class="inn">'+hour+'</div>\
                </div>\
            </a>\
        </li>');
      hourplay();
    }
    else{
        document.getElementById('year').innerHTML = hour;
        document.getElementById('year1').innerHTML = hour;      
    }
    
    }
}
 countdown();

</script>

<form method='post' id='login' action='' class='frms resp_code' onSubmit="return validate();">
    <div class='maindiv' id=content'>
        <img id='first' src='images/year.png' onclick='dispCal1()' style='cursor: pointer; vertical-align: middle;' />
        <input type='text' id='timer' name='timer' value='<?php echo $diff;?>' autocomplete=off readonly>
        <table class='calendar table' id='calendar' border=0 cellpadding=0 cellspacing=0>
                        <tr class='monthdisp'>
                            <td class='navigate' align='left'><img src='images/previous.png' onclick='return prev()' style='height:25px;'/></td>
                            <td align='center' id='month'></td>
                            <td class='navigate' align='right'><img src='images/next.png' onclick='return next()' style='height:25px;'/></td>
                            </tr>
                        <tr>
                            <td colspan=3>
                                <table id='dispDays' class='' border=0 cellpadding=4 cellspacing=4>                        
                                </table>                      
                            </td>
                        </tr>
                    </table>	
        <b>Hours : </b>
        <input type='text' name='hrs' id='hr' value='<?php echo $hr;?>' maxlength=2 onkeyup="check(this)" autocomplete=off onblur='checkhr(this)'>
        <b>Minutes : </b>
        <input type='text' name='mins' id='mn' value='<?php echo $mn;?>' maxlength=2 onkeyup="check(this)" autocomplete=off onblur='checkmin(this)'>
        <b>Seconds : </b>
        <input type='text' name='secs' id='ss' value='<?php echo $se;?>' maxlength=2 onkeyup="check(this)" autocomplete=off onblur='checksec(this)'><br>
    </div>
	
    <div align='center' class='frms noborders'>
        <input type='submit' value='Start' id='sub' name="submit">
        <input type='button' value='Reset' onclick='resett()' id='res' style='background:#ee765d;border-bottom:#d95e44 3px solid;text-shadow:#8c3736 1px 1px 0px;'>
    </div>
	<p align='left'>Note : Time should be in 24 hours format.</p> 
</form>
 
<?php
if (isset($_POST['timer'])) {
    $hh = $_POST['hrs'];
    $mm = $_POST['mins'];
    $ss = $_POST['secs'];
    $now = time();
    $date = $_POST['timer'];
	
    if($_POST['timer']!='')
    {
		if($hh=='' || $mm=='' || $ss=='')
		{
			$tz_object = new DateTimeZone('Asia/Kolkata');
			echo $hh= $datetime->format('H');
			echo $mm= $datetime->format('i');
			echo $ss= $datetime->format('s');
		}
    ?>
    <script language="javascript">	
        document.getElementById("maindiv").style.display = "block";
		document.getElementById("msgdiv").style.display = "block";
    </script>
    <?php
    }
    else{
        echo "<p align='center' style='color:red;'><b>Enter Proper Date and Time</b></p>";
    }
    
}
?>



<div  align='center' style="font-size: 10px;color: #dadada;" id="dumdiv">
<a href="http://www.hscripts.com" id="dum" style="font-size: 10px;color: #dadada;text-decoration:none;color: #dadada;">&copy;h</a>
</div>