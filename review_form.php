<?php
	session_start();
	if(!(isset($_SESSION['email'])))
  	{
   		header('Location: register.php');
  	}
	include "includes/dbconnect.php";
	$user_id=$_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
	<?php include "includes/css_header.php" ?>
	<body style="background-color: #EEEEEE;">
		<?php include "includes/header_postlogin.php" ?>
		
		<div class="row">
			<div class="col-md-6">
				<h1 class="text-center"> <b>Thank You for Shopping at Paws.com. Please add a review of your experience while visiting us.</b> </h1>
			</div>
			<div class="col-md-6">

				<form class="text-center" action="add_to_review.php" method="POST">
					<input type="hidden" name="pet_id" value=" <?php echo $pet_id; ?>">
					<label><h3><b>Review</b></h3></label>
					<input type="text" name="review_text" class="form-control" placeholder="Add the riview here..."><br>
					<input type="submit" value="Submit Review" class="btn btn-danger btn-lg">
				</form>
			</div>
		</div>
	</body>
</html>