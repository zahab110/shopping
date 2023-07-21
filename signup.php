<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>


body {
  font-family: sans-serif;
  line-height: 0.9;
  display: flex;
}

.container {
  width: 400px;
  margin: auto;
  padding: 36px 48px 48px 48px;
  background-color: #f2efee;

  border-radius: 11px;
  box-shadow: 0 2.4rem 4.8rem rgba(0, 0, 0, 0.15);
}

.login-title {
  padding: 5px;
  font-size: 22px;
  font-weight: 600;
  text-align: center;
}

.login-form {
  display: grid;
  grid-template-columns: 1fr;
  row-gap: 16px;
}

.login-form label {
  display: block;
  margin-bottom: 8px;
}

.login-form input {
  width: 100%;
  padding: 1rem;
  border-radius: 9px;
  border: none;
}

.login-form input:focus {
  outline: none;
  box-shadow: 0 0 0 4px rgba(255, 165, 0, 0.2);

}

.btn--form {
  background-color: #f48982;
  color: #fdf2e9;
  align-self: end;
  padding: 8px;
}

.btn,
.btn:link,
.btn:visited {
  display: inline-block;
  text-decoration: none;
  font-size: 20px;
  font-weight: 600;
  border-radius: 9px;
  border: none;

  cursor: pointer;
  font-family: inherit;

  transition: all 0.6s;
}

button {
  outline: 1px solid #f48982;
}

.btn--form:hover {
  background-color: #fdf2e9;
  color: #f48982;
}


</style>
<?php
include 'connect.php';
include ('functions/common_function.php');
$error = "";
if(isset($_POST['register']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $image = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $ip=getIPAddress();
  $address = $_POST['address'];
  $mobile = $_POST['mobile'];

  $query = "SELECT * FROM `user` WHERE `name`='$name'";
  $rez=mysqli_query($con,$query);
  if(mysqli_num_rows($rez)>0)
  {
    $error="<div class='mx-auto error'><h6 class='text-center text-danger '>This UserName Already Exist Please Try Different Name</h6></div>";
  }
  else
  {
    move_uploaded_file($image_tmp,"user_image/$image");

    $sql = "INSERT INTO `user` (`name`,`email`,`password`,`image`,`ip`,`address`,`mobile`) VALUES ('$name','$email','$password','$image','$ip','$address','$mobile') ";
    $result = mysqli_query($con,$sql);
    if($result)
    {
      header("Location: login.php");
    }
    else 
    {
      echo "SomeThing Went Wrong Please Try Again Later";
    }

    // $select = "SELECT * FROM `cart` WHERE ip_address = '$ip' ";
    // $rizz = mysqli_query($con,$select);
    // if(mysqli_num_rows($result))
    // {
    //   $_SESSION['name']=$name;
    //   echo "<script>alert('you have item in cart')</script>";
    //   echo "<script>window.open('checkout.php')</script>";
    // }
    // else
    // {
    //   echo "<script>window.open('index.php')</script>";

    // }
  }
}
?>
<div class="container">
  <h2 class="login-title">Sign Up</h2>
  <?php echo $error; ?>
    <form class="login-form" method="POST" enctype="multipart/form-data" >
      <div>
        <label for="name">Name </label>
        <input id="name" type="text"   placeholder="joe dunk"  autocomplete="off"  name="name"  required />
      </div>

      <div>
        <label for="email">Email </label>
        <input id="email"  type="email"  placeholder="me@example.com" autocomplete="off"   name="email"   required            />
      </div>

      <div>
        <label for="password">Password </label>
        <input  id="password" type="password"placeholder="password"  name="password"  required  />
      </div>
      <div>
        <label for="password">Image </label>
        <input  type="file"  name="image" required class="form-control" />
      </div>
      <div>
        <label for="password">Address</label>
        <input  type="text"  name="address" required class="form-control" placeholder="Address" />
      </div>
      <div>
        <label for="password">Phone-Number </label>
        <input  type="text"  name="mobile" required class="form-control" placeholder="Phone-Number" />
      </div>
      <button class="btn btn--form" name="register" type="submit" value="Log in">    Log in  </button>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Already Have A Account ? <a href="login.php" style="text-decoration: none;" >Login Here </a> </p>

    </form>
</div>
