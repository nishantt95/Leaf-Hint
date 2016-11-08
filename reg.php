<?php
session_start();
if(isset($_POST['name'])&&isset($_POST['roll'])&&isset($_POST['sapid'])&&isset($_POST['branch'])&&isset($_POST['password'])&&isset($_POST['gender'])&&isset($_POST['year']))
{
include("connect.php");
$name=$_POST['name'];
$roll=$_POST['roll'];
$roll=strtoupper($roll);
$sapid=$_POST['sapid'];
$year=$_POST['year'];
if(strlen($roll)!=10&&strlen($sapid)!=9)
die("Incorrect data entered.<br>You might have entered incorrect data while signing up.<br>Please <a href='default.php'>SignUp</a> again");

$branch=$_POST['branch'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$result=mysqli_query($connect,"Insert into stu (name,roll,sapid,branch,password,gender,year) values ('$name','$roll','$sapid','$branch','$password','$gender','$year')");
if(!$result)
{
die("Incorrect data entered.<br>You might have entered incorrect data while signing up.<br>Please <a href='default.php'>SignUp</a> again");
}
}
else
die("Incorrect data entered.<br>You might have entered incorrect data while signing up.<br>Please <a href='default.php'>SignUp</a> again");


$id=$sapid;
$result=mysqli_query($connect,"select * from stu where sapid='$id'");

while($row=mysqli_fetch_array($result))
{
$_SESSION['username']=$row['name'];
}


while($row=mysqli_fetch_array($result))
{
$_SESSION['branch']=$row['branch'];
$_SESSION['year']=$row['year'];
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

$_SESSION['id']=$sapid;
$_SESSION['roll']=$roll;
$_SESSION['password']=$password;
echo "You have registered successfully<br>Now click on <a href='profile.php'>Home</a> to continue";

?>