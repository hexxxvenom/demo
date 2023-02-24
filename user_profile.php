
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php
	include ('header.php');
	if (!isset($_SESSION['usr_id'])) 
	{
		header('Location:user_login.php');
	}

?>
<?php
	$user_session=$_SESSION['usr_id'];
	$qry_select=mysqli_query($con,"SELECT * FROM `user` WHERE `usr_id`='$user_session'");
	$row=mysqli_fetch_array($qry_select);
?>
	<div class="card11">
	<h3 style="padding-bottom: 10px; text-align: center; color: red;font-weight: 600">PROFILE</h3>
		<div class="card1">
			<form  action="#" method="post">
		  	<div class="card2">
		  		<img  src="images/download.png" alt="" style="">
		  	</div>
		  	<div class="card3">
		  		<label style="color: skyblue">NAME</label>
		 		<h4 style="color:white"><?php echo $row['usr_name']; ?></h4>
		 	</div>
		 	<div class="card3">
		 		<label style="color: skyblue">ADDRESS</label>
		 		<h4 style="color:white"><?php echo $row['usr_address']; ?></h4>
		 	</div>
		 	<div class="card3">
		 		<label style="color: skyblue">CONTACT</label>
		 		<h4 style="color:white"><?php echo $row['usr_contact']; ?></h4>
		 	</div>
		 	<div class="card3">
		 		<label style="color: skyblue">EMAIL</label>
		    	<h4 style="color:white"><?php echo $row['usr_email']; ?></h4>
		    </div>
		    <div class="card3">
		 		<label style="color: skyblue">AGE:</label><label style="color:white;"><?php echo $row['usr_age']; ?></label>&nbsp;
		 		<label style="color: skyblue">GENDER:</label><label style="color: white;"><?php echo $row['usr_gender']; ?></label>
		    </div>
		    	<a href="profile_edit.php?uui=<?php echo $row['usr_id']; ?>">
		 		<input class="btn btn-danger" type="button" style="" name="add" value="EDIT PROFILE">
				</a>
			</form>
		</div>
	</div>
	
	<br>
	<br>

</body>
</html>