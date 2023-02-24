<?php

	if (isset($_POST['done'])) 
	{
		?>
			<script>
				alert('Please Select Ready to Pack Option');
				window.location='view_prescription.php';
			</script>	
		<?php
	}
?>

<!DOCTYPE html>
<html>
<head>

<body>
<?php
	include ('m_header.php');
	if (!isset($_SESSION['m_id'])) 
	{
		header('Location:medical_login.php');
	}
?>
<div style="padding: 50px 50px">
	<div class="order" style="margin: auto;box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 1.2);  background:#fff;width: 900px;">
		<div class="services-breadcrumb">
			<ul>
				<li><a href="view_order.php">ORDER<i>|</i></a></li>
				<li>PRESCRIPTION ORDER</li>
			</ul>
		</div>
	</div>

		<div class="order" style="padding: 50px;background-color: lightgray;margin: auto;box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 1.2);width: 900px;">
		<?php
			$mid=$_SESSION['m_id'];
			$select=mysqli_query($con,"SELECT * FROM `prescription` WHERE `m_id`='$mid'");
			while ($rows=mysqli_fetch_array($select)) {
			$pid=$rows['presc_id'];
			$uid=$rows['usr_id'];
			$msg=$rows['message'];
			if ($msg == 'accept') 
			{
		?>
		<div style="padding-left:220px;padding-bottom: 20px">
			<form style="float: left" method="post" action="prescription_msg.php?msg=ready&&pid=<?php echo $pid;?>&&uid=<?php echo $uid;?>">
				<input class="btn btn-primary" type="submit" name="accept" value="READY TO PACK">&nbsp;&nbsp;
			</form>
			<form  style="float: left;" method="post" action="view_prescription.php">
				<input style="display: none;" type="text" name="pid" value="<?php echo $pid;?>">
				<input class="btn btn-primary" type="submit" name="done" value="PURCHASE DONE">&nbsp;&nbsp;
			</form>
			<form style="" method="post" action="prescription_msg.php?msg=cancel&&pid=<?php echo $pid;?>&&uid=<?php echo $uid;?>">
				<input class="btn btn-danger" type="submit" name="reject" value="CANCEL ORDER">
			</form>
		</div>

			<div class="orders" style="padding: 20px;margin: auto;box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 1.2);background:#fff;width: 700px;">
				<h5 style="color: red;font-weight: 600">PATIENT NAME: <text style="color: black"><?php echo $rows['patient_name']; ?></text></h5>
				<h5 style="color: red;font-weight: 600;padding-top: 5px;">CONTACT NO.: <text style="color: black"><?php echo $rows['contact']; ?></text></h5>
				<h5 style="color: red;font-weight: 600;padding-top: 5px;">DOCTOR NAME: <text style="color: black"><?php echo $rows['doctor_name']; ?></text></h5>
				<h5 style="color: red;font-weight: 600;padding-top: 5px;">DATE: <text style="color: black"><?php echo $rows['p_date']; ?></text></h5>
				<h5 style="color: red;font-weight: 600;padding-top: 5px;">PRESCRIPTION IMAGE: </h5>

				<img style="height: 300px;width: 550px;padding-left: 80px" src="prescription_image/<?php echo $rows['presc_image']; ?>" alt="Image not available"><br><br>
				<?php
					$select_bill=mysqli_query($con,"SELECT * FROM `bill` WHERE `presc_id`='$pid'");
					if(mysqli_num_rows($select_bill)>0) 
					{
				?>
					<input class="btn btn-danger" type="submit" name="done" value="BILL ALREADY GENERATED">
				<?php
					}
					else
					{
				?>
					<a href="m_invoice.php?pid=<?php echo $pid; ?>"><input class="btn btn-primary" type="submit" name="done" value="GENERATE BILL"></a>
				<?php
					}
				?>
			</div><hr>
		<?php		
			}
			elseif ($msg == 'ready') 
			{
		?>
		<div style="padding-left:220px;padding-bottom: 20px;">
			<form  style="float: left;" method="" action="">
				<input class="btn btn-danger" style="background-color: gray" type="button" name="accept" value="READY TO PACK">&nbsp;&nbsp;
			</form>
			<form style="float: left" method="post" action="prescription_msg.php?msg=purchase&&pid=<?php echo $pid;?>">
				<input class="btn btn-primary" type="submit" name="accept" value="PURCHASE DONE">&nbsp;&nbsp;
			</form>
			<form style="" method="post" action="prescription_msg.php?msg=cancel&&pid=<?php echo $pid;?>&&uid=<?php echo $uid;?>">
				<input class="btn btn-danger" type="submit" name="reject" value="CANCEL">
			</form>
		</div>
		<div class="orders" style="padding: 20px;margin: auto;box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 1.2);background:#fff;width: 700px;">
				<h5 style="color: red;font-weight: 600">PATIENT NAME: <text style="color: black"><?php echo $rows['patient_name']; ?></text></h5>
				<h5 style="color: red;font-weight: 600;padding-top: 5px;">CONTACT NO.: <text style="color: black"><?php echo $rows['contact']; ?></text></h5>
				<h5 style="color: red;font-weight: 600;padding-top: 5px;">DOCTOR NAME: <text style="color: black"><?php echo $rows['doctor_name']; ?></text></h5>
				<h5 style="color: red;font-weight: 600;padding-top: 5px;">DATE: <text style="color: black"><?php echo $rows['p_date']; ?></text></h5>
				<h5 style="color: red;font-weight: 600;padding-top: 5px;">PRESCRIPTION IMAGE: </h5>

				<img style="height: 300px;width: 550px;padding-left: 80px" src="prescription_image/<?php echo $rows['presc_image']; ?>" alt="Image not available"><br><br>
				<?php
					$select_bill=mysqli_query($con,"SELECT * FROM `bill` WHERE `presc_id`='$pid'");
					if(mysqli_num_rows($select_bill)>0) 
					{
				?>
					<input class="btn btn-danger" type="submit" name="done" value="BILL ALREADY GENERATED">
				<?php
					}
					else
					{
				?>
					<a href="m_invoice.php?pid=<?php echo $pid; ?>"><input class="btn btn-primary" type="submit" name="done" value="GENERATE BILL"></a>
				<?php
					}
				?>
			</div><hr>
		<?php
			}
		?>

			
			<?php
			}
			?>
		</div>	
	<div class="clearfix"> </div>
</div>

</body>
</html>