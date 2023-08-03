<?php
	session_start();
	if(!(isset($_SESSION['email'])))
  	{
    	header('Location: register.php');
  	}
	include "includes/dbconnect.php";

	$pet_id=$_GET['pet_id'];
	$user_id=$_SESSION['user_id'];

	$query1="SELECT * FROM `wishlist` WHERE `pet_id` LIKE '$pet_id' AND `user_id` LIKE '$user_id'";
	$result1=mysqli_query($connection,$query1);
		
	if(mysqli_num_rows($result1)==0)
	{
		$query="INSERT INTO `wishlist` (`wishlist_id`, `pet_id`, `user_id`) VALUES (NULL, '$pet_id', '$user_id')";
		if(mysqli_query($connection,$query))
		{
			header('Location: pet_description.php?pet_id='.$pet_id.'&msg=11');
		}
	}
	elseif(mysqli_num_rows($result1)==1)
	{
		header('Location: pet_description.php?pet_id='.$pet_id.'&msg=22');
	}
	else
	{
		echo "Some Error Occured";
	}
?>