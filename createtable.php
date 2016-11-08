<?php
include('connect.php');
include("tracking.html");

$query="create table stu (name char(50),roll char(20),sapid char(20), branch char(20))";

$result=mysqli_query($connect,$query);


?>