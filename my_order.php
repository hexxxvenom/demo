
<!DOCTYPE html>
<html>
<head>

</head>

<body>
<?php
	include('header.php');
	if (!isset($_SESSION['usr_id'])) 
	{
	header('Location:user_login.php');
	}
?>

	<div style="padding-top: 50px;font-family: 'Times New Roman',Times,serif;" >
		<div class="order">
			<div class="services-breadcrumb">
			<ul>
				<li>ORDER<i>|</i></li>
				<li><a href="my_prescription_order.php">PRESCRIPTION ORDER</a></li>
			</ul>
		</div>
		</div>
		<div class="order" style="padding: 50px;background-color: lightgray">
		<?php
			$uid=$_SESSION['usr_id'];
			$qry=mysqli_query($con,"SELECT * FROM `order` where `usr_id`='$uid'");
			if ($num_rows=mysqli_num_rows($qry) == 0)
			{
				?>
				<div class="orders" style="text-align: center;">
					<h4 style="color: red">No Order Available</h4>
				</div>
				<?php
			}
			else
			{
		?>
		<?php
			$uid=$_SESSION['usr_id'];
			$select=mysqli_query($con,"SELECT * from `order` where `usr_id`='$uid'");
			while($row=mysqli_fetch_array($select))
			{   
				$msg=$row['message'];
				$mid=$row['m_id'];
				$select1=mysqli_query($con,"SELECT * FROM medical_store where m_id=$mid");
				$row1=mysqli_fetch_array($select1);
		?>
			<div class="orders" >
				<h5 style="float: right">Order Id:<?php echo $row['order_id']; ?></h5>
				<h4 style="color: red"><?php echo $row1['m_name']; ?></h4>
				<h5 style="padding-top: 10px">Date:<?php echo $row['order_date']; ?></h5>
			</div>
			<div class="orders" style="padding: 15px">
		<?php
			if ($msg == 'accept') 
			{
		?>
			<h4 style="color: red;font-weight: 600">Order Accepted</h4>
		<?php
			}
			elseif ($msg == 'ready') 
			{
		?>
			<h4 style="color: red;font-weight: 600">Ready to Pack</h4>
		<?php
			}
			elseif ($msg == 'purchase') 
			{
		?>
			<h4 style="color: red;font-weight: 600">Purchase Done</h4>
		<?php
			}
			elseif ($msg == 'cancel') 
			{
		?>
			<h4 style="color: red;font-weight: 600">Order Cancel</h4>
		<?php
			}
			elseif ($msg == '') 
			{
		?>
			<h4 style="color: red;font-weight: 600">Processing</h4>
		<?php
			}
		?>
				<a href="order_details.php?oid=<?php echo $row['order_id']; ?>" style="float: right"><input type="submit" name="" value="View Details"></a>
			</div>
			<br>
		<?php
			}
			}
		?>	
		</div>	
	</div>
	
	<br>
</body>
</html>