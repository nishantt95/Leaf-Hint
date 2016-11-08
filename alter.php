<?php
include("connect.php");
if(isset($_POST['sapid'])&&isset($_POST['rank']))
{
$id=$_POST['sapid'];
$rank=$_POST['rank'];
$query="update stu set rank='$rank' where sapid='$id'";
mysqli_query($connect,$query);
echo "Rank has been changed successfully";
}

else
die("Something went wrong");






?>