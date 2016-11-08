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

echo "<body bgcolor='#e9eaed'><fieldset style='position:absolute;left:28%;top:20%;border:none;box-shadow:1px 1px 3px #888888;font-style:arial;inline-height:1.40; border-radius:2px;width:38%;height:auto;background:#ffffff;
padding-top:10px;padding-bottom:11px;min-height:18%;wordwrap:break;'>
<center><img src='uc.jpg' width='300px' height='300px'></center><br>
We are glad you clicked that but right now we are working on longer posts and hence you will be able to read long posts soon.
</fieldset></body>"


?>