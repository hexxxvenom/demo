
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
<?php
	include ('m_header.php');
	if (!isset($_SESSION['m_id'])) 
	{
		header('Location:medical_login.php');
	}

	$m_session=$_SESSION['m_id'];
	$qry_select=mysqli_query($con,"SELECT * FROM `medical_store` WHERE `m_id`='$m_session'");
	$row=mysqli_fetch_array($qry_select);
?>
<div class="card11">
	<h3 style="padding-bottom: 10px; text-align: center; color: red;font-weight: 600">PROFILE</h3>
		<div class="card1">
			<form  action="#" method="post">
		  	<div class="card2">
		  		<img  src="/Admin main/uploads/<?php echo $row['m_image']; ?>" alt="" style="">
		  	</div>
		  	<div class="card3">
		  		<label style="color: skyblue">MEDICAL NAME</label>
		 		<h4 style="color:white"><?php echo $row['m_name']; ?></h4>
		 	</div>
		 	<div class="card3">
		 		<label style="color: skyblue">ADDRESS</label>
		 		<h4 style="color:white"><?php echo $row['m_address']; ?></h4>
		 	</div>
		 	<div class="card3">
		 		<label style="color: skyblue">CONTACT</label>
		 		<h4 style="color:white"><?php echo $row['m_contact']; ?></h4>
		 	</div>
		 	<div class="card3">
		 		<label style="color: skyblue">EMAIL</label>
		    	<h4 style="color:white"><?php echo $row['m_email']; ?></h4>
		    </div>
		    <div class="card3">
		 		<label style="color: skyblue">PIN CODE</label>
		 		<h4 style="color:white"><?php echo $row['m_pincode']; ?></h4>
		 	</div>
		    	<a href="m_profile_edit.php">
		 		<input  class="btn btn-danger" type="button" style="" name="add" value="CHANGE PASSWORD">
				</a>
			</form>
		</div>
</div><br><br>
</body>
</html>