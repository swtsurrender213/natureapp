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
}


include("footer.php");
?>
