<?php
include 'connect.php';
include 'header.php';
if(isset($_POST['submit']))
{
	$product_name = $_POST['product_name'] ;
	$product_description = $_POST['product_description'] ;
	$product_keyword = $_POST['product_keyword'] ;
	$product_price = $_POST['product_price'] ;
	$product_category = $_POST['product_category'] ;
	$product_brand = $_POST['product_brand'] ;
	$product_status = 'true';

	$product_image = $_FILES['product_image']['name'];
	$tmp_image = $_FILES['product_image']['tmp_name'];
	if($product_name=="" || $product_description=="" || $product_keyword=="" || $product_price=="" || $product_category=="" || $product_brand=="" ||$product_image=="")
	{
		echo "<script>alert('Please Fill Empty Fields')</script>";
		exit();
	}
	else
	{
		move_uploaded_file($tmp_image,"./product_images/$product_image");
		$sql = "INSERT INTO `products` (`product_name`,`product_description`,`product_keyword`,`product_price`,`category_id`,`brand_id`,`product_image`,`date`,`status`) VALUES ('$product_name','$product_description','$product_keyword','$product_price','$product_category','$product_brand','$product_image',NOW(),'$product_status')";
		$result = mysqli_query($con,$sql);
		if($result)
		{
			echo "<script>alert('product has been added successfully')</script>";
		}
		else
		{
			echo "something went wrong";
		}
	}

	

}
?>
<form action="" method="post" enctype="multipart/form-data" >
						<div class="col-12 col-lg-6 container mt-4 ">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						 <h4 >Insert products</h4>
						    <div class="app-card-body px-4 w-100">
							   
                                <div class="item border-bottom py-3">
                                <div class="item-label"><strong>Product Name</strong></div>
								<input type="text" name="product_name" class="form-control"  placeholder="Enter Product Name" required >
							    </div><!--//item-->
                                <div class="item border-bottom py-3">
                                <div class="item-label"><strong>Product Description</strong></div>
								<input type="text" name="product_description" class="form-control"  placeholder="Enter Product Description" required >
							    </div><!--//item-->
                                <div class="item border-bottom py-3">
                                <div class="item-label"><strong>Product keyword</strong></div>
								<input type="text"name="product_keyword" class="form-control" placeholder="Enter Product Keyword" required >
							    </div><!--//item-->
								<div class="item border-bottom py-3">
                                <div class="item-label"><strong>Product Price</strong></div>
								<input type="text" name="product_price" class="form-control"  placeholder="Enter Product Price" required >
							    </div><!--//item-->
								<div class="item border-bottom py-3">
								<div class="mb-2">
								<select class="form-select form-select-lg" name="product_category" id="">
								<option selected>Select Category</option>
								<?php
								include 'connect.php';
								$sql = "SELECT * FROM `categories`";
								$result = mysqli_query($con,$sql);
								while($row = mysqli_fetch_assoc($result)){
								$category_title=$row['category_title'];
								$category_id=$row['category_id'];
								echo "<option value='$category_id'>$category_title </option>";
								}
								?>
								</select>
								</div>
							    </div><!--//item-->
								<div class="item border-bottom py-3">
								<div class="mb-2">
								<select class="form-select form-select-lg" name="product_brand" id="">
								<option selected>Select Brand</option>
								<?php
								include 'connect.php';
								$sql = "SELECT * FROM `brands`";
								$result = mysqli_query($con,$sql);
								while($row = mysqli_fetch_assoc($result)){
								$brand_title=$row['brand_title'];
								$brand_id=$row['brand_id'];
								echo "<option value='$brand_id'>$brand_title </option>";
								}
								?>
							   </select>

								</div>
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
                                <div class="item-label"><strong>Product-Image</strong></div>
								<input type="file" name="product_image" class="form-control" >
							    </div><!--//item-->
						    </div><!--//app-card-body-->
							<div class="app-card-footer p-4 mt-auto">
							   <button class="btn app-btn-secondary" name="submit"  >Submit</button>
						    </div><!--//app-card-footer-->
						   
						</div><!--//app-card-->
	                </div><!--//col-->
</form>

<script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

    <!-- Charts JS -->
    <script src="assets/plugins/chart.js/chart.min.js"></script> 
    <script src="assets/js/index-charts.js"></script> 
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 