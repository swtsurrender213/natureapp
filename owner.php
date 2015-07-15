<?php
include ("header.php");

//if the form has submitted
if(isset($_POST["submit"])){
	//check for errors
	$error=check_owner_form_error();
	if($error==""){
		//success
		add_owner($con);
		
	}	
	else{
		show_owner_form($error);
	
	}
} // end of submit
//first time to sign up
else{
show_owner_form();	
}

include ("footer.php");
?>