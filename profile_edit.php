
<?php
	if (isset($_POST['save'])) 
{
	$user_id=$_POST['uui'];
	$user_name=$_POST['uname'];
	$user_contact=$_POST['contact'];
	$user_address=$_POST['address'];
	$user_age=$_POST['age'];
	$user_cpassword=$_POST['cpassword'];
	$password=$_POST['password'];
	$email=$_POST['email'];

	include('connection.php');
	$qry1=mysqli_query($con,"SELECT * FROM `user` WHERE `usr_id`='$user_id' AND `usr_email`='$email'");
	$num_rows1=mysqli_num_rows($qry1);
	$qry2=mysqli_query($con,"SELECT * FROM `user` WHERE `usr_email`='$email'");
	$num_rows2=mysqli_num_rows($qry2);
	if ($num_rows1==1) 
	{
		if ($password==$user_cpassword) 
		{
			
			$qry_update=mysqli_query($con,"UPDATE `user` SET `usr_name`='$user_name',`usr_address`='$user_address',`usr_contact`='$user_contact',`usr_age`='$user_age',`usr_password`='$password',`confirm_password`='$user_cpassword',`usr_email`='$email' WHERE `usr_id`='$user_id'");
			if ($qry_update) 
			{
				echo "<script>
					alert('Updated Successfully.');
				    window.location='user_profile.php';
				</script>";
			}
			else
			{
				echo "<script>
					alert('Failed');
					window.location='user_profile.php';
				</script>";
			}
	    }
		else
		{
			echo "<script>
			alert('Password MisMaching');
			window.location='user_profile.php';
			</script>";
		}
	}
	elseif ($num_rows2==1) 
	{
		echo "<script>
			alert('Email already Register');
			window.location='user_profile.php';
			</script>";
	}
	else
	{
		if ($password==$user_cpassword) 
		{
			$qry_update=mysqli_query($con,"UPDATE `user` SET `usr_name`='$user_name',`usr_address`='$user_address',`usr_contact`='$user_contact',`usr_age`='$user_age',`usr_password`='$password',`confirm_password`='$user_cpassword',`usr_email`='$email' WHERE `usr_id`='$user_id'");
			if ($qry_update) 
			{
				echo "<script>
					alert('Updated Successfully.');
				    window.location='user_profile.php';
				</script>";
			}
			else
			{
				echo "<script>
					alert('Failed');
					window.location='user_profile.php';
				</script>";
			}
	    }
		else
		{
			echo "<script>
			alert('Password MisMaching');
			window.location='user_profile.php';
			</script>";
		}
	}
}
?>
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
		<h3 style="text-align: center; color: red;font-weight: 600">EDIT PROFILE</h3>
		
			<div class="book-appointment" style="width: 70%; margin: auto;">
				<form action="#" method="post">
					<div class="left-agileits-w3layouts same">
						<div class="gaps">
							<p>NAME</p>
							<input style="display: none;" type="text" name="uui"  value=" <?php echo $row['usr_id']; ?>">
							<input type="text" name="uname" pattern="[a-z A-Z]+" title="Only Letters" value="<?php echo $row['usr_name']; ?>" required=""/>
						</div>	
						<div class="gaps">
							<p>EMAIL</p>		
							<input type="email" name="email" value="<?php echo $row['usr_email']; ?>"  required="">	
						</div>
						<div class="gaps">
							<p>CONTACT</p>
							<input type="text" name="contact" pattern="(6|7|8|9)\d{9}" title="Only Mobile number starting from either 9 or 8 or 7 or 6" value="<?php echo $row['usr_contact']; ?>"  required=""  />
						</div>	
						
						<div class="gaps">
							<p>ADDRESS</p>		
							<input type="text" name="address"  value="<?php echo $row['usr_address']; ?>" pattern="[a-z A-Z 0-9 ,.#\/]+" title="UpperCase, LowerCase, Number and Symbols like ,.#\/" required="" />
						</div>
					</div>
					<div class="right-agileinfo same">
						
						<div class="gaps">
							<p>PASSWORD</p>	
							<input type="password" name="password" value="<?php echo $row['usr_password']; ?>" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="UpperCase, LowerCase and Number" minlength="8" required="" />
						</div>
						<div class="gaps">
							<p>CONFIRM PASSWORD</p>	
							<input type="password" name="cpassword" value="<?php echo $row['confirm_password']; ?>" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="UpperCase, LowerCase and Number" minlength="8"  required="" />
						</div>
						<div class="gaps">
							<p>AGE</p>
							<input type="text" name="age" value="<?php echo $row['usr_age']; ?>" pattern="[0-9]+" title="Only Number" minlength="2" maxlength="2" required="" />
						</div>
					</div>
						<div class="clearfix"></div>
						<input type="submit" value="SAVE" name="save">
				</form>
			</div>	
	</div>
	
	<br>
	<br>

</body>
</html>