<html>
<body bgcolor='#E9EAED'>
<center><fieldset style='width:500px;background:#000000;border-radius:5px;color:#ffffff;margin-top:100px;'>You might have seen a reduction in search count and this is because we traced multiple
search from the same IP address. Our system automatically detects the IP address and if multiple search is made from same IP address and it crosses certain limit then some percentage of total search count is deducted.<hr>
Right now your IP Address is &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b><?php $ip=getenv("REMOTE_ADDR");
echo $ip;
 ?></b><hr>
</fieldset></center>
<fieldset style='position:absolute;background:#1C3892;bottom:1px;width:1320px;color:#ffffff;'><a href='http://leafhint.bl.ee/'style='color:#ffffff;text-decoration: none'>Home</a>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='upload.html'style='color:#ffffff;text-decoration: none'>Change Photo</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='optout.html'style='color:#ffffff;text-decoration: none'>Don't want to be searched</a>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='rank.html'style='color:#ffffff;text-decoration: none'>My Search Count</a>
</fieldset>
</body>
</html>