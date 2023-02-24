<?php
	
	$uid=$_GET['uid'];
	$mid=$_GET['mid'];
	$gtotal=$_GET['total'];
	include('connection.php');
	$q=mysqli_query($con,"SELECT * from cart where `m_id`='$mid' AND `usr_id`='$uid'");
	$insert_order=mysqli_query($con,"INSERT INTO `order`(`order_id`, `usr_id`,`m_id`,`g_total`) VALUES ('','$uid','$mid','$gtotal')");

	$q1=mysqli_query($con,"SELECT `order_id` from `order` ORDER BY order_id DESC");
	$row_order_id=mysqli_fetch_array($q1);
	$order_id=$row_order_id['order_id'];
	while ($row=mysqli_fetch_array($q)) 
	{
		$pid=$row['p_id'];
		$pname=$row['p_name'];
		$qty=$row['p_qty'];
		$price=$row['p_price'];
		$total=$row['total'];
		$image=$row['image'];
		$inser_details=mysqli_query($con,"INSERT INTO `order_details`(`od_id`, `order_id`, `product_id`,`p_name`, `quantity`, `price`,`total`,`image`) VALUES ('','$order_id','$pid','$pname','$qty','$price','$total','$image')");
		
	}
	
	//delete product from cart
	$delete=mysqli_query($con,"DELETE FROM cart where m_id=$mid and usr_id=$uid");

	if ($delete) 
	{
		echo "
		<script>
		alert('Order Successfully');
		window.location='cart_display.php';
		</script>";
	}
	
?>