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
$id=$_SESSION['id'];

$result=mysqli_query($connect,"select * from stu where sapid='$id'");
while($row=mysqli_fetch_array($result))
{
$roll=$row['roll'];
if($row['status']!="")
$status=$row['status'];
else
$status="Set your status";
}

echo "
<html>
<head>
<style>
.img
{
width:200px;
height:200px;
}
.field_img
{
position:absolute;
top:10%;
height:200px;
box-shadow:1px 1px 5px #888888;
border:none;
border-radius:3px;
}

.status
{
position:absolute;
box-shadow:1px 1px 5px #888888;
top:10%;
margin-left:315px;
border:none;
border-radius:3px;
}

</style></head>
";


if(file_exists("allimg/".$id.".jpg"))
{
$img="allimg/".$id.".jpg";
}
else
$img="allimg/notfound.jpg";

echo "<fieldset class='field_img'>
<img src=$img class='img'><br>
</fieldset>";
echo "
<div style='position:absolute;margin-top:170px';>
<form action='upload.php' method='post' enctype='multipart/form-data'><br>
<input type='hidden' name='sapid' value='".$id."'required><br><br>
<input type='hidden' name='roll' value='".$roll."' required><br><br>
<input type='file' name='file' id='file' required><br>
<input type='submit' name='submit' value='Upload'>
</form>
</div>";

echo "<fieldset class='status'>
<b>Status: <font color='green'>$status</font></b>
<form method='post' action='status_redirect.php'><hr>
<b>Set Status: <input type='text' name='status' autocomplete='off' style='width:500px;height:25px;' required></b>
<input type='submit' value='Update'>
</form>
</fieldset>";


//look----------------------------------------


$query="select * from stu where sapid='$id'";

$result=mysqli_query($connect,$query);

while($row=mysqli_fetch_array($result))
{
echo "<fieldset style='height:250px;width:250px;position:absolute;right:1%;top:10%;background-color:#1C3892;color:#ffffff;font-size:15px;
border-radius:3px; border:none; box-shadow:1px 1px 5px #888888;background-image: -webkit-linear-gradient(top,#3D42C5,#1B3072);background-image: -moz-linear-gradient(top,#3D42C5,#1B3072);

'>";
echo "<br><center style='font-family:arial;'>Name: <b>".$row['name']."<br><br></b>
SapId: <b>".$row['sapid'].
"<br><br></b>Roll No: <b>". $row['roll'].
"<br><br></b>Branch: <b>". $row['branch'].
"<br><br></b>Searched: <b>". $row['rank']." times
<br><br></b><b>". $row['year']." year</center></fieldset>
</b>";
if(file_exists("allimg/".$row['sapid'].".jpg"))
{
$img="allimg/".$row['sapid'].".jpg";
$msg="";
}
else
{
$img="allimg/notfound.jpg";
$msg="";
}
}

?>