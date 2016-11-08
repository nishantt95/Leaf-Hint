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
$name=$row['name'];
$branch=$row['branch'];
$year=$row['year'];
$apply=$row['apply'];
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


echo "<body background='bg.jpg' repeat='none' width='100%'><style>
.intro
{
position:absolute;
width:37%;
height:15%;
top:10%;
left:30%;
border-radius:3px;
background-color:white;
border:none;
box-shadow:1px 1px 5px #000AFF;
font-family:arial;
font-size:14px;
font-weight:bold;
}

.cen{
position:absolute;
width:28.2%;
height:15%;
top:10%;
right:0.5%;
border-radius:3px;
background-color:white;
border:none;
box-shadow:1px 1px 5px #000AFF;
font-family:arial;
font-size:14px;
font-weight:bold;
}

.user{
position:absolute;
width:27%;
height:15%;
top:10%;
left:0.5%;
border-radius:3px;
background-color:white;
border:none;
box-shadow:1px 1px 5px #000AFF;
font-family:arial;
font-size:14px;
font-weight:bold;
}

.main{
width:98%;
height:50%;
top:23%;
border-radius:3px;
background-color:white;
position:relative;
border:none;
box-shadow:1px 1px 5px red;
}

.guide{
position:relative;
width:98%;
height:50%;
top:50%;
border-radius:3px;
background-color:white;
position:relative;
border:none;
box-shadow:1px 1px 5px #00FF33;
}

.timetable{
width:150px;
height:300px;
font-family:arial;
font-size:14px;
border-radius:3px;
}

.ap{
font-weight:bold;

}

textarea
{
resize:none;
}

.reg
{
border-color: #BDC7D8;
border-radius:5px;
padding: 8px 10px;
width:200px;
font-size:18px;
margin:1px;
}

body{
background-repeat: no-repeat;
background-size:100%;
}

</style>";
include('login_topbar.php');
if(file_exists("allimg/".$id.".jpg"))
{
$img="allimg/".$id.".jpg";
}
else
{
$img="allimg/notfound.jpg";
}


if(isset($_POST['branch'])&&$_POST['branch']!='')
{
$_SESSION['branch_time']=$_POST['branch'];
}

if(isset($_POST['branch_year'])&&$_POST['branch_year']!='')
{
$_SESSION['branch_year']=$_POST['branch_year'];
}

if(strcmp($apply,'waiting')==0)
$st="Your status is <font color='#FF5C00'>waiting</font> for editing the timetable";

else if(strcmp($apply,'')==0)
$st="You are <font color='red'>not eligible</font> for editing the timetable";

else
$st="You are <font color='#2DE000'>eligible</font> for editing the timetable";


echo "


<fieldset class='intro'>
<center>
<font color='blue'><br>Welcome to the Editing Panel of Clicker</font>
<br><img src='icon.png' style='width:50px;height:50px;'>
<font style='position:relative;font-family:arial;font-size:14px;font-weight:bold;top:-20px;'>Clicker the time table android application for UPES students</font>
</center>
</fieldset>

<fieldset class='user'>
<center>
<br><img src='$img' style='width:50px;height:50px;border-radius:3px;position:absolute;left:10%;'>
<font style='position:relative;font-family:arial;font-size:14px;font-weight:bold;'><font color='blue'>$name</font><br><br>$branch<br><br></font>
<font style='font-family:arial;font-size:14px;font-weight:bold;'>$st</font>
</center>
</fieldset>

<fieldset class='cen'>

</fieldset>
<fieldset class='main'>
";

$lh="<font color='#2DE000' style='font-size:17px;font-weight:bold;font-family:arial;'>Leaf</font><font style='font-size:17px;font-weight:bold;font-family:arial;'>Hint</font>";

if(strcmp($apply,"")==0)
{
echo "<br><center style='font-family:arial;font-size:14px;'>Now you can edit the timetable online at $lh server and it will be updated to your android application <b>Clicker</b>.</center><br><br>";

echo "<div style='font-family:arial;font-size:14px;'>
<ul>
<li>If you will edit the timetable in incorrect format then you will be <u>banned permanently</u> from using this feature</li><br>
<li>You can edit the timetable of any branch and that's too of any year listed in the column</li><br>
<li>For editing the timetable online your name <b style='color:blue;'>$name</b> will be displayed on the android application <b>Clicker</b></li><br>
<li>Only some selected users will be eligible for editing the time table</li><br>
</ul>
</div>";

echo "<center><button class='ap'><a href='developer.php' style='text-decoration:none;'>Apply Now</a></button></center>";
}

else if(strcmp($apply,"waiting")==0)
{

echo "<br><center style='font-family:arial;font-size:14px;'>Thank you for applying at $lh <br><br>Your status is <font color='#FF5C00'><b>waiting</b></font></center>";

echo "
<ul style='font-family:arial;font-size:14px;'><br>
<li>Please wait while we are gathering information about you</li><br>
<li>We may check your facebook profile to know more about you</li><br>
<li>We hope you will be selected and will be a part of $lh</li><br>
</ul>
";

}

else
{


if(isset($_SESSION['branch_time'])&&isset($_SESSION['branch_year']))
{
$branch_time=$_SESSION['branch_time'];
$branch_year=$_SESSION['branch_year'];
echo "
<font style='position:absolute;font-family:arial;font-size:14px;'>You have selected <font color='red' style='font-family:arial;font-size:20px;'>$branch_time</font> of 
<font color='red' style='font-family:arial;font-size:20px;'>$branch_year</font> year<br><br>
Editing timetable in incorrect format will ban you from using this<br> site permanently<br><br>Edit the time table and your name will be displayed on that class</font>

<div style='right:1%;position:absolute;'>
<form method='post' action='clicker_redirect.php'>
<textarea type='text' class='timetable' name='mon' placeholder='Monday' autocomplete='off' required></textarea>
<textarea type='text' class='timetable' name='tue' placeholder='Tuesday' autocomplete='off' required></textarea>
<textarea type='text' class='timetable' name='wed' placeholder='Wednesday' autocomplete='off' required></textarea>
<textarea type='text' class='timetable' name='thu' placeholder='Thursday' autocomplete='off'  required></textarea>
<textarea type='text' class='timetable' name='fri' placeholder='Friday' autocomplete='off' required></textarea>
<input type='submit' value='Update' style='position:relative;top:-130px;'>
</form>
</div>
";
}
else
{
echo "
<center><font style='font-family:arial;font-weight:bold;color:blue;'>You are eligible now. Start updating the timetable</font></center>

<div style='position:absolute;font-family:arial;font-size:14px;top:40%;left:28%;'>
<form method='post' action='#'>Select a branch
<input type='text' list='branch' class='reg' name='branch' placeholder='Branch' autocomplete='off' required>
<datalist id='branch'>
<option value='CS OSS'>
<option value='CS BAO'>
<option value='CS TI'>
<option value='CS CCVT'>
<option value='CS IT Infra'>
<option value='ICE'>
<option value='Mechanical'>
<option value='CS Retail'>
<option value='CS Cyber Law'>
<option value='ADE'>
<option value='MSNT'>
<option value='FSE'>
<option value='ASE'>
<option value='GSE'>
<option value='CS MFT'>
<option value='GIE'>
<option value='PSE'>
<option value='IFE'>
<option value='EE'>
<option value='APE GAS'>
<option value='ET+IPR'>
<option value='APE UP'>
<option value='ME'>
<option value='ASE+AVE'>
<option value='CS OG'>
<option value='Chemical'>
</datalist>

<input type='text' list='year' class='reg' name='branch_year' placeholder='Year' autocomplete='off' required>
<datalist id='year'>
<option value='1st'>
<option value='2nd'>
<option value='3rd'>
<option value='4th'>
<option value='5th'>
<option value='6th'>
</datalist>
<input type='submit' value='Proceed'>
</form>


<a href='https://www.youtube.com/watch?v=BXvKxFMj6w8' target='blank'>How to edit the timetable</a>

</div>";
}

}









?>