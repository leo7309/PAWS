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
        if(($_SESSION['email']=="admin@paws.com"))
        {
          include "includes/header_admin.php";
        }
        else
        {
        include "includes/header_postlogin.php";
        }
   ?>
<body style="background-image: url('images/orderbg.jpg'); 
background-size: 1525px 800px;
background-attachment: fixed;!important">
  

  <div class="container ">
    <h1 class="text-center font-80px margin-bottom50;"> <b>Welcome dogophiles! You've have come to the right place!</b></h1>

    <!--All pets with 3/12 parts each-->
    <div class="row">
      <?php 
        $query="SELECT * FROM `pets`";
        $result=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($result))
        {
          echo '<div class="col-md-3">
                  <div class="pet-tab">
                    <img src="images/'.$row['pet_photo1'].'" class="img-size curve-edge">
                    <h3 class="text-center"><b>'.$row['pet_name'].'</b></h3>
                    <p class="justify"><b><i> &nbsp&nbsp&nbsp&nbsp '.$row['pet_description'].'</i></b></p>
                    <a href="pet_description.php?pet_id='.$row['pet_id'].'" class="btn btn-block btn-success"> View Details </a>
                  </div>
                </div>';
        }
      ?>
             
    </div> <!--pets dispaly Ends-->

    <div class="row">
      
      <!--Bio-Section in 10/12 parts-->
      <div class="col-md-10">
        <div class="row">

          <div class="col-md-12 bio-tab">
            <div class="row">
              <div class="col-md-4">
                <img src="images/white_logo-removebg-preview.png" class="img-size img-circle">
              </div>

              <div class="col-md-8">
                <h1 class="text-center"> <b>About Paws.com</b> </h1>
                <p>&nbsp&nbsp&nbsp&nbsp<b><i>India’s Ultimate Pure Dog Breeds Online <b>Paws</b>’s vision is to create India’s most reliable and pure breed to touch each & every Dog lovers Heart; eventually creating a life-changing experiences for buyers and sellers.<b>Paws.com</b> is India’s most relaible pure breed online Dog shopping marketplace. A Boon The trend of online shopping is becoming a household name and so are Paws.</i></b></p>  
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--List of items in 2/12 parts-->
      <div class="col-md-2">
        <h2 class="text-center"><b>Chart Menu</b></h2>
        <div class="row">
        <?php 
          $query1="SELECT * FROM `pets`";
          $result1=mysqli_query($connection,$query);
          while($row1=mysqli_fetch_assoc($result1))
          {
            echo '<div class="col-md-12">
                    <div class="row list hover-pink">
                      
                      <div class="col-md-6">
                        <a href="pet_description.php?pet_id='.$row1['pet_id'].'">
                        <img src="images/'.$row1['pet_photo1'].'" class="img-size-xs">
                        </a>
                      </div>

                      <div class="col-md-6">
                        <b>'.$row1['pet_name'].'</br><br>
                        <small>₹'.$row1['pet_price'].'</small>
                      </div>

                    </div>            
                  </div>';
          }         
        ?>
        </div>
      </div>     
    </div>

    <?php include "includes/footer.php"; ?>
   
  </div>
</body>
</html>