
<!DOCTYPE html>
<html lang="zxx">
<head>

</head>
	
<body>
<?php
	include('header.php');
?>
<!-- banner -->
		<div style="padding-top: 50px">
			<form  action="#" method="post">
			 	<?php
			 		$mid=$_GET['mid'];
		   			$qry=mysqli_query($con,"SELECT * FROM `medical_store` where `m_id`='$mid' ");	
		   			while ($row=mysqli_fetch_array($qry)) 
		   			{
		   		?>
					<div class="card8">
					
							<h3 style="color:red;padding:  20px;"><?php echo $row['m_name']; ?></h3>
					
						<div class="card9">
							<img  alt="not available" src="/Admin main/uploads/<?php echo $row['m_image']; ?>">
					    </div>
					    <div class="card10" style="padding-top: 15px">
					    	<label style="color: white">Address</label>
					    	<h4><?php echo $row['m_address']; ?></h4>
					    </div>
					    <div class="card10">
					    	<label style="color: white;">Contact</label>
					    	<h4><?php echo $row['m_contact']; ?></h4>
					    </div>
					    <div class="card10">
					    	<label style="color: white">Email</label>
					    	<h4><?php echo $row['m_email']; ?></h4>
					    </div>
					    <p>
					    	<a href="products.php?mid=<?php echo $row['m_id']; ?>"><input type="button" class="btn btn-danger" value="VIEW PRODUCT"></a>
					    	<a href="upload_prescription.php?mid=<?php echo $row['m_id']; ?>"><input type="button" class="btn btn-danger" value="UPLOAD PRESCRIPTION"></a>
					    </p>
					</div>
				<?php		
		   			}
		   		?>
			</form>
		</div>
		<br>
		<br>
</body>
</html>