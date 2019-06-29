<?php
session_start();
require_once("dbfunctions.php");
$db_handle=new Dbfunctions();
$query='select * from seat where bus_id="1"';
$results=$db_handle->runQuery($query);

foreach ($results as $user) {
$mor=$user["morning"];
$eve=$user["evening"];
$disabled="";
if($mor=="0" && $eve=="0")
{
	$disabled="";
}
else
{
	$disabled="disabled";
}
$print=$user['seat_id']." , ".$user['seat_no']." , ".$disabled;
echo $print.'<br>';
}
?>