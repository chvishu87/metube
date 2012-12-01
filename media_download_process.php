<?php
session_start();
include_once "function.php";

/******************************************************
*
* download by username
*
*******************************************************/

$username=$_SESSION['username'];
$mediaid=$_REQUEST['id'];
echo $mediaid; exit(1);
$insertDownload="insert into download(downloadid,username,Vid) values(NULL,'$username','$mediaid')";
$queryresult = mysql_query($insertDownload);
	
?>


