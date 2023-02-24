

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
				<li>ORDER<i>|</i></li>
				<li><a href="view_prescription.php">PRESCRIPTION ORDER</a></li>
			</ul>
		</div>
	</div>

		<div class="order" style="padding: 50px;background-color: lightgray;margin: auto;box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 1.2);width: 900px;">
		<?php

			$mid=$_SESSION['m_id'];
			$qry=mysqli_query($con,"SELECT * FROM `order` WHERE `m_id`='$mid'");
			while ($row=mysqli_fetch_array($qry)) 
			{
				$msg=$row['message'];
				if ($msg == '' || $msg== 'cancel' || $msg == 'purchase') 
				{

				}
				else
				{
				$uid=$row['usr_id'];
				$qry1=mysqli_query($con,"SELECT * FROM `user` WHERE `usr_id`='$uid'");
				$row1=mysqli_fetch_array($qry1);
				$name=$row1['usr_name'];
		?>
			<div class="orders" style="padding: 20px;margin: auto;box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 1.2);background:#fff;width: 700px;">
				<h5 style="float: right">Order Id:<?php echo $row['order_id']; ?></h5>
				<h5 style="color: red">Name:<?php echo $row1['usr_name']; ?></h5>
				<h5 style="padding-top: 0px">Date:<?php echo $row['order_date']; ?></h5>
				<a href="view_order_detail.php?oid=<?php echo $row['order_id']; ?>" style="float: right;"><input type="submit" name="" value="View Details"></a>
			</div><br>
		<?php
				}
			}
		?>
		</div>	
			<!-- </div> -->
			<div class="clearfix"> </div>
	<div class="clearfix"> </div>
</div>

</body>
</html>