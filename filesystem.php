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

echo "
<style>
.c_upload
{
position:relative;
border: 1px solid;
background-color:#ffffff;
border-color: #e5e6e9 #dfe0e4 #d0d1d5;
width:20%;
height:20%;
left:38%;
top:5%;
}

.y_files
{
position:relative;
border: 1px solid;
background-color:#ffffff;
border-color: #e5e6e9 #dfe0e4 #d0d1d5;
width:20%;
height:60%;
left:38%;
top:7%;
overflow:hidden;
}
.y_files:hover
{
overflow-y:scroll;
}

.all
{
left:1%;
position:absolute;
top:10%;
border: 1px solid;
background-color:#ffffff;
border-color: #e5e6e9 #dfe0e4 #d0d1d5;
width:20%;
height:85%;
overflow:hidden;
}
.all:hover
{
overflow-y:scroll;
}


</style>
";



echo "<body bgcolor='#e9eaed'>";

echo "
<fieldset class='c_upload'>
<font style='color:#000000;font-weight:bold;font-family:arial;font-size:14px;'><center>Upload your files and share it with all</center></font><hr style='height:1px; border:none;background-color:#DDD9D9;'>
<form method='post' action='uploadfiles.php' enctype='multipart/form-data'>
<input type='file' id='file' name='file' required>
<input type='submit' value='Upload'> 2 Mb Max
</form>
</fieldset>";

echo "
<fieldset class='y_files'>
<font style='color:#000000;font-weight:bold;font-family:arial;font-size:17px;'><center>Your files</center></font><hr style='border:none;height:1px;background-color:#DDD9D9'>";
if(file_exists("downloaddata/file_upload_data_$id.txt"))
{
$content=file_get_contents("downloaddata/file_upload_data_$id.txt");
$data=explode("<br>",$content);
foreach($data as $v)
{
if($v!='')
echo "<a href='downloads/$v' target='blank'>$v</a><hr style='height:1px; border:none;background-color:#DDD9D9;'>";
}
}
else
echo "No file uploaded yet";
echo "</fieldset>
";

echo "<fieldset class='all'><font style='color:#000000;font-weight:bold;font-family:arial;font-size:17px;'><center>All files</font><br>
<font style='font-family:arial;font-size:12px;'>Press <b>F3</b> and then search for any file</font></center><hr style='height:1px; border:none;background-color:#DDD9D9;'>";

foreach(glob("downloaddata/*.txt") as $v)
{
$d_id=str_replace("downloaddata/file_upload_data_","",$v);
$d_id=str_replace(".txt","",$d_id);
if(strlen($v)==43)
{
$file=file_get_contents($v);
$file=explode("<br>",$file);
foreach($file as $k)
{
if($k!='')
{
echo "<form method='post' action='download.php'>
<input type='hidden' name='id' value='$d_id'>
<input type='hidden' name='url' value='$k'>
<input type='submit' value=' ' style='background:url(download.png) no-repeat;border:none;cursor:pointer; position:relative;height:26px;width:26px;'>
<font style='font-family:arial;font-size:14px;color:blue;'>$k</font>
</form><hr style='height:1px; border:none; background-color:#DDD9D9'>";
}
}
}
}
echo "</fieldset>";
?>