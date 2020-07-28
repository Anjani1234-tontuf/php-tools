<?php
	error_reporting(0);
    $url = $_POST['name'];
    $file = "sitemap.xml";		// output file
    //$url = "https://www.tufing.com";	// url to scan 
    $extension = ".html";		// scan files with extension
    $freq = "daily";			// scan frequency
    $priority = "0.5";			// site priority
	$homepath = dirname(__FILE__);;
	
	function Path ($p)
	{
		$a = explode ("/", $p);
		$len = strlen ($a[count ($a) - 1]);
		return (substr ($p, 0, strlen ($p) - $len));
	}
	function GetUrl($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
	echo "<div align='center' style='font-weight:bold;'>";
	
	function Scan($url)
	{
		global $scanned, $pf, $extension, $skip, $freq, $priority;    
		echo "Scanned URL :  <font style='color:green;'>$url</font><br><br><br>";
		array_push ($scanned, $url);
		$html = GetUrl ($url);
		$a1 = explode ("<a", $html);
		foreach ($a1 as $key => $val)
		{
		$parts = explode (">", $val);
		$a = $parts[0];	
		$aparts = explode ("href=", $a);
		$hrefparts = explode (" ", $aparts[1]);
		$hrefparts2 = explode ("#", $hrefparts[0]);
		$href = str_replace ("\"", "", $hrefparts2[0]);
		$head =  parse_url($url, PHP_URL_SCHEME).":";
		//$href = str_replace($head,"",$href);
		
		$href = str_replace("'","",$href);
		if($href!=''){
		fwrite ($pf,	"<url>\n  <loc>$href</loc></url>\n" 
					);
		}
		}
	}
	$pf = fopen ($file, "w");
	if (!$pf)
	{
	echo "cannot create $file\n";
	return;
	}
	fwrite ($pf,"<?xml-stylesheet type=\"text/xsl\" href=\"sitemap.xsl\"?>
	<urlset xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\" xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">
	<url>
	  <loc>$url/</loc>
	</url>
	");
	$scanned = array();
	if($url!='')
	{
	if(preg_match( '/^(http|https):\\/\\/[a-z0-9]+([\\-\\.]{1}[a-z0-9]+)*\\.[a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i' ,$url)){
	Scan ($url);
	echo "<a href='sitemap.xml'>Click here to view sitemap.xml file</a>";
	}
	
	else{
	echo "<font style='color:red;'>$url is not a valid URL </font>" ;
	}
	}
	fwrite ($pf, "</urlset>\n");
	fclose ($pf);
	echo "</div>";
?>