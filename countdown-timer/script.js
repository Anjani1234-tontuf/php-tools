$( document ).ready(function() {
    var sds = document.getElementById("dum");
    if(sds == null){
        alert("You are using a free package.\n You are not allowed to remove the tag.\n");
    }
    var sdss = document.getElementById("dumdiv");
    if(sdss == null){
        alert("You are using a free package.\n You are not allowed to remove the tag.\n");
		document.getElementById("content").style.visibility="hidden";
    }    
});

function parseDate() {			
            var str=$("#timer").val();
            var m = str.match(/^(\d{4})-(\d{1,2})-(\d{1,2})$/);
            if(!m) {
				alert("Date format should be(yyyy-mm-dd)")
				$("#timer").val("");				
            }
        }       
function secondPlay() {
    $("body").removeClass("play");
    var aa = $("ul.secondPlay li.active");

    if (aa.html() == undefined) {
        aa = $("ul.secondPlay li").eq(0);
        aa.addClass("before")
            .removeClass("active")
            .next("li")
            .addClass("active")
            .closest("body")
            .addClass("play");

    }
    else if (aa.is(":last-child")) {
        $("ul.secondPlay li").removeClass("before");
        aa.addClass("before").removeClass("active");
        aa = $("ul.secondPlay li").eq(0);
        aa.addClass("active")
            .closest("body")
            .addClass("play");
    }
    else {
        $("ul.secondPlay li").removeClass("before");
        aa.addClass("before")
            .removeClass("active")
            .next("li")
            .addClass("active")
            .closest("body")
            .addClass("play");
    }

}

function minutePlay() {
    $("body").removeClass("play");
    var aa = $("ul.minutePlay li.active");

    if (aa.html() == undefined) {
        aa = $("ul.minutePlay li").eq(0);
        aa.addClass("before")
            .removeClass("active")
            .next("li")
            .addClass("active")
            .closest("body")
            .addClass("play");

    }
    else if (aa.is(":last-child")) {
        $("ul.minutePlay li").removeClass("before");
        aa.addClass("before").removeClass("active");
        aa = $("ul.minutePlay li").eq(0);
        aa.addClass("active")
            .closest("body")
            .addClass("play");
    }
    else {
        $("ul.minutePlay li").removeClass("before");
        aa.addClass("before")
            .removeClass("active")
            .next("li")
            .addClass("active")
            .closest("body")
            .addClass("play");
    }

}
function hourplay() {
    $("body").removeClass("play");
    var aa = $("ul.hourplay li.active");

    if (aa.html() == undefined) {
        aa = $("ul.hourplay li").eq(0);
        aa.addClass("before")
            .removeClass("active")
            .next("li")
            .addClass("active")
            .closest("body")
            .addClass("play");

    }
    else if (aa.is(":last-child")) {
        $("ul.hourplay li").removeClass("before");
        aa.addClass("before").removeClass("active");
        aa = $("ul.hourplay li").eq(0);
        aa.addClass("active")
            .closest("body")
            .addClass("play");
    }
    else {
        $("ul.hourplay li").removeClass("before");
        aa.addClass("before")
            .removeClass("active")
            .next("li")
            .addClass("active")
            .closest("body")
            .addClass("play");
    }
}

var global='Yes'; 
            var getDatee = new Date();
            var monthe = getDatee.getMonth();
            var yeare = getDatee.getFullYear();
            var day = getDatee.getDate(); 
            function isEmpty(val){
               return (val === undefined || val == null || val.length <= 0) ? true : false;
            }
            
            function prev()
            {
            	monthe = monthe-1;
                if(monthe < 0)
        	{
        	    yeare = yeare-1;	
                    monthe = 11;
                }
                dispCal(monthe, yeare);
                return false;
            }
            
            function next()
            {
            	monthe = monthe+1;
                if(monthe > 11)
        	{
        	    yeare = yeare+1;	
                    monthe = 0;
                }
                dispCal(monthe, yeare);
                return false;
            }
            
            function daysInMonth(monthe, yeare)
            {
                return 32 - new Date(yeare, monthe, 32).getDate();
            }

            function getElementPosition(arrName,arrItem){
                for(var pos=0; pos<arrName.length; pos++ ){
                    if(arrName[pos]==arrItem){
                        return pos;
                    }
                }
            }
            
            function setVal(getDat){
                        var res = getDat.split("-");
                        var mmm = res[1];
                        var yyy = res[0];
                        var ddd = res[2];
                        var today = new Date();
                        var dd = today.getDate();
                        var mm = today.getMonth()+1; //January is 0!
                        var yyyy = today.getFullYear();
                        today = yyyy+'-'+mm+'-'+dd;
                         if ((yyy<yyyy && mmm<mm && ddd<dd) || (yyy<yyyy || mmm==mm && ddd<dd) || (yyy == yyyy && mmm<mm)) {
                                    alert("Date must be greater than current date")
                                    $('#timer').val('');
                        }
                        else{
                               $('#timer').val(getDat);     
                        }
                        $('#calendar').fadeOut(1000);
                        global='Yes';
            }
            
            function dispCal(mon,yea){
		var ar = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                var chkEmpty = isEmpty(mon);
                var n,days,calendar,startDate,newYea,setvale,i;
                if(chkEmpty != true){
                    mon = mon+1;
                    n = ar[mon-1];
                    n += " "+yea;
                    newYea = yea;
                    days = daysInMonth((mon-1),yea);
                    startDate = new Date(ar[mon-1]+" 1"+","+parseInt(yea));
                }else{
                    mon = getElementPosition(ar,ar[getDatee.getMonth()]);
                    n = ar[getDatee.getMonth()];
                    n += " "+yeare;
                    newYea = yeare;
                    days = daysInMonth(mon,yeare);
                    startDate = new Date(ar[mon]+" 1"+","+parseInt(yeare));
                }
                
                var startDay = startDate.getDay();
                var startDay1 = startDay;
                while(startDay> 0){
                   calendar += "<td></td>";  
                   startDay--;
                }                
                i = 1;
                while (i <= days){
                  if(startDay1 > 6){
                      startDay1 = 0;  
                      calendar += "</tr><tr>";  
                  }  
                  mon = monthe+1;
                  setvale = i+","+n;

		  if(i == day && newYea==yeare && mon==monthe){
           
		    calendar +="<td class='thisday' onclick='setVal(\""+newYea+"-"+mon+"-"+i+"\")'>"+i+"</td>";
            
                  }else{  
                    calendar +="<td class='thismon' onclick='setVal(\""+newYea+"-"+mon+"-"+i+"\")'>"+i+"</td>";
                  }
		  startDay1++;  
                  i++;  
                }
		calendar +="<td><a style='font-size: 9px; color: #efefef; font-family: arial; text-decoration: none;' href='http://www.hscripts.com'>&copy;h</a></td>";   
		
                global='No';
                //$('#calendar').toggle();
                $('#month').html(n);
                var test = "<tr class='weekdays'><td>Sun</td><td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td></tr>";  
                test += calendar;
		$('#dispDays').html(test);
            }
function check(txtval){
   var num = txtval.value;
   if(isNaN(num))
   {
   num = num.substring(0,(num.length-1));
   txtval.value = num;
   }
}
function checkhr(tt)
{
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        today = yyyy+'-'+mm+'-'+dd;
        var dat = tt.value;
        if (dat>24) {
            alert("24 Hours Format!");
            tt.value='';
        }
        var d = new Date();
        var n = d.getHours();
        var cdate = document.getElementById("timer").value;
        if (dat<n && (cdate==today)) {
        alert("Time should be greater than current time!");
        tt.value='';
        }                  
}
function checkmin(vv)
{
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            today = yyyy+'-'+mm+'-'+dd;
        var d = new Date();
        var n = d.getMinutes();
        var hh = d.getHours();
        var hr = $('#hr').val();
        var mn = $('#mn').val();
        var time = hr+":"+mn;
        var cdate = document.getElementById("timer").value;
        var ctime = n+":"+mn;
        //alert(ctime);
        var dat = vv.value;
        if (dat>=60) {
            alert("Enter Proper Time Format");
            vv.value='';
        }
        else if (cdate==today && mn<=n && hh==hr) {
           alert("Time should be greater than current time!");
           vv.value='';
        }
}
function checksec(vv)
{
    var dat = vv.value;
    if (dat>=60) {
        alert("Enter Proper Time Format");
        vv.value='';
    }
}
    
function dispCal1()
{               
   if (global=='Yes') {               
     var getd = new Date();
      var m = getd.getMonth();
      var yy = getd.getFullYear();
      yeare =  getd.getFullYear();
      dispCal(m,yy);
      monthe=m;
      $('#calendar').fadeIn(1000);
   }
   else{
      $('#calendar').fadeOut(1000);
      global='Yes';
   }
}