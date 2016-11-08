<?php
session_start();

$name=$_SESSION['username'];
date_default_timezone_set('Asia/Calcutta');
$date=date('j-M-y');
$year_put=$_SESSION['year'];
$branch_put=$_SESSION['branch'];

$branch_time=$_SESSION['branch_time'];
$year=$_SESSION['branch_year'];

if(strcmp($branch_time,'CS OSS')==0)
{
$file="csoss$year.txt";

}
else if(strcmp($branch_time,'CS BAO')==0)
{
$file="csbao$year.txt";

}
else if(strcmp($branch_time,'CS TI')==0)
{
$file="csti$year.txt";

}
else if(strcmp($branch_time,'CS CCVT')==0)
{
$file="csccvt$year.txt";

}
else if($branch_time=='CS IT Infra')
{
$file="csitinfra$year.txt";

}
else if($branch_time=='ICE')
{
$file="ice$year.txt";

}
else if($branch_time=='Mechanical')
{
$file="mechanical$year.txt";

}
else if($branch_time=='CS Retail')
{
$file="csretail$year.txt";

}
else if($branch_time=='CS Cyber Law')
{
$file="cscyberlaw$year.txt";

}
else if($branch_time=='ADE')
{
$file="ade$year.txt";

}
else if($branch_time=='MSNT')
{
$file="msnt$year.txt";

}
else if($branch_time=='FSE')
{
$file="fse$year.txt";

}
else if($branch_time=='ASE')
{
$file="ase$year.txt";

}
else if($branch_time=='GSE')
{
$file="gse$year.txt";

}
else if($branch_time=='CS MFT')
{
$file="csmft$year.txt";

}
else if($branch_time=='GIE')
{
$file="gie$year.txt";

}
else if($branch_time=='PSE')
{
$file="pse$year.txt";

}
else if($branch_time=='IFE')
{
$file="ife$year.txt";

}
else if($branch_time=='EE')
{
$file="ee$year.txt";

}
else if($branch_time=='APE GAS')
{
$file="apegas$year.txt";

}
else if($branch_time=='ET+IPR')
{
$file="etipr$year.txt";

}
else if($branch_time=='APE UP')
{
$file="apeup$year.txt";

}
else if($branch_time=='ME')
{
$file="me$year.txt";

}
else if($branch_time=='ASE+AVE')
{
$file="aseave$year.txt";

}
else if($branch_time=='CE+RP')
{
$file="cerp$year.txt";

}
else if($branch_time=='CS OG')
{
$file="csog$year.txt";

}
else if($branch_time=='Chemical')
{
$file="chemical$year.txt";

}



//monday
if(isset($_POST['mon'])&&$_POST['mon']!='')
{
$monday=$_POST['mon'];
}
else 
{
die("Something went wrong");
}
//tuesday
if(isset($_POST['tue'])&&$_POST['tue']!='')
{
$tuesday=$_POST['tue'];
}
else 
{
die("Something went wrong");
}
//wednesday
if(isset($_POST['wed'])&&$_POST['wed']!='')
{
$wednesday=$_POST['wed'];
}
else 
{
die("Something went wrong");
}

//Thursday
if(isset($_POST['thu'])&&$_POST['thu']!='')
{
$thursday=$_POST['thu'];
}
else 
{
die("Something went wrong");
}
//Friday
if(isset($_POST['fri'])&&$_POST['fri']!='')
{
$friday=$_POST['fri'];
}
else 
{
die("Something went wrong");
}


$fp=fopen("clicker/$file","w+");
fwrite($fp,"<Mon>\n$monday \n</Mon>\n<Tue>\n$tuesday \n</Tue>\n<Wed>\n$wednesday
 \n</Wed>\n<Thu>\n$thursday \n</Thu>\n<Fri>\n$friday \n</Fri>\n\n\n\n<Name>Updated by \n$name \n[$branch_put $year_put year] \n on ($date)</Name>\n");
fclose($fp);


$cla=$_SESSION['branch_time'];
echo "TimeTable of $cla is updated successfully <br><a href='clicker.php'>Clicker Panel</a>";



unset($_SESSION['branch_time']);
header("Location: clicker.php");

?>