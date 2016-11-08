<?php

include('connect.php');

$query="select * from stu order by rank desc limit 20";

$result=mysqli_query($connect,$query);
echo "<fieldset style='background:#1C3892;border-radius:5px;top:0px;padding:12px;border:0px;width:40px'><font color='white' size='4px'><center><b>Top 20 Most Searched Students</b></center></font>";
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
echo "<hr><fieldset style='border:0px;width:400px;'><img src=$img width='40' height='40'><font color='white' ><b>".$row['name']."</b>&nbsp&nbsp&nbsp[".$row['branch']."]&nbsp&nbsp&nbsp[".$row['rank']."]</font></fieldset>";
}
echo "<hr></fieldset>";


?>