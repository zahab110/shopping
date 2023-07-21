<?php
include 'header.php';
include ('functions/common_function.php');
include 'connect.php';
$delete_msg = "";
if(isset($_GET['delete']))
 {
   $delete_id = $_GET['delete'];
   $sql = "DELETE FROM `cart` WHERE product_id = '$delete_id'";
   $result1 = mysqli_query($con,$sql);
   if($result1)
   {
     $delete_msg = "<div class='mx-auto'><h4 class='text-center text-danger '>Item Removed From Cart</h4></div>";
   }
   else
   {
     $delete_msg = "Something went wrong: " . mysqli_error($con);
   }
 }

?>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
            <div><?php echo $delete_msg; ?></div>
              <table class="table table-bordered">
               <?php
                global $con;
                $get_ip_address = getIPAddress();
                $total = 0;
                $sql = "SELECT * FROM `cart` WHERE ip_address='$get_ip_address'";
                $result = mysqli_query($con, $sql);
                $result_count=mysqli_num_rows($result);
                if($result_count>0)
                {
                  echo"   
                  <thead>
                  <tr>
                    <th class='product-thumbnail'>Image</th>
                    <th class='product-name'>Product Name</th>
                    <th class='product-price'>Price</th>
                    <th class='product-quantity'>Quantity</th>
                    <th class='product-remove'>Remove</th>
                  </tr>
                  </thead>
                  <tbody>";
                                  
                while ($row = mysqli_fetch_array($result)) {
                  $product_id = $row['product_id'];
                  $result_products = mysqli_query($con, "SELECT * FROM `products` WHERE product_id = '$product_id'");
                  while ($row_product = mysqli_fetch_array($result_products)) {
                    $total += $row_product['product_price'];
                    ?>
                    <tr>
                      <td class="product-thumbnail">
                        <img src="./admin-panel/product_images/<?php echo $row_product['product_image'] ?>" alt="Image" class="img-fluid">
                      </td>
                      <td class="product-name">
                        <h2 class="h5 text-black"><?php echo $row_product['product_name'] ?></h2>
                      </td>
                      <td><?php echo "$" . $row_product['product_price'] ?></td>
                      <td>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="quantity" placeholder="Enter Quantity">
                          <?php
                          include 'connect.php';
                             $get_ip_address = getIPAddress();
                             if(isset($_POST['update_cart']))
                             {
                              $quantity = $_POST['quantity'];
                             $update_cart = "UPDATE `cart` SET `quantity` = $quantity WHERE `ip_address` = '$get_ip_address'"; 
                              $result_product = mysqli_query($con, $update_cart);
                              $total=$total*$quantity;
                             }
                          ?>
                        </div>
                      </td>
                    <td><a href="?delete=<?php echo $product_id; ?>" class="btn btn-primary btn-sm">X</a></td>
                    </td>
                    </tr>
                <?php
                  }
                }
              }
              else
              {
                echo "<div class='mx-auto'><h4 class='text-center text-danger '>Cart Is Empty</h4></div>";
                echo"  <a href='shop.php'><button  class='btn btn-outline-primary btn-sm btn-block my-5 ' name='continue' >Continue Shopping</button></a>";
              

              }
              if(isset($_POST['continue']))
              {
                echo "<script>window.open('shop.php','_self')</script>";
                            }
                ?>
              </tbody>

               
              </table>
            </div>
          
        </div>

        <div class="row">
        <?php
                global $con;
                $get_ip_address = getIPAddress();
                // $total = 0;
                $sql = "SELECT * FROM `cart` WHERE ip_address='$get_ip_address'";
                $result = mysqli_query($con, $sql);
                $result_count=mysqli_num_rows($result);
                if($result_count>0){ 
                  echo " <div class='col-md-6'>
                  <div class='row mb-5'>
                    <div class='col-md-6 mb-3 mb-md-0'>
                      <button name='update_cart' class='btn btn-primary btn-sm btn-block'>Update Cart</button>
                    </div>
                    <div class='col-md-6'>
                    <a href='shop.php'><button type='button' class='btn btn-outline-primary btn-sm btn-block'>Continue Shopping</button></a>
                    </div>
                  </div>
               
                </div>
                <div class='col-md-6 pl-5'>
                  <div class='row justify-content-end'>
                    <div class='col-md-7'>
                      <div class='row'>
                        <div class='col-md-12 text-right border-bottom mb-5'>
                          <h3 class='text-black h4 text-uppercase'>Cart Totals</h3>
                        </div>
                      </div>
                      <div class='row mb-3'>
                        <div class='col-md-6'>
                          <span class='text-black'>Subtotal</span>
                        </div>
                        <div class='col-md-6 text-right'>
                          <strong class='text-black'>$ $total </strong>
                        </div>
                      </div>
                   
      
                      <div class='row'>
                        <div class='col-md-12'>
                       <button class='btn btn-primary btn-lg py-3 btn-block'> <a href='checkout.php' style='color:white;' > Proceed To Checkout</a></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>";
                  
                }  ?>
         
        </div>
      </div>
      </form>
    </div>
             

<?php
include 'footer.php';
?>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>

