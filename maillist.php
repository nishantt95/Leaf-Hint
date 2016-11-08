<?php
include("connect.php");
?>
<html>
<body>
<form method='post' action=<?php echo $_SERVER['PHP_SELF']; ?>>
<input type='password' name='pass' required>
<input type='submit' name='form1' value='submit'>
</form>
<?php

$check=0;
if(isset($_POST['form1']))
{
	if(isset($_POST['pass']))
	{
		$pass = $_POST['pass'];
		if($pass=="uurja2015@upesbidholicampusOK")
		{
			$check=1;
			$result = mysqli_query($connect,"select * from uurja_head where no>=25");
			if(!$result)
				die("Something went wrong");
			
			while($row=mysqli_fetch_array($result))
			{
				$name = $row['name'];
				$event = $row['event'];
				$event_id = $row['event_id'];
				$password = $row['password'];
				$email = $row['email'];
				
				
				
				$to = $email;
				$subject = "Uurja [IMPORTANT][Event Head][$event]";
				$txt = "Hello $name,\n
						Your event is registered to Uurja 2015's website where you can track number of users registered to your event online.\n
						Instead of email id you have to enter event id while logging in to your account.\n
						event id : $event_id
						password : $password";
				$headers = "From: noreply@leafhint.tk" . "\r\n";
				mail($to,$subject,$txt,$headers);
				
				
				echo "mail sent to $name.<br>";
				
			}
		}
	}
}

if($check==0)
	die("");

?>
</body>
</html>