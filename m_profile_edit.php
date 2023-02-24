<?php
if (isset($_POST['save'])) 
{
	$m_id=$_POST['mid'];
	$m_contact=$_POST['mcontact'];
	$m_password=$_POST['mpassword'];
	$m_email=$_POST['memail'];

	include('connection.php');
	$qry1=mysqli_query($con,"SELECT * FROM `medical_store` WHERE `m_id`='$m_id' AND `m_email`='$m_email'");
	$num_rows1=mysqli_num_rows($qry1);
	$qry2=mysqli_query($con,"SELECT * FROM `medical_store` WHERE `m_email`='$m_email'");
	$num_rows2=mysqli_num_rows($qry2);

	if ($num_rows1==1) 
	{
		$qry_update=mysqli_query($con,"UPDATE `medical_store` SET `m_contact`='$m_contact',`m_password`='$m_password',`m_email`='$m_email' WHERE `m_id`='$m_id'");
		if ($qry_update) 
		{
			echo "<script>
				alert('Updated Successfully.');
			    window.location='m_profile.php';
			</script>";
		}
		else
		{
			echo "<script>
				alert('Failed');
				window.location='m_profile.php';
			</script>";
		}
	}
	elseif ($num_rows2==1) 
	{
		echo "<script>
			alert('Email already Register');
			window.location='m_profile.php';
			</script>";
	}
	else
	{
		$qry_update=mysqli_query($con,"UPDATE `medical_store` SET `m_contact`='$m_contact',`m_password`='$m_password',`m_email`='$m_email' WHERE `m_id`='$m_id'");
		if ($qry_update) 
		{
			echo "<script>
				alert('Updated Successfully.');
			    window.location='m_profile.php';
			</script>";
		}
		else
		{
			echo "<script>
				alert('Failed');
				window.location='m_profile.php';
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
		<h3 style="text-align: center; color: red;font-weight: 600"></h3>
		
			<div class="book-appointment" style="width: 55%; margin: auto;">
				<form action="#" method="post">
					<div style="width: 600px">
						<div class="gaps">
							<p>EMAIL</p>
							<input style="display: none;" type="text" name="mid"  value=" <?php echo $row['m_id']; ?>">
							<input type="email" name="memail" value="<?php echo $row['m_email']; ?>"  required="">	
						</div>
						<div class="gaps">
							<p>CONTACT</p>
							<input type="text" name="mcontact" pattern="(6|7|8|9)\d{9}" title="Only Mobile number starting from either 9 or 8 or 7 or 6" value="<?php echo $row['m_contact']; ?>"  required=""  />
						</div>	
						<div class="gaps">
							<p>PASSWORD</p>	
							<input type="password" name="mpassword" value="<?php echo $row['m_password']; ?>" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="UpperCase, LowerCase and Number" minlength="10" required="" />
						</div>
					</div>
						<div class="clearfix"></div>
						<input type="submit" value="SAVE" name="save">
				</form>
			</div>	
	</div><br><br>
</body>
</html>