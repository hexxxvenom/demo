<?php
// include 'connection.php';
// session_unset('usr_id');
// header('Location:index.php');
session_start();

if (session_destroy()) 
{
	header("Location:index.php");
}
?>