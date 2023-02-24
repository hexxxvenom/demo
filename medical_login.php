
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
    $m_email=$_POST['email'];
    $password=$_POST['password'];
    $qry_login=mysqli_query($con,"SELECT * FROM `medical_store` WHERE `m_email`='$m_email' AND `m_password`='$password'");
    $row=mysqli_fetch_array($qry_login);
    $num_rows=mysqli_num_rows($qry_login);	
	if ($num_rows==1) 
	{
		$_SESSION['m_id']='set';
		$_SESSION['m_id']=$row['m_id'];
		$log_user=$row['m_name'];
		echo "<script>
					alert('welcome ".$log_user.".');
					window.location='m_index.php';
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
	
	<div class="banner-bottom" id="about">
		<div class='alert alert-warning' style="width: 600px;margin: auto;">
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <b style="color: red"> <a class="btn btn-primary"><span class="fa fa-sign-in"></span></a> Log In Available only for the Medical Stores</b>
        </div>
		<div class="container" style="width: none;" >
			<h2 class="w3_heade_tittle_agile">LOGIN</h2>
			<div class="book-appointment">
				<form  method="post">
					<div class="gaps">
						<p>EMAIL</p>	
						<input type="email" name="email"  required="">	
					</div>
					<div class="gaps">
						<p>PASSWORD</p>	
						<input type="password" name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="UpperCase, LowerCase and Number" minlength="8" maxlength="10"  required="" />
					</div>
					<div class="clearfix"></div>
					<input type="submit" value="LOGIN" name="login">
				</form>
			</div>
		</div>
	</div>

</body>
</html>
