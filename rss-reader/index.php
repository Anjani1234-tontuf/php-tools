<html>
        <head>
                <title>PHP RSS Reader</title>
                <script src='jquery.js'></script>
                <link rel="stylesheet" type="text/css" href="style.css">
                <script>
                        $(document).ready(function() {
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
                     function getrss()
                            {
                                $('.load').show();;
                                var rss=$("#txturl").val();
                                 $.ajax({//Make the Ajax Request
                                    type: "POST",
                                    url: "ajax-getrss.php",
                                    data:{feed:rss},
                                    success: function(data){
                                   // alert(data);
                                    $("#op").html(data);
                                    $('<br />').insertBefore('#op description');
                                    $('<br />').insertBefore('#op pubdate');
                                    $('<br />').insertBefore('#op item');
                                    $('<br />').insertBefore('#op title');
                                    },
                                    complete: function(){
                      $('.load').hide();
                      
                    }
                                })
                            }              
                </script>
        </head>
        <body>
                <div align='center' class='resp_code frms' id='content'>
                        <label><b>Enter url to get rss parser</b></label><br>
                        <input type='text' id='txturl' name='txt' value='https://www.statsmonkey.com/rss.xml'>
                        <input type='button' value='GET_RSS' onclick='getrss()'>                     
                        <span align='center'   style="font-size: 10px;color: #dadada;" id="dumdiv">
                                <a href="http://www.hscripts.com" id="dum" style="font-size: 10px;color: #dadada;text-decoration:none;color: #dadada;">&copy;h</a>
                        </span><br>
                         <div class='load'><img src='loading.gif'></div>
                        <div id='op' class='msg'>             
                        </div>
                             
                </div>    
        </body>
</html>
