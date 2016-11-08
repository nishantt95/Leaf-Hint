<?php

include("connect.php");

$query="alter table stu add primary key (sapid)";

$result=mysqli_query($connect,$query);



?>