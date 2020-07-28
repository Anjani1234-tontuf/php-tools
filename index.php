<?php
function dump_mysql($dbname,$username,$password,$hostname,$exportpath)
{
$command='/opt/lampp/bin/mysqldump -h ' .$hostname .' -u ' .$username .' ' .$dbname .' > ' .$exportpath;
echo $command;
exec($command);
}
//Fill the below information
$db ='task3db';//your dbname
$user ='root';//your username
$pass ='';//your password
$host ='localhost';//your hostname
$path ="/opt/lampp/htdocs/mysqldump/mydb.sql";//your export path
echo dump_mysql($db,$user,$pass,$host,$path);
?>
