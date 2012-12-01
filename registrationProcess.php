<?php
session_start();
include_once "function.php";

//mysql_query("INSERT INTO USER (Uid,Password,DOB,Fname,Lname,Sdate,userType)
//VALUES ('padma123','pass7','1989-10-10','padma','kadiyam','1989-10-10',0)");

mysql_query("INSERT INTO USER (Uid,Password,DOB,Fname,Lname,Sdate,userType) VALUES ('".$_POST["user"]."','".$_POST["pwd"]."','".$_POST["birthdate"]."','".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["date"]."',0)");
$_SESSION['username']=$_POST["user"];
header('Location: browse.php');

?> 
