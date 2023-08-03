<html>
	<?php 
	session_start();
	if(!(isset($_SESSION['email'])))
  	{
   		header('Location: register.php');
  	}
  		include "includes/css_header.php";
		include "includes/dbconnect.php";
	?>
	<body style="background-color: #EEEEEE;">
		<?php include "includes/header_postlogin.php"; 				
      	$pet_id=$_GET['pet_id'];
      	$query="SELECT * FROM `pets` WHERE `pet_id` LIKE '$pet_id'";
      	$results=mysqli_query($connection,$query);
      	$row=mysqli_fetch_assoc($results);
      	
      	if(isset($_GET['msg']))
	    {	
	    	if ($_GET['msg']==1)
		    {
		    echo "<h4 class='text-center text-red'><i>Added to cart</i></h4><br>";
		    }
		    elseif($_GET['msg']==2)
		     {
		     	echo "<h4 class='text-center text-red'><i>You have Already added this to cart</i></h4><br>";
		     }
		   	elseif($_GET['msg']==11)
		   	{
				echo "<h4 class='text-center text-red'><i>Added to Wishlist</i></h4><br>";
		  	}
		    elseif($_GET['msg']==22)
		    {
		    	echo "<h4 class='text-center text-red'><i>You have Already added this to Wishlist</i></h4><br>";
		    }
		    else
		    {
		    	echo "<h4 class='text-center text-red'><i>Some error occured!</i></h4>";
		    }
		}
				echo '<div class="container">
			        	<div class="row padding30">  
			          		<div class="col-md-6">
			                	<div class="pet-tab">
				           	  		<img src="images/'.$row['pet_photo1'].'" class="img-size-lg">
				            	</div>
					    	</div>
				      	   	<div class="col-md-6">
				      	   		<div class="pet-tab">
					                <h1 class="text-center"> '.$row['pet_name'].'</h1>
					                <p> &nbsp&nbsp&nbsp&nbsp '.$row['pet_description'].'<br>
					                <br> <b>&nbsp&nbsp&nbsp&nbspPrice: ₹'.$row['pet_price'].'</b><br><br></p> 
					                <a href="add_to_cart.php?pet_id='.$pet_id.'" class="btn btn-lg btn-danger"> Add to Cart </a>
					                <a href="add_to_wishlist.php?pet_id='.$pet_id.'" class="btn btn-lg btn-danger"> Add to Wishlist </a>
				                </div>
				           	</div>
				        </div>
				    </div>';				
      	?>
      	<div class="row">
      		<div class="col-md-12">
      			<h1 class="text-center"> TOP REVIEWS</h1>
      		</div>
      	</div>
      	<div class="row">
      		
      			<?php
      				$query1="SELECT * FROM `reviews` r JOIN `users` u ON r.`user_id`=u.`user_id` WHERE r.`pet_id` LIKE '$pet_id'";
      				$result1=(mysqli_query($connection,$query1));
      				while($row1=mysqli_fetch_assoc($result1))
      				{
      					echo '<div class="col-md-6">
      							<div class="pet-tab margin-left20"> 
      								<h4><b>'.$row1['review_heading'].'</b><br>
      								<small>By: '.$row1['fname'].'</small> <br><br>
      								'.$row1['review_text'].' </h4>
      							</div>
      						  </div>';
      				}
      			?>
      		
      	</div>	
	</body>
</html>