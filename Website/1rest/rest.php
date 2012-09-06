<?php  
$userid=$_GET['userid'];$btype=$_GET['btype'];
$dbs = MySQL_connect("192.168.234.129","toryzen","q1w2e3r4");  
MySQL_select_db("qqnotic",$dbs); 
mysql_query("set names utf8"); 
$now = time();
if($userid&&$btype){
$sql1 = "INSERT INTO qqnotic VALUES ('NULL','$btype','$userid','',0,'$now',0)";
$result = MySQL_query($sql1); 

echo "ok";

}
else
{

echo "erro";

}

mysql_close($dbs); 
?>