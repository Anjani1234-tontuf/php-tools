<html>
    <head>
        <title>PHP Wiki Script</title>
        <script src='jquery.js'></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script>
            function get_wiki_content(){	
                var url = document.getElementById('word').value;
                    if (url=='') {
                       document.getElementById('msg').innerHTML ="Enter word to get wiki content";
                    }
                    else {
                        $("#btn").hide();
                        $("#loading").show();
                        document.getElementById('msg').innerHTML =" ";
                         $.ajax({//Make the Ajax Request
                            type: "POST",
                            url: "fetchdata.php",
                            data:{wikititle:url},
                            success: function(data){
                                if (data!='') {
                                    document.getElementById('op').innerHTML =data;
                                }
                                else
                                {
                                   document.getElementById('msg').innerHTML ="Enter proper word to search"; 
                                }
                            },
                            complete: function(){
                                $("#btn").show();
                                $("#loading").hide();	
                            }
                         });
                    }
           }
            function checnum(as)
            {
                var a = as.value;
                as.value = a.replace(/[^a-zA-Z ]/g,'');
            }
        </script>
    </head>
    <body>


        <div class='resp_code'>
            <div class='frms noborders'>
                    <h1> Free Wiki script</h1>
                <div align='left'><b>Enter word :</b></div>
                <input type='text' name='get_word' id='word' style='width: 85% !important;' onkeyup='checnum(this)'>
                <input type="button" value='Submit' onclick='get_wiki_content()' id='btn'/>
                <img src='ajax-loader.gif' id='loading' style='display:none;'><br>
                <div align=center style='color:red;font-weight:bold;' id='msg'></div>
                <div id='op' class='frms noborders' style='text-align: left;font-size:1.2em;'></div>
                <div align='center' style="font-size: 10px;color: #dadada;" id="dumdiv">
                   </div>
            </div>
        </div>
    </body>
</html>


