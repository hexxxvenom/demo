<?php

include('connection.php');
	$msg=$_GET['msg'];
	if ($msg == 'accept') 
	{
		$pid=$_GET['pid'];
		$uid=$_GET['uid'];

		$select=mysqli_query($con,"SELECT * FROM `user` where `usr_id`='$uid'");
		if($rowu=mysqli_fetch_array($select))
		{
		$varcontact=$rowu['usr_contact'];

		include('way2sms-api.php');
	    $client = new WAY2SMSClient();
	    
	    $client->login('9632120280', 'abhishekgowda');
	    $message="Your Order id: '".$pid."' and it is 'Accepted'.";
	    $client->send($varcontact,$message);

	    sleep(1);
	    $client->logout(); 
		}

		$qry=mysqli_query($con,"UPDATE `prescription` SET `message`='$msg' WHERE `presc_id`='$pid'");
		if ($qry) 
		{
			echo "
				<script>
				window.location='view_prescription.php';
				</script>
		";
		}	
	}
	elseif ($msg == 'ready') 
	{
		$pid=$_GET['pid'];
		$uid=$_GET['uid'];

		$select=mysqli_query($con,"SELECT * FROM `user` where `usr_id`='$uid'");
		if($rowu=mysqli_fetch_array($select))
		{
		$varcontact=$rowu['usr_contact'];

		include('way2sms-api.php');
	    $client = new WAY2SMSClient();
	    
	    $client->login('9632120280', 'abhishekgowda');
	    $message="Your Order id: '".$pid."' and it is 'ready to pack'.";
	    $client->send($varcontact,$message);

	    sleep(1);
	    $client->logout(); 
		}

		$qry=mysqli_query($con,"UPDATE `prescription` SET `message`='$msg' WHERE `presc_id`='$pid'");
		if ($qry) 
		{
		?>
				<script>
				window.location='view_prescription.php';
				</script>
		<?php
		}
	}
	elseif ($msg == 'purchase') 
	{
		$pid=$_GET['pid'];
		$qry=mysqli_query($con,"UPDATE `prescription` SET `message`='$msg' WHERE `presc_id`='$pid'");
		if ($qry) 
		{
		?>
				<script>
				window.location='view_prescription.php';
				</script>
		<?php
		}
	}
	else if($msg == 'cancel')
	{
		$pid=$_GET['pid'];
		$uid=$_GET['uid'];

		$select=mysqli_query($con,"SELECT * FROM `user` where `usr_id`='$uid'");
		if($rowu=mysqli_fetch_array($select))
		{
		$varcontact=$rowu['usr_contact'];

		include('way2sms-api.php');
	    $client = new WAY2SMSClient();
	    
	    $client->login('9632120280', 'abhishekgowda');
	    $message="Your Order id: '".$pid."' and it is 'Cancelled'.";
	    $client->send($varcontact,$message);

	    sleep(1);
	    $client->logout(); 
		}

		$qry=mysqli_query($con,"UPDATE `prescription` SET `message`='$msg' WHERE `presc_id`='$pid'");
		if ($qry) 
		{
			echo "
				<script>
				window.location='m_index.php';
				</script>
		";
		}	
	}

?>