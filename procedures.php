<?php
include ("header.php");
//if(isset($_GET["add"]))


//if the form has submitted
if(isset($_POST["submit"])){
	//check for errors
	$error=check_pro_form_error();
	if($error==""){
		//success
		add_pro($con);
		
	}	
	else{
		show_pro_form($con, $error);
		
	}
} // end of submit
//first time to sign up
else{
show_pro_form($con);	
}

include ("footer.php");
?>