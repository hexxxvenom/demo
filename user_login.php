

<!DOCTYPE html>
<html lang="zxx">
<head>

</head>
<body>
<?php
	include ('header.php');
?>
<?php
if (isset($_POST['login'])) 
{	
    $user_email=$_POST['email'];
    $password=$_POST['password'];
    $qry_login=mysqli_query($con,"SELECT * FROM `user` WHERE `usr_email`='$user_email' AND `usr_password`='$password'");
    $row=mysqli_fetch_array($qry_login);
    $num_rows=mysqli_num_rows($qry_login);	
	if ($num_rows==1) 
	{
		$_SESSION['usr_id']=$row['usr_id'];
		$log_user=$row['usr_name'];
		echo "<script>
					alert('welcome ".$log_user." .');
					window.location='index.php';
				</script>";
	}
	else
	{
		echo "<script>
				alert('Invalid Username/passsword.');	
			</script>";
	}
}
?>
	<div class="services-breadcrumb">
		<div class="container" >
			<ul>
				<li><a href="registration.php">REGISTER</a><i>|</i></li>
				<li>LOGIN</li>
			</ul>
		</div>
	</div>
	<div class="banner-bottom" id="about">
		<div class="container" style="width: none;" >
			<h2 class="w3_heade_tittle_agile">LOGIN</h2>
			<div class="book-appointment">
				<form action="#" method="post">
				
				<div class="gaps">
					<p>EMAIL</p>	
		
						<input type="email" name="email" placeholder="" required="">	
				</div>
				
				<div class="gaps">
					<p>PASSWORD</p>	
						<input type="password" name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="UpperCase, LowerCase and Number" minlength="8" required="" />
				</div>
				
				
				<div class="clearfix"></div>
							  <input type="submit" value="LOGIN" name="login">
				</form>
			</div>
		</div>
	</div>

</body>
</html>