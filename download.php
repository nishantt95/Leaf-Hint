<?php
session_start();
//security check
include("connect.php");
if(!(isset($_SESSION['id'])))
die("Please <a href='logout.php'>Login</a> to continue");

$id=$_SESSION['id'];

$check=mysqli_query($connect,"select * from stu where sapid='$id'");
while($row=mysqli_fetch_array($check))
{

if($row['password']!=""&&(isset($_SESSION['password'])))
{
{ if(!(strcmp($row['password'],$_SESSION['password'])==0))
die("Please <a href='logout.php'>Login</a> to continue");
}
}
 
 else
 {
 if(!(isset($_SESSION['roll'])))
 { die("Please <a href='logout.php'>Login</a> to continue");}
 { if(!(strcmp($row['roll'],$_SESSION['roll'])==0))
die("Please <a href='logout.php'>Login</a> to continue"); }
}
}


//security check
include("login_topbar.php");

if(!(isset($_POST['id'])))
die("something went wrong");

if(!(isset($_POST['url'])))
die("something went wrong");

$fid=$_POST['id'];
$furl=$_POST['url'];

echo "
<style>
.display
{
left:0%;
position:absolute;
top:10%;
border: 1px solid;
background-color:#ffffff;
border-color: #e5e6e9 #dfe0e4 #d0d1d5;
width:98%;
height:10%;
font-family:arial;
font-size:14px;
text-align:center;
font-weight:bold;
}

.credit
{
left:0%;
position:absolute;
top:30%;
border: 1px solid;
background-color:#ffffff;
border-color: #e5e6e9 #dfe0e4 #d0d1d5;
width:98%;
height:45%;
font-family:arial;
font-size:14px;
text-align:center;
font-weight:bold;
}
</style>
<body bgcolor='#e9eaed'>
";

$result=mysqli_query($connect,"select * from stu where sapid='$fid'");
while($row=mysqli_fetch_array($result))
{
$name=$row['name'];


echo "<fieldset class='display'><br>
Starting your download of file <font color='blue'>$furl</font> in <font color='red'>5</font> seconds else <a href='downloads/$furl'>Click here</a>
</fieldset>";





if(file_exists("allimg/".$fid.".jpg"))
{
$img="allimg/".$fid.".jpg";
}
else
$img="allimg/notfound.jpg";

echo "<fieldset class='credit'>
This file was uploaded by<br><br>

<img src='$img' width='200px' height='200px' style='border:none; box-shadow:1px 1px 3px #888888;border-radius:3px;'>

<fieldset style='height:30px;width:180px;position:absolute;right:42.3%;top:80%;background-color:#1C3892;color:#ffffff;font-size:15px;
border-radius:3px; border:none; box-shadow:1px 1px 5px #888888;background-image: -webkit-linear-gradient(top,#3D42C5,#1B3072);background-image: -moz-linear-gradient(top,#3D42C5,#1B3072);

'>";
echo "<center style='font-family:arial;font-size:14px;'>".$row['name']."<br>";


echo "". $row['branch']."
</center></fieldset>

</fieldset>";


}
$url="downloads/$furl";
$time_out=5;
header("refresh: $time_out; url=$url");



?>