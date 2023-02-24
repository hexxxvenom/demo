<?php
include ('connection.php');

$cart=$_GET['cart'];
if ($cart == 'not_session')
 {
	echo "
	<script>
	alert('please login-in');
	window.location='user_login.php';
	</script>";
 }
 else if($cart == 'session')
 {
 	$uid=$_GET['vuid'];
 	$pid=$_GET['pid'];
 	$mid=$_GET['mid'];
 	$pname=$_GET['pname'];
 	$pcate=$_GET['pcate'];
 	$pprice=$_GET['pprice'];
 	$qty='1';
 	$pimage=$_GET['pimage'];

 	$qry=mysqli_query($con,"SELECT * FROM `cart` WHERE `p_id`='$pid' AND `usr_id`='$uid'");

 	if (mysqli_num_rows($qry)>0) 
 	{
 		?>
			<script type="text/javascript">
			alert('Product already exist.');
			window.location='products.php?mid=<?php echo $mid;?>';
			</script>
 		<?php
 	}
 	else
 	{
 		$q=mysqli_query($con,"INSERT INTO `cart`(`cart_id`, `p_id`, `usr_id`, `m_id`, `p_name`, `p_categery`, `p_price`, `p_qty`, `total`, `image`) VALUES ('','$pid','$uid','$mid','$pname','$pcate','$pprice','$qty','$pprice','$pimage')");
	 	if ($q) 
	 	{
	 		?>
	 		<script type="text/javascript">
	 			alert('Product added to the cart');
	 			window.location='products.php?mid=<?php echo $mid;?>';
	 		</script>
	 		<?php
	 	}
	 }
 }
?>