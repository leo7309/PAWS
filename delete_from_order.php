<?php
	session_start();
	if(!(isset($_SESSION['email'])))
  	{
   		header('Location: register.php');
  	}
	include "includes/dbconnect.php";
	$product_id=$_GET['product_id'];
	$user_id=$_SESSION['user_id'];

	$query="DELETE FROM `paws`.`orders` WHERE `product_id` LIKE '$product_id' AND `user_id` LIKE '$user_id'";
	if(mysqli_query($connection,$query))
	{
		$query1="DELETE FROM `paws`.`details` WHERE `product_id` LIKE '$product_id' AND `user_id` LIKE '$user_id'";
		if(mysqli_query($connection,$query1))
		{
			header('Location: show_order_items.php?msg=1');
		}
	}
	else
	{
		header('Location: show_order_items.php?msg=2');
	}
?>