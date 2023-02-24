<?php
include 'connection.php';
if (isset($_POST["checkOutDetails"])) {
	$uid=$_SESSION['usr_id'];
	$qq2=mysqli_query($con,"select * from cart where usr_id=$uid");
		if (mysqli_num_rows($qq2) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			echo '<form method="get" action="action.php">';
				$n=0;
				while ($row=mysqli_fetch_array($qq2)) {
					$n++;
					$cart_id= $row['cart_id'];
					$product_id = $row['p_id'];
					$product_image = $row['image'];
					$product_title = $row["p_name"];
					$product_price = $row["p_price"];
					
					
					$qty = $row["p_qty"];

					echo 
						'<div class="row">
								<div class="col-md-2">
									<div class="btn-group">
										<a href="#" remove_id="'.$cart_id.'" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" update_id="'.$cart_id.'" class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
								</div>
								<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
								<input type="hidden" name="" value="'.$product_id.'"/>
								
								<div class="col-md-2"><img style="height: 80px;width: 100px" alt="Image not available" src="uploads/'.$product_image.'"></div>
								<div class="col-md-2">'.$product_title.'</div>
								<div class="col-md-2"><input type="text" class="form-control qty" value="'.$qty.'" ></div>
								<div class="col-md-2"><input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly"></div>
								<div class="col-md-2"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></div>
							</div><hr>';
				}
				
				echo '<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b class="net_total" style="font-size:20px;"> </b>
							</div>
					</div><hr>';

				echo '<a href="select_cart.php"><input type="button" style="float:right;" class="btn btn-info btn-lg" value="Ready to Checkout"></a><br>
							</form>';
				
			}
	}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
		$sql = mysqli_query($con,"DELETE FROM `cart` WHERE `cart_id`='$remove_id'");
	
	if($sql){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
		exit();
	}
}

//Update Item From cart
if (isset($_POST["updateCartItem"])) 
{
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	$price=$_POST["price"];
	$total=$price*$qty;
		$sql = mysqli_query($con,"UPDATE cart SET `p_qty`='$qty',`total` ='$total' WHERE `cart_id` = '$update_id'");

	if($sql){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product quantity updated permanently</b>
				</div>";
		exit();
	}
}

?>
