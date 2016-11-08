<?php
session_start();
if(isset($_SESSION['id'])&&isset($_SESSION['newid']))
{
$id=$_SESSION['id'];
$newid=$_SESSION['newid'];
}
else
die("Please login to continue");

$name=$_SESSION['username'];
$newname=$_SESSION['newusername'];

$title=$newname;

$file=$_SESSION['file'];


if(!(file_exists("chat/".$file)))
{
$fp=fopen("chat/".$file,"a+");
fclose($fp);
}

date_default_timezone_set('Asia/Calcutta');
$date=date('H:i');

include("login_topbar.php");
?>
<html>
<script type="text/javascript">

        function Ajax()
        {
            var
                $http,
                $self = arguments.callee;

            if (window.XMLHttpRequest) {
                $http = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                try {
                    $http = new ActiveXObject('Msxml2.XMLHTTP');
                } catch(e) {
                    $http = new ActiveXObject('Microsoft.XMLHTTP');
                }
            }

            if ($http) {
                $http.onreadystatechange = function()
                {
                    if (/4|^complete$/.test($http.readyState)) {
                        document.getElementById('ReloadThis').innerHTML = $http.responseText;
						
						document.getElementById( 'ReloadThis' ).scrollIntoView(false);
						
                        setTimeout(function(){$self();}, 1000);
                    }
                };
                $http.open('POST', 'chat/<?php echo $file; ?>' + '?' + new Date().getTime(), true);
                $http.send(null);
            }

        }
		

    </script>
<style>
.receive
{
position:absolute;

box-shadow:1px 1px 5px #888888;
border:none;
top:20%;
margin-left:400px;
width:30%;
height:400px;
overflow:scroll;
overflow-x:hidden;
word-break: break-all;
background-color:#E7E7E7;
}

.send
{
position:absolute;
border-radius:3px;

border:none;
top:81.5%;
margin-left:387px;
width:31.9%;
padding:none;
}


.write
{
margin-left:35px;
position:relative;
width:300px;
word-break:break-all;
border:none;
border-radius:3px;
box-shadow:1px 1px 5px;
background-image:-webkit-linear-gradient(top,#FFF,#EEE);
background-image:-moz-linear-gradient(top,#FFF,#EEE);
padding-bottom: 3px;
padding-top: 4px;
color:#000000;
font-family: Helvetica;
font-size:13px;
font-weight:normal;
}

.date
{
font-size:9px;
text-align:right;
float:right;
margin-top:3px;
}

.inbox
{
position:absolute;
margin-top:3.8%;
left:0%;
height:80%;
width:15%;
border:none;
box-shadow:1px 1px 5px #888888;
padding-bottom:0%;
overflow:scroll;
overflow-x:hidden;
background:#F1F1F1;
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
.inbox_head
{
position:absolute;
border:none;
box-shadow:1px 1px 5px #888888;
left:0%;
top:10%;
width:15%;
text-align:center;
background-image:-webkit-linear-gradient(top,#927EFF,#2A2AC7);
background-image:-moz-linear-gradient(top,#927EFF,#2A2AC7);
color:#ffffff;
font-weight:bold;
}
</style>
<body>
<?php
$date="<font class='date'>$date</font>";
if(isset($_POST['msg']))
{
$msg=$_POST['msg'];

$n_msg="<fieldset class='write'>$name<br>$msg $date</fieldset>";

$fp=fopen("chat/$file","a+");
fwrite($fp,$n_msg."<br>");
}
?>
<script type="text/javascript">
        setTimeout(function() {Ajax();}, 1000);</script>
<fieldset class='receive'><div id="ReloadThis">
<?php
if(file_exists("chat/$file"))
{
$chat=file_get_contents("chat/$file");
echo $chat;

}
else
echo "No Conversation";
?>
</div></fieldset>


<fieldset class='send'><div>
<form method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type='text' name='msg' required autocomplete='off' style='width:100%;height:40px;' >
<input type='submit' value='send' style='display:none;'>
</form>
</div></fieldset>

<?php
echo "<fieldset class='inbox_head' >Inbox</fieldset><fieldset style='position:absolute;top:15%;border:none;border-radius:2px;margin-left:399px;
width:30.2%;background-image: -webkit-linear-gradient(top,#3D42C5,#1B3072);background-image: -moz-linear-gradient(top,#3D42C5,#1B3072);'>
<font style='color:white;font-family: Helvetica;'><b>$title</b></font>
</fieldset>";
?>

<?php

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
echo "</fieldset>";





?>


</body>
</html>