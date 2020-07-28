<html>
<head><title>PHP whois Script</title></head>
<body>
<div class='resp_code frms'>
<center><b>PHP whois Script</b></center>
<?php
error_reporting(0);
$domain = $_GET['domain'];
if(isset($_GET['domain'])){
if($domain==''){$op = "Enter Domain/IP";}
else{$op = "";}
}
$whoisservers = array(
"ac" => "whois.nic.ac", // Ascension Island
"ae" => "whois.nic.ae", // United Arab Emirates
"aero"=>"whois.aero",
"af" => "whois.nic.af", // Afghanistan
"ag" => "whois.nic.ag", // Antigua And Barbuda
"ai" => "whois.ai", // Anguilla
"al" => "whois.ripe.net", // Albania
"am" => "whois.amnic.net", // Armenia
"arpa" => "whois.iana.org",
"as" => "whois.nic.as", // American Samoa
"asia" => "whois.nic.asia",
"at" => "whois.nic.at", // Austria
"au" => "whois.aunic.net", // Australia
"ax" => "whois.ax", // Aland Islands
"az" => "whois.ripe.net", // Azerbaijan
"be" => "whois.dns.be", // Belgium
"bg" => "whois.register.bg", // Bulgaria
"bi" => "whois.nic.bi", // Burundi
"biz" => "whois.biz",
"bj" => "whois.nic.bj", // Benin
"bn" => "whois.bn", // Brunei Darussalam
"bo" => "whois.nic.bo", // Bolivia
"br" => "whois.registro.br", // Brazil
"bt" => "whois.netnames.net", // Bhutan
"by" => "whois.cctld.by", // Belarus
"bz" => "whois.belizenic.bz", // Belize
"ca" => "whois.cira.ca", // Canada
"cat" => "whois.cat", // Spain
"cc" => "whois.nic.cc", // Cocos (Keeling) Islands
"cd" => "whois.nic.cd", // Congo, The Democratic Republic Of The
"ch" => "whois.nic.ch", // Switzerland
"ci" => "whois.nic.ci", // Cote d'Ivoire
"ck" => "whois.nic.ck", // Cook Islands
"cl" => "whois.nic.cl", // Chile
"cn" => "whois.cnnic.net.cn", // China
"co" => "whois.nic.co", // Colombia
"com" => "whois.verisign-grs.com",
"coop" => "whois.nic.coop",
"cx" => "whois.nic.cx", // Christmas Island
"cz" => "whois.nic.cz", // Czech Republic
"de" => "whois.denic.de", // Germany
"dk" => "whois.dk-hostmaster.dk", // Denmark
"dm" => "whois.nic.dm", // Dominica
"dz" => "whois.nic.dz", // Algeria
"ec" => "whois.nic.ec", // Ecuador
"edu" => "whois.educause.edu",
"ee" => "whois.eenet.ee", // Estonia
"eg" => "whois.ripe.net", // Egypt
"es" => "whois.nic.es", // Spain
"eu" => "whois.eu",
"fi" => "whois.ficora.fi", // Finland
"fo" => "whois.nic.fo", // Faroe Islands
"fr" => "whois.nic.fr", // France
"gd" => "whois.nic.gd", // Grenada
"gg" => "whois.gg", // Guernsey
"gi" => "whois2.afilias-grs.net", // Gibraltar
"gl" => "whois.nic.gl", // Greenland (Denmark)
"gov" => "whois.nic.gov",
"gs" => "whois.nic.gs", // South Georgia And The South Sandwich Islands
"gy" => "whois.registry.gy", // Guyana
"hk" => "whois.hkirc.hk", // Hong Kong
"hn" => "whois.nic.hn", // Honduras
"hr" => "whois.dns.hr", // Croatia
"ht" => "whois.nic.ht", // Haiti
"hu" => "whois.nic.hu", // Hungary
"ie" => "whois.domainregistry.ie", // Ireland
"il" => "whois.isoc.org.il", // Israel
"im" => "whois.nic.im", // Isle of Man
"in" => "whois.inregistry.net", // India
"info" => "whois.afilias.net",
"int" => "whois.iana.org",
"io" => "whois.nic.io", // British Indian Ocean Territory
"iq" => "whois.cmc.iq", // Iraq
"ir" => "whois.nic.ir", // Iran, Islamic Republic Of
"is" => "whois.isnic.is", // Iceland
"it" => "whois.nic.it", // Italy
"je" => "whois.je", // Jersey
"jobs" => "jobswhois.verisign-grs.com",
"jp" => "whois.jprs.jp", // Japan
"ke" => "whois.kenic.or.ke", // Kenya
"kg" => "www.domain.kg", // Kyrgyzstan
"ki" => "whois.nic.ki", // Kiribati
"kr" => "whois.kr", // Korea, Republic Of
"kz" => "whois.nic.kz", // Kazakhstan
"la" => "whois.nic.la", // Lao People's Democratic Republic
"li" => "whois.nic.li", // Liechtenstein
"lt" => "whois.domreg.lt", // Lithuania
"lu" => "whois.dns.lu", // Luxembourg
"lv" => "whois.nic.lv", // Latvia
"ly" => "whois.nic.ly", // Libya
"ma" => "whois.iam.net.ma", // Morocco
"md" => "whois.nic.md", // Moldova
"me" => "whois.nic.me", // Montenegro
"mg" => "whois.nic.mg", // Madagascar
"mil" => "whois.nic.mil",
"ml" => "whois.dot.ml", // Mali
"mn" => "whois.nic.mn", // Mongolia
"mo" => "whois.monic.mo", // Macao
"mobi" => "whois.dotmobiregistry.net",
"mp" => "whois.nic.mp", // Northern Mariana Islands
"ms" => "whois.nic.ms", // Montserrat
"mu" => "whois.nic.mu", // Mauritius
"museum" => "whois.museum",
"mx" => "whois.mx", // Mexico
"my" => "whois.domainregistry.my", // Malaysia
"na" => "whois.na-nic.com.na", // Namibia
"name" => "whois.nic.name",
"nc" => "whois.nc", // New Caledonia
"net" => "whois.verisign-grs.net",
"nf" => "whois.nic.nf", // Norfolk Island
"ng" => "whois.nic.net.ng", // Nigeria
"nl" => "whois.domain-registry.nl", // Netherlands
"no" => "whois.norid.no", // Norway
"nu" => "whois.nic.nu", // Niue
"nz" => "whois.srs.net.nz", // New Zealand
"om" => "whois.registry.om", // Oman
"org" => "whois.pir.org",
"pe" => "kero.yachay.pe", // Peru
"pf" => "whois.registry.pf", // French Polynesia
"pl" => "whois.dns.pl", // Poland
"pm" => "whois.nic.pm", // Saint Pierre and Miquelon (France)
"post" => "whois.dotpostregistry.net",
"pr" => "whois.nic.pr", // Puerto Rico
"pro" => "whois.dotproregistry.net",
"pt" => "whois.dns.pt", // Portugal
"pw" => "whois.nic.pw", // Palau
"qa" => "whois.registry.qa", // Qatar
"re" => "whois.nic.re", // Reunion (France)
"ro" => "whois.rotld.ro", // Romania
"rs" => "whois.rnids.rs", // Serbia
"ru" => "whois.tcinet.ru", // Russian Federation
"sa" => "whois.nic.net.sa", // Saudi Arabia
"sb" => "whois.nic.net.sb", // Solomon Islands
"sc" => "whois2.afilias-grs.net", // Seychelles
"se" => "whois.iis.se", // Sweden
"sg" => "whois.sgnic.sg", // Singapore
"sh" => "whois.nic.sh", // Saint Helena
"si" => "whois.arnes.si", // Slovenia
"sk" => "whois.sk-nic.sk", // Slovakia
"sm" => "whois.nic.sm", // San Marino
"sn" => "whois.nic.sn", // Senegal
"so" => "whois.nic.so", // Somalia
"st" => "whois.nic.st", // Sao Tome And Principe
"su" => "whois.tcinet.ru", // Russian Federation
"sx" => "whois.sx", // Sint Maarten (dutch Part)
"sy" => "whois.tld.sy", // Syrian Arab Republic
"tc" => "whois.meridiantld.net", // Turks And Caicos Islands
"tel" => "whois.nic.tel",
"tf" => "whois.nic.tf", // French Southern Territories
"th" => "whois.thnic.co.th", // Thailand
"tj" => "whois.nic.tj", // Tajikistan
"tk" => "whois.dot.tk", // Tokelau
"tl" => "whois.nic.tl", // Timor-leste
"tm" => "whois.nic.tm", // Turkmenistan
"tn" => "whois.ati.tn", // Tunisia
"to" => "whois.tonic.to", // Tonga
"tp" => "whois.nic.tl", // Timor-leste
"tr" => "whois.nic.tr", // Turkey
"travel" => "whois.nic.travel",
"tv" => "tvwhois.verisign-grs.com", // Tuvalu
"tw" => "whois.twnic.net.tw", // Taiwan
"tz" => "whois.tznic.or.tz", // Tanzania, United Republic Of
"ua" => "whois.ua", // Ukraine
"ug" => "whois.co.ug", // Uganda
"uk" => "whois.nic.uk", // United Kingdom
"us" => "whois.nic.us", // United States
"uy" => "whois.nic.org.uy", // Uruguay
"uz" => "whois.cctld.uz", // Uzbekistan
"vc" => "whois2.afilias-grs.net", // Saint Vincent And The Grenadines
"ve" => "whois.nic.ve", // Venezuela
"vg" => "whois.adamsnames.tc", // Virgin Islands, British
"wf" => "whois.nic.wf", // Wallis and Futuna
"ws" => "whois.website.ws", // Samoa
"xxx" => "whois.nic.xxx",
"yt" => "whois.nic.yt", // Mayotte
"yu" => "whois.ripe.net");
function get_domain($domain){
global $whoisservers;
$domain_parts = explode(".", $domain);
$tld = strtolower(array_pop($domain_parts));
$whoisserver = $whoisservers[$tld];
if(!$whoisserver) {
return "Error: No appropriate Whois server found for $domain domain!";
}
$result = get_server_details($whoisserver, $domain);
if(!$result) {
return "Error: No results retrieved from $whoisserver server for $domain domain!";
}
else {
while(strpos($result, "Whois Server:") !== FALSE){
preg_match("/Whois Server: (.*)/", $result, $matches);
$secondary = $matches[1];
if($secondary) {
$result = get_server_details($secondary, $domain);
$whoisserver = $secondary;
}
}
}
return "$domain domain lookup results from $whoisserver server:\n\n" . $result;
}
function get_ip($ip) {
$whoisservers = array(
//"whois.afrinic.net", // Africa - returns timeout error :-(
"whois.lacnic.net", // Latin America and Caribbean - returns data for ALL locations worldwide :-)
"whois.apnic.net", // Asia/Pacific only
"whois.arin.net", // North America only
"whois.ripe.net" // Europe, Middle East and Central Asia only
);
$results = array();
foreach($whoisservers as $whoisserver) {
$result = get_server_details($whoisserver, $ip);
if($result && !in_array($result, $results)) {
$results[$whoisserver]= $result;
}
}
$res = "RESULTS FOUND: " . count($results);
foreach($results as $whoisserver=>$result) {
$res .= "\nWhois results for " . $ip . " from " . $whoisserver . " server:\n\n" . $result;
}
return $res;
}
function validate_ip($ip) {
$ipnums = explode(".", $ip);
if(count($ipnums) != 4) {
return false;
}
foreach($ipnums as $ipnum) {
if(!is_numeric($ipnum) || ($ipnum > 255)) {
return false;
}
}
return $ip;
}
function validate_domain($domain) {
if(!preg_match("/^([-a-z0-9]{2,100})\.([a-z\.]{2,8})$/i", $domain)) {
return false;
}
return $domain;
}
function get_server_details($whoisserver, $domain) {
$port = 43;
$timeout = 10;
$fp = @fsockopen($whoisserver, $port, $errno, $errstr, $timeout) or die("Socket Error " . $errno . " - " . $errstr);
fputs($fp, $domain . "\r\n");
$out = "";
while(!feof($fp)){
$out .= fgets($fp);
}
fclose($fp);
$res = "";
if((strpos(strtolower($out), "error") === FALSE) && (strpos(strtolower($out), "not allocated") === FALSE)) {
$rows = explode("\n", $out);
foreach($rows as $row) {
$row = trim($row);
if(($row != '') && ($row{0} != '#') && ($row{0} != '%')) {
$res .= $row."\n";
}
}
}
return $res;
}
?>
<form action="<?=$_SERVER['PHP_SELF'];?>">
<p><b><label for="domain">Domain/IP Address:</label></b>
<input type="text" name="domain" id="domain" value="<?=$domain;?>">
<input type="submit" value="whois"></p>
</form>
<?
if($domain) {
$domain = trim($domain);
if(substr(strtolower($domain), 0, 7) == "http://") $domain = substr($domain, 7);
if(substr(strtolower($domain), 0, 4) == "www.") $domain = substr($domain, 4);
if(validate_ip($domain)) {
$result = get_ip($domain);
}
elseif(validate_domain($domain)) {
$result = get_domain($domain);
}
else
$op = "Invalid Input!";
echo "<pre><br><font style='font: 1em/150% Tahoma,Geneva,sans-serif;'>" . $result . "</font><br></pre><br>";
}
?>
<div align='center' style='font-weight:bold;color:red;'><?php echo $op; ?></div>
<div align='center' style="font-size: 10px;color: #dadada;" id="dumdiv">
<a href="http://www.hscripts.com" id="dum" style="font-size: 10px;color: #dadada;text-decoration:none;color: #dadada;">&copy;h</a>
</div>
</div>
</body>
<style>
body {
background: #fff none repeat scroll 0 0;
color: #666;
font: 0.81em/150% Tahoma,Geneva,sans-serif;
word-wrap: break-word;
}
.resp_code
{
margin:5px 10px 10px 300px;
padding:10px 20px 10px 20px;
font:normal 1em/1.3em Tahoma, Geneva, sans-serif;
color:#333;
background:#f8f8f8;
border:#ddd 1px solid;
border-radius:.25em;
overflow:auto;width:50%;
}
.frms
{
margin:0 auto;
padding:10px;
border:#ddd 1px solid;
border-radius:.3em;
-moz-border-radius:.3em;
-webkit-border-radius:.3em;
-o-border-radius:.3em;
font-family:Tahoma, Geneva, sans-serif;
color:#333;
font-size:.9em;
line-height:1.2em;
}
.frms input[type="text"]
{
width:59%;
background:#fff;
border:#ddd 1px solid;
border-radius:.35em;
-moz-border-radius:.35em;
-webkit-border-radius:.35em;
-o-border-radius:.35em;
padding:0 .5%;
margin-top:5px;
margin-bottom:15px;
height:35px;
}
.frms input[type="submit"]
{
padding:7px 14px;
font-weight:bold;
color:#fff;
cursor:pointer;
border-radius:.3em;
-moz-border-radius:.2em;
-webkit-border-radius:.2em;
-o-border-radius:.2em;
margin:10px 0;
border:none;
background:#75ab22;
border-bottom:#629826 3px solid;
text-shadow:#396e12 1px 1px 0px;
}
body {
background: #fff none repeat scroll 0 0;
color: #666;
font: 1em/150% Tahoma,Geneva,sans-serif;
word-wrap: break-word;
}
@media screen and (max-width: 480px)
{
.resp_code{width:auto !important;margin:0px !important;}
}
</style>
</html>
