<?php

include('connection.php');
	$msg=$_GET['msg'];
	if ($msg == 'accept') 
	{
		$oid=$_GET['oid'];
		$uid=$_GET['uid'];

		$select=mysqli_query($con,"SELECT * FROM `user` where `usr_id`='$uid'");
		if($rowu=mysqli_fetch_array($select))
		{
		$varcontact=$rowu['usr_contact'];

		include('way2sms-api.php');
	    $client = new WAY2SMSClient();
	    
	    $client->login('9632120280', 'abhishekgowda');
	    $message="Your Order id: '".$oid."' and it is 'Accepted'.";
	    $client->send($varcontact,$message);

	    sleep(1);
	    $client->logout(); 
		}

		$qry=mysqli_query($con,"UPDATE `order` SET `message`='$msg' WHERE `order_id`='$oid'");
		if ($qry) 
		{
			echo "
				<script>
				window.location='view_order.php';
				</script>
		";
		}	
	}
	elseif ($msg == 'ready') 
	{
		$oid=$_GET['oid'];
		$uid=$_GET['uid'];

		$select=mysqli_query($con,"SELECT * FROM `user` where `usr_id`='$uid'");
		if($rowu=mysqli_fetch_array($select))
		{
		$varcontact=$rowu['usr_contact'];

		include('way2sms-api.php');
	    $client = new WAY2SMSClient();
	    
	    $client->login('9632120280', 'abhishekgowda');
	    $message="Your Order id: '".$oid."' and it is 'ready to pack'.";
	    $client->send($varcontact,$message);

	    sleep(1);
	    $client->logout(); 
		}

		$qry=mysqli_query($con,"UPDATE `order` SET `message`='$msg' WHERE `order_id`='$oid'");
		if ($qry) 
		{
		?>
				<script>
				window.location='view_order_detail.php?oid=<?php echo $oid; ?>';
				</script>
		<?php
		}
	}
	elseif ($msg == 'purchase') 
	{
		$oid=$_GET['oid'];
		$qry=mysqli_query($con,"UPDATE `order` SET `message`='$msg' WHERE `order_id`='$oid'");
		if ($qry) 
		{
		?>
				<script>
				window.location='view_order.php';
				</script>
		<?php
		}
	}
	else if($msg == 'cancel')
	{
		$oid=$_GET['oid'];
		$uid=$_GET['uid'];

		$select=mysqli_query($con,"SELECT * FROM `user` where `usr_id`='$uid'");
		if($rowu=mysqli_fetch_array($select))
		{
		$varcontact=$rowu['usr_contact'];

		include('way2sms-api.php');
	    $client = new WAY2SMSClient();
	    
	    $client->login('9632120280', 'abhishekgowda');
	    $message="Your Order id: '".$oid."' and it is 'Cancelled'.";
	    $client->send($varcontact,$message);

	    sleep(1);
	    $client->logout(); 
		}

		$qry=mysqli_query($con,"UPDATE `order` SET `message`='$msg' WHERE `order_id`='$oid'");
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