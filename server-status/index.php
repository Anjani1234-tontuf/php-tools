<?php
error_reporting(0);
function get_server_status($value){
$check = explode(".", $value);
$status = "Server Status :";
if (is_numeric($check[0])) {
if (!filter_var($value, FILTER_VALIDATE_IP) === false) {
$socket = @fsockopen($value, 80, $errorNo, $errorStr, 3);
if(!$socket)
$output = "<font style='color:red;font-weight:bold;'>OFFLINE</font>";
else
$output = "<font style='color:green;font-weight:bold;'>ONLINE</font>";
}
else{
$output = "<font style='color:red;font-weight:bold;'>$value is not a valid IP address</font>";
}
return $output;
}
else {
if(filter_var(gethostbyname($value), FILTER_VALIDATE_IP))
{
$socket = @fsockopen($value, 80, $errorNo, $errorStr, 3);
if(!$socket)
$output = "<font style='color:red;font-weight:bold;'>OFFLINE</font>";
else
$output = "<font style='color:green;font-weight:bold;'>ONLINE</font>";
}
else{
$output = "<font style='color:red;font-weight:bold;'>$value is not a valid Domain</font>";
}
return $output;
}
}
$status = get_server_status("hscripts.com");
echo "<div align=center>Server Status : $status</div>";
?>
