<?php
	session_start();
	if(!(isset($_SESSION['email'])))
  	{
   		header('Location: register.php');
  	}
	include "includes/dbconnect.php";
	$pet_id=$_GET['pet_id'];
	$user_id=$_SESSION['user_id'];
	

?>
<!DOCTYPE html>
<html>
	<?php include "includes/css_header.php" ?>
	<body style="background-color: #EEEEEE;">
		<?php include "includes/header_postlogin.php" ?>
		
		<div class="row">
			<div class="col-md-6">
				<h1 class="text-center"> <b>Please enter Your Shipping details.</b> </h1><br>
				<h2 class="text-center"><b>Our Executivs will contact you after the submission of the order.</b> </h2> 
				<h3 class="text-center"><b>For more information, Contact our Helpline.</b> </h3>
				<h4 class="text-center"> <b> Thankyou for Visiting Us. Hoping to see You soon!. 
				</b></h4>
			</div>
			<div class="col-md-6">

				<form class="text-center" action="add_to_details.php" method="POST">
					<input type="hidden" name="pet_id" value=" <?php echo $pet_id; ?>">
					<label><h3><b>Address: </b></h3></label>
					<input type="text" name="address" class="form-control" placeholder="Address"><br>
					<label><h3><b>Phone Number: </b></h3></label>
					<input type="text" name="phone_number" class="form-control" placeholder="+91"><br>
					<input type="submit" value="Submit Details" class="btn btn-danger btn-lg">
				</form>
			</div>
		</div>
	</body>
</html>