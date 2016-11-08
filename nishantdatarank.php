<?php

include('connect.php');

$query="select * from stu where rank>0 order by rank desc";

$result=mysqli_query($connect,$query);

while($row=mysqli_fetch_array($result))
{
echo $row['name']."</t>:".$row['rank']."<br>";
}

mysql_close($connect);

?>