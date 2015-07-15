<?php
include("header.php");

//if the form has submitted
if(isset($_POST["submit"])){
	//check for errors
	$error=check_addpet_form_error();
	if($error==""){
	// do something	
	add_pet($con);	
		
		
	}// end of error
	else{
		show_addpet_form($error);
	
	}
} // end of submit
//first time to sign up
else{
show_addpet_form();	
}

include("footer.php");
?>
