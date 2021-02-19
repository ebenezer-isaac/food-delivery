
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FOOD CLUB</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

 
  <!-- Vendor CSS Files -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="vendor/venobox/venobox.css" rel="stylesheet">
  <link href="vendor/aos/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">



 
</head>

<body class="no-js">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <h1 class="text">FOOD CLUB</h1>
      </div>

    
       
<nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#Food">Restaurant</a></li>
          <li><a href="#footer">Contact Us</a></li>
          <li class="get-started"><a href="signin.php">Sign In</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
          <div class="container">
           
          <div class="back">
          <img class="img" src="images/imgg.png" alt=""/>
          </div>
           
          </div>

  </section><!-- End Hero -->

  <main id="main">
  <!-- ======= into ======= -->
  <section id="intro">
    <div class="intro">
    <div><img class="intro2" src="images/food.jpg" alt=""></div>
    <div class="cont">
      <p style="font-size: 30px;">You've got stuff to do.</p>
      <p style="font-size: 30px;">We've got Options.</p>
      <p2 style="font-size: 19px;">Get it delivered right to your door. Or, try</p2>
      <p2 style="font-size: 19px;">Pickup on your way home.It's mealtime on your time.</p2><br>
      <input type="button" class="order"  value="Order now">
    </div>
    </div>
  </section>
<!------Popular dishe of the day------->
<section id="Food" class="Food">
<a class="food" style="font-size: 30px;">Popular Dish of the Day </a>
<div class="cards-list">
<?php 
require_once('config.php');
$i =1;
$query="SELECT
restaurant_dishes.dish_id,
restaurant_dishes.pic,
restaurant_dishes.price,
restaurant_dishes.name,
SUM(ordered_dishes.quantity) AS freq
FROM
ordered_dishes
INNER JOIN restaurant_dishes ON ordered_dishes.dish_id = restaurant_dishes.dish_id 
INNER JOIN orders ON ordered_dishes.order_id = orders.order_id 
WHERE orders.date_time<=CONCAT(CURDATE(), ' 23:59:59') /*and orders.date_time>=CONCAT(CURDATE(), ' 00:00:00' )*/
GROUP BY
restaurant_dishes.dish_id
ORDER BY
freq desc
";
$result=mysqli_query($conn,$query) or trigger_error(mysqli_error($conn));

if($result)
  {
    while($row=mysqli_fetch_assoc($result) and $i<=8)
    {
        $dish_nam=$row['name'];
        $dish_prc=$row['price'];
        $dish_pic=$row['pic'];
        $i=$i+1;
      ?>
   
      
        
        <div class="card ">
          
          <div class="card_image">
           <img src="images/dishes/<?php echo"$dish_pic"; ?>" />
            </div>
          <div class="card_title title-white">
            <p><?php echo"$dish_nam"; ?></p>
          </div>
        </div>
        


         
          <?php
    }
  }

          ?>
           </div>
    </section><!-- End Popular Dish of the day Section -->
    <!------Popular Restaurant of the Day------->
<section id="Food" class="Food">
<a class="food" style="font-size: 30px;">Popular Restaurant of the Day</a>
<div class="cards-list">
<?php 
require_once('config.php');
$i =1;
$query="SELECT
restaurants.restaurant_id,
restaurants.name,
restaurants.rating,
count(orders.restaurant_id) AS freq
FROM
restaurants
INNER JOIN orders ON orders.restaurant_id = restaurants.restaurant_id
WHERE orders.date_time<=CONCAT(CURDATE(), ' 23:59:59')
GROUP BY
restaurants.restaurant_id
ORDER BY
freq
DESC";
$result=mysqli_query($conn,$query) or trigger_error(mysqli_error($conn));

if($result)
  {
    while($row=mysqli_fetch_assoc($result) and $i<=8)
    {
        $res_id=$row['restaurant_id'];
        $res_nam=$row['name'];
        $res_rat=$row['rating'];
        $i=$i+1;
      ?>
      
      
        
        <div class="card ">
          
          <div class="card_image">
           <img src="images/restaurants/res_<?php echo sprintf('%05d', $res_id);?>.jpg" />
            </div>
          <div class="card_title title-white">
            <p ><?php echo"$res_nam";?><br><?php echo"$res_rat"; ?></p>
            
          </div>
        </div>
        


         
          <?php
    }
  }

          ?>
           </div>
    </section><!-- End Popular Restaurant of the Day Section -->
    <!------Popular dishe of the Month------->
<section id="Food" class="Food">
<a class="food" style="font-size: 30px;">Popular Dish of the Month </a>
<div class="cards-list">
<?php 
require_once('config.php');

$query="SELECT
restaurant_dishes.dish_id,
restaurant_dishes.price,
restaurant_dishes.pic,
restaurant_dishes.name,
SUM(ordered_dishes.quantity) AS freq
FROM
ordered_dishes
INNER JOIN restaurant_dishes ON ordered_dishes.dish_id = restaurant_dishes.dish_id 
INNER JOIN orders ON ordered_dishes.order_id = orders.order_id 
WHERE MONTH(orders.date_time)=MONTH(CURDATE())
GROUP BY
restaurant_dishes.dish_id
ORDER BY
freq desc
LIMIT 8
";
$result=mysqli_query($conn,$query) or trigger_error(mysqli_error($conn));

if($result)
  {
    while($row=mysqli_fetch_assoc($result) )
    {
        $dish_nam=$row['name'];
        $dish_prc=$row['price'];
        $dish_pic=$row['pic'];
       
      ?>
   
      
        
        <div class="card ">
          
          <div class="card_image">
           <img src="images/dishes/<?php echo"$dish_pic"; ?>" />
            </div>
          <div class="card_title title-white">
            <p><?php echo"$dish_nam"; ?></p>
          </div>
        </div>
        


         
          <?php
    }
  }

          ?>
           </div>
    </section><!-- End Popular Dish of the Month Section -->

     <!------Popular Restaurant of the Month------->
<section id="Food" class="Food">
<a class="food" style="font-size: 30px;">Popular Restaurant of the Month</a>
<div class="cards-list">
<?php 
require_once('config.php');
$i =1;
$query5="SELECT
restaurants.restaurant_id,
restaurants.name,
restaurants.rating,
count(orders.restaurant_id) AS freq
FROM
restaurants
INNER JOIN orders ON orders.restaurant_id = restaurants.restaurant_id
WHERE MONTH(orders.date_time)=MONTH(CURDATE())
GROUP BY
restaurants.restaurant_id
ORDER BY
freq
DESC
";
$result5=mysqli_query($conn,$query5) or trigger_error(mysqli_error($conn));

if($result)
  {
    while($row=mysqli_fetch_assoc($result5) and $i<=8)
    {
        
        $res_id=$row['restaurant_id'];
        $res_nam5=$row['name'];
        $res_rat5=$row['rating'];
        $i=$i+1;
      ?>
      
      
        
        <div class="card ">
          
          <div class="card_image">
           <img src="images/restaurants/res_<?php echo sprintf('%05d', $res_id);?>.jpg" />
            </div>
          <div class="card_title title-white">
            <p ><?php echo"$res_nam5";?><br><?php echo"$res_rat5"; ?></p>
            
          </div>
        </div>
        


         
          <?php
    }
  }

          ?>
           </div>
    </section><!-- End Popular Restaurant of the Month Section -->

<!------Popular dishes------->
<section id="Food" class="Food">
<a class="food" style="font-size: 30px;">Popular Dishes</a>
<div class="cards-list">
<?php 
require_once('config.php');
$i =1;
$query="SELECT
restaurant_dishes.dish_id,
restaurant_dishes.pic,
restaurant_dishes.price,
restaurant_dishes.name,
SUM(ordered_dishes.quantity) AS freq
FROM
restaurant_dishes
INNER JOIN ordered_dishes ON ordered_dishes.dish_id = restaurant_dishes.dish_id
GROUP BY
restaurant_dishes.dish_id
ORDER BY
freq desc";
$result=mysqli_query($conn,$query) or trigger_error(mysqli_error($conn));

if($result)
  {
    while($row=mysqli_fetch_assoc($result) and $i<=8)
    {
        $dish_nam=$row['name'];
        $dish_prc=$row['price'];
        $dish_pic=$row['pic'];
        $i=$i+1;
      ?>
   
      
        
        <div class="card ">
          
          <div class="card_image">
           <img src="images/dishes/<?php echo"$dish_pic"; ?>" />
            </div>
          <div class="card_title title-white">
            <p><?php echo"$dish_nam"; ?></p>
          </div>
        </div>
        


         
          <?php
    }
  }

          ?>
           </div>
    </section><!-- End Popular Dish Section -->
<!------Popular Restaurant------->
<section id="Food" class="Food">
<a class="food" style="font-size: 30px;">Popular Restaurant</a>
<div class="cards-list">
<?php 
require_once('config.php');
$i =1;
$query="SELECT
restaurants.restaurant_id,
restaurants.name,
restaurants.rating,
count(orders.restaurant_id) AS freq
FROM
restaurants
INNER JOIN orders ON orders.restaurant_id = restaurants.restaurant_id
GROUP BY
restaurants.restaurant_id
ORDER BY
freq
DESC";
$result=mysqli_query($conn,$query) or trigger_error(mysqli_error($conn));

if($result)
  {
    while($row=mysqli_fetch_assoc($result) and $i<=8)
    {
        $res_nam=$row['name'];
        $res_id=$row['restaurant_id'];
        $res_rat=$row['rating'];
        $i=$i+1;
      ?>
      
      
        
        <div class="card ">
          
          <div class="card_image">
           <img src="images/restaurants/res_<?php echo sprintf('%05d', $res_id);?>.jpg" />
            </div>
          <div class="card_title title-white">
            <p ><?php echo"$res_nam";?><br><?php echo"$res_rat"; ?></p>
            
          </div>
        </div>
        


         
          <?php
    }
  }

          ?>
           </div>
    </section><!-- End Popular Restaurant Section -->
    <!------Popular Cuisines------->
<section id="Food" class="Food">
<a class="food" style="font-size: 30px;">Popular Cuisines</a>
<div class="cards-list">
<?php 
require_once('config.php');

$query="SELECT
restaurant_dishes.cuisine,
COUNT( restaurant_dishes.cuisine ) AS freq
FROM
restaurant_dishes
INNER JOIN ordered_dishes ON ordered_dishes.dish_id = restaurant_dishes.dish_id
GROUP BY
 restaurant_dishes.cuisine
ORDER BY
freq DESC limit 4";
$result=mysqli_query($conn,$query) or trigger_error(mysqli_error($conn));

if($result)
  {
    while($row=mysqli_fetch_assoc($result))
    {
        $cus=$row['cuisine'];
    
        
      ?>
      
      
        
        <div class="card ">
          
          <div class="card_image ">
           <img src="images/img2.jpg" />
            </div>
          <div class="card_title title-white">
            <p ><?php echo"$cus";?></p>
            
          </div>
        </div>
        


          
          <?php
    }
  }

          ?>
          </div>
    </section><!-- End Popular Cuisines Section -->



    

    
     

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <section id="footer">

    <div class="section-title">
      <h2>About Us</h2>
    </div>
    
    <div class="footer-top">
      <div class="container">
        <div class="row" style="margin:15px">

          <div class="about" data-aos="fade-up">
            <h3>FOOD CLUB</h3>
            <p>
              Gandhi nagar <br>
              Madukkarai,coimbatore<br>
              Tamil nadu <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
            <br>
          </div>

          <div class="about1" data-aos="fade-up" data-aos-delay="100">
            <h4>Useful Links</h4>
            <ul style="list-style-type:none;">
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
            <br>
          </div>

         

          <div class="about2" data-aos="fade-up" data-aos-delay="300">
            <h4>Our Social Networks</h4>
            <p>Follow us on the social media  </p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="skype"><i class="bx bxl-skype"></i></a>
            </div>
            <br>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>FOOD CLUB</span></strong>. All Rights Reserved
      </div>
     

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    </section>
  <!-- Vendor JS Files -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="vendor/php-email-form/validate.js"></script>
  <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="vendor/venobox/venobox.min.js"></script>
  <script src="vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>




  

</body>

</html>

