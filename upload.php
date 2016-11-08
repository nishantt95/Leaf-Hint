<html>
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

?>
<body oncontextmenu="return false" bgcolor='#E9EAED'>

<?php


include('connect.php');

$ip=getenv("REMOTE_ADDR");

$fp=fopen("ipdetails_uploadpic.txt","a+");

fwrite($fp,$id.":".$ip."<br><br>");
fclose($fp);


$query="select * from stu where sapid='$id'";
$result=mysqli_query($connect,$query);



if($_FILES["file"]["error"]>0)
{
echo "Error: ".$_FILES["file"]["error"]."<br>";
}
else
{
move_uploaded_file($_FILES["file"]["tmp_name"],"allimg/".$_POST['sapid'].".jpg");
echo "Profile Picture changed successfully <br>Go back to your <a href='profile.php'>Profile</a>";
header("Location: profile.php");
}

?>

</body>
</html>