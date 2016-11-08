<?php
session_start();
include('connect.php');
if(isset($_POST['SapId'])&&(isset($_POST['password'])||isset($_POST['roll'])))
{
if($_POST['SapId']=="")
{
die("Something went wrong.<br>Unidentified data entered<br><a href='logout.php'>Login Again</a><br>");
}
if($_POST['password']==""&&$_POST['roll']=="")
{
die("Something went wrong.<br>Unidentified data entered<br><a href='logout.php'>Login Again</a><br>");
}

if($_POST['password']==""&&$_POST['roll']=="")
die("Something went wrong.<br>Unidentified data entered<br><a href='logout.php'>Login Again</a><br>");


$_SESSION['id']=$_POST['SapId'];
$id=$_SESSION['id'];

if(strlen($id)!=9)
die("Something went wrong.<br>Unidentified data entered<br><a href='logout.php'>Login Again</a><br>");

$result=mysqli_query($connect,"select * from stu where sapid='$id'");
while($row=mysqli_fetch_array($result))
{
if($row['password']!="")
{
if($_POST['password']!="")
{
$password=$_POST['password'];
if(!(strcmp($row['password'],$password)==0))
{
die("Something went wrong.<br>Unidentified data entered<br><a href='logout.php'>Login Again</a><br>");
}
else
{ $_SESSION['password']=$password; }
}
else
die("Something went wrong.<br><b>It seems like your account is password protected</b><br>Please <a href='logout.php'>Login Again</a> and enter your password
instead of roll no");
}

else if($_POST['roll']!="")
{
$roll=$_POST['roll'];
$roll=strtoupper($roll);
if(!(strcmp($row['roll'],$roll)==0))
die("Something went wrong.<br>Unidentified data entered<br><a href='logout.php'>Login Again</a><br>");
$_SESSION['roll']=$roll;
}

else
die("Something went wrong.<br>Unidentified data entered<br><a href='logout.php'>Login Again</a><br>");
}
}
else
die("Something went wrong.<br>Unidentified data entered<br><a href='logout.php'>Login Again</a><br>");

$result=mysqli_query($connect,"select * from stu where sapid='$id'");

while($row=mysqli_fetch_array($connect,$result))
{
$_SESSION['branch']=$row['branch'];
}

date_default_timezone_set('Asia/Calcutta');
$_SESSION['time']=date('d/m/y H:i:s');
$time=$_SESSION['time'];
$_SESSION['ip']=getenv('REMOTE_ADDR');
$ip=$_SESSION['ip'];


mysqli_query($connect,"update stu set time='$time' where sapid='$id' ")
or die("Something went wrong");

mysqli_query($connect,"update stu set ip='$ip' where sapid='$id' ")
or die("Something went wrong");




$result=mysqli_query($connect,"select * from stu where sapid='$id'");

while($row=mysqli_fetch_array($result))
{
$_SESSION['username']=$row['name'];
$_SESSION['year']=$row['year'];
}


header('Location: developer.php');




?>