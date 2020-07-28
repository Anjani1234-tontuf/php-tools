<?php
function trace_router($host,$unix)
{
$host= preg_replace ("/[^A-Za-z0-9.]/","",$host);
echo '<pre>';
//check target IP or domain
if ($unix)
{
system ("traceroute $host");
system("killall -q traceroute");// kill all traceroute processes in case there are some stalled ones or use echo 'traceroute' to execute without shell
}
else
{
system("tracert $host");
}
echo '</pre>';
}
trace_router("hscripts.com",1);
?>
