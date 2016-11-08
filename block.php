<?php
if(isset($_POST['sap']))
{
$sap=$_POST['sap'];
$fp=fopen("_listofblock.txt","a+");
fwrite($fp,$sap." ");
echo "Rank of the user has been freezed successfully";
fclose($fp);
}
else
die("Unauthorised access restricted");
?>