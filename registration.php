<?php
if (isset($_POST['register'])) 
{
	$user_name=$_POST['uname'];
	$user_contact=$_POST['contact'];
	$user_address=$_POST['address'];
	$user_age=$_POST['age'];
	$user_cpassword=$_POST['cpassword'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];

	include 'connection.php';
	$qry_login=mysqli_query($con,"SELECT * FROM `user` WHERE `usr_email`='$email'");
        $row=mysqli_fetch_array($qry_login);
	    $num_rows=mysqli_num_rows($qry_login);	
	if ($num_rows==1) 
	{
		echo "<script>
					alert('Email already Register');
					window.location='registration.php';
				</script>";
	}
	else
	{		
		if ($password==$user_cpassword) 
		{
			$qry_insert=mysqli_query($con,"INSERT INTO `user`(`usr_id`, `usr_name`, `usr_address`, `usr_contact`, `usr_gender`, `usr_age`, `usr_password`, `confirm_password`, `usr_email`) VALUES ('','$user_name','$user_address','$user_contact','$gender','$user_age','$password','$user_cpassword','$email')");
			if ($qry_insert) 
			{
				echo "<script>
					alert('Register Successfully.');
				    window.location='index.php';
				</script>";
			}
			else
			{
				echo "<script>
					alert('Failed');
					window.location='registration.php';
				</script>";
			}
	    }
		else
		{
			echo "<script>
			alert('Password MisMaching');
			window.location='registration.php';
			</script>";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>

</head>
<body>
<?php
	include ('header.php');
?>
	<div class="services-breadcrumb">
		<div class="container">
			<ul>
				<li>REGISTER<i>|</i></li>
				<li><a href="user_login.php">LOGIN</a></li>
			</ul>
		</div>
	</div>

	<div class="banner-bottom" id="about">
		<div class="container">
			<h2 class="w3_heade_tittle_agile">REGISTER</h2>
	       
				<div class="book-appointment">
					<form action="#" method="post">
						<div class="left-agileits-w3layouts same">
							<div class="gaps">
								<p>FULL NAME</p>
								<input type="text" pattern="[a-z A-Z]+" title="Only Letters"  name="uname"  required=""/>
							</div>	
							<div class="gaps">
								<p>EMAIL</p>		
								<input type="email" name="email"  required="">	
							</div>
							<div class="gaps">
							<p>CONTACT</p>
								<input type="text" name="contact" pattern="(6|7|8|9)\d{9}" title="Only Mobile number starting from either 9 or 8 or 7 or 6"  required="" />
							</div>	
							<div class="gaps">
							<p>ADDRESS</p>		
								<input type="text" name="address" pattern="[a-z A-Z 0-9 ,.#\/()]+" title="UpperCase, LowerCase, Number and Symbols like ,.#\/()" required="" />
							</div>
						</div>
						<div class="right-agileinfo same">
							<div class="gaps">
								<p>PASSWORD</p>	
								<input type="password" name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="UpperCase, LowerCase and Number" minlength="8" required="" />
							</div>
							<div class="gaps">
								<p>CONFIRM PASSWORD</p>	
								<input type="password" name="cpassword" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="UpperCase, LowerCase and Number" minlength="8" required="" />
							</div>
							<div class="gaps">
								<p>GENDER</p>	
								<select class="option" name="gender" required="">
									<option></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
							<div class="gaps">
								<p>AGE</p>
								<input type="text" name="age" pattern="[0-9]+" title="Only Number" minlength="2" maxlength="2" required="" />
							</div>
						</div>
						<div class="clearfix"></div>
							<input type="submit" value="REGISTER" name="register">
					</form>
				</div>
		</div>
	</div>
</body>
</html>