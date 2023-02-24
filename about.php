
<!DOCTYPE html>
<html lang="zxx">
<head>

</head>
	
<body>
<?php
	include('header.php');
?>

	<div class="banner1 jarallax">
	 <center>  <img src="images/logo.jpg" alt="" style="width: 1400px ; height: 500px" class="img-responsive" />
</center> 		<div class="container">
		</div>
	</div>

	
<!-- //banner1 -->


<!-- //banner -->

<!-- about -->
	<div class="about" id="about">
		<div class="container">
				<h2 class="w3_heade_tittle_agile">Welcome to our MedNearBy </h2>
			     <p class="sub_t_agileits">Safe And Secure Deal In Sign Of Trust</p>
			
			<p class="ab">"Centralized Pharmacy Order-Tracking And Management System” is a Web-based application which measurably helps small businesses increase revenue and profit by improving the relationships between customers, order tracking and inventory. Centralized Pharmacy Order-Tracking System is a system where all the medical stores are clubbed under one single roof to provide an online order track service about their products to reach the intended customers. Customers will search for medicines they required system will suggest the nearby medical stores. Customers can place orders by ordering their products  prescribed by the physician.<br>"MedNearBy is safe and secure deal in the sign of trust."</p>

			 <div class="about-w3lsrow"> 
				
				<div class="col-md-6 w3about-img"> 
				    <img src="images/slid3.jpg" alt=" " class="img-responsive">
				</div> 
				<div class="col-md-6 col-sm-7 w3about-img"> 
					<div class="w3about-text"> 
						<h5 class="w3l-subtitle">We Care About Your Health</h5>
						<p>
							•	Customers can place orders by the  prescription provided by the physician through MedNearBy.<br>
                            •	Customers will search for medicines  and can order  the medicines from  nearby medical stores.<br>
							•	Order-Tracking System is a system where all the medical stores are clubbed under one single roof to provide an online order track service about their products to reach the intended customers.

						</p>
						<?php
							if (!isset($_SESSION['usr_id'])) {
						?>
								<div class="read"><a href="user_login.php" class="hvr-rectangle-in">Order Medicines</a></div>
						<?php
							}
							else{
						?>
						  <div class="read"><a href="medical_s.php" class="hvr-rectangle-in">Order Medicines</a></div>
						 <?php
						 }
						 ?>
					</div>
				</div> 
				<div class="clearfix"> </div>
			</div>
		</div>
</div>
<!-- /about-bottom -->


	
<!-- services section -->

<!-- /services section -->
<!-- team -->
	<div class="team portfolio " id="team">
		<div class="container">
<h3 class="w3_heade_tittle_agile">Amazing Team</h3>
		<p class="sub_t_agileits">Meet Our MedNearBy Team..</p>
			<div class="w3layouts-grids">
					
				<div class="col-md-3 wthree_team_grid">
					<div class="wthree_team_grid1">
						<div class="hover14 column">
							<div>
								<figure><img src="images/ket.jpg" alt=" " style="width: 300px" class="img-responsive" /></figure>
							</div>
						</div>
						<div class="wthree_team_grid1_pos">
							<h4>Kethak phayade </h4>
						</div>
					</div>
					
				</div>
				<div class="col-md-3 wthree_team_grid">
					<div class="wthree_team_grid1">
						<div class="hover14 column">
							<div>
								<figure><img src="images/tc.jpg" alt=" " style="height: 340px" class="img-responsive" /></figure>
							</div>
						</div>
						<div class="wthree_team_grid1_pos">
							<h4>Abhishek Tc</h4>
						</div>
					</div>
					
				</div>
				<div class="col-md-3 wthree_team_grid">
					<div class="wthree_team_grid1">
						<div class="hover14 column">
							<div>
								<figure><img src="images/t7.jpg" alt=" " class="img-responsive" /></figure>
							</div>
						</div>
						<div class="wthree_team_grid1_pos">
							<h4>Akshay Shetty</h4>
						</div>
					</div>
					
				</div>
		
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //team -->

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
							<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:info@example.com">MNB@gmail.com</a></li>
							<li><i class="fa fa-phone" aria-hidden="true"></i>+9606868504</li>
						</ul>
					</div>
					<div class="col-md-4 w3agile_footer_grid w3agile_footer_grid1">
						<h3>Navigation</h3>
						<ul>
							
							<li><span class="fa fa-long-arrow-right" aria-hidden="true"></span><a href="medical_s.php">Medical stores</a></li>
							<li><span class="fa fa-long-arrow-right" aria-hidden="true"></span><a href="index.php">Home</a></li>
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
	</div>
		</div>
	</div>
</body>
</html>