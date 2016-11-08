<?php

$content=$_POST['feedback'];
$id=$_POST['sapid'];

$fp=fopen('feedbacknowonleafhint.txt','a+');

$data="$id:   $content<br><br><br>";

fwrite($fp,$data);

fclose($fp);

echo "Thankyou for your feedback"

?>