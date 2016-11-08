<?php
session_start();
if(isset($_SESSION['id']))
{
header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Leaf Hint</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">



    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
    <head>
<script src="//fast.eager.io/sCmAX8T6Ea.js"></script>
<title>Leaf Hint</title>
<link rel="icon" type="image/png" href="favicon.png">
</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Leaf Hint</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Search</a>
                    </li>
                   
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Leaf Hint - UPES Student Search Engine</h1>
                <hr>
                <p>Helps you to search the known and unknow students of UPES with their Sap Id and Digital Image.</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Leaf Hint</h2>
                    <hr class="light">
                    <p class="text-faded">Leaf Hint is a student search engine where students can search for the information related to their friends or some unknown student. In short its sole purpose is to provide you the SAP-ID of other students at result time.</p>
                    <a href="#services" class="btn btn-default btn-xl page-scroll">Get Started!</a>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Start your search here</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        
                        <h2>But before that :</h2>
                        <hr class="primary">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3><button data-toggle="modal" data-target="#LoginLH" class="btn btn-primary">Login</button></h3>
                        <p class="text-muted">You can search anyone without any restriction if and only if you are a UPESite.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3><button data-toggle="modal" data-target="#RegisterLH" class="btn btn-primary">Register</button></h3>
                        <p class="text-muted">Don't have a login id and password? Then, register here. Your login id will be your sap-id.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>B.tech 2013-17 Batch</h3>
                        <p class="text-muted">You are already registered. Type in your Sap id and complete roll number. Leave password as blank</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        </section>
                                    

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="   text-center">
                  <a href="https://www.facebook.com/nishant.thapliyal" target="_blank">
                       <h2 class="section-heading">Now Let's Get In Touch!</h2></a>
                    <hr class="primary">

                    
                
                    
                   <a href="https://www.facebook.com/nishant.thapliyal" target="_blank">
                       <img src="pagenew.jpg" class="img-responsive .thumbnail img-circle col-lg-offset-5" alt="Nishant">
                        <h4>Nishant Thapliyal</h4></a>
                         <p class="text-center"><kbd>Lead Developer</kbd></p>
                        <ul class="list-inline social-buttons">
                       <a href="https://www.facebook.com/nishant.thapliyal" target="_blank"> <p>If you have any queries, suggestions or want to report any bug then<br> feel free to contact
                            me. </p> </a>
                            <li><a href="https://www.facebook.com/nishant.thapliyal" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            
                        </ul>
                    
                
                </div>
               
                
            </div>
        </div>
    </section>

    <div class="modal fade" id="LoginLH" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">You are about to Login at <font color="#f05f40"><b>Leaf Hint</b></font></h4>
        </div>
        <div class="modal-body">
		<!-- form LOGIN data  -->
          <p><form role="form" method="post" action="redirect.php">
  <div class="form-group">
    <label for="SapId">Sap Id:</label>
    <input type="text" class="form-control" name='SapId' id="SapId" required>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name='password' id='password' >
  </div>
<p class='text-center'><b>OR</b></p>
    <div class="form-group">
    <label for="roll">Roll Number:</label>
    <input type="text" class="form-control" name='roll' id='roll' >
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form></p>
        </div>
		<!-- form LOGIN data  -->
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <p class="text-left"><font color="#f05f40"><b>Batch 2013-17</b></font> (Either Roll Number or Password) <font color="#f05f40"><b>Rest</b></font> only Password</p>
          
        </div>
      </div>
      
    </div>
  </div>



    <!--             Register               -->


    <div class="modal fade" id="RegisterLH" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">You are about to Login at <font color="#f05f40"><b>Leaf Hint</b></font></h4>
        </div>
        <div class="modal-body">
		<!-- form REGISTER data  -->
          <p><form role="form" method="post" action="reg.php">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name='name' id="name" required>
  </div>
  <div class="form-group">
    <label for="roll">Roll Number</label>
    <input type="text" class="form-control" name='roll' id='roll' required>
  </div>
    <div class="form-group">
    <label for="sapid">Sap Id</label>
    <input type="text" class="form-control" name='sapid' id='sapid' required>
  </div>
    
  <div class="form-group">
    <label for="branch">Branch</label>
        <select class="form-control"  id='branch' required>
            <option>CS OSS</option>
            <option>CS BAO</option>
            <option>CS TI</option>
<option>CS CCVT</option>
<option>CS IT Infra</option>
<option>ICE</option>
<option >Mechanical</option>
<option >CS Retail</option>
<option >CS Cyber Law</option>
<option >ADE</option>
<option >MSNT</option>
<option >FSE</option>
<option >ASE</option>
<option >GSE</option>
<option >CS MFT</option>
<option >GIE</option>
<option >PSE</option>
<option >IFE</option>
<option >EE</option>
<option >APE GAS</option>
<option >ET+IPR</option>
<option >APE UP</option>
<option >ME</option>
<option >ASE+AVE</option>
<option >CS OG</option>
<option >Chemical</option>
</select>
  </div>
<div class="form-group">
    <label for="password">Set Password</label>
    <input type="password" class="form-control" name='password' id='password' required>
  </div>

<div class="form-group">
    <label for="year">Year</label>
<select class="form-control" id='year' required>
<option>1st</option>
<option>2nd</option>
<option>3rd</option>
<option>4th</option>
<option>5th</option>
<option>6th</option>
</select>
  </div>

<div class="form-group">
    <input type='radio' name='gender' value="male" required><label for="gender">Male</label>
<input type='radio' name='gender' value="female" required><label for="gender">Female</label>
  </div>

  <button type="submit" class="btn btn-primary">Register</button>
</form></p>
        </div>
		<!-- form REGISTER data  -->
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <p class="text-left"><font color="#f05f40"><b>Batch 2013-17 of B.tech</b></font> is already registered.</p>
          
        </div>
      </div>
      
    </div>
  </div>



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>