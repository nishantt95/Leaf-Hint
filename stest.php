<?php

include("connect.php");
include("tracking.html");


$query="select * from stu";

$result=mysqli_query($connect,$query);

while($row=mysqli_fetch_array($result))
{
echo $row['0']."<br>";
}


?>