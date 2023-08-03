<?php
	session_start();
	if(!(isset($_SESSION['email'])))
  	{
    	header('Location: register.php');
  	}
	include "includes/dbconnect.php";
	
	$pet_id=$_GET['pet_id'];
	$user_id=$_SESSION['user_id'];

	$delete="DELETE FROM `wishlist` WHERE `wishlist`.`pet_id` LIKE '$pet_id' AND `wishlist`.`user_id` LIKE '$user_id'";
			mysqli_query($connection,$delete);

	$query1="SELECT * FROM `cart` WHERE `pet_id` LIKE '$pet_id' AND `user_id` LIKE '$user_id'";
	$result1=mysqli_query($connection,$query1);
		
	if(mysqli_num_rows($result1)==0)
	{
		$query="INSERT INTO `cart` (`cart_id`, `pet_id`, `user_id`) VALUES (NULL, '$pet_id', '$user_id')";
		if(mysqli_query($connection,$query))
		{
			header('Location: pet_description.php?pet_id='.$pet_id.'&msg=1');
		}
		else
		{
			echo "error!";
		}
	}
	elseif(mysqli_num_rows($result1)==1)
	{
		header('Location: pet_description.php?pet_id='.$pet_id.'&msg=2');
	}
	else
	{
		echo "Some Error Occured";
	}
	
?>