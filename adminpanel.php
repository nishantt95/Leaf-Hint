<?php
if(isset($_POST['user']))
{
$id=$_POST['user'];
}
else
die("Wrong Username or Password");
if(isset($_POST['password']))
{
$pass=$_POST['password'];
}
else
die("Wrong Username or Password");
if(strcmp($id,"nthapliyal95")==0&&strcmp($pass,"Nishant172295")==0)
{
include("connect.php");

///////////////////////////////////////
echo "Welcome <font color='blue'><b>Nishant Thapliyal</b></font><hr style='height:1px;border:none;background-color:#DDD9D9'>";

echo "<body bgcolor='#F5F5F5'><center><fieldset style='font-family: Helvetica, Arial, lucida grande,tahoma,verdana,arial,sans-serif;font-size:14px;position:absolute;background:white;border-radius:3px;border:0px;;box-shadow:1px 1px 5px #888888;margin-left:1100px;margin-top:70px;'>
<legend><fieldset style='background:black;color:white;border-radius:5px;border:0px;'>Blocked Users</fieldset></legend>";

if(file_exists("_listofblock.txt"))
{
$all=file_get_contents("_listofblock.txt");
$data=explode(" ",$all);
foreach($data as $v)
{
$query="select * from stu where sapid='$v'";
$result=mysqli_query($connect,$query);
while($row=mysqli_fetch_array($result))
{
echo "<font color='red'>".$row['name']."</font> [".$v."]<hr style='height:1px;border:none;background-color:#DDD9D9'>";
}
}
}
else
{
echo "Block list is empty";
}
echo "</fieldset></center>";

echo "<fieldset style='position:absolute;background:white;border-radius:3px;border:0px;box-shadow:1px 1px 5px #888888;margin-left:1070px;margin-top:0px; '>
<form method='post' action='block.php'>
SapId<input type='text' name='sap' autocomplete='off'>
<input type='submit' value='Block'>
</form></fieldset>";


echo "<fieldset style='background:black;color:white;border-radius:3px;border:0px;position:absolute;font-family: Helvetica, Arial, lucida grande,tahoma,verdana,arial,sans-serif;font-size:14px;'>IP Trace Image</fieldset>
<fieldset style='margin-top:40px;border-radius:5px;border:none;position:absolute;box-shadow:1px 1px 5px #888888;background:white;font-family: Helvetica, Arial, lucida grande,tahoma,verdana,arial,sans-serif;font-size:14px;'>
<div style='overflow:scroll;width:300px;height:500px;'>";

$content=file_get_contents("ipdetails_uploadpic.txt");
$new_content=str_replace("<br><br>"," ",$content);
$data=explode(" ",$new_content);
foreach($data as $v)
{
echo $v."<hr style='height:1px;border:none;border:#DDD9D9;background-color:#DDD9D9'>";
}
echo "</div></fieldset>";



echo "<center><fieldset style='border-radius:3px;box-shadow:1px 1px 5px #888888;position:absolute;margin-left:400px;border:0px;background:white;
font-family: Helvetica, Arial, lucida grande,tahoma,verdana,arial,sans-serif;font-size:14px;'>
<legend style='background-color:black;color:white;border-radius:5px;padding:5px;'>Change Rank</legend>
<form method='post' action='alter.php'>
SapId <input type='text' name='sapid' autocomplete='off' required>
Set Rank To <input type='text' name='rank' autocomplete='off' required>
<input type='submit' value='change'>
</form>
";
echo "</fieldset></center>";

echo "<form method='post' action='deletingtheblocklist_now_yes.php'><input style='position:absolute;margin-top:90px;margin-left:1255px;' type='submit' value='Delete'></form>";
$t=0;
$query="select * from stu where rank>0";
$result=mysqli_query($connect,$query);
while($row=mysqli_fetch_array($result))
{
$t++;
}

echo "<font color='red' style='margin-left:145px;position:absolute;'><b>$t </b><font color=blue>Students were searched</font></font>";

echo "<fieldset style='height:500px;background:white;margin-left:400px;position:absolute;border-radius:3px;border:none;box-shadow:1px 1px 5px #888888;margin-top:100px;overflow:scroll;width:505px;font-family: Helvetica, Arial, lucida grande,tahoma,verdana,arial,sans-serif;font-size:14px;'>
<legend style='background-color:black;color:white;border-radius:5px;padding:4px;'>Login Stat</legend>";

$result=mysqli_query($connect,"select * from stu where ip!='' order by time desc");
while($row=mysqli_fetch_array($result))
{
echo "<font color='blue'>[".$row['name']."]</font> ".$row['time']."-[".$row['ip']."]-<hr style='background-color:#DDD9D9;height:1px;border:none;'>";
}

echo "</fieldset>";


echo "
<fieldset style='border:none;position:absolute;box-shadow:1px 1px 5px #888888;right:10px;margin-top:150px;background:#ffffff;'>";
if(file_exists("searched_term_data.txt"))
{
$data=file_get_contents("searched_term_data.txt");
echo $data;
}
else
echo "No data";
echo "
</fieldset>
";


/////////////////////////////////////
}
else
die("Wrong Username or Password");





?>