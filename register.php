<!DOCTYPE html>
<html>

	<?php include "includes/css_header.php" ?>
	
    <body style="background-image:url('images/rot.jpg');
	background-repeat: no-repeat, no repeat;
	background-size: 1550px 800px, 500px 500px;
	baground-position: center, top;">

        
    <?php include "includes/header_prelogin.php" ?>

    	<div id="main_body" class="container">
            <?php 
                if(isset($_GET['msg']))
                {
                    if($_GET['msg']=='2')
                    {
                        echo "<h3 class='text-center text-white margin-top50'><i>User Email Already Taken!</i></h3>";
                    }
                }
             ?>
    		<div class="row">
    			<div class="col-md-8 margin-top50">
    				<h1 class="text-white font-80px text-center"><b>Get the best Pure Dog breeds at the cheapest price from Paws</b></h1>    				
    			</div>

    			<div class="col-md-4 margin-top50">
    				<h2 class="text-white text-center"> <b>Create an Account here</b> </h2>
    				<form class="form" action="register_user.php" method="POST">
                        <label class="text-white">First Name:</label>
                        <input type="Name" class="form-control" placeholder="Enter your Name" name="user_fname" pattern="^[A-Za-z]+$" required><br>
						<label class="text-white">Last Name:</label>
                        <input type="Name" class="form-control" placeholder="Enter your Name" name="user_lname" pattern="^[A-Za-z]+$" required><br>
    					<label class="text-white">Email:</label>
    					<input type="email" class="form-control" placeholder="Enter your Email" name="user_email" required><br>
    					<label class="text-white">Password:</label>
    					<input type="password" class="form-control" placeholder="Password" name="user_password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required><br><br>
						
    					<input type="submit" class="btn btn-danger btn-lg btn-block" value="Register" name=""><br>
    				</form>
    				<p class="text-white"><i>Already a member? <a href="index.php">Login Here</a></i></p>
    			</div>
    		</div>
    	</div>
	</body>
</html>