<?php
session_start();
echo "<style>
.welcome{
position:absolute;
top:10%;
width:96%;
height:auto;
border:none;
box-shadow:1px 1px 4px #2DE000;
font-family:arial;
text-align:center;
font-size:22px;
background-image:-webkit-linear-gradient(top,#ffffff,#F8F8F8);
background-image:-moz-linear-gradient(top,#ffffff,#F8F8F8);

}

.login{
position:absolute;
top:20%;
right:20%;
width:20%;
height:38%;
border:none;
box-shadow:1px 1px 5px grey;
background-image:-webkit-linear-gradient(top,#6477FF,#0A0544);
background-image:-moz-linear-gradient(top,#6477FF,#0A0544);
color:#ffffff;
font-family:arial;
font-size:14px;
font-weight:bold;
border-radius:5px;
}

.reg
{
border-color: #BDC7D8;
border-radius:5px;
padding: 8px 10px;
width:370px;
font-size:18px;
margin:3px;
}

.button
{
border: 1px solid #4285F4;
font-weight: bold;
font-size:17px;
outline: none;
background: #4285F4;
background: -webkit-linear-gradient(top,#6BA1FF,#00338A);
background: -moz-linear-gradient(top,#6BA1FF,#00338A);
color:white;
border: 1px solid #C6C6C6;
display: inline-block;
line-height: 28px;
padding: 1px 20px;
-webkit-border-radius: 2px;
border-radius: 5px;
border-color: blue;
}

.button:hover
{
background: -webkit-gradient(linear, center top, center bottom, from(#67AE55), to(#578843));
background: -webkit-linear-gradient(#67AE55, #578843);
background-color: #69A74E;
-webkit-box-shadow: inset 0 1px 1px #A4E388;
border-color: #3B6E22 #3B6E22 #2C5115;
cursor:pointer;
}

.apply{
position:absolute;
width:30%;
height:30%;
top:20%;
left:33%;
border: 1px solid;
border-color: #DDDDDD #C0C1C9 #B1B1B1;
border-radius: 2px;
font-family:arial;
font-size:14px;
text-align:center;
background-color:#ffffff;
}
</style>
<body bgcolor='#e9eaed'>
";

if(!(isset($_SESSION['id'])))
{
echo "<body bgcolor='#E9EAED'><fieldset class='welcome' style='top:1%;'>Become a developer at <font color='#2DE000'>Leaf</font><font>Hint</font></fieldset>";

echo"
<div style='position:absolute;top:10%;left:1%;'><form method='post' action='reg.php'>
<font style='font-size:25px;color:#2DE000;'>If (<font color='red'>no account</font>)<br>
{</font>
<h1 style='font-family: Helvetica, Arial, lucida grande,tahoma,verdana,arial,sans-serif;'>Sign Up</h1>
<input type='text' class='reg' name='name' placeholder='Name' spellcheck='false' autocomplete='off' required><br>
<input type='text' class='reg' name='roll' placeholder='Roll No' autocomplete='off' required><br>
<input type='text' class='reg' name='sapid' placeholder='Sap Id' autocomplete='off' required><br>
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
<option value='CE+RP'>
<option value='CS OG'>
<option value='Chemical'>
</datalist>
<br>
<input type='password' class='reg' name='password' placeholder='New Password' autocomplete='off' required><br>
<input type='text' list='year' class='reg' name='year' placeholder='Year' autocomplete='off' required>
<datalist id='year'>
<option value='1st'>
<option value='2nd'>
<option value='3rd'>
<option value='4th'>
<option value='5th'>
<option value='6th'>
</datalist>
<br>
<font style='font-size:20px;font-weight:bold;'><input type='radio' name='gender' value='male' required>Male &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type='radio' name='gender' value='female' required>Female
</font><br><br><font>Clicking SingUp means you are agree with our <a href='http://terms.leafhint.tk/' style='text-decoration:none;color:blue;' target='blank'>terms</a></font><br><br>
<input type='submit' value='Sign Up' class='button'>
</form><font style='font-size:25px;color:#2DE000;'>}</font></div>";


echo "<font style='font-size:25px;color:#2DE000;position:relative;left:37%;top:35%;'>else if(<font color='blue'>have an account</font>) {</font><fieldset class='login'><center style='font-size:17px;'>Login</center><br><br>
<form method='post' action='developer_login_redirect.php'>
<b>SapId</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' name='SapId' autocomplete='off' required><hr style='height:1px;border:none;background:#D9D9DD;'>

<b>Password</b> &nbsp&nbsp&nbsp&nbsp<input type='password' name='password' autocomplete='off'><br>
<b style='font-size:17px;'><center>OR</center></b>
<b>RollNo</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text'  name='roll'  autocomplete='off'><hr style='height:1px;border:none;background:#D9D9DD;'><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp<input type='submit' value='Login' class='button''>
</form>
</fieldset><font style='font-size:25px;color:#2DE000;position:absolute;right:17%;top:35%;'>}</font>

<font style='font-size:25px;color:#2DE000;position:absolute;right:20%;top:80%;'>else { <a href='http://www.leafhint.tk' style='text-decoration:none;'>LeafHint</a> }</font>";
}
else
{
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
include("login_topbar.php");

echo "<body><fieldset class='welcome'>Become a developer at <font color='#2DE000'>Leaf</font><font>Hint</font></fieldset>";


if(isset($_POST['did'])&&$_POST['did']!='')
{
$did=$_POST['did'];
mysqli_query($connect,"update stu set apply='waiting' where sapid='$did'");
}

if(strcmp($apply,"")==0)
{
echo "<fieldset class='apply' ><br><br><br>Apply for editing the time table at clicker

<form method='post' action='#'>
<input type='hidden' value='$id' name='did'><br>
<input type='submit' value='Apply' style='font-weight:bold;'>
</form>
</fieldset>";

}

else
{

echo "<fieldset class='apply' ><br><br><br>
Thank you for applying at <font color='#2DE000' style='font-size:17px;font-weight:bold;'>Leaf</font><font style='font-size:17px;font-weight:bold;'>Hint</font><br><br>";

if(strcmp($apply,"waiting")==0)
{
$apply="<font color='#FF5C00'>$apply</font>";
}
else if(strcmp($apply,"eligible")==0)
{
$apply="<font color='#2DE000'>$apply</font>";
}

echo "Your status is <font><b>$apply</b></font>

</fieldset>";



}
}

?>