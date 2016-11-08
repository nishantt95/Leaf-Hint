<?php
session_start();



if(isset($_SESSION['newid']))
{
unset($_SESSION['newid']);
}

if(isset($_POST['newid'])&&(isset($_SESSION['id'])))
{
$_SESSION['newid']=$_POST['newid'];
$newid=$_SESSION['newid'];
$id=$_SESSION['id'];
}
else
die("Something went wrong. We will try to fix it as soon as possible");

$edit_name=$_SESSION['username'];

if($id>$newid)
{
$_SESSION['file']="$id-connect-$newid.txt";
$_SESSION['username']="<font color='red'><b>$edit_name</b></font>";
}
elseif($newid>$id)
{
$_SESSION['file']="$newid-connect-$id.txt";
$_SESSION['username']="<font color='#01DF01'><b>$edit_name</b></font>";
}
else
die("Something went wrong.<br>You might be trying to send message to yourself but<br>we have stop this service due to security reasons.<br>Go back to 
<a href='login.php'>Home</a>");

include("connect.php");
$result=mysqli_query($connect,"select * from stu where sapid='$newid'");
while($row=mysqli_fetch_array($result))
{
$_SESSION['newusername']=$row['name'];
}

header("Location: chat.php");
?>