<?php
include("header.php");

//if the form has submitted
if(isset($_POST["submit"])){
	//check for errors
	$error=check_pet_update_form_error();
	if($error==""){
	// do something	
	pet_update($con);	
	
		
		
	}// end of error
	else{
		show_pet_update_form($con,$error);
	
	}
} // end of submit
//first time to sign up
else{
show_pet_update_form($con);	
}

include("footer.php");
?>
