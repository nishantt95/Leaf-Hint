<?php
include("connect.php");
echo "<fieldset style='margin-left:1080px;border:0px;'>";
include("ranking.php");
echo "</fieldset>";

$search=$_POST['search'];
/////////////////////////////////////////////////////////////////////////////////////////////////////////

$inc=1;
if(ctype_digit($search)&&strlen($search)==9) //sapid
{
$query="select * from stu where sapid='$search'";

if(file_exists("_listofblock.txt"))
{
$all=file_get_contents("_listofblock.txt");
$data=explode(" ",$all);
foreach($data as $v)
{
if(strcmp($search,$v)==0)
{
$inc=0;
}
}
}

$result=mysqli_query($connect,$query);
echo "<html><body>";
while($row=mysqli_fetch_array($result))
{
mysqli_query($connect,"update stu set rank = rank + $inc where sapid='".$row['sapid']."'");
echo "<fieldset style='height:250px;width:250px;position:absolute;margin-top:150px;margin-left:300px;background-color:#1C3892;color:#ffffff;font-size:15px'>";
echo "<br><br><center>Name: <b>".$row['name']."<br><br></b>
SapId: <b>".$row['sapid'].
"<br><br></b>Roll No: <b>". $row['roll'].
"<br><br></b>Branch: <b>". $row['branch'].
"<br><br></b>Searched: <b>". $row['rank']." times</center></fieldset>
</b>";
if(file_exists("allimg/".$row['sapid'].".jpg"))
{
$img="allimg/".$row['sapid'].".jpg";
}
else
{
$img="allimg/notfound.jpg";
}
echo "<fieldset style='margin-top:150px;position:absolute;margin-left:600px;'><img src=$img height='250px' width='250px'></fieldset><center><fieldset style='margin-top:422px;background-color:#8C93AA;;position:absolute;margin-left:680px;padding:0px;border-radius:5px;width:120px;'><a href='upload.html'style='color:#ffffff;text-decoration: none'><b>Change Photo</b></a></fieldset></center>";


}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if(ctype_alnum($search)&&strlen($search)==10) //roll
{
$query="select * from stu where roll='$search'";

$result=mysqli_query($connect,$query);
echo "<html><body>";
while($row=mysqli_fetch_array($result))
{

if(file_exists("_listofblock.txt"))
{
$all=file_get_contents("_listofblock.txt");
$data=explode(" ",$all);
foreach($data as $v)
{
if(strcmp($search,$v)==0)
{
$inc=0;
}
}
}

mysqli_query($connect,"update stu set rank = rank + $inc where sapid='".$row['sapid']."'");
echo "<fieldset style='height:250px;width:250px;position:absolute;margin-top:150px;margin-left:300px;background-color:#1C3892;color:#ffffff;font-size:15px'>";
echo "<br><br><center>Name: <b>".$row['name']."<br><br></b>
SapId: <b>".$row['sapid'].
"<br><br></b>Roll No: <b>". $row['roll'].
"<br><br></b>Branch: <b>". $row['branch'].
"<br><br></b>Searched: <b>". $row['rank']." times</center></fieldset>
</b>";
if(file_exists("allimg/".$row['sapid'].".jpg"))
{
$img="allimg/".$row['sapid'].".jpg";
}
else
{
$img="allimg/notfound.jpg";
}
echo "<fieldset style='margin-top:150px;position:absolute;margin-left:600px;'><img src=$img height='250px' width='250px'></fieldset><center><fieldset style='margin-top:422px;background-color:#8C93AA;;position:absolute;margin-left:680px;padding:0px;border-radius:5px;width:120px;'><a href='upload.html'style='color:#ffffff;text-decoration: none'><b>Change Photo</b></a></fieldset></center>";


}
}



else //name
{
echo "<html><body bgcolor=white>";
$count=0;
$query="select * from stu where name like '%$search%' order by rank desc";

$result=mysqli_query($connect,$query);
echo "<center><div style='width:790px;height:640px;overflow:scroll;margin-top:-25px;position:absolute;border:0px;margin-left:300px;background:white;'>";
echo "<fieldset style='position:absolute;background:#ffffff;border-radius:5px;top:0px;padding:12px;width:500px;border:0px;box-shadow: 1px 1px 10px #888888;'><font color='red' font-size='4px'><center><br>[Click on <font style='background:blue;padding:1px;color:white;border-radius:5px;'>Name</font> to search]</center></font>";
while($row=mysqli_fetch_array($result))
{
$count++;
if(file_exists("allimg/".$row['sapid'].".jpg"))
{
$img="allimg/".$row['sapid'].".jpg";
}
else
{
$img="allimg/notfound.jpg";
}
echo "<hr style='height:1px;border:none;border:#DDD9D9;background-color:#DDD9D9'><fieldset style='padding:0px;border:0px;position:absolute;font-style:bold;'><font color='red' ><form method='post' action='commonsearch.php'><input type='hidden' name='search' value='".$row['sapid']."'><input type='submit' style='text-decoration:none;border:0px;color:#ffffff;background:blue;border-radius:5px;padding:4px;margin-right:-30px;'  value='".$row['name']."'></form><b>".$row['branch']."</b></font></fieldset><fieldset style='border:1px white;border-radius:5px;width:80;padding:0px;margin-left:400px;'><img src='$img' width='80' height='80'></fieldset>";
}
echo "<hr style='height:1px;border:none;border:#DDD9D9;background-color:#DDD9D9'></fieldset></div></center>";
echo "<div style='margin-top:-20px;position:absolute;margin-left:504px;color:white;font-size:16px;background-color:blue;border-radius:5px;padding:1px;'><b>About $count results</b></div>";
}

echo "<fieldset style='position:absolute;background:#1C3892;bottom:1px;width:1330px;color:#ffffff;padding:10px;'><a href='http://leafhint.bl.ee/'style='color:#ffffff;text-decoration: none'>Search Again</a>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='upload.html'style='color:#ffffff;text-decoration: none'>Change Photo</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='optout.html'style='color:#ffffff;text-decoration: none'>Don't want to be searched</a>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='rank.html'style='color:#ffffff;text-decoration: none'>My Search Count</a>
</fieldset></body></html>";

?>