<?php
date_default_timezone_set("Asia/Calcutta");
session_start();
if (isset($_SESSION["customer_id"]))
{ ?>
    <section id="Food" class="Food">
<a class="food" style="font-size: 30px;">Popular Dish of the Day </a>
<div class="row">
<?php
    require_once ('config.php');
    $i = 1;
    $query = "SELECT
restaurant_dishes.dish_id,restaurant_dishes.restaurant_id,
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
    $result = mysqli_query($conn, $query) or trigger_error(mysqli_error($conn));

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result) and $i <= 8)
        {
            $dish_nam = $row['name'];$res_id = $row['restaurant_id'];
            $dish_prc = $row['price'];
            $dish_pic = $row['pic'];
            $i = $i + 1;
?>
   
      
       
        <a class='col-xl-3 col-sm-6 mb-3' align='center' href="javascript:setContent('restaurant.php?res_id=<?php echo $res_id; ?>');" ><div class="card ">
          
          <div class="card_image">
           <img src="images/dishes/<?php echo "$dish_pic"; ?>" />
          </div>
          <div class="card_title title-white">
            <p><?php echo "$dish_nam"; ?></p>
          </div>
        </div></a>
        


         
          <?php
        }
    }

?>
           </div>
    </section><!-- End Popular Dish of the day Section -->
    <!------Popular Restaurant of the Day------->
<section id="Food" class="Food">
<a class="food" style="font-size: 30px;">Popular Restaurant of the Day</a>
<div class="row">
<?php
    require_once ('config.php');
    $i = 1;
    $query = "SELECT
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
    $result = mysqli_query($conn, $query) or trigger_error(mysqli_error($conn));

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result) and $i <= 8)
        {
            $res_id = $row['restaurant_id'];
            $res_nam = $row['name'];
            $res_rat = $row['rating'];
            $i = $i + 1;
?>
      
      
        
        <a class='col-xl-3 col-sm-6 mb-3' align='center' href="javascript:setContent('restaurant.php?res_id=<?php echo $res_id; ?>');" ><div class="card ">
          
          <div class="card_image">
           <img src="images/restaurants/res_<?php echo sprintf('%05d', $res_id); ?>.jpg" />
            </div>
          <div class="card_title title-white">
            <p ><?php echo "$res_nam"; ?><br><?php echo "$res_rat"; ?></p>
            
          </div>
        </div></a>


         
          <?php
        }
    }

?>
           </div>
    </section><!-- End Popular Restaurant of the Day Section -->
    <!------Popular dishe of the Month------->
<section id="Food" class="Food">
<a class="food" style="font-size: 30px;">Popular Dish of the Month </a>
<div class="row">
<?php
    require_once ('config.php');

    $query = "SELECT
restaurant_dishes.dish_id,restaurant_dishes.restaurant_id,
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
    $result = mysqli_query($conn, $query) or trigger_error(mysqli_error($conn));

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $dish_nam = $row['name'];$res_id = $row['restaurant_id'];
            $dish_prc = $row['price'];
            $dish_pic = $row['pic'];

?>
   
      
        
        <a class='col-xl-3 col-sm-6 mb-3' align='center' href="javascript:setContent('restaurant.php?res_id=<?php echo $res_id; ?>');" ><div class="card ">
          
          <div class="card_image">
           <img src="images/dishes/<?php echo "$dish_pic"; ?>" />
            </div>
          <div class="card_title title-white">
            <p><?php echo "$dish_nam"; ?></p>
          </div>
        </div>
        </a>


         
          <?php
        }
    }

?>
           </div>
    </section><!-- End Popular Dish of the Month Section -->

     <!------Popular Restaurant of the Month------->
<section id="Food" class="Food">
<a class="food" style="font-size: 30px;">Popular Restaurant of the Month</a>
<div class="row">
<?php
    require_once ('config.php');
    $i = 1;
    $query5 = "SELECT
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
    $result5 = mysqli_query($conn, $query5) or trigger_error(mysqli_error($conn));

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result5) and $i <= 8)
        {

            $res_id = $row['restaurant_id'];
            $res_nam5 = $row['name'];
            $res_rat5 = $row['rating'];
            $i = $i + 1;
?>
      
      
        
        <a class='col-xl-3 col-sm-6 mb-3' align='center' href="javascript:setContent('restaurant.php?res_id=<?php echo $res_id; ?>');" ><div class="card ">
          
          <div class="card_image">
           <img src="images/restaurants/res_<?php echo sprintf('%05d', $res_id); ?>.jpg" />
            </div>
          <div class="card_title title-white">
            <p ><?php echo "$res_nam5"; ?><br><?php echo "$res_rat5"; ?></p>
            
          </div>
        </div>
        </a>


         
          <?php
        }
    }

?>
           </div>
    </section><!-- End Popular Restaurant of the Month Section -->

<!------Popular dishes------->
<section id="Food" class="Food">
<a class="food" style="font-size: 30px;">Popular Dishes</a>
<div class="row">
<?php
    require_once ('config.php');
    $i = 1;
    $query = "SELECT
restaurant_dishes.dish_id,restaurant_dishes.restaurant_id,
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
    $result = mysqli_query($conn, $query) or trigger_error(mysqli_error($conn));

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result) and $i <= 8)
        {
            $dish_nam = $row['name'];$res_id = $row['restaurant_id'];
            $dish_prc = $row['price'];
            $dish_pic = $row['pic'];
            $i = $i + 1;
?>
   
      
        
        <a class='col-xl-3 col-sm-6 mb-3' align='center' href="javascript:setContent('restaurant.php?res_id=<?php echo $res_id; ?>');" ><div class="card ">
          
          <div class="card_image">
           <img src="images/dishes/<?php echo "$dish_pic"; ?>" />
            </div>
          <div class="card_title title-white">
            <p><?php echo "$dish_nam"; ?></p>
          </div>
        </div>
        </a>


         
          <?php
        }
    }

?>
           </div>
    </section><!-- End Popular Dish Section -->
<!------Popular Restaurant------->
<section id="Food" class="Food">
<a class="food" style="font-size: 30px;">Popular Restaurant</a>
<div class="row">
<?php
    require_once ('config.php');
    $i = 1;
    $query = "SELECT
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
    $result = mysqli_query($conn, $query) or trigger_error(mysqli_error($conn));

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result) and $i <= 8)
        {
            $res_nam = $row['name'];
            $res_id = $row['restaurant_id'];
            $res_rat = $row['rating'];
            $i = $i + 1;
?>
      
      
        
        <a class='col-xl-3 col-sm-6 mb-3' align='center' href="javascript:setContent('restaurant.php?res_id=<?php echo $res_id; ?>');" ><div class="card ">
          
          <div class="card_image">
           <img src="images/restaurants/res_<?php echo sprintf('%05d', $res_id); ?>.jpg" />
            </div>
          <div class="card_title title-white">
            <p ><?php echo "$res_nam"; ?><br><?php echo "$res_rat"; ?></p>
            
          </div>
        </div>
        </a>


         
          <?php
        }
    }

?>
           </div>
    </section><!-- End Popular Restaurant Section -->
    <?php
}
else
{
    echo "<script>window.location.replace('index.php');</script>";
}

