<?php

	if (isset($_POST['done'])) 
	{
		$oid=$_POST['oid'];
		?>
			<script>
				alert('Please Select Ready to Pack Option');
				window.location='view_order_detail.php?oid=<?php echo $oid; ?>';
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
<div style="padding: 50px 20px">
	<div class="order" style="margin: auto;box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 1.2);  background:#fff;width: 900px;">
					<h3 style="padding: 10px; font-weight: 600; text-align: center; color: red">ORDER</h3>
				</div>
		<div class="order" style="padding: 20px;background-color: lightgray;margin: auto;box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 1.2);width: 900px;">
		<?php
			$oid=$_GET['oid'];
			$select=mysqli_query($con,"SELECT * FROM `order` WHERE `order_id`='$oid'");
			$rows=mysqli_fetch_array($select);
			$uid=$rows['usr_id'];
			$msg=$rows['message'];
			if ($msg == 'accept') 
			{
		?>
		<div style="padding-left:280px;padding-bottom: 20px">
			<form style="float: left" method="post" action="order_msg.php?msg=ready&&oid=<?php echo $oid;?>&&uid=<?php echo $uid;?>">
				<input class="btn btn-primary" type="submit" name="accept" value="Ready to Pack">&nbsp;&nbsp;
			</form>
			<form  style="float: left;" method="post" action="view_order_detail.php">
				<input style="display: none;" type="text" name="oid" value="<?php echo $oid;?>">
				<input class="btn btn-primary" type="submit" name="done" value="Purchase Done">&nbsp;&nbsp;
			</form>
			<form style="" method="post" action="order_msg.php?msg=cancel&&oid=<?php echo $oid;?>&&uid=<?php echo $uid;?>">
				<input class="btn btn-danger" type="submit" name="reject" value="Cancel">
			</form>
		</div>
		<?php		
			}
			elseif ($msg == 'ready') 
			{
		?>
		<div style="padding-left:280px;padding-bottom: 20px;">
			<form  style="float: left;" method="" action="">
				<input class="btn btn-danger" style="background-color: gray" type="button" name="accept" value="Ready to Pack">&nbsp;&nbsp;
			</form>
			<form style="float: left" method="post" action="order_msg.php?msg=purchase&&oid=<?php echo $oid;?>">
				<input class="btn btn-primary" type="submit" name="accept" value="Purchae Done">&nbsp;&nbsp;
			</form>
			<form style="" method="post" action="order_msg.php?msg=cancel&&oid=<?php echo $oid;?>&&uid=<?php echo $uid;?>">
				<input class="btn btn-danger" type="submit" name="reject" value="Cancel">
			</form>
		</div>
		<?php
			}
		?>
		<?php
			$oid=$_GET['oid'];
			$qry=mysqli_query($con,"SELECT * FROM `order_details` WHERE `order_id`='$oid'");
			while ($row=mysqli_fetch_array($qry))
			{
					
		?>
			<div class="orders" style="width: 600px">
				<img src="uploads/<?php echo $row['image']; ?>" alt="Image not available" style="float: right;height: 70px;width: 90px">
				<p style="padding-left:10px;color: black;">Name: <?php echo $row['p_name']; ?></p>
				<p style="padding-left:10px;color: black;">Qty:  <?php echo $row['quantity']; ?></p>
				<p style="padding-left: 10px;color: black;">Price:<?php echo $row['price']; ?></p>
			</div>
		<?php
			}
		?>
			<br>
		</div><hr>
			<!-- </div> -->
			<div class="clearfix"> </div>
</div>


</body>
</html>