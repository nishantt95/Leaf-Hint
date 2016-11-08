<?php

include("connect.php");

include("tracking.html");


$query="load data local infile 'data.txt' into table stu columns terminated by '\t'";

$result=mysqli_query($connect,$query);




?>