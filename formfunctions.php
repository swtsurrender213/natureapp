<?php 
include ("connect_db.php");

 function check_login_form_error()
 {
	$error="";
	
	if(empty($_POST["username"])){
		$error .="Please enter username<br>";
	}
	if(empty($_POST["password"])){
		$error .="Please enter password<br>";
	} 
	 
	 return $error;
	 
 } // end of check login form error
 
 //*****this will take some error strings and output form with it

//**this has own perimeter error ******//
//**default value error is blank means programmer not enter & value them $error will set to ""// 
function show_login_form($error="")
{ ?>
 

<div class="row">
<div class="large-6 large-centered columns">

	<?php 
	// show message user if they just registered
	
	if(isset($_GET["addpet"])){
		alert_user("success","You have successfully registered a pet");
		}
	
	?>
	<div >	
<form style="padding-top:40px;" method="POST" action="login.php">
		Username: <input type="text" name="username" placeholder="Username"><br>
		Password: <input type="password" name="password" placeholder="Password">
		<br><button type="submit" name="submit">Login</button>
	</form>
		<?php 
		//check any errors
		if($error!=""){	
		alert_user("failure",$error);
		}		
		?>
		</div>
		</div>
		</div>
	

 <?php } // end of login form ?>
 
	 <?php 
 // show addpet form
 function show_addpet_form($error="")
{ ?>

<!---<?php $ownerId=$_GET["ownerId"];?>-->

<div class="row">
<div class="large-6 large-centered columns">
<form style="padding-top:80px;" method="POST" action="addpet.php">
		Pet's Name <input type="text" name="Pname" placeholder="Pet's Name"><br>
		Pet Breed <input type="text" name="breed" placeholder="Pet's Breed"><br>
		Pet's Age <input type="text" name="Page" placeholder="Pet's Age">
		<input type="hidden" name="ownerId" value="<?php echo $ownerId; ?>" >
		
		<br><button type="submit" name="submit">Post</button>
	</form>
		<?php 
		//check any errors
		if($error!=""){
		alert_user("failure",$error);
		}		
		?>
		</div>
		</div>
	

 <?php } // end of addpet form 
  function check_addpet_form_error()
 {
	$error="";
	
	if(empty($_POST["Pname"])){
		$error .="Please enter Pet's name<br>";
	}	
	if(empty($_POST["breed"])){
		$error .="Please enter the breed of the pet<br>";
	}
	if(empty($_POST["Page"])){
		$error .="Please enter the age of the pet<br>";
	} 
	 
	 return $error;
	 
 } // end of check addpet form error
 ?>
 <?php
 function show_owner_form($error="")
{ ?>

<div class="row">
<div class="large-6 large-centered columns">
<form style="padding-top:80px;" method="POST" action="owner.php">
		Owner's Name: <input type="text" name="OName" placeholder="Owner's Name"><br>
		<br><button type="submit" name="submit">Add Owner</button>
	</form>
		<?php 
		//check any errors
		if($error!=""){	
		alert_user("failure",$error);
		}		
		?>
		</div>
		</div>
	

 <?php } // end of register form 
 function check_owner_form_error()
 {
	$error="";
	
	if(empty($_POST["OName"])){
		$error .="Please enter Name<br>";
	}
	else {
	$name = filter_var($_POST["OName"], FILTER_SANITIZE_STRING);	
	if($name!=$_POST["OName"]){
	$error .="Please enter regular proper or different name<br>";
	}
	
	}	
	
 }
 
 function check_pro_form_error()
 {
	$error="";
	
	if(empty($_POST["pname"])){
		$error .="Please enter procedure<br>";
	}	
	 
	 return $error;
	 
 //} // end of check pro form error
	//}// end of else filter
	

	//else {
	//function to check to see if username already exits
	//if(check_username_exists()){
	//$error .="Sorry Username Exists, Please Try A Different One<br>";
	   //}
	   
	//} // end of check user exist
	// end of filter 
	
	 return $error;
 } // end of check register form error
 
 
 
 

 
 ?>
  <?php 
 // show addhistory form
 function show_addhistory_form($con)
{ ?>



<?php $petId=$_GET["petId"];?>
 
<div class="row">
<div class="large-6 large-centered columns">
<form style="padding-top:80px;" method="POST" action="addhistory.php">
		<?php
		//function add_history($con){
		$sql3="SELECT * FROM procedures";
		$result3=mysqli_query($con,$sql3) or die(mysqli_error($con));
		
			echo '<select name="proId">';
		// sanitize for html characters 
		while($row=mysqli_fetch_assoc($result3)){
			
			//$proid=$row["proId"];
			
			//$proced=$row["proced"];
			
			 
				echo  '<option value="'.$row["proId"].'">'.$row["proced"].'</option>';
				//header('Location: http://localhost/natureoftomorrow/index.php?addhistory=1=&userposts=1');
} // end of add history loop

echo'</select>';
		//}// end of history 
?>
		<input type="hidden" name="petId" value="<?php echo $petId; ?>" >
		
		<br><button type="submit" name="submit">Post</button>
	</form>
		
		</div>
		</div>
	

 <?php } // end of addhistory form 
 
 
  function check_addhistory_form_error()
 {
	$error="";
	
	if(empty($_POST["Pname"])){
		$error .="Please enter Pet's name<br>";
	}	
	 
	 return $error;
	 
 } // end of check addhistory form error
 
 function show_pro_form($error="")
{ ?>

<div class="row">
<div class="large-6 large-centered columns">
<form style="padding-top:80px;" method="POST" action="procedures.php">
		Procedure: <input type="text" name="pname" placeholder="Procedure"><br>
		<br><button type="submit" name="submit">Add Procedure</button>
	</form>
		</div>
		</div>
	

 <?php } // end of pro form 
 ?>
