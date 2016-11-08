<html>
<head>
<style>
.z:hover
{
box-shadow:2px 2px 10px White;
}
</style>
</head>
<body>
<?php
include('connect.php');

$query="select * from stu order by rank desc limit 5";

$result=mysqli_query($connect,$query);
echo "<fieldset style='padding-top:0px;position:absolute;background:#1C3892;border-radius:5px;padding:5px;border:0px;width:200px;margin-top:50px;
box-shadow:1px 1px 5px #888888;
font-family: Helvetica, Arial, lucida grande,tahoma,verdana,arial,sans-serif;font-size:14px;'>
<font color='white' size='4px'><center>Most Searched Students<br></center></font>";
while($row=mysqli_fetch_array($result))
{
if(file_exists("allimg/".$row['sapid'].".jpg"))
{
$img="allimg/".$row['sapid'].".jpg";
}
else
{
$img="allimg/notfound.jpg";
}
echo "<hr><div class='z' style='background-image: -webkit-linear-gradient(top,#4C52DB,#00165A);padding:4px;border-radius:5px;'><fieldset style='padding:0px;border:0px;position:absolute;font-style:bold;'>
<font color='white' ><form method='post' action='commonsearch.php'><input type='hidden' name='search' value='".$row['sapid']."'>
<input type='submit' style='text-decoration:none;border:0px;color:#ffffff;background:#000000;border-radius:5px;padding:4px;margin-right:-30px;'  value='".$row['name']."'></form><b>".$row['branch']."</b></font></fieldset><fieldset style='background:white;border:1px white;border-radius:5px;width:80;padding:0px;margin-left:150px;'><img src='$img' width='70' height='70'></fieldset></div>";
}
echo "<hr></fieldset>";

?>
</body>
</html>