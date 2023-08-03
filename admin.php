<!DOCTYPE html>
<html>
	<?php 
	session_start();
	if(!(isset($_SESSION['email'])))
  	{
   		header('Location: register.php');
  	}
	include "includes/css_header.php"; ?>
<body style="background-image:url('images/Admin bg original.jpg');
	background-repeat: no-repeat;
	background-size: 1550px 1000px;">>
	<?php include "includes/header_admin.php"; ?>
	<div class="row margin-left20">

		<div class="col-md-12 text-center">
			<h1 class="font-80px">Admin Panel</h1>
		</div>
		<br><br><br>
		<a href="admin_orders.php" class="btn btn-lg btn-success margin-left20"> View all Orders</a>
		<br><br><br>
		<?php 
		if(isset($_GET['msg']))
        { 
          if ($_GET['msg']==1)
          {
            echo "<h3 class='text-center text-red'><i>pet has been added</i></h3><br>";
          }
          elseif ($_GET['msg']==2)
          {
            echo "<h3 class='text-center text-red'><i>pet couldnot added</i></h3><br>";
          }
          elseif ($_GET['msg']==11)
          {
            echo "<h3 class='text-center text-red'><i>pet has been Deleted<i></h3><br>";
          }
          elseif ($_GET['msg']==22)
          {
            echo "<h3 class='text-center text-red'><i>pet couldnot be Deleted</i></h3><br>";
          }
        } 
        ?>
		<div class="row">
			<div class="col-md-6">
				<h3 class="font-80px">Add a pet To Database</h3>
				<h3 style="color: white;">


			</div>
			<div class="col-md-6">
				<form action="upload_product.php" method="POST" enctype="multipart/form-data">
					<label>Pet Name</label>
					<input type="text" name="pet_name" class="form-control"><br>
					<label>Pet Price</label>
					<input type="number" name="pet_price" class="form-control"><br>
					<label>Pet Description</label>
					<textarea name="pet_description" class="form-control"></textarea><br>
					<label>Upload Image1</label>
					<input type="file" name="image" class="form-control"><br>
					<input type="submit" value="Add pet" class="btn btn-success btn-lg">
				</form>
			</div>
		</div>
		<br><br><br>
		<div class="row">
			<div class="col-md-6">
				<h3 class="font-80px">Delete a pet From Database</h3>
			</div>
			<div class="col-md-6">
				<form action="delete_product.php" method="POST">
					<label>pet Name</label>
					<input type="name" name="pet_name" class="form-control"><br>
					<input type="submit" value="Delete pet" class="btn btn-success btn-lg">
				</form>
			</div>
		</div>
		
	</div>
</body>
</html>