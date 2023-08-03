<?php
	session_start();
	if(!(isset($_SESSION['email'])))
  	{
   		header('Location: register.php');
  	}
	include "includes/dbconnect.php";
	$pet_id=$_GET['pet_id'];
	$user_id=$_SESSION['user_id'];

	$query="DELETE FROM `paws`.`cart` WHERE `pet_id` LIKE '$pet_id' AND `user_id` LIKE '$user_id'";
	if(mysqli_query($connection,$query))
	{
		header('Location: show_cart_items.php?msg=1');
	}
	else
	{
		header('Location: show_cart_items.php?msg=2');
	}
?>