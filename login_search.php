<?php
session_start();
//security check
include("connect.php");
if(!(isset($_SESSION['id'])))
die("Please <a href='logout.php'>Login</a> to continue");

$id=$_SESSION['id'];

$check=mysqli_query($connect,"select * from stu where sapid='$id'");
while($row=mysqli_fetch_array($check))
{

if($row['password']!=""&&(isset($_SESSION['password'])))
{
{ if(!(strcmp($row['password'],$_SESSION['password'])==0))
die("Please <a href='logout.php'>Login</a> to continue");
 }
 }
 
 else
 {
 if(!(isset($_SESSION['roll'])))
 { die("Please <a href='logout.php'>Login</a> to continue");}
 { if(!(strcmp($row['roll'],$_SESSION['roll'])==0))
die("Please <a href='logout.php'>Login</a> to continue"); }
}
}


//security check


include("login_topbar.php");
include("connect.php");


$search=$_SESSION['search'];

$fp=fopen("searched_term_data.txt","a+");
$to="[$id] : $search <hr>";
fwrite($fp,$to);
fclose($fp);

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
echo "<html><head>
</head><body>";
while($row=mysqli_fetch_array($result))
{
mysqli_query($connect,"update stu set rank = rank + $inc where sapid='".$row['sapid']."'");
echo "<fieldset style='height:250px;width:250px;position:absolute;top:30%;left:43%;background-color:#1C3892;color:#ffffff;font-size:15px;
border-radius:3px; border:none; box-shadow:1px 1px 5px #888888;background-image: -webkit-linear-gradient(top,#3D42C5,#1B3072);background-image: -moz-linear-gradient(top,#3D42C5,#1B3072);

'>";
echo "<br><center style='font-family:arial;'>Name: <b>".$row['name']."<br><br></b>
SapId: <b>".$row['sapid'].
"<br><br></b>Roll No: <b>". $row['roll'].
"<br><br></b>Branch: <b>". $row['branch'].
"<br><br></b>Searched: <b>". $row['rank']." times
<br><br></b><b>". $row['year']." Year</center></fieldset>
</b>";
if(file_exists("allimg/".$row['sapid'].".jpg"))
{
$img="allimg/".$row['sapid'].".jpg";
}
else
{
$img="allimg/notfound.jpg";
}
if($row['status']!="")
$status=$row['status'];
else
$status="<b>Set Your Status</b>";

echo "<fieldset style='top:30%;position:absolute;left:21%;border-radius:3px; border:none; box-shadow:1px 1px 5px #888888;'><img src=$img height='250px' width='250px'></fieldset>";

echo "<fieldset style='position:absolute;top:20%;border:none;border-radius:3px;box-shadow:1px 1px 5px;left:21%;
width:548px;background-image: -webkit-linear-gradient(top,#3D42C5,#1B3072);background-image: -moz-linear-gradient(top,#3D42C5,#1B3072);'>
<font color='white'><center style='font-family:arial;' >$status</center></font>
</fieldset>";

$sap=$row['sapid'];
echo "<fieldset 
style='top:75%;position:absolute;left:21%;border-radius:3px;border:none;box-shadow:1px 1px 5px #888888;width:548px;height:23px;
background-image: -webkit-linear-gradient(top,#3D42C5,#1B3072);background-image: -moz-linear-gradient(top,#3D42C5,#1B3072);'><center>



<form method='post' action='chat_redirect.php'>
<input type='hidden' value='$sap' name='newid'>
<button type='submit' style='font-weight:bold;font-family: Helvetica, Arial, lucida grande,tahoma,verdana,arial,sans-serif;padding:2px;'>
Start a conversation</button></a> <font color='#ffffff'>
</form>


&nbsp with &nbsp
<font style='font-family: Helvetica, Arial, lucida grande,tahoma,verdana,arial,sans-serif;font-size:14px;'>
<b>".$row['name']."</b></font></font></center>

</fieldset>";

}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if(ctype_alnum($search)&&strlen($search)==10) //roll
{

$query="select * from stu where roll='$search'";

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
echo "<html><head>
</head><body>";
while($row=mysqli_fetch_array($result))
{
mysqli_query($connect,"update stu set rank = rank + $inc where sapid='".$row['sapid']."'");
echo "<fieldset style='height:250px;width:250px;position:absolute;margin-top:200px;margin-left:580px;background-color:#1C3892;color:#ffffff;font-size:15px;
border-radius:3px; border:none; box-shadow:1px 1px 5px #888888;background-image: -webkit-linear-gradient(top,#3D42C5,#1B3072);background-image: -moz-linear-gradient(top,#3D42C5,#1B3072);

'>";
echo "<br><center style='font-family:arial;'>Name: <b>".$row['name']."<br><br></b>
SapId: <b>".$row['sapid'].
"<br><br></b>Roll No: <b>". $row['roll'].
"<br><br></b>Branch: <b>". $row['branch'].
"<br><br></b>Searched: <b>". $row['rank']." times
<br><br></b><b>". $row['year']." Year</center></fieldset>
</b>";
if(file_exists("allimg/".$row['sapid'].".jpg"))
{
$img="allimg/".$row['sapid'].".jpg";
}
else
{
$img="allimg/notfound.jpg";
}
if($row['status']!="")
$status=$row['status'];
else
$status="<b>Set Your Status</b>";

echo "<fieldset style='margin-top:200px;position:absolute;margin-left:280px;border-radius:3px; border:none; box-shadow:1px 1px 5px #888888;'><img src=$img height='250px' width='250px'></fieldset>";

echo "<fieldset style='position:absolute;margin-top:120px;border:none;border-radius:3px;box-shadow:1px 1px 5px;margin-left:280px;
width:548px;background-image: -webkit-linear-gradient(top,#3D42C5,#1B3072);background-image: -moz-linear-gradient(top,#3D42C5,#1B3072);'>
<font color='white'><center style='font-family:arial;'>$status</center></font>
</fieldset>";

$sap=$row['sapid'];
echo "<fieldset 
style='margin-top:500px;position:absolute;margin-left:280px;border-radius:3px;border:none;box-shadow:1px 1px 5px #888888;width:548px;height:23px;
background-image: -webkit-linear-gradient(top,#3D42C5,#1B3072);background-image: -moz-linear-gradient(top,#3D42C5,#1B3072);'><center>



<form method='post' action='chat_redirect.php'>
<input type='hidden' value='$sap' name='newid'>
<button type='submit' style='font-weight:bold;font-family: Helvetica, Arial, lucida grande,tahoma,verdana,arial,sans-serif;padding:2px;'>
Start a conversation</button></a> <font color='#ffffff'>
</form>


&nbsp with &nbsp
<font style='font-family: Helvetica, Arial, lucida grande,tahoma,verdana,arial,sans-serif;font-size:14px;'>
<b>".$row['name']."</b></font></font></center>

</fieldset>";

}
}



else //name
{
echo "<html><body bgcolor=white>";
$count=0;
$query="select * from stu where name like '%$search%' order by rank desc";

$result=mysqli_query($connect,$query);
echo "<center><div style='width:69%;height:92%;overflow:scroll;top:1%;position:absolute;border:0px;background:white;margin-top:45px;overflow-x:hidden;'>";
echo "<fieldset style='position:absolute;background:#ffffff;border-radius:5px;top:5px;padding:15px;width:40%;border:0px;box-shadow: 1px 1px 10px #888888;left:350px'>";

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
echo "<hr style='height:1px;border:none;border:#DDD9D9;background-color:#DDD9D9'><fieldset style='padding:0px;border:0px;position:absolute;font-style:bold;'><font color='red' >
<form method='post' action='search_redirect.php'><input type='hidden' name='search' value='".$row['sapid']."'><input type='submit' style='text-decoration:none;border:0px;color:#ffffff;background:blue;border-radius:5px;padding:4px;margin-right:-30px;'  value='".$row['name']."'></form><b>".$row['branch']."</b></font></fieldset><fieldset style='border:1px white;border-radius:5px;width:80;padding:0px;margin-left:400px;'><img src='$img' width='80' height='80'></fieldset>";
}
echo "<hr style='height:1px;border:none;border:#DDD9D9;background-color:#DDD9D9'></fieldset>";
echo "<fieldset style='right:245px;border:0px;margin-top:0px;position:fixed;'>";
include("ranking.php");
echo "</fieldset>";
echo "</div></center>";
echo "<font style='top:10%;position:absolute;'>You Searched for:&nbsp&nbsp<br><font color='red' size='5px'>$search</font></font>";
echo "<div style='top:1%;text-align:center;position:relative;left:40%;width:10%;color:white;font-size:16px;background-color:blue;border-radius:5px;padding:1px;'><b>About $count results</b></div>";

}


?>