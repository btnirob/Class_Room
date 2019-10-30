<?php
	include 'lib/session.php';
	Session::init();
?>
<?php
		
		
		include "lib/database.php";
		 include "config/config.php";
		   include "helper/formate.php";
		$db=new Database();
		$fm = new Formate();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
   <!-- fav and touch icons -->
   <link rel="shortcut icon" href="assets/ico/Logo.JPG">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">


</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">User Login</div>
      <div class="card-body">
	  <?php
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$email= validate($_POST['inputEmail']);
			$password=validate($_POST['inputPassword']);
			
			$email = mysqli_real_escape_string($db->link, $email);
			$password = mysqli_real_escape_string($db->link, $password);
			
			$query = "SELECT * FROM user_list WHERE email = '$email' AND password = '$password'";
			
			$result = $db->select($query);
			if($result != false   ){

				$value = mysqli_fetch_array($result);
				$row   = mysqli_num_rows($result);
				if($row>0){
					Session::set("login",true);
					Session::set("username",$value['username']);
					Session::set("userId",$value['id']);
					
					header("Location:profile.php");
					
					
				}else{
					echo "<span style='color:red;font-size:18px;'>No result found!!</span>";
				}
				}else{
					echo "<span style='color:red;font-size:18px;'>Username or Password is incorrect!!</span>";
				}
		}
		 function validate($data){
		   $data = trim($data);
		   $data = stripcslashes($data);
		   $data = htmlspecialchars($data);  
			return $data;
	   }
		
		?>
        <form action="" method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="inputPassword" name="inputPassword" id="inputPassword"  class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="hidden" value="remember-me">
                
              </label>
            </div>
          </div>
          <button type="submit" name="login" class= "btn btn-primary btn-block">Login</button>
        </form>
		</br>
        <div class="text-center">
		<a class="d-block small" href="forgot-password.php">Forgot Password?</a>
          <a  class="d-block small mt-3" href="register.php">Register an Account?</a>
		  </br>
          <a  class= "btn btn-success" href="index.php">Go back</a>
          
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
