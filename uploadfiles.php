<?php
session_start();
if(!(isset($_SESSION['id'])))
{
die("Please <a href='logout.php'>Login</a> to continue");
}






if($_FILES["file"]["error"]>0)
{
die("Error: ".$_FILES["file"]["error"]."<br>");
}
else
{
$file_size=$_FILES['file']['size'];
if (($file_size > 2097152))
die("Max limit crossed. Upload limit is 2 Mb <a href='filesystem.php'>Downloads</a>");
$file_n=$_FILES['file']['name'];
move_uploaded_file($_FILES["file"]["tmp_name"],"downloads/".$file_n);
echo "File has been uploaded successfully <br>Go back to <a href='filesystem.php'>Downloads</a>";
}

$id=$_SESSION['id'];


$ip=getenv("REMOTE_ADDR");

$fp=fopen("ipdetails_uploadpic.txt","a+");

fwrite($fp,$id.":".$ip."->file<br><br>");
fclose($fp);

$fp=fopen("downloaddata/file_upload_data_$id.txt","a+");
fwrite($fp,"$file_n<br>");
fclose($fp);


header("Location: filesystem.php");



?>