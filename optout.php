<?php
include("tracking.html");

$id=$_POST['sapid'];

$ip=getenv("REMOTE_ADDR");

$fp=fopen("ipdetails_uploadpic.txt","a+");

fwrite($fp,$id.":".$ip."[foroptout]<br><br>");
fclose($fp);

if($_FILES['file']['error']>0)
{
echo $_FILES['file']['error'];
}
else
{
move_uploaded_file($_FILES["file"]["tmp_name"],"optout/".$_POST['sapid'].".jpg");
echo "Card image uploaded successfully.<br>We will remove your data soon after confirming your identity.";
}

echo "<fieldset style='position:absolute;background:#1C3892;bottom:1px;width:1320px;color:#ffffff;'><a href='http://leafhint.bl.ee/'style='color:#ffffff;text-decoration: none'>Search Again</a>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='upload.html'style='color:#ffffff;text-decoration: none'>Change Photo</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='optout.html'style='color:#ffffff;text-decoration: none'>Don't want to be searched</a>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='rank.html'style='color:#ffffff;text-decoration: none'>My Search Count</a>
</fieldset></body></html>";
?>