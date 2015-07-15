<?php
include("header.php");

//if the form has submitted
if(isset($_POST["submit"])){
	//check for errors
	$error=check_login_form_error();
	if($error==""){
		
		if(authenicate_user($con)){
			$_SESSION["username"]=trim($_POST["username"]);
			header('Location: http://localhost/natureoftomorrow/index.php');
			exit;
		}
			
		else{
			
		}show_login_form("User or Password not found");
	}// end of error
	else{
		show_login_form($error);
	
	}
} // end of submit
//first time to sign up
else{
show_login_form();	
}?>
 <div class="code" style="margin-left:700px;">
	   <p style="margin-top:80px;"><a href="">Terms of Service</a> - <a href="">Privacy Policy</a> - <a href="">Contact</a> - <a href="">About</a></p>
	   </div>
	   <div class="copyright"style="margin-left:700px;">
	   <p style="color:white; margin-top:15px; font-size:13px;">Copyright © 2015 Natureoftomorrow health Co.. All rights reserved. Powered by TKN Production</p>
	   </div>

<?php
include("footer.php");
?>
