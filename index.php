<?php
include "header.php";

if(isset($_SESSION["username"])){
	
		get_owners($con);
}
else{
	header('Location: http://localhost/natureoftomorrow/login.php');
}

	
include "footer.php"; ?>