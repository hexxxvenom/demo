
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
?>
<div style="padding: 50px 20px">
	<?php
		$mid=$_SESSION['m_id'];   
		$select=mysqli_query($con,"SELECT * FROM `order` WHERE `m_id`='$mid' AND `message`=''");
		$num_rows=mysqli_num_rows($select);
		if ($num_rows > 0)
		{	
		
	?>
		<div class="order" style="margin: auto;box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 1.2);  background:#fff;width: 900px;">
			<h4 style="padding: 10px; font-weight: 600; text-align: center; color: red">You have <?php echo $num_rows; ?> order available</h4>
		</div>
		<div class="order" style="padding: 50px;background-color: lightgray;margin: auto;box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 1.2);width: 900px;">
		<?php
			$mid=$_SESSION['m_id'];
			$qry=mysqli_query($con,"SELECT * FROM `order` WHERE `m_id`='$mid'");
			while ($row=mysqli_fetch_array($qry)) 
			{	
				$msg=$row['message'];
				if ($msg=='') 
				{
				$uid=$row['usr_id'];
				$qry1=mysqli_query($con,"SELECT * FROM `user` WHERE `usr_id`='$uid'");
				$row1=mysqli_fetch_array($qry1);
				$name=$row1['usr_name'];
			?>
			<div class="orders" style="padding: 20px;margin: auto;box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 1.2);background:#fff;width: 700px;">
				<h5 style="float: right">Order Id:<?php echo $row['order_id']; ?></h5>
				<h5 style="color: red;font-weight: 600">NAME: <text style="color: black"><?php echo $row1['usr_name']; ?></text></h5>
				<h5 style="color: red;font-weight: 600;padding-top: 5px">PRODUCT NAME</h5>
				<?php
				$oid=$row['order_id'];
				$qry2=mysqli_query($con,"SELECT * FROM `order_details` WHERE `order_id`='$oid'");
				while ($row2=mysqli_fetch_array($qry2))
				{
			
				?>
				<p style="padding-left: 10px;color: black;font-weight: 600"><?php echo $row2['p_name']; ?><text style="padding-left: 20px;color: red">Qty:<?php echo $row2['quantity']; ?></text></p>
				<?php
				}
				?>
				<h5 style="padding-top: 10px">Date:<?php echo $row['order_date']; ?></h5>
				<form style="float: left" method="post" action="order_msg.php?msg=accept&&oid=<?php echo $oid;?>&&uid=<?php echo $uid;?>">
				<input class="btn btn-primary" type="submit" name="accept" value="ACCEPT" style="border-radius: none;width:100px;font-size: 15px">
				</form>
				<form style="float: right" method="post" action="order_msg.php?msg=cancel&&oid=<?php echo $oid;?>&&uid=<?php echo $uid;?>">
				<input class="btn btn-danger" type="submit" name="reject" value="REJECT" style="width:100px;font-size: 15px">
				</form>
			</div>
			<br>
		<?php
				}
			}
		?>
			</div>
		<?php
			}
			else
			{
		?>
			<div style="width: 400px;height: 200px;margin: auto">
				<h4 style="padding: 10px; font-weight: 600; text-align: center; color: red">NO ORDER AVAILABLE</h4>
				<img style="padding-left: 100px" src="/medical/images/no order.png" height="150" width="300">
			</div>

		<?php
			}
		?>
	
	<hr style="height: 30px">
	<?php
		$presc_q=mysqli_query($con,"SELECT * FROM `prescription` WHERE `m_id`='$mid' AND `message`=''");
		$num_rows1=mysqli_num_rows($presc_q);
		if ($num_rows1 > 0)
		{	
	?>
		<div class="order" style="margin: auto;box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 1.2);  background:#fff;width: 900px;">
			<h4 style="padding: 10px; font-weight: 600; text-align: center; color: red">You have <?php echo $num_rows1; ?> prescription available</h4>
		</div>
		<div class="order" style="padding: 50px;background-color: lightgray;margin: auto;box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 1.2);width: 900px;">
		<?php
			$presc=mysqli_query($con,"SELECT * FROM `prescription` WHERE `m_id`='$mid' AND `message`=''");
			while ($rowp=mysqli_fetch_array($presc)) {
			$uid=$rowp['usr_id'];
			$pid=$rowp['presc_id'];
		?>
			<div class="orders" style="padding: 20px;margin: auto;box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 1.2);background:#fff;width: 700px;">
				<h5 style="color: red;font-weight: 600">PATIENT NAME: <text style="color: black"><?php echo $rowp['patient_name']; ?></text></h5>
				<form style="float: right" method="post" action="prescription_msg.php?msg=cancel&&pid=<?php echo $pid;?>&&uid=<?php echo $uid;?>">
				<input class="btn btn-danger" type="submit" name="reject" value="REJECT" style="width:100px;font-size: 15px">
				</form>
				<form style="float: right;" method="post" action="prescription_msg.php?msg=accept&&pid=<?php echo $pid;?>&&uid=<?php echo $uid;?>">
				<input class="btn btn-primary" type="submit" name="accept" value="ACCEPT" style="border-radius: none;width:100px;font-size: 15px">
				</form>
				<h5 style="color: red;font-weight: 600;padding-top: 10px;">CONTACT NO.: <text style="color: black"><?php echo $rowp['contact']; ?></text></h5>
				<h5 style="color: red;font-weight: 600;padding-top: 10px;">DOCTOR NAME: <text style="color: black"><?php echo $rowp['doctor_name']; ?></text></h5>
				<h5 style="color: red;font-weight: 600;padding-top: 10px;">DATE: <text style="color: black"><?php echo $rowp['p_date']; ?></text></h5>
				<h5 style="color: red;font-weight: 600;padding-top: 10px;">PRESCRIPTION IMAGE: </h5>
				<img style="height: 300px;width: 550px;padding-left: 80px" src="prescription_image/<?php echo $rowp['presc_image']; ?>" alt="Image not available">
				
			</div>
			<br>
			<?php
				}
			?>
		</div>
		<?php
		}
		?>

	<div class="clearfix"> </div>
</div>


</body>
</html>