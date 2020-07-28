<html>
	<head>
		<title>PHP Sitemap Generator Script</title>
		<script src='jquery.js'></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type='text/javascript'>
		function post_url()
		{
			var regexp = new RegExp("^http(s?)\:\/\/[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*(:(0-9)*)*(\/?)([a-zA-Z0-9\-\.\?\,\'\/\\\+&amp;%\$#_]*)?$");
			var url = document.getElementById("txtUrl").value;
			if (!regexp.test(url) || url=='') {
				alert("Enter Valid URL");
			}
			else{
						  $('.load').show();
						  $('#btn').hide();
				$.ajax({
						type: "POST",
						url: "ajax-geturl.php",
						data:{name:url},
						success: function(data){
					  // alert(data);
					   if (data) {
					   $('#maindiv').html(data);
					   }               
						},
						complete: function(){
						  $('.load').hide();
						   $('#btn').show();
						}
					})	    
			}
		}
		 function chk(){
			var sds = document.getElementById("dum");
			if(sds == null){
				alert("You are using a free package.\n You are not allowed to remove the tag.\n");
			}
			var sdss = document.getElementById("dumdiv");
			if(sdss == null){
				alert("You are using a free package.\n You are not allowed to remove the tag.\n");
				document.getElementById("content").style.visibility="hidden";
			}
		}
		window.onload=chk;
	</script>
	</head>
	<body>
		<div class='resp_code' id='content'>
			<center><b>PHP Sitemap Generator Script</b></center><br>
			<div align='left' class='frms'>
			   <b>Enter URL :</b>
				<input type='text' name='url' id='txtUrl' autocomplete='off'>
				<input type='submit' value='Generate' onclick='post_url()' id='btn'>
				<span class='load' style='display: none;'><img src='loading.gif'></span><br>
				Note : URL Format (http(s)://www.hscripts.com)
			</div>
			<div id='maindiv'></div><br>
			<div id="dumdiv" style=" font-size: 10px;color: #dadada;" align='center'>
			<a id="dum" href="http://www.hscripts.com" style="padding-right:0px; text-decoration:none;color: #dadada;text-align:center;">&copy;h</a>
			</div>
		</div>
	</body>
</html>



