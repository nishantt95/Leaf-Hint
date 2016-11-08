<?php
include('connect.php');

include("tracking.html");

$id=$_POST['sapid'];
$query="select * from stu where sapid='$id'";

$result=mysqli_query($connect,$query);

while($row=mysqli_fetch_array($result))
{
echo "You were searched <font color='blue'>".$row['rank']."</font> times";
}
echo "<fieldset style='position:absolute;background:#1C3892;bottom:1px;width:1320px;color:#ffffff;'><a href='http://leafhint.bl.ee/'style='color:#ffffff;text-decoration: none'>Search Again</a>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='upload.html'style='color:#ffffff;text-decoration: none'>Change Photo</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='optout.html'style='color:#ffffff;text-decoration: none'>Don't want to be searched</a>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='rank.html'style='color:#ffffff;text-decoration: none'>My Search Count</a>
</fieldset></body></html>";
?>