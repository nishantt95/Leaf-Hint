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

echo "<html><a href='logout.php' style='font-weight:bold; position:absolute;right:3%;'>Logout</a><head><style>

.inbox
{
position:fixed;
margin-top:3.8%;
right:1%;
height:80%;
width:15%;
border: 1px solid;
border-color: #e5e6e9 #dfe0e4 #d0d1d5;
padding-bottom:0%;
overflow:hidden;
overflow-x:hidden;
background:#ffffff;
}

.inbox:hover
{
overflow-y:scroll;
}

.classmates
{
overflow:hidden;
}
.classmates:hover
{
overflow-y:scroll;
}

.inbox_head
{
position:fixed;
border:none;
box-shadow:1px 1px 5px #888888;
right:1%;
top:10%;
width:15%;
text-align:center;
background-image:-webkit-linear-gradient(top,#927EFF,#2A2AC7);
background-image:-moz-linear-gradient(top,#927EFF,#2A2AC7);
color:#ffffff;
font-weight:bold;
}
.btn_name {
  background: #4387FD;
  background-image: -webkit-linear-gradient(top, #4387FD, #4683EA);
  background-image: -moz-linear-gradient(top, #4387FD, #4683EA);
  background-image: -ms-linear-gradient(top, #4387FD, #4683EA);
  background-image: -o-linear-gradient(top, #4387FD, #4683EA);
  background-image: linear-gradient(to bottom, #4387FD, #4683EA);
  -webkit-border-radius: 3;
  -moz-border-radius: 3;
  border-radius: 3px;
  border:none;
  font-family: Arial;
  color: #ffffff;
  font-size: 12px;
  padding: 5px 5px 5px 5px;
  text-decoration: none;
  font-weight:bold;
  top:0%;
}

.btn_name:hover {
  background: #2063c7;
  background-image: -webkit-linear-gradient(top, #2063c7, #0c3587);
  background-image: -moz-linear-gradient(top, #2063c7, #0c3587);
  background-image: -ms-linear-gradient(top, #2063c7, #0c3587);
  background-image: -o-linear-gradient(top, #2063c7, #0c3587);
  background-image: linear-gradient(to bottom, #2063c7, #0c3587);
  text-decoration: none;
}

.post
{
width:100%;
max-width:100%;
height:50px;
border:none;
overflow:hidden;
}

.submit
{
right:2%;
position:absolute;
}

textarea
{
resize:none;
}

textarea:focus
{
outline:0;
}

.like
{
position:relative;
}
.classname {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#79bbff', endColorstr='#378de5');
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	
	border:1px solid #84bbf3;
	display:inline;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:auto;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
	padding-top:0px;
}
.classname:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#378de5', endColorstr='#79bbff');
	background-color:#378de5;
}.classname:active {
	position:relative;
	top:1px;
}

</style></head>
<script>
document.body.scrollTop = 200px;
</script>
<body bgcolor='#e9eaed'>";


$query="select * from stu where sapid='$id'";
$result=mysqli_query($connect,$query);

while($row=mysqli_fetch_array($result))
{
$branch_check=$row['branch'];
if($row['gender']=="")
{
echo "

<fieldset style='margin-top:10%;left:30%;position:absolute;border:none;border-radius:2px;box-shadow:1px 1px 5px #888888;padding-bottom:0px;
background-image: -webkit-linear-gradient(top,#3D42C5,#1B3072);background-image: -moz-linear-gradient(top,#3D42C5,#1B3072);
color:white;'>
<form method='post' action='data_redirect.php'>
<center><b>Your Gender:</b> <input type='radio' name='gender' value='male' checked>Male&nbsp
<input type='radio' name='gender' value='female'>Female&nbsp&nbsp<hr style='height:1px;border:none;background-color:#DDD9D9'>
<b>Password:-</b></center><hr style='height:1px;border:none;background-color:#DDD9D9'>
Make your account password protected so that no one can open your account:-<br>
<center><input type='text' name='password' autocomplete='off' required><hr style='height:1px;border:none;background-color:#DDD9D9'>
<input type='submit' value='Submit'><br>After submiting start using your home pannel and start conversation easily.
</center>
</form>
</fieldset>";
}
else
{
echo "<fieldset class='inbox_head' >Inbox</fieldset>
</fieldset>";

echo "<fieldset class='inbox' >";

foreach(glob("chat/*.txt") as $v)
{
$file=file_get_contents($v);
$v=str_replace($id,"",$v);
$v=str_replace("-connect-","",$v);
$v=str_replace("chat/","",$v);
$v=str_replace(".txt","",$v);
$sap=$v;
$file_size=strlen($file);
if(strlen($sap)==9&&$file_size>0)
{
$n=mysqli_query($connect,"select * from stu where sapid='$sap'");
while($t=mysqli_fetch_array($n))
{
if(file_exists("allimg/$sap.jpg"))
{
$img="allimg/$sap.jpg";
}
else
{
$img="allimg/notfound.jpg";
}
$dis=$t['name'];
echo "
<form method='post' action='chat_redirect.php'>
<input type='hidden' value='$sap' name='newid'>
<img src='$img' style='height:37px;width:39px; position:absolute; right:0%;'><input type='submit' value='$dis' class='btn_name'>
<hr style='height:1px;border:none;background-color:#DDD9D9'>
</form>
";
}
}
}
echo "</fieldset>

<fieldset style='position:absolute;left:32%;top:10%;border: 1px solid;
border-color: #e5e6e9 #dfe0e4 #d0d1d5; border-radius:2px;width:38%;height:auto;background:#ffffff;
padding-top:10px;padding-bottom:11px;min-height:18%;'>
<form method='post' action='post_redirect.php'>
<b style='font-family:arial;color:#48494D;border-right:thin solid #DDD9D9;font-size:13px;'>Share your thoughts &nbsp&nbsp</b><hr style='height:1px;border:none;background-color:#DDD9D9'>
<textarea type='text' class='post' expanded='false' name='post' autocomplete='off' placeholder='Write up your thoughts here' required style='font-family:arial;font-size:14px;'></textarea>
<hr style='height:1px;border:none;background-color:#DDD9D9'>
<input type='submit' class='submit' value='Post'>
</form>
</fieldset>";

if(isset($_POST['limit']))
{
$ll=$_POST['limit'];
$ul=$ll+10;
}
else
{
$ll=0;
$ul=10;
}


$result=mysqli_query($connect,"select * from post order by no desc limit $ll,$ul");
while($row=mysqli_fetch_array($result))
{
$p_id=$row['sapid'];
$p_no=$row['no'];
$p_li=$row['li'];


$put_sen=$row['data'];
$count=strlen($put_sen);

if($count>1000)
{
$put_sen=substr($put_sen,0,999);
$put_sen=$put_sen."<a href='full_post.php' style='text-decoration:none;color:blue;' target='blank'><br>...Continue Reading</a>";
}




$r=mysqli_query($connect,"select * from stu where sapid='$p_id'");
while($n=mysqli_fetch_array($r))
{
$name=$n['name'];
$branch=$n['branch'];
}

if($p_li>1)
{
$show='likes';
}
else
{
$show='like';
}

if(file_exists("allimg/$p_id.jpg"))
{
$img="allimg/$p_id.jpg";
}
else
{
$img="notfound.jpg";
}

echo "<fieldset style='position:relative;left:32%;top:24%;border: 1px solid;
border-color: #e5e6e9 #dfe0e4 #d0d1d5; border-radius:2px;width:38%;height:auto;background:#ffffff;
padding-top:7px;padding-bottom:11px;min-height:9%;word-break:break-word;margin-top:1%;padding-bottom:0px;'>";
echo "<img src='allimg/$p_id.jpg' width='50px' height='50px' style='border-radius:2px;'>";
echo "<font style='position:absolute;left:80px;top:15px;font-size:16px;font-family: arial;color:#0042CE;font-weight:bold;'>".$name."</font><br>";
echo "<font style='position:absolute;left:80px;top:35px;font-size:14px;font-family: arial;color:#0042CE;'>".$branch."</font>";
echo "<font style='position:absolute;right:2%;top:10px;font-size:12px;color:#9197a3;font-family: arial'>".$row['time']."</font><br>";

$exchange=0;
if(file_exists("like/like_data_$id.txt"))
{
$data=file_get_contents("like/like_data_$id.txt");
$data=explode("<br>",$data);
foreach($data as $v)
{
if($p_no==$v)
{
$exchange=1;
}
}
}

if($exchange==1)
{
echo "<font style='font-family: arial;font-size:14px;line-height:1.40;'>$put_sen</font><br>
<hr style='height:1px;border:none;background-color:#DDD9D9;'>
<form method='post' action='#'>
<font right:0%; color='blue' style='font-family: arial;font-size: 15px;'>$p_li $show</font>
</form>
</fieldset>";
}

else
{
echo "<font style='font-family: arial;font-size:14px;line-height:1.40;'>$put_sen</font><br>
<hr style='height:1px;border:none;background-color:#DDD9D9;'>
<form method='post' action='like_redirect.php'>
<input type='hidden' value='$p_no' name='like'>
<input type='submit' value='Like' class='like'>
<font right:0%; color='blue' style='font-family: arial;font-size: 15px;' >$p_li $show</font>
</form>
";
echo "</fieldset>";
}
}

echo "
<fieldset style='position:fixed;right:18%;bottom:1%;border:none; width:auto;height:auto;
padding-top:7px;word-break: break-all;margin-top:1%;padding-bottom:0px;'>
<form method='post' action='#'>
<input type='hidden' value='$ul' name='limit'>
<input type='submit' value='Next 10 Posts' class='classname' >
</form>
</fieldset>
</body>
";

}
}

echo "
<fieldset style='position:absolute;border: 1px solid;
border-color: #e5e6e9 #dfe0e4 #d0d1d5;height:85%;width:20%;top:10%;left:1%;background-color:#ffffff;border-radius:3px;
' class='classmates'>
<font style='font-family:arial;font-weight:bold;'><center>Your classmates</center></font><hr style='height:1px;border:none;background-color:#DDD9D9;'>
";
$result=mysqli_query($connect,"Select * from stu where sapid!='$id' and branch='$branch_check' order by rank desc");
while($row=mysqli_fetch_array($result))
{
$setid=$row['sapid'];
$rn=$row['name'];
$cnt=$row['rank'];
if(file_exists("allimg/$setid.jpg"))
{
$i="allimg/$setid.jpg";
}
else
{
$i="allimg/notfound.jpg";
}
echo "<img src='$i' style='width:40px;height:38px;border-radius:2px;position:absolute;'>";
echo "<form method='post' action='search_redirect.php'>";
echo "
<input type='hidden' value='$setid' name='search'>
<input type='submit' value='$rn' style='background:none;border:none;color:blue;position:relative;left:50px;top:6px;font-weight:bold;cursor:pointer;font-size:14px;
font-family:arial;'>
</form>
";

echo "<form method='post' action='chat_redirect.php'>";
echo "
<input type='hidden' value='$setid' name='newid'>
<input type='submit' value='Send Message' style='color:#000000;position:relative;left:55px;top:6px;font-weight:bold;cursor:pointer;'>
<font style='top:6px;position:relative;left:70px;top:-15px;font-family:arial;font-size:14px;font-weight:bold;'>$cnt Views</font>
</form>
";

echo "<hr style='height:1px;border:none;background-color:#DDD9D9;'>";

}
echo "</fieldset>";
?>
