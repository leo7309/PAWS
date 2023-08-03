<?php
	session_start();
	if(!(isset($_SESSION['email'])))
  	{
   		header('Location: register.php');
  	}
	include "includes/dbconnect.php";
	

	$pet_name=$_POST['pet_name'];
	$pet_price=$_POST['pet_price'];
	$pet_description=$_POST['pet_description'];

	$filename=$_FILES['image']['name'];
	$temp_name=$_FILES['image']['tmp_name'];
	if(move_uploaded_file($temp_name, "images/".$filename))
	{
		$query="INSERT INTO `pets` (`pet_id`, `pet_name`, `pet_price`, `pet_description`, `pet_photo1`) VALUES (NULL, '$pet_name', '$pet_price', '$pet_description', '$filename')";
		if(mysqli_query($connection,$query))
		{
			header('Location: admin.php?msg=1');
		}
	}
	else
	{
		header('Location: admin.php?msg=2');
	}


?>