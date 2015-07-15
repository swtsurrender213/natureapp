<?php
include("header.php");

//if the form has submitted
if(isset($_POST["submit"])){
	//check for errors
	
	// do something	
	
	add_history($con,$_POST["petId"],$_POST["proId"]);	
		
		
	}// end of error
	//else{
		//show_addhistory_form($error);
	
	//}
//first time to sign up
else{
show_addhistory_form($con);	
}

include("footer.php");
?>
