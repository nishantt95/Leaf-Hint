<?php
session_start();
//security check
include("connect.php");
if(!(isset($_SESSION['id'])))
die("Please <a href='logout.php'>Login</a> to continue");

$id=$_SESSION['id'];

//security check


if(isset($_POST['like']))
{
$p_no=$_POST['like'];
$exchange=0;
if(file_exists("like/like_data_$id.txt"))
{
$data=file_get_contents("like/like_data_$id.txt");
$data=explode("<br>",$data);
foreach($data as $v)
{
if($p_no==$v)
{
$exchange=1;
}
}
}

if($exchange!=1)
{
$no=$_POST['like'];
mysqli_query($connect,"update post set li=li+1 where no=$no");
$fp=fopen("like/like_data_$id.txt","a+");
fwrite($fp,"$no.<br>");
fclose($fp);
}
}


header("Location: login.php");

?>