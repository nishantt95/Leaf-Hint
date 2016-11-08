<?php
session_start();
include("connect.php");
if(isset($_POST['gender'])&&isset($_POST['password']))
{
$gender=$_POST['gender'];
$password=$_POST['password'];
$id=$_SESSION['id'];
$query="update stu set gender='$gender' where sapid='$id'";
$result=mysqli_query($connect, $query);

mysqli_query($connect, "update stu set password='$password' where sapid='$id'");
}
else
die("Incorrect data");

header("Location: login.php");
?>