<?php
	session_start();
	if(!(isset($_SESSION['email'])))
  	{
   		header('Location: register.php');
  	}
  include "includes/dbconnect.php";
?>

<!DOCTYPE html>
<html>
  <?php include "includes/css_header.php";
        include "includes/header_postlogin.php";
   ?>
<body style="background-color: #EEEEEE">
  

  <div class="container ">
        <!--All pets with 3/12 parts each-->
    <div class="row">
      <?php 
        //$pet_id=$_GET['pet_id'];
        $user_id=$_SESSION['user_id'];
        $query="SELECT * FROM `orders` c JOIN `pets` p ON c.`pet_id`=p.`pet_id` WHERE c.`user_id`=$user_id";

        //$query="SELECT * FROM `orders`as c JOIN `pets` as p ON 'c.pet_id`='p.pet_id` WHERE 'c.user_id`=$user_id";
        $result=mysqli_query($connection,$query);
        $cnt = mysqli_num_rows($result);
        if ( 0===$cnt ) {
          echo '<h1><center>No orders yet</center></h1>';
      }
        
        if(isset($_GET['msg']))  
        { 
          if ($_GET['msg']==1)
          {
            echo 'Your order has been Cancelled <br>';
          }
          elseif($_GET['msg']==2)
          {
            echo "Your order couldnot Cancelled";
          }
          else
          {
            echo "Error! Try again.";
          }
        }
        
        while($row=mysqli_fetch_assoc($result))
        {
          echo '<div class="col-md-3">
                  <div class="pet-tab">
                    <img src="images/'.$row['pet_photo1'].'" class="img-size curve-edge">
                    <h3 class="text-center"><b>'.$row['pet_name'].'</b></h3>
                    <p class="justify"><b><i> &nbsp&nbsp&nbsp&nbsp '.$row['pet_description'].'</i></b></p>
                    <a href="pet_description.php?pet_id='.$row['pet_id'].'" class="btn btn-block btn-success" >View Details </a>
                    <a href="delete_from_order.php?pet_id='.$row['pet_id'].'" class="btn btn-block btn-danger" >Cancel Order </a>                    
                  </div>
                </div>';
        }
      
?>