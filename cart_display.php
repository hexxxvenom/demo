
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

<div class="cart">

	<h3 style="padding-top: 50px; margin: auto 600px; color: red;width: 300px"><b>SHOPPING CART</b></h3>
	
	<?php 
		$uid=$_SESSION['usr_id'];
		$qry=mysqli_query($con,"SELECT * FROM `cart` WHERE `usr_id`='$uid' ");
        $row=mysqli_fetch_array($qry);
	    $num_rows=mysqli_num_rows($qry);	
		if ($num_rows==0) 
		{
	?>	
	<div style="margin: auto 290px; width: 800px;text-align: center;">
		<img src="images/cart1.jpg" style="height: 200px;width: 200px;padding: 20px">
		<p style="font-size: 20px;color: red">NO ITEMS IN YOUR CART</p><br>
		<P style="font-size: 20px;color: red;font-family: 'Times New Roman',Times,serif;">Add items you want to shop</P><br>
		<a href="medical_s.php">
		<input style="background-color: red;color: white;
		border-style: none;width: 200px;height: 50px;" 
		type="button" name="" value="START SHOPPING"></a>
	</div>
	<?php
		}
		else
		{
	?>
	<div class="container">
	<b><text style="padding-left: 100px; color: red;size: 20px">YOUR CART</text></b>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10" id="cart_msg">
        <!--Cart Message--> 
      </div>
      <div class="col-md-1"></div>
    </div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="panel panel-default">
          
          <div class="panel-heading"><center><h3>Cart Checkout</h3></center>
            
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-2 col-xs-2"><b>Action</b></div>
              <div class="col-md-2 col-xs-2"><b>Product Image</b></div>
              <div class="col-md-2 col-xs-2"><b>Product Name</b></div>
              <div class="col-md-2 col-xs-2"><b>Quantity</b></div>
              <div class="col-md-2 col-xs-2"><b>Rate</b></div>
              <div class="col-md-2 col-xs-2"><b>Price </b></div>
            </div>
            <hr>
            
            <div id="cart_checkout"></div>
            <!--<div class="row">
              <div class="col-md-2">
                <div class="btn-group">
                  <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                  <a href="" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
                </div>
              </div>
              <div class="col-md-2"><img src='product_images/imges.jpg'></div>
              <div class="col-md-2">Product Name</div>
              <div class="col-md-2"><input type='text' class='form-control' value='1' ></div>
              <div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
              <div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
            </div> --><br><hr><div class='alert alert-warning'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <b> <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a> Upadte the cart before leaving this page by clicking Update button</b>
        </div>
            <!--<div class="row">
              <div class="col-md-8"></div>
              <div class="col-md-4">
                <b>Total $500000</b>
              </div> -->
            </div> 
          </div>
          <!-- <div class="panel-footer"></div> -->
        </div>
      </div>
      <div class="col-md-1"></div>


</div>
</div
	<?php
		}
	?>
</body>
</html>