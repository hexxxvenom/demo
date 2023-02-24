
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
	<div style="padding: 50px;font-family: 'Times New Roman',Times,serif;" >
		<div class="order">
			<h3 style="padding: 10px;text-align: center; font-weight: 600; color: red">ORDER DETAILS</h3>
		</div>
		<div class="order" style="padding: 50px;background-color: lightgray">
		<?php
			$oid=$_GET['oid'];
			$q=mysqli_query($con,"SELECT * FROM order_details WHERE order_id=$oid");
			while ($row=mysqli_fetch_array($q)) 
			{
				
		?>
			<div class="orders" style="height: 150px;">
				<div style="height: 80px">
				<img alt="Image not available" src="uploads/<?php echo $row['image']; ?>" style="float: right;height: 80px;width: 100px">
				<text style="padding-left:10px;color: black;font-weight:600"><?php echo $row['p_name']; ?></text>
				</div>
				<div style="height: 40px;padding-top: 5px;">
					<text style="color: black">Price:<?php echo $row['price']; ?></text>
					<label style="float:right;text-align: center; border-style: groove;width: 100px; border-radius: 10px;">Qty:<?php echo $row['quantity'];?></label>
				</div>
			</div>
		<?php
			}
		?>
			<br>
			<div class="orders" style="height:50px;text-align: center;">
				<h5 style="color: red;">PRICE DETAILS</h5>
			</div>
			<div class="orders">
				<div style="height: 20px;">
					<div style="width: 400px;float: left;">
						<text style="color: black;font-weight:600">Product Name</text>
					</div>
					<div style="width: 80px;float: left;">
						<text style="padding-left:10px;color:black;font-weight:600">Qty</text>
					</div>
					<div style="width: 80px;float: left;">
						<text style="padding-left:70px;color: black;font-weight:600">Price</text>
					</div>
				</div><hr>
				<?php
					$oid=$_GET['oid'];
					$q3=mysqli_query($con,"SELECT * FROM order_details WHERE order_id=$oid");
					while ($row3=mysqli_fetch_array($q3)) 
					{
							
				?>
				<div style="height: 20px;font-size: 15px;">
					<div style="width: 400px;float: left;">
						<text style="color: black;"><?php echo $row3['p_name']; ?></text>
					</div>
					<div style="width: 80px;float: left;">
						<text style="padding-left:10px;color:black;"><?php echo $row3['quantity']; ?></text>
					</div>
					<div style="width: 80px;float: left;">
						<text style="padding-left:70px;color: black;"><?php echo $row3['total']; ?></text>
					</div>
				</div>
				<?php
					}
				?>
				<hr>
				<div style="">
					<text style="color: black;font-weight: 600">Total:</text>
				<?php
					$q5=mysqli_query($con,"SELECT * from `order` where `order_id`='$oid'");
					$row5=mysqli_fetch_array($q5);
				?>
					<text style="padding-left: 505px; color: black;font-weight: 600"><?php echo $row5['g_total']; ?></text>
				</div>
			</div><br>
			
		</div>	
	</div>
	
	<br>
</body>
</html>