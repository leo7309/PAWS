<?php
	session_start();
	if(!(isset($_SESSION['email'])))
  	{
   		header('Location: register.php');
  	}
?>
<!DOCTYPE html>
<html>
	<?php
		if(($_SESSION['email']=="admin@paws.com"))
        {
          include "includes/header_admin.php";
        }
        else
        {
        	header('Location: index.php');
        }
		include "includes/css_header.php";
		include "includes/dbconnect.php";
	?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center font-80px">Orders </h1>
			</div>
		</div>
		<div class="row">
			<?php
				$query="SELECT * FROM `orders` o JOIN `pets` p ON o.`pet_id`=p.`pet_id` JOIN `users` u ON o.`user_id`=u.`user_id` JOIN `shipping_details` d ON o.`user_id`=d.`user_id`";
				$result=mysqli_query($connection,$query);
				while($row=mysqli_fetch_assoc($result))
				{
				echo'<div class="col-md-3">
						<div class="pet-tab">
							<p><b>Order ID: '.$row['order_id'].'<br>
							Pet ID: '.$row['pet_id'].'<br>
							Pet Name: '.$row['pet_name'].'<br>
							User ID: '.$row['user_id'].'<br>
							User Name: '.$row['fname'].'<br> 
							Phone Number: '.$row['phone_number'].'<br>
							Address: '.$row['address'].'<br>
							</b></p>
							
						</div>
					</div>';
				}
			?>
		</div>		
	</div>
</body>
</html>