<?php
include ('functions/common_function.php');
include 'header.php';
include 'connect.php';
?>
<style>
  .center{
  display: flex; 
  justify-content: center;
  align-items: center;
  min-height: 60vh;
  background-color: #fff;
  background-image: url(https://cdn.shopify.com/s/files/1/2504/3282/files/marbles_seemless.jpg?5912703254077228492);
}


.d-flex {
  display: flex;
}

.mar-t-1 {
  margin-top: 15px;
} 

.text-center {
  text-align: center;
}

.gift-card {
  border-radius: 10px;
  background: #fafafa;
  width: 430px;
  color: #3d3d3d;
  font-family: sans-serif;
  display: flex;
	box-shadow: 0 1px 5px rgba(0, 0, 0, 0.2); 
}

.gift-card__image {
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
  flex: 1;
  max-width: 150px;
  background-size: cover;
  background-image: url(https://cdn.shopify.com/s/files/1/2504/3282/files/annie-spratt-102799-unsplash.jpg?15904179471993750892);
}

.gift-card__content {
  padding: 30px 20px;
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.gift-card__msg {
  font-size: 10px;
  display: block;
  margin-top: 10px;
}




.gift-card__amount {
  font-size: 40px;
  padding: 10px;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;

}

</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <a href="payment.php">Payment</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Payment</strong></div>
        </div>
      </div>
    </div>
<div class="center" >
<article class="gift-card">
	<?php
	$user_ip = getIPAddress();
	$get_user = "SELECT * FROM `user` WHERE ip = '$user_ip'";
	$result = mysqli_query($con,$get_user);
	$run_query = mysqli_fetch_array($result);
	$user_id = $run_query['id'];
	?>
  <div class="gift-card__image">
  </div>
  <section class="gift-card__content">
      <div class="gift-card__amount">Payment </div>
      
   <a href="checkout.php?id=<?php echo $user_id?>" class="btn btn-outline-success" >Pay-Offline</a>
      <div class="gift-card__msg">Thank You For Shopping From Shoppers</div>
  </section>
</article>
</div>
