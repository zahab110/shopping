<?php
include 'connect.php';
include 'header.php';

if(isset($_POST['submit']))
{
    $category_title = $_POST['category_title'];


    $show = "SELECT * FROM `categories` where `category_title` = '$category_title'";
    $show_brand = mysqli_query($con,$show);
    if(mysqli_num_rows($show_brand)>0)
    {
        echo "<script>alert('category Is Already Existed In Database ')</script>";

    }
    else
    {
        $sql = "INSERT INTO `categories` (`category_title`)VALUES('$category_title') ";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Category Has Been Added')</script>";
        }
        else 
        {
            "Something Went Wrong";
        }
    }

    
}
?>
<form action="" method="POST">
<div class="col-12 col-lg-6 container mt-4 ">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						 <h4 >Insert Categories</h4>
						    <div class="app-card-body px-4 w-100">
							
                                <div class="item border-bottom py-3">
                                <div class="item-label"><strong>Name</strong></div>
								<input type="text" name="category_title" class="form-control" >
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