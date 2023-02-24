<?php

	if (isset($_POST['add'])) 
	{
			$file_name_temp = rand(1000,100000)."_".$_FILES['image']['name'];
			$file_name_perm = preg_replace('/[^a-zA-Z0-9_.]/', '_', $file_name_temp);

			$file_type=$_FILES['image']['type'];
			$extension = substr($file_name_perm, strpos($file_name_perm,'.')+1);

			$file_size=$_FILES['image']['size'];
			$max_size= 2097152;

			$file_loc = $_FILES['image']['tmp_name'];

			// code to check folder existense and create the new folder*********
			$folder="prescription_image/";	
			if (!file_exists($folder)) 
			{
			    mkdir($folder);
			} 
			$mid=$_POST['mid'];
			$p_name=$_POST['pname'];
			$contact=$_POST['contact'];
			$d_name=$_POST['dname'];
			
			
			include ('connection.php');
			$uid=$_SESSION['usr_id'];
			if (($extension=='jpg' || $extension=='jpeg') && ($file_type=="image/jpeg" || $file_type=="image/jpg") )
			{
				if ($file_size <= $max_size) 
				{
					if(move_uploaded_file($file_loc,$folder.$file_name_perm))
    				{	

    					$qry_insert=mysqli_query($con,"INSERT INTO `prescription`(`presc_id`, `m_id`,`usr_id`, `patient_name`,`contact`, `doctor_name`, `presc_image`) VALUES ('','$mid','$uid','$p_name','$contact','$d_name','$file_name_perm')");
						if ($qry_insert) 
						{
							?>
							<script>
								alert('Details send Successfully.');
							    window.location='medical_details.php?mid=<?php echo $mid;?>';
							</script>
							<?php
						}
						else
						{
							?>
							<script>
								alert('Failed');
								window.location='upload_prescription.php?mid=<?php echo $mid;?>';
							</script>
							<?php
						}
    				}
    				else
    				{
						?>
						<script>
							alert('canot upload the file!.');
							window.location='upload_prescription.php?mid=<?php echo $mid;?>';
						</script>
						<?php
    				}
				}
				else
				{
					?>
					<script>
						alert('file size must be less than 2 MB.');
						window.location='upload_prescription.php?mid=<?php echo $mid;?>';
					</script>
					<?php
				}
			}
			else
			{	
				?>
				<script>
					alert('file type must be JPEG/JPG.');
					window.location='upload_prescription.php?mid=<?php echo $mid;?>';
				</script>
				<?php
			}
	}
?>

<!DOCTYPE html>
<html>
<head>
<style type="text/css">
.form-control1{
	border: 1px solid #e0e0e0;
	padding:5px 18px;
	border-color: orange;G
	background: #fff;
	width: 80%;
	font-size: 0.85em;
	font-weight: 600;
	height: 40px;
	border-radius: 5px;
	font-size: 18px;
	}
.form-group{
	padding-left: 200px;
}
</style>
</head>
<body>
<?php
	include ('header.php');
	if (!isset($_SESSION['usr_id'])) 
	{	
		echo "<script>
		alert('Please LogIn.');
		window.location='user_login.php';
		</script>";
	}
?>
	<div class="card11">
	<center><h4 style="font-weight: 600;color: red">Please update the consult doctor name and prescription detail image</h4></center><br>
		<form class="form-horizontal"  method="post" enctype="multipart/form-data" >
			<div class="form-group">
				<label for="focusedinput" class="col-sm-2 control-label">PATIENT NAME</label>
				<div class="col-sm-8">
					<?php
					$mid=$_GET['mid'];
					?>
					<input style="display: none" type="text" name="mid" value="<?php echo $mid; ?>">
					<input type="text" name="pname" class="form-control1" id="focusedinput" pattern="[a-z A-Z]+" title="Only Letters" required="">
				</div>
			</div>
			<div class="form-group">
				<label for="focusedinput" class="col-sm-2 control-label">CONTACT NO.</label>
				<div class="col-sm-8">
					<input type="text" name="contact" class="form-control1" id="focusedinput" pattern="(6|7|8|9)\d{9}" title="Only Mobile number starting from either 9 or 8 or 7 or 6" required="">
				</div>
			</div>
			<div class="form-group">
				<label for="focusedinput" class="col-sm-2 control-label">DOCTOR NAME</label>
				<div class="col-sm-8">
					<input type="text" name="dname" class="form-control1" id="focusedinput" pattern="[a-z A-Z .]+" title="Allow uppercase,lowercase letter or ." required>
				</div>
			</div>
			<div class="form-group">
				<label for="focusedinput" class="col-sm-2 control-label">PRESCRIPTION IMAGE</label>
				<div class="col-sm-8">
					<input type="file" name="image" class="form-control1" id="focusedinput" accept="image/*" multiple="multiple" required>
				</div>
			</div>
			<center><input class="btn btn-danger" type="Submit" style="width: 10%;font-size: 15px" name="add" value="SEND" ></center>
		</form><br>
		<div class='alert alert-warning' style="width: 600px;margin: auto;">
            <b class='close' data-dismiss='alert' aria-label='close'>&times;</b>
            <?php
            	$mid=$_GET['mid'];
            	$qry=mysqli_query($con,"SELECT * FROM  `medical_store` WHERE `m_id`='$mid'");
            	$row=mysqli_fetch_array($qry);
            ?>
            <b>   when you click SEND button its send to '<?php echo $row['m_name']; ?>' medical store</b>
        </div>
	</div>
</body>
</html>