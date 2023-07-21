<?php
session_start();
include 'connect.php';

$get_ip_address = $_SERVER['REMOTE_ADDR'];
if(isset($_GET['add_to_cart']))
{
    $sql = "SELECT * FROM `cart` WHERE ip_address = '$get_ip_address'";
    $result = mysqli_query($con, $sql);
    $count_cart_items = mysqli_num_rows($result);
}  
else
{
    $sql = "SELECT * FROM `cart` WHERE ip_address = '$get_ip_address'";
    $result = mysqli_query($con, $sql);
    $count_cart_items = mysqli_num_rows($result);
}


//calculating price of cart
$get_ip_address = $_SERVER['REMOTE_ADDR'];
$total = 0;
$sql = "SELECT * FROM `cart` WHERE ip_address = '$get_ip_address'";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result))
{
    $product_id = $row['product_id'];
    $sql_product = "SELECT * FROM `products` WHERE product_id = '$product_id'";
    $result_products = mysqli_query($con, $sql_product);
    while($row_product_price = mysqli_fetch_array($result_products))
    {
        $product_price = $row_product_price['product_price'];
        $total += $product_price;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shoppers </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="search_product.php" method="get" class="site-block-top-search">
                <!-- <span class="icon icon-search2"></span> -->
                <input type="search" name="search_data" class="form-control border-1" placeholder="Search">
                <input type="submit" name="search_data_product" value="Submit"  class="form-control">
              </form>
            </div>

            

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.php" class="js-logo-clone">Shoppers</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
  <div class="site-top-icons">
    <ul>
      <?php if(isset($_SESSION['name'])): ?>
        <li><a href="#"><span>Welcome <?php echo $_SESSION['name']; ?></span></a></li>
        <li><a href="logout.php"><i class='fa fa-sign-out'></i></a></li>
      <?php else: ?>
        <li><a href="login.php"><i class='fa fa-user'></i></a></li>
      <?php endif; ?>
      <li>
        <a href="cart.php" class="site-cart">
          <i class='fa fa-shopping-cart'></i>
          <span class="count "><?php echo $count_cart_items;?></span>
        </a>
      </li> 
      <li><i class='fa fa-dollar'><?php echo $total; ?></i></li>
      <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
    </ul>
  </div> 
</div>


          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="has-children">
              <a href="index.php">Home</a>
              <ul class="dropdown">
                <li><a href="#">Menu One</a></li>
                <li><a href="#">Menu Two</a></li>
                <li><a href="#">Menu Three</a></li>
                <li class="has-children">
                  <a href="#">Sub Menu</a>
                  <ul class="dropdown">
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                    <li><a href="#">Menu Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="has-children active">
              <a href="about.php">About</a>
              <ul class="dropdown">
                <li><a href="#">Menu One</a></li>
                <li><a href="#">Menu Two</a></li>
                <li><a href="#">Menu Three</a></li>
              </ul>
            </li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
      </nav>
      
    </header>