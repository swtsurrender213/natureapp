<?php
function get_owners($con){?>
	<div class="large-6 large-centered columns">
	
	<?php
	if(isset($_GET["edit"])){
		echo '<div style="max-width:200px;  float:left;"><div data-alert class="alert-box success radius"><a href="#" class="close">&times;</a>
  Successful updated!.
</div></div>';
		
	}
	if(isset($_GET["addpet"])){
		echo '<div style="max-width:200px;  float:left;"><div data-alert class="alert-box success radius"><a href="#" class="close">&times;</a>
  Successful added!.
</div></div>';
	}

if(isset($_GET["ownerId"])){
		echo '<div style="max-width:200px;  float:left;"><div data-alert class="alert-box success radius"><a href="#" class="close">&times;</a>
  Successful added!.
</div></div>';
}


	
if(isset($_GET["deleted"])){
		echo '<div style="max-width:200px;  float:left;"><div data-alert class="alert-box success radius"><a href="#" class="close">&times;</a>
  Successful updated!.
</div></div>';
}
	?>
	</div>
	<?php
		$sql="SELECT * FROM owners";
		//if no second perimeter in passed into the function select all posts 	
		
		$result=mysqli_query($con,$sql) or die(mysqli_error($con));
		
		
	?>
		<div class="row">
		
		<div class="large-6 large-centered columns">
		<?php
	
		//success messages
		//outer loop getting the owners
		
	echo '<div style="position:relative; margin-top:80px; opacity:0.8;" class="panel" >';
	
		while($row=mysqli_fetch_assoc($result)){
			
			$ownerid=$row["ownerId"];
			
			$ownername=$row["ownerName"];
			
			 
				echo  '<p><strong>Owners Name:</strong>&nbsp'.$row["ownerName"].'</p>';
			
			
			$sql2="SELECT * FROM pets where ownerId=$ownerid";
			$result2=mysqli_query($con,$sql2) or die(mysqli_error($con));
			    //inner loop getting the pets for each owner
				while($row2=mysqli_fetch_assoc($result2)){
					
				
				$petsname=$row2["petsname"];
				$petType=$row2["petType"];
				$petage=$row2["petage"];
				$petid=$row2["petId"];
				
				echo  '<p><strong>Pets Name:</strong> &nbsp'.$row2["petsname"].'<br>';
				echo  '<p><strong>Pets Breed:</strong> &nbsp'.$row2["petType"].'<br>';
				echo  '<p><strong>Pets Age:</strong> &nbsp'.$row2["petage"].'</p>';
				echo '<p><a href="petvisit.php?petId='.$petid.'"><img width="80" height="80" src="/natureoftomorrow/images/history.png" alt="photo"></a>';
				echo '&nbsp &nbsp<a onclick="'."return confirm('Are you sure to add to this History at this time?');"
		.'" href="addhistory.php?petId='.$petid.'"><img width="80" height="80" src="/natureoftomorrow/images/addhistory.png" alt="photo1"></a>';
		echo '&nbsp <a onclick="'."return confirm('Are you sure to Delete this History at this time?');"
		.'" href="delete-pet.php?petId='.$petid.'"><img width="80" height="80" src="/natureoftomorrow/images/deleteb.png" alt="photo"></a></p>';
		echo '<a href="petupdate.php?petId='.$petid.'"><button>Update</button></a>';
			echo '<hr>';
				
			}//end of inner loop
			echo '<a onclick="'."return confirm('Are you sure to add to this History at this time?');"
		.'" href="addpet.php?ownerId='.$ownerid.'"><button>Add Pet</button></a>';
			echo '<hr>';
		} // end outer loop
		?>
		</div>
		</div>
		</div>
		<?php
		//}
	}// end get post
// Alerts users actions
// type= successon or failure
		
function pet_update ($con){
	
	$petsname=$_POST["Pname"];
	$petType=$_POST["typE"];
	$petage=$_POST["age"];
	$petId=$_POST["petId"];
	
	 $sql6="UPDATE pets SET petsname='$petsname', petType='$petType' , petage=$petage WHERE petId=".$petId;
	 
	 
	 
mysqli_query($con,$sql6) or die(mysqli_error($con));

header('Location:http://localhost/natureoftomorrow/index.php?edit=1');

}


function get_update($con){
	
	$sql4="SELECT * FROM procedures";	
	$result4=mysqli_query($con,$sql4) or die(mysqli_error($con));

	while($row=mysqli_fetch_assoc($result4)){
			
			$proced=$row["proced"];
			
			 
				echo  '<p><strong>'.$row["proced"].'</strong></p>';
}
}

function alert_user($type, $message){
	
	if($type=="success"){
		
		echo '<div data-alert class="alert-box success radius">';
		echo $message;
		echo '<a href="#" class="close">&times;</a>';
		echo '</div>';
	}// end of success alert
	
	else {
		echo '<div data-alert class="alert-box alert radius">';
		echo $message;
		echo '<a href="#" class="close">&times;</a>';
		echo '</div>';
	}// end fail alert
	
}// end alert_user	

function add_pet($con){
		
		
		
		
		// sanitize for html characters 
		$petsname = filter_var($_POST["Pname"], FILTER_SANITIZE_STRING);
		$breed = filter_var($_POST["breed"], FILTER_SANITIZE_STRING);
		$Page = filter_var($_POST["Page"], FILTER_SANITIZE_STRING);
		$ownerId = ($_POST["ownerId"]);
		// get title
		$petsname=mysqli_real_escape_string($con,trim($petsname));
		// get title
		$breed=mysqli_real_escape_string($con,trim($breed));
		// get the content
		$Page=mysqli_real_escape_string($con,trim($Page));
		// build the sql statement
		$sql='INSERT INTO pets (ownerId, petsname, petType, petage)
		VALUES ("'.$ownerId.'" , "'.$petsname. '","'.$breed. '","'.$Page. '")';
		// run the query
		$result=mysqli_query($con,$sql) or die($mysqli_error($con));
		//redirect
		header('Location: http://localhost/natureoftomorrow/index.php?addpet=1');
}

function add_history($con,$petId,$proId){
	
		
		$sql='INSERT INTO petsvisit (proId, petId) VALUES ("'.$proId.'" , "'.$petId.'")';
		mysqli_query($con,$sql) or die($mysqli_error($con));
		header('Location:http://localhost/natureoftomorrow/petvisit.php?petId='.$petId.'&addhistory=1');
		
} // end of add history



function add_owner($con){
		$ownername=mysqli_real_escape_string($con,trim($_POST["OName"]));
		$sql="INSERT INTO owners (ownerName) VALUES ('$ownername')";
		// run the query
		mysqli_query($con,$sql) or die(mysqli_error($con));
		// add user 
		header('Location: http://localhost/natureoftomorrow/index.php?ownerId='.$ownerId.'');
	
}// end of add owner


function add_pro($con){
		$procedure=mysqli_real_escape_string($con,trim($_POST["pname"]));
		$sql="INSERT INTO procedures (proced) VALUES ('$procedure')";
		// run the query
		mysqli_query($con,$sql) or die(mysqli_error($con));
		// add user 
		header('Location: http://localhost/natureoftomorrow/procedures.php?add=1');
	
}// end of add owner
// delete post functions

function delete_pet($con){

		// sql query statement
		$sql='DELETE FROM `pets` where petId='.$_GET["petId"];
		// execute query
		mysqli_query($con,$sql) or die(mysqli_error($con));
} // end of delete post

function delete_pro($con){

		// sql query statement
		$sql='DELETE FROM `procedures` where proced='.$_GET["proced"];
		// execute query
		mysqli_query($con,$sql) or die(mysqli_error($con));
} // end of delete procedure
?>
<?php

function get_nav_li(){
	
	$pagename=ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME));
	
	if(isset($_SESSION["username"])) {
		//pagename is addpost
		if($pagename=="Owner"){
		echo  '<li><a href="index.php">History</a></li>';
			echo '<li class="active"><a href="owner.php">Add Owners</a></li>';	
			echo '<li><a href="procedures.php">Procedures</a></li>';
			
	
		}
	else {
		//pagename is index
			if(isset($_GET["Procedures"]))
		{
			echo  '<li><a href="index.php">History</a></li>';
			echo '<li><a href="owner.php">Add Owners</a></li>';
			echo '<li class="active"><a href="procedures.php">Procedures</a></li>';
		} // end of Procedures
	
		else 
		{
			echo  '<li class="active"><a href="index.php">History</a></li>';
			echo '<li><a href="owner.php">Add Owners</a></li>';
			echo '<li><a href="procedures.php">Procedures</a></li>';
		}
	}//end of index
	
}
	
	 } // end end of get nav li

	 //petvisit panel
	 
	  function get_procedure_name($con,$proId){
				$sql4='SELECT * FROM procedures where proId='.$proId;
				$result4=mysqli_query($con,$sql4) or die(mysqli_error($con));
				$row=mysqli_fetch_assoc($result4);	
				
				return $row["proced"];
	  }
	  
	  function get_pet_name($con,$petId){
				$sql5='SELECT * FROM pets where petId='.$petId;
				$result5=mysqli_query($con,$sql5) or die(mysqli_error($con));
				$row=mysqli_fetch_assoc($result5);	
				
				return $row["petsname"];
	  }
	 
	 
	
	function get_visit($con) {
		
if(isset($_GET["addhistory"])){
		echo '<div style="max-width:200px;  float:left;"><div data-alert class="alert-box success radius"><a href="#" class="close">&times;</a>
  Successful added!.
</div></div>';
	}
		
		$petId=$_GET["petId"];
		
		
$sql3="SELECT * FROM `petsvisit` where petId='".$petId."'";


$result=mysqli_query($con,$sql3) or die(mysqli_error($con));
	
?>
		<div class="row">
		<div class="large-6 large-centered columns">
		<?php

echo '<div style="position:relative;" class="panel">';

	
		while($row3=mysqli_fetch_assoc($result)){
			
			$petid=$row3["petId"];
			//$petsname=$row3{"petsname"};
			$visitId=$row3["visitId"];
			$proId=$row3["proId"];
			$visitdate=$row3["visitdate"];
			
			 
				echo  "<p><strong>Pet ID:</strong> &nbsp".$row3["petId"].'<br>';
				$Pname=get_pet_name($con,$petId);
				echo "<p><strong>Pet's name:</strong> &nbsp ".$Pname."<br>";
				
				//function to get the procedure if
				//get_procedure_name($con,$row3["proId"]);
				
				$procName=get_procedure_name($con,$proId);
				echo "<p><strong>Pet's procedure:</strong> &nbsp ".$procName.'<br>';
				
				//return $proId["proId"];
				
				
				//echo  ".$row3["proId"]."<br>";
				
				
				echo  "<p><strong>Pet's visit date:</strong> &nbsp".$row3["visitdate"]."<br>";
				?>
				<hr>
				<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}

</script>
<?php
		}
	}
	?>	
</div>
</div>
</div>