<?php
session_start();
if(!(isset($_POST['post'])))
die("Something went wrong. Please <a href='logout.php'>Login</a> to continue.");

include("connect.php");

date_default_timezone_set('Asia/Calcutta');

$data=$_POST['post'];
$sapid=$_SESSION['id'];
$date=date('H:i  j-M-y');

$query="insert into post(sapid,time,data) values('$sapid','$date','$data')";
mysqli_query($connect,$query);

header("Location: login.php");

?>