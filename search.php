<?php

include("connect.php");
include("tracking.html");

echo "<fieldset style='margin-left:1108px;position:absolute;border:0px;'>";
include("ranking.php");
echo "</fieldset>";

if(isset($_POST['name'])&&$_POST['name']!=NULL)
{
$s=$_POST['name'];
$query="select * from stu where name='$s'";
}
else if(isset($_POST['sapid'])&&$_POST['sapid']!=NULL)
{
$s=$_POST['sapid'];
$query="select * from stu where sapid='$s'";
}
else if(isset($_POST['roll'])&&$_POST['roll']!=NULL)
{
$s=$_POST['roll'];
$query="select * from stu where roll='$s'";
}
else
die("You cannot leave every field blank");

$result=mysqli_query($connect,$query);
echo "<html><body>";
while($row=mysqli_fetch_array($result))
{
mysqli_query($connect,"update stu set rank = rank + 1 where sapid='".$row['sapid']."'");
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
echo "<fieldset style='margin-top:150px;position:absolute;margin-left:600px;'><img src=$img height='250px' width='250px'></fieldset><fieldset style='margin-top:420px;background-color:#1C3892;position:absolute;margin-left:700px;padding:0px;border:1px solid;'><a href='upload.html'style='color:#ffffff;text-decoration: none'><b>Change Photo</b></a></fieldset>";
echo "<fieldset style='position:absolute;background:#1C3892;bottom:1px;width:1330px;color:#ffffff;padding:10px;'><a href='http://leafhint.bl.ee/'style='color:#ffffff;text-decoration: none'>Search Again</a>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='upload.html'style='color:#ffffff;text-decoration: none'>Change Photo</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='optout.html'style='color:#ffffff;text-decoration: none'>Don't want to be searched</a>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='rank.html'style='color:#ffffff;text-decoration: none'>My Search Count</a>
</fieldset></body></html>";
}

?>