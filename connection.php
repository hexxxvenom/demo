<?php 
	$host="localhost";
	$usr="abhi";
	$pass="";
	$db="medical_db";
	session_start();
	$con=mysqli_connect('localhost','abhi','','medical_db');
	
	if (!mysqli_connect($host,$usr,$pass) || !mysqli_select_db($con,$db)) 
	{
		die(mysqli_error());
	}

 ?>