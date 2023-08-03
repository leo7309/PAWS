<?php
	session_start();
	if(!(isset($_SESSION['email'])))
  	{
    	header('Location: register.php');
  	}
	include "includes/dbconnect.php";

	$pet_id=$_POST['pet_id'];
	$user_id=$_SESSION['user_id'];
	$address=$_POST['address'];
	$phone_number=$_POST['phone_number'];
	
	$query1="SELECT * FROM `shipping_details` WHERE `pet_id` LIKE '$pet_id' AND `user_id` LIKE '$user_id'";
	$result1=mysqli_query($connection,$query1);
		
	if(mysqli_num_rows($result1)==0)
	{
		$query="INSERT INTO `shipping_details` (`details_id`, `user_id`, `pet_id`, `address`, `phone_number`) VALUES (NULL, '$user_id', '$pet_id', '$address', '$phone_number');";
		if(mysqli_query($connection,$query))
		{
			header('Location: review_form.php?pet_id='.$pet_id.''); //redirect**
		}
		else
		{
			header('Location: details_form.php?pet_id='.$pet_id.'');
		}
	}
	elseif(mysqli_num_rows($result1)==1)
	{
		header('Location: review_form.php?pet_id='.$pet_id.'');
	}
	else
	{
		echo "Some Error Occured";
	}
	
?>