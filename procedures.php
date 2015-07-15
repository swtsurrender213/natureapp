<?php
include ("header.php");



//if the form has submitted
if(isset($_POST["submit"])){
	//check for errors
	$error=check_pro_form_error();
	if($error==""){
		//success
		add_pro($con);
		
	}	
	else{
		show_pro_form($error);
	
	}
} // end of submit
//first time to sign up
else{
show_pro_form();	
}

include ("footer.php");
?>