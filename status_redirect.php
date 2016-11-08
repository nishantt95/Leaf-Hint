<?php
session_start();
if(isset($_SESSION['id']))
{
$id=$_SESSION['id'];
if(isset($_POST['status']))
{
include("connect.php");
$status=$_POST['status'];
$size=strlen($status);
if($size<=180)
{
mysqli_query($connect,"update stu set status='$status' where sapid='$id'");
}
else
{
$nstat=substr($status,0,180);
mysqli_query($connect,"update stu set status='$nstat' where sapid='$id'");
}
}



}


header("Location: profile.php");

?>