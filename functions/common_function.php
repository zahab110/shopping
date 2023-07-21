<?php
include 'connect.php';

//getting products

function getproducts()
{
    global $con;
    if(!isset($_GET['category_id'])){
        if(!isset($_GET['BrandId'])){
            $sql = "SELECT * FROM `products` ORDER BY rand()";
            $result = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $product_description = $row['product_description'];
                $product_image = $row['product_image'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $words = explode(" ", $product_description);
                $product_description = implode(" ", array_splice($words, 0, 5));
    
                echo "<div class='col-sm-6 col-lg-4 mb-4' data-aos='fade-up'>
                    <div class='block-4 text-center border'>
                        <figure class='block-4-image'>
                            <a href='shop-single.php?product_id=".$row['product_id']."'>
                                <img src='./admin-panel/product_images/".$row['product_image']."' alt='Image placeholder' class='img-fluid'>
                            </a>
                        </figure>
                        <div class='block-4-text p-4'>
                            <h3><a href='shop-single.php?product_id=".$row['product_id']."'>".$row['product_name']."</a></h3>
                            <p class='mb-0'>".$product_description."..."."</p>
                            <p class='text-primary font-weight-bold'>Price = $".$row['product_price']."</p>
                            <p><a href='shop.php?add_to_cart=$product_id' class='buy-now btn btn-sm btn-primary'>Add To Cart</a></p>
                        </div>
                    </div>
                </div>";
            }
        }
    }

}


function get_unique_category()
{
    global $con;
    if(isset($_GET['category_id'])){
        $category_id = $_GET['category_id'];
    $sql = "SELECT * FROM `products` where category_id = '$category_id'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)==0)
    {
        echo "<div class='mx-auto'><h4 class='text-center text-danger '>No Products Available</h4></div>";
    }
    while($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $product_name = $row['product_name'];
        $product_description = $row['product_description'];
        $product_image = $row['product_image'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];

        $words = explode(" ", $product_description);
        $product_description = implode(" ", array_splice($words, 0, 5));

        echo "<div class='col-sm-6 col-lg-4 mb-4' data-aos='fade-up'>
        <div class='block-4 text-center border'>
          <figure class='block-4-image'>
           
          <a href='shop-single.php?product_id=".$row['product_id']."'><img src='./admin-panel/product_images/".$row['product_image']."' alt='Image placeholder' class='img-fluid'></a>
          </figure>
          <div class='block-4-text p-4'>
            <h3><a href='shop-single.php?product_id=".$row['product_id']."'>".$row['product_name']."</a></h3>
            <p class='mb-0'>".$product_description."..."."</p>
            <p class='text-primary font-weight-bold'>Price = $".$row['product_price']."</p>
            <p><a href='shop.php?add_to_cart=$product_id' class='buy-now btn btn-sm btn-primary'>Add To Cart</a></p>

          </div>
        </div>
      </div>";
    }
}

}

function get_unique_brands()
{
    
    global $con;
    if(isset($_GET['BrandId'])){
        $brand_id = $_GET['BrandId'];
        $sql = "SELECT * FROM `products` where brand_id = '$brand_id'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result)==0)
        {
            echo "<div class='mx-auto'><h4 class='text-center text-danger '>No Brands Available</h4></div>";
            return;
        }
        while($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_description = $row['product_description'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            $words = explode(" ", $product_description);
            $product_description = implode(" ", array_splice($words, 0, 5));

            echo "<div class='col-sm-6 col-lg-4 mb-4' data-aos='fade-up'>
            <div class='block-4 text-center border'>
              <figure class='block-4-image'>
               
              <a href='shop-single.php?product_id=".$row['product_id']."'><img src='./admin-panel/product_images/".$row['product_image']."' alt='Image placeholder' class='img-fluid'></a>
              </figure>
              <div class='block-4-text p-4'>
                <h3><a href='shop-single.php?product_id=".$row['product_id']."'>".$row['product_name']."</a></h3>
                <p class='mb-0'>".$product_description."..."."</p>
                <p class='text-primary font-weight-bold'>Price = $".$row['product_price']."</p>
                <p><a href='shop.php?add_to_cart=$product_id' class='buy-now btn btn-sm btn-primary'>Add To Cart</a></p>

              </div>
            </div>
          </div>";
        }
    }
}

function displaybrands()
{
    global $con;
    $sql = "SELECT * FROM `brands`";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result)) {   
    $brand_title = $row['brand_title'];
    $brand_id = $row['brand_id'];
    echo "<a href='shop.php?BrandId=".$row['brand_id']."' class='d-flex'>".$row['brand_title']."</a>";
    
    }
   
}

function displaycategory()
{
    global $con;
    $sql = "SELECT * FROM `categories`";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {   
        $brand_title = $row['category_title'];
        $brand_id = $row['category_id'];
        echo "<a href='shop.php?category_id=".$row['category_id']."' class='d-flex'>".$row['category_title']."</a>";
    }
}

function search_products()
{
    global $con;
 if(isset($_GET['search_data_product'])){
    $search_data  = $_GET['search_data'];
            $search = "SELECT * FROM `products` where product_keyword LIKE '%$search_data%'";
            $result = mysqli_query($con, $search);
            if(mysqli_num_rows($result)==0)
            {
                echo "<div class='mx-auto'><h4 class='text-center text-danger '>We Are Sorry The Item You Are Looking Is Currently Un-Available</h4></div>";
                return;
            }
            while($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $product_description = $row['product_description'];
                $product_image = $row['product_image'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $words = explode(" ", $product_description);
                $product_description = implode(" ", array_splice($words, 0, 5));
    
                echo "<div class='col-sm-6 col-lg-4 mb-4' data-aos='fade-up'>
                    <div class='block-4 text-center border'>
                        <figure class='block-4-image'>
                            <a href='shop-single.php?product_id=".$row['product_id']."'>
                                <img src='./admin-panel/product_images/".$row['product_image']."' alt='Image placeholder' class='img-fluid'>
                            </a>
                        </figure>
                        <div class='block-4-text p-4'>
                            <h3><a href='shop-single.php?product_id=".$row['product_id']."'>".$row['product_name']."</a></h3>
                            <p class='mb-0'>".$product_description."..."."</p>
                            <p class='text-primary font-weight-bold'>Price = $".$row['product_price']."</p>
                            <p><a href='shop.php?add_to_cart=$product_id' class='buy-now btn btn-sm btn-primary'>Add To Cart</a></p>

                        </div>
                    </div>
                </div>";
            }
        }
    }


     
    function getIPAddress() {
        //whether ip is from the share internet
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from the remote address
        else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    // $ip = getIPAddress();
    // echo 'User Real IP Address - '.$ip;
    
function cart()
{
    if(isset($_GET['add_to_cart']))
    {
        global $con;
        $get_ip_address = getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
        $sql = "SELECT * FROM `cart` where ip_address = '$get_ip_address' AND product_id =$get_product_id";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0)
        {
            echo "<script>alert('This Item Is Already In Cart')</script>";
            echo "<script>window.open('shop.php','_self')</script>";
        }
        else
        {
            $insert = "INSERT INTO `cart` (`product_id`,`ip_address`,`quantity`) VALUES ($get_product_id,'$get_ip_address',0)";
            $result = mysqli_query($con,$insert);
            echo "<script>alert(' Item Added To Cart')</script>";
            echo "<script>window.open('shop.php','_self')</script>";


        }
    }
}

// function cart_item()
// {
//     if(isset($_GET['add_to_cart']))
//     {
//         global $con;
//         $get_ip_address = getIPAddress();
//         $sql = "SELECT * FROM `cart` where ip_address = '$get_ip_address' ";
//         $result = mysqli_query($con,$sql);
//         $count_cart_items =mysqli_num_rows($result);
//     }  
//         else
//         {
//             global $con;
//         $get_ip_address = getIPAddress();
//         $sql = "SELECT * FROM `cart` where ip_address = '$get_ip_address' ";
//         $result = mysqli_query($con,$sql);
//         $count_cart_items =mysqli_num_rows($result);


//         }
//         echo $count_cart_items;
//     }

// function total_price()
// {
//     global $con;
//     $get_ip_address = getIPAddress();
//     $total=0;
//     $sql = "SELECT * FROM `cart` where ip_address='$get_ip_address'";
//     $result = mysqli_query($con,$sql);
//     while($row = mysqli_fetch_array($result)){
//         $product_id = $row['product_id'];
//         $sql_product = "SELECT * FROM `products` where product_id = '$product_id'";
//         $result_products=mysqli_query($con,$sql_product);
//         while($row_product_price = mysqli_fetch_array($result_products))
//         {
//             $product_price = array($row_product_price['product_price']);
//             $product_values=array_sum($product_price);
//             $total+=$product_values;
//         }

//     } 
//     echo $total;
// }

?>