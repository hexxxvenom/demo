<?php
	include 'connection.php';

	if (isset($_GET['q'])) 
	{
		
		$mid=$_GET['q'];
		if ($mid == 'none') 
     	{
     		?>
     			<script type="text/javascript" style="font-size: 50px">
     				alert('Please select Medical store!');
     			</script>
     			<h3 style="padding: 50px;padding-left: 500px;font-weight: 1000">Please select Medical store!</h3>
     		<?php
     	}
     	else
     	{
     		$medical=mysqli_query($con,"select m_name from medical_store where m_id=$mid");
         	$row1=mysqli_fetch_array($medical);
			$mname=$row1['m_name'];
?>
	<div class="container">
	
	<b><text style="padding-left: 100px; color: red;size: 20px">YOUR CART</text></b>
			
    <div class="row" style="font-size: 18px">
    	<div class="col-md-1"></div>
     	<div class="col-md-10">
        <div class="panel panel-default">
          <div class="panel-heading">
          	<center><b style="font-size: 25px;"><?php echo $mname; ?></b></center> 
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-2 col-xs-2"><b>SI NO</b></div>
              <div class="col-md-2 col-xs-2"><b>Product Image</b></div>
              <div class="col-md-2 col-xs-2"><b>Product Name</b></div>
              <div class="col-md-2 col-xs-2"><b>Quantity</b></div>
              <div class="col-md-2 col-xs-2"><b>Rate</b></div>
              <div class="col-md-2 col-xs-2"><b>Price </b></div>
            </div>
            <hr>

        <?php	
         		$uid=$_SESSION['usr_id'];
         		$sql=mysqli_query($con,"SELECT * FROM `cart` WHERE `m_id`='$mid' AND `usr_id`='$uid'");		
				// $result = mysql_query($sql) or die(mysql_error());
				$n='1';
	         	$GLOBALS['total']='0';
				while ($row=mysqli_fetch_array($sql))
            	{ 
	         		
	         		$GLOBALS['total'] += $row['total'];
	    ?>
         
            <div class="row">
              <div class="col-md-2"><?php echo $n; ?></div>
              <div class="col-md-2"><img style="height: 100px;width: 100px" alt="Image not available" src='uploads/<?php echo $row['image']; ?>'></div>
              <div class="col-md-2"><?php echo $row['p_name']; ?></div>
              <div class="col-md-2"><input type='text' class='form-control' value='<?php echo $row['p_qty']; ?>' readonly></div>
              <div class="col-md-2"><input type='text' class='form-control' value='<?php echo $row['p_price']; ?>' readonly></div>
              <div class="col-md-2"><input type='text' class='form-control' value='<?php echo $row['total']; ?>' readonly></div>
            </div><hr>
        <?php
            $n++;
            }
        ?>
            <div class="row">
              <div class="col-md-8"></div>
              <div class="col-md-4">
                <b style="font-size: 20px">Total: <?php echo $total; ?></b>
              </div> 
            </div><hr> 
          </div>
          <div class="row">
              <div class="col-md-8"></div>
              <div class="col-md-4" style="padding-bottom: 20px;padding-right: 30px">
                <a style="float:right;" href="confirm_order.php?uid=<?php echo $uid; ?>&mid=<?php echo $mid; ?>&total=<?php echo $total; ?>" class="btn btn-info btn-lg">Confirm Order</a>
              </div> 
            </div> 
          </div>
          <!-- <div class="panel-footer"></div> -->
        </div>
      </div>
      <div class="col-md-1"></div>
	</div>
	<br>	

	<?php
		}
	}	
	?>
	<?php

	if (isset($_GET['search'])) 
	{
		$a_title=$_GET['search'];
		$mid=$_GET['mid'];
		$qry_search=mysqli_query($con,"SELECT * FROM `add_product` WHERE `m_id`='$mid' AND `p_name` LIKE '%".mysqli_real_escape_string($con,$a_title)."%' ");
		$result=mysqli_num_rows($qry_search);
		if ($result>=1) 
		{
			echo '<h4 style="padding-left:560px;font-weight:1000;">'.$result.' Product Found</h4></br>';
		}
		else
		{
			echo '<h4 style="padding-left:560px;font-weight:1000;">No Product Found</h4></br>';
		}
		while ($row = mysqli_fetch_array($qry_search)) 
		{	
			$proid=$row['p_id'];
			$pname=$row['p_name'];
			$pprice=$row['p_price'];
			$pimage=$row['p_image'];
			$pcate=$row['p_categery'];
	?>
		<div class="pro1">
			<div class="pro2">
				<div class="pro3">
					<img  alt="not available" src="uploads/<?php echo $row['p_image']; ?>">
			    </div>
			    <div class="pro5" >
				    <div class="pro4">
						<h5 id="di" style="color:blue;"><b><?php echo $row['p_name']; ?></b></h5>
					</div>
					<div class="pro4">
						<h6 style="color:black;">Description:<b><?php echo $row['p_description']; ?></b></h6>
					</div>
					<div class="pro4">
						<h6 style="color:black;">Company Name:<b><?php echo $row['c_name']; ?></b></h6>
					</div>
					<div class="pro4">
						<h6 style="color:black;">Price:<b><?php echo $row['p_price']; ?></b></h6>
					<?php
						if (isset($_SESSION['usr_id']))
						{
							$sessu=$_SESSION['usr_id'];
					?>
							<form method="post" action="add_cart.php?cart=session&&vuid=<?php echo $sessu;?>&&mid=<?php echo $mid;?>&&pid=<?php echo $proid;?>&&pname=<?php echo $pname;?>&&pprice=<?php echo $pprice;?>&&pimage=<?php echo $pimage;?>&&pcate=<?php echo $pcate;?>">
							<input style="float: right;color: green" class="btn btn-success" type="Submit" style="width: 20%" value="Add to Cart" >
							</form>
						<?php
						}
						else
						{
							?>
							<form method="post" action="add_cart.php?cart=not_session">
							<input style="float: right;color: green" class="btn btn-success" type="Submit" style="width: 20%" value="Add to Cart" >
							</form>
					<?php
						}
					?>
					</div>    	
				</div>
			</div>
		</div>
<?php

		}
	}

	if (isset($_GET['search1'])) 
	{

			$a_title=$_GET['search1'];
      		$qry_search=mysqli_query($con,"SELECT * FROM `medical_store` WHERE `m_pincode` LIKE '%".mysqli_real_escape_string($con,$a_title)."%' ");
			  			$result=mysqli_num_rows($qry_search);
			  			if ($result>=1) {
			  				echo '<h4 style="padding-left:540px;font-weight:1000;">'.$result.' Medical Store Found</h4></br>';
			  			}
			  			else
			  			{
			  				echo '<h4 style="padding-left:540px;font-weight:1000;">No Medical Store Found</h4></br>';
			  			}
                    	while ($row = mysqli_fetch_array($qry_search)) 
                    	{	
			  		
?>
							<div class="card4">
								<div class="card5">
									<div class="card7">
										<h4 style="color:red;padding-top: 20px"><?php echo $row['m_name']; ?></h4>
									</div>
									<div class="card6">
										<img  alt="not available" src="/Admin main/uploads/<?php echo $row['m_image']; ?>">
								    </div>
								    	<a href="medical_details.php?mid=<?php echo $row['m_id']; ?>">
										<input class="btn btn-link" type="button" style="width: 50%" name="add" value="More Info." >
										</a>
								</div>
							</div>
						<?php		
				   			}
	}
?>