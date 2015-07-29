<?php
// Start the session
session_start(); 
include "connect_db.php";
include "functions.php";
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to NatureOfTomorrow.com</title>
    <link rel="stylesheet" href="stylesheets/app.css" />
    <script src="bower_components/modernizr/modernizr.js"></script>
	
  <style type="text/css">
body
{
	background: url('images/petback.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}



</style>
  
  </head>
  <body>
  <div class="welcome-top" style=" float:right; margin-top:20px;">
	<?php
	
	if(isset($_SESSION["username"])){
		echo '<div style="color: #fff;"><a class"logout" href="logout.php">LOGOUT</a> Hello <strong>'.$_SESSION["username"].'!&nbsp&nbsp</strong></div>';
	}
	
		else{
		echo '<div style="margin-top:-30px; margin-right:15px; color:#660099;">Hello <strong>Visitor!</strong>
		</div>'; }?>
		</div>

  <nav>
	<ul>
	
	<?php
	
	get_nav_li();
	
	?>
   </ul>
  </nav>
  <div class="logo"><a href="http://localhost/natureoftomorrow/login.php"><img src="http://localhost/natureoftomorrow/images/logo.png"></a></div>
  <div class="large-8 columns"> 
  
  <div class="welcome-row">
	   <div class="welcome-inner">
	   
	   <div class="welcome-user">
	   <a href="http://localhost/natureoftomorrow/images/pet1.jpg"><img src="http://localhost/natureoftomorrow/images/pet1.jpg"></a>
	   </div>
	   
	   <div class="welcome-user">
	   <a href="http://localhost/natureoftomorrow/images/pet2.png"><img src="http://localhost/natureoftomorrow/images/pet2.png"></a>
	   </div>
	   <div class="welcome-user">
	   <a href="http://localhost/natureoftomorrow/images/pet3.jpg"><img src="http://localhost/natureoftomorrow/images/pet3.jpg"></a>
	   
	   </div><!-- end of user-->
	   
	   <!-- end of last user-->
	   
	   
	   </div>
	   </div><!-- end of inner-->
	   <div class="code">
	   <p style="text-indent:100px;"><a href="">Terms of Service</a> - <a href="Privacy-Policy.php">Privacy Policy</a> - <a href="">Contact</a> - <a href="">About</a></p>
	   </div>
	   <div class="copyright">
	   <p style="text-indent:100px; color:white; font-size:13px;">Copyright © 2015 NatureOfTomorrow Co.. All rights reserved. Powered by TKN Production</p>
	   </div><!-- end of row-->
	   </div><!-- end of column-->

	

	   
	  
	
	

