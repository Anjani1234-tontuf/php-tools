<?php
error_reporting(0);
$useragent = $_SERVER['HTTP_USER_AGENT'] . "<br/>";
function get_os_name($useragent)
{
// the order of this array is important
global $useragent;
$ostypes = array(
'Win311' => 'Win16',
'Win95' => '(Windows 95)|(Win95)|(Windows_95)',
'WinME' => '(Windows 98)|(Win 9x 4.90)|(Windows ME)',
'Windows 98' => '(Windows 98)|(Win98)',
'Windows 2000' => '(Windows NT 5.0)|(Windows 2000)',
'Windows XP' => '(Windows NT 5.1)|(Windows XP)',
'WinServer2003' => '(Windows NT 5.2)',
'WinVista' => '(Windows NT 6.0)',
'Windows 7' => '(Windows NT 6.1)',
'Windows 8' => '(Windows NT 6.2)',
'WinNT' => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',
'OpenBSD' => 'OpenBSD',
'SunOS' => 'SunOS',
'Ubuntu' => 'Ubuntu',
'Android' => 'Android',
'Linux' => '(Linux)|(X11)',
'iPhone' => 'iPhone',
'iPad' => 'iPad',
'MacOS' => '(Mac_PowerPC)|(Macintosh)',
'QNX' => 'QNX',
'BeOS' => 'BeOS',
'OS2' => 'OS/2',
'SearchBot' => '(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp)|(MSNBot)|(Ask Jeeves/Teoma)|(ia_archiver)'
);
$useragent = strtolower($useragent ? $useragent : $_SERVER['HTTP_USER_AGENT']);
foreach ($ostypes as $os => $pattern)
if (preg_match('/' . $pattern . '/i', $useragent))
return $os;
return 'Unknown';
}
$your_os = get_os_name($useragent);
echo "<p align='center'><font style='color:green;'><b>You are using <font style='color:red;'>".strtoupper($your_os)."</font> Operating System</b></font></p>";
?>
