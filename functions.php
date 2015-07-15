<?php
include ("formfunctions.php");
include("functions-help.php");

	
function get_userId($con){
		
		
	
		$username=$_SESSION["username"];
		$sql="SELECT userId FROM users where username='".$username."'"; 
		$result=mysqli_query($con,$sql) or die($mysqli_error($con));
		$Userid=mysqli_fetch_assoc($result);	
		
		//echo $Userid["userId"]; exit;
		//print_r($Username); exit;
		
		return $Userid["userId"];
		
}// end userid

/*************************authenicate_user****************************/
/************************return true if valid user*********/
function authenicate_user($con)
{
//superglobal from values and put them in local varables

	//echo $_POST["username"];

		$username=mysqli_real_escape_string($con,trim($_POST["username"]));
		$password=mysqli_real_escape_string($con,trim($_POST["password"]));
		//build our sql statement with the userename and the password
		$sql="SELECT * FROM users where password=SHA1('$password') and username='$username'";
		
		//echo $sql; exit;
		
		// run the query
		$result=mysqli_query($con,$sql) or die($mysqli_error($con));
		//get the number of rows
		$rowcount=mysqli_num_rows($result);

		if($rowcount==1){
			return true;
		}
		else{
			return false;
		}
		
}

 
 ?>