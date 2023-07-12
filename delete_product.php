<?php
	session_start();
	if(!(isset($_SESSION['email'])))
  	{
   		header('Location: register.php');
  	}
	include "includes/dbconnect.php";
	$product_id=$_POST['product_id'];

	$query="DELETE FROM `paws`.`products` WHERE `product_name` LIKE '$product_name'";
	if (mysqli_query($connection,$query))
	{
		header('Location: admin.php?msg=11');
	}
	else
	{
		header('Location: admin.php?msg=22');
	}
?>