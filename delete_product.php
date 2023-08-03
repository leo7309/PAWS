<?php
	session_start();
	if(!(isset($_SESSION['email'])))
  	{
   		header('Location: register.php');
  	}
	include "includes/dbconnect.php";
	$pet_id=$_POST['pet_id'];
	$pet_name=$_POST['pet_name'];

	$query="DELETE FROM `paws`.`pets` WHERE `pet_name` LIKE '$pet_name'";
	if (mysqli_query($connection,$query))
	{
		header('Location: admin.php?msg=11');
	}
	else
	{
		header('Location: admin.php?msg=22');
	}
?>