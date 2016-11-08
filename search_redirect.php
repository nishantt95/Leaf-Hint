<?php
session_start();
if(isset($_SESSION['id'])&&isset($_POST['search']))
{
$_SESSION['search']=$_POST['search'];
header("Location: login_search.php");
}
else
die("Please <a href='logout.php'>Login</a> for using this feature");



?>