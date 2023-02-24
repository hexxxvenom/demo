
<!DOCTYPE html>
<html lang="zxx">
<head>

</head>
<body>
<?php
	include('header.php');
?>
	<div class="banner-silder">
		<div id="JiSlider" class="jislider">
			<ul>
				<li>
					<div class="w3layouts-banner-top">
						<div class="container">
							<div class="agileits-banner-info">
								<span>MedNearBy</span>
								<h3>Quality Care </h3>
								 <p  style="color: black;font-weight: 1000">We ensure nearby the Best products from medical store near to you.</p>
							</div>	
						</div>
					</div>
				</li>
				<li>
					<div class="w3layouts-banner-top w3layouts-banner-top1">
						<div class="container">
							<div class="agileits-banner-info">
								<span>MedNearBy</span>
								<h3>NearBy store </h3>
								<p style="color: black;font-weight: 1000">we ensure the nearest Medical store near to you.</p>
							</div>	
						</div>
					</div>
				</li>
				<li>
					<div class="w3layouts-banner-top w3layouts-banner-top2">
						<div class="container">
							<div class="agileits-banner-info">
							     <span>Medical store</span>
								<h3>Order Product</h3>
								 <p style="color: black;font-weight: 1000">Easy way to order product through <b style="color: red">MedNearBy</b>.</p>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
    </div>

	<div class="stats" id="stats">
	    <div class="container"> 
			<div class="inner_w3l_agile_grids">
				<div class="col-md-3 w3layouts_stats_left w3_counter_grid">
				   	<i class="fa fa-users" aria-hidden="true"></i>
				   	<?php
				   		$q=mysqli_query($con,"SELECT * from `user`");
				   		$num_rows=mysqli_num_rows($q);
				   	?>
					<p class="counter"><?php echo $num_rows; ?></p>
					<h3>People sign-in</h3>
				</div>
				<div class="col-md-3 w3layouts_stats_left w3_counter_grid1">
				    <i class="fa fa-medkit" aria-hidden="true"></i>
				    <?php
				   		$q=mysqli_query($con,"SELECT * from `medical_store`");
				   		$num_rows=mysqli_num_rows($q);
				   	?>
					<p class="counter"><?php echo $num_rows; ?></p>
					<h3>Medical Stores</h3>
				</div>
				<div class="col-md-3 w3layouts_stats_left w3_counter_grid2">
					<i class="fa fa-ambulance" aria-hidden="true"></i>
					<?php
				   		$q=mysqli_query($con,"SELECT * from `order`");
				   		$num_rows=mysqli_num_rows($q);
				   	?>
				   	<p class="counter"><?php echo $num_rows; ?></p>
					<h3>Medicince ordered</h3>
				</div>
				<div class="col-md-3 w3layouts_stats_left w3_counter_grid3">
					<i class="fa fa-eye" aria-hidden="true"></i>
				<?php
					mysqli_connect("localhost","root","") or die("No database connection");

					$find_count=mysqli_query($con,"SELECT * FROM `visitor_counter`");
					while ($row=mysqli_fetch_assoc($find_count))
					 {
						$c_counts=$row['counts'];
						$n_count=$c_counts + 1;
						$update_count=mysqli_query($con,"UPDATE `medical_db` . `visitor_counter` SET `counts`='$n_count'");
					}

				?>

					<p class="counter"><?php echo $n_count; ?></p>
					<h3>Visits</h3>
				</div>
				<div class="clearfix"></div>
			</div>
  		</div>	
	</div>
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="agile_footer_copy">
				<div class="w3agile_footer_grids">
					<div class="col-md-4 w3agile_footer_grid">
						<h3>About Us</h3>
						<p>Product Quick Looks Online .<span>Order-tracking(e.g. Search about product, description, price, availability of product)	Nearest pharmacy Location, and real-time inventory across all of sales channels.</span></p>
					</div>
					<div class="col-md-4 w3agile_footer_grid">
						<h3>Contact Info</h3>
						<ul>
							<li><i class="fa fa-map-marker" aria-hidden="true"></i>kankanady,Mangalore.</li>
							<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:info@example.com">mednearby@gmail.com</a></li>
							<li><i class="fa fa-phone" aria-hidden="true"></i>+9606868504</li>
						</ul>
					</div>
					<div class="col-md-4 w3agile_footer_grid w3agile_footer_grid1">
						<h3>Navigation</h3>
						<ul>
							
							<li><span class="fa fa-long-arrow-right" aria-hidden="true"></span><a href="about.php">About</a></li>
							<li><span class="fa fa-long-arrow-right" aria-hidden="true"></span><a href="feedback.php">Feedback Us</a></li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="w3_agileits_copy_right_social">
				<div class="col-md-6 agileits_w3layouts_copy_right">
					<p>&copy; 2018 MedNearBy. All rights reserved | Design by A2K</a></p>
				</div>
				<!-- <div class="col-md-6 w3_agile_copy_right">
					<ul class="agileits_social_list">
								<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
								<li><a href="#" class="w3_agile_rss"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
							</ul>
				</div> -->
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //footer -->
</body>
</html>