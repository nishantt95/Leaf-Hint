<html>
<style>
.logout
{
text-decoration:none;
color:white;
position:absolute;
margin-top:7px;
}

.topbar
{
position:relative;
background-image: -webkit-linear-gradient(top,#3D42C5,#1B3072);
background-image: -moz-linear-gradient(top,#3D42C5,#1B3072);
border:none;
margin-top:-8px;
left:0px;
width:98%;
height:35px;
color:white;
}
.search
{
border:none;

width:50%;
margin-top:-36px;
color:#ffffff;
font-size:15px;
border-radius:5px;
padding:1px;
height:30px;
position:absolute;
left:310px;

}

.x
{
color:white;
}
.x:hover
{
background:white;
color:#3D42C5;
border-radius:2px;
padding:2px;
}
.focus:hover
{
box-shadow:2px 2px 5px red;
}

.dist
{
color:#072480;
}

.logout:hover
{
background:white;
color:#3D42C5;
border-radius:2px;
}
</style>
<body>
<?php
include("connect.php");

$id=$_SESSION['id'];

$query="select * from stu where sapid='$id'";
$result=mysqli_query($connect,$query);

while($row=mysqli_fetch_array($result))
{
	
		if(file_exists("allimg/$id.jpg"))
		{
		$img="allimg/$id.jpg";
		}
		else
		{
		$img="allimg/notfound.jpg";
		}
	echo"<fieldset class='topbar' style='font-family:arial;font-size:14px;'>
	<img src='$img' width='40px' height='40px' style='margin-top:-2px;border-radius:3px;left:0%;'>
	<font class='logout' style='left:9.2%;'><a href='profile.php' class='x' style='text-decoration:none;'><b>|&nbspProfile&nbsp|</b></a></font>
	<fieldset class='search'>
	<form method='post' action='search_redirect.php'>
	<input type='search' class='focus' style='width:100%;height:32px;border-radius:5px;font-weight:bold;' name='search' placeholder='Enter Name or Rollno or SapId and then Press Enter to Search' spellcheck='false' autocomplete='off' required>
	
	</form></fieldset>
	
	
	<a class='logout' style='right:1.5%;' href='logout.php'><b>|&nbspLogout&nbsp|</b></a>
	<a class='logout' style='left:5%;' href='login.php'><b>|&nbspHome&nbsp|</b></a>
	<a class='logout' style='right:6.5%' href='filesystem.php'><b>|&nbspDownloads&nbsp|</b></a>
	<a class='logout' style='left:13.8%' href='clicker.php'><b>|&nbspClicker&nbsp|</b></a>
	</fieldset>";
	
	
}



?>