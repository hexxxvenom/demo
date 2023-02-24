
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
	$pid=$_GET['pid'];
	$qry=mysqli_query($con,"SELECT * FROM `prescription` WHERE `presc_id`='$pid'");
	$rows=mysqli_fetch_array($qry);
?>

<br>
<div class="order" style="padding: 50px;background-color: lightgray;margin: auto;box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 1.2);width: 900px;">
	<div class="orders" style="padding: 20px;margin: auto;box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 1.2);background:#fff;width: 700px;">
		<h5 style="color: red;font-weight: 600">PATIENT NAME: <text style="color: black"><?php echo $rows['patient_name']; ?></text></h5>
		<h5 style="color: red;font-weight: 600;padding-top: 5px;">CONTACT NO.: <text style="color: black"><?php echo $rows['contact']; ?></text></h5>
		<h5 style="color: red;font-weight: 600;padding-top: 5px;">DOCTOR NAME: <text style="color: black"><?php echo $rows['doctor_name']; ?></text></h5>
		<h5 style="color: red;font-weight: 600;padding-top: 5px;">DATE: <text style="color: black"><?php echo $rows['p_date']; ?></text></h5>
		<h5 style="color: red;font-weight: 600;padding-top: 5px;">PRESCRIPTION IMAGE: </h5>

		<img style="height: 300px;width: 550px;padding-left: 80px" src="prescription_image/<?php echo $rows['presc_image']; ?>" alt="Image not available">	
	</div>
	<?php
		$select=mysqli_query($con,"SELECT * FROM `bill` WHERE `presc_id`='$pid'");
		if (mysqli_num_rows($select)>0) 
		{
			$row=mysqli_fetch_array($select);
			$bill_id=$row['bill_id'];
	?>
		<div class="orders" style="height:50px;text-align: center;">
			<h5 style="color: red;">PRICE DETAILS</h5>
		</div>
		<div class="orders">
			<div style="height: 20px;">
				<div style="width: 300px;float: left;">
					<text style="color: black;font-weight:600">Product Name</text>
				</div>
				<div style="width: 80px;float: left;">
					<text style="padding-left:10px;color:black;font-weight:600">Qty</text>
				</div>
				<div style="width: 80px;float: left;">
					<text style="padding-left:10px;color: black;font-weight:600">Price</text>
				</div>
				<div style="width: 80px;float: left;">
					<text style="padding-left:10px;color:black;font-weight:600">Tax(%)</text>
				</div>
				<div style="width: 80px;float: left;">
					<text style="padding-left:10px;color:black;font-weight:600">Amount</text>
				</div>
			</div><hr>
			<?php
				$select1=mysqli_query($con,"SELECT * FROM `bill_details` WHERE `bill_id`='$bill_id'");
				$GLOBALS['total']='0';
				while ($row1=mysqli_fetch_array($select1)) 
				{
					$GLOBALS['total'] += $row1['p_amount'];
			?>

			<div style="height: 20px;font-size: 15px;">
				<div style="width: 300px;float: left;">
					<text style="color: black;"><?php echo $row1['p_name']; ?></text>
				</div>
				<div style="width: 80px;float: left;">
					<text style="padding-left:10px;color:black;"><?php echo $row1['p_quantity']; ?></text>
				</div>
				<div style="width: 80px;float: left;">
					<text style="padding-left:10px;color: black;"><?php echo $row1['p_price']; ?></text>
				</div>
				<div style="width: 80px;float: left;">
					<text style="padding-left:10px;color: black;"><?php echo $row1['p_tax']; ?></text>
				</div>
				<div style="width: 80px;float: left;">
					<text style="padding-left:10px;color: black;"><?php echo $row1['p_amount']; ?></text>
				</div>
			</div>
			<?php	
				}
			?>
	
			<hr>
			<div style="">
				<text style="color: black;font-weight: 600">Total:</text>
				<text style="padding-left: 505px; color: black;font-weight: 600"> <?php echo $total; ?></text>
			</div>
		</div><br>
	<?php	
		}
		else
		{
	?>
		<div class="orders" style="height:50px;text-align: center;">
			<h5 style="color: red;">Price Details Not available</h5>
		</div>
	<?php
		}
		
	?>
	
</div><br>
</body>
</html>