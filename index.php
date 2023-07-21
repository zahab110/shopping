<?php
include 'header.php';
?>

    <div class="site-blocks-cover" style="background-image: url(images/hero_1.jpg);" data-aos="fade">
      <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
          <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
            <h1 class="mb-2">Finding Your Perfect Shoes</h1>
            <div class="intro-text text-center text-md-left">
              <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla. </p>
              <p>
              <a href="shop.php?brand_id=1" class="btn btn-sm btn-primary">Shop Now</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm site-blocks-1">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Free Shipping</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-refresh2"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Free Returns</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-help"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Customer Support</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-blocks-2">
      <div class="container">
        <div class="row">
        <?php
  if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $sql = "SELECT * FROM categories WHERE category_title IN ('Male', 'Female', 'Kids')";
  $result = mysqli_query($con, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
      if ($row['category_title'] == 'Male') {
          $image = 'images/men.jpg';
      } else if ($row['category_title'] == 'Female') {
          $image = 'images/women.jpg';
      } else {
          $image = 'images/children.jpg';
      }
      echo "<div class='col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0' data-aos='fade' data-aos-delay=''>
              <a class='block-2-item' href='shop.php?category_id=".$row['category_id']."'>
                  <figure class='image'>
                      <img src='".$image."' alt='' class='img-fluid'>
                  </figure>
                  <div class='text'>
                      <span class='text-uppercase'>".$row['category_title']."</span>
                      <h3>".$row['category_title']."</h3>
                  </div>
              </a>
          </div>";
  }

  mysqli_close($con);
?>



      
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>

        <div class="row">
  <div class="col-md-12">
    <div class="nonloop-block-3 owl-carousel">
      <?php 
      
        include 'connect.php';
        $sql = "SELECT * FROM `products`";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){
            $words = explode(" ", $row['product_description']);
            $product_description = implode(" ", array_splice($words, 0, 5));
      ?>
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <a href="shop-single.php?product_id=<?php echo $row['product_id'] ?>">
                    <img src="./admin-panel/product_images/<?php echo $row['product_image'] ?>" alt="Image placeholder" class="img-fluid">
                  </a>
                </figure>
                <div class="block-4-text p-4">
                  <h3><a href="shop-single.php?product_id=<?php echo $row['product_id'] ?>"><?php echo $row ['product_name']; ?></a></h3>
                  <p class="mb-0"><?php echo $product_description."...." ?></p>
                  <p class="text-primary font-weight-bold">$<?php echo $row['product_price'] ?></p>
                </div>
              </div>
            </div>
      <?php 
          }
        }
      ?>
    </div>
  </div>
</div>



      </div>
    </div>
   

    <div class="site-section block-8">
      <div class="container">
        <div class="row justify-content-center  mb-5">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Big Sale!</h2>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 mb-5">
            <a href="shop.php"><img src="images/blog_1.jpg" alt="Image placeholder" class="img-fluid rounded"></a>
          </div>
          <div class="col-md-12 col-lg-5 text-center pl-md-5">
            <h2><a href="#">50% less in all items</a></h2>
            <p class="post-meta mb-4">By <a href="#">Zahab Abbas</a> <span class="block-8-sep">&bullet;</span> September 17, 2023</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam iste dolor accusantium facere corporis ipsum animi deleniti fugiat. Ex, veniam?</p>
            <p><a href="shop.php" class="btn btn-primary btn-sm">Shop Now</a></p>
          </div>
        </div>
      </div>
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