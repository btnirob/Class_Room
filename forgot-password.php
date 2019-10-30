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

  <title>SB Admin - Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
	  
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
		<?php
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$email= validate($_POST['inputEmail']);
			$email = mysqli_real_escape_string($db->link, $email);
			
			
			$query = "SELECT * FROM user_list WHERE email = '$email' limit 1";
			
			$emailcheck = $db->select($query);
			if($emailcheck != false   ){
				while($value=$emailcheck->fetch_assoc()){
				$userid = $value['id'];
				$username   = $value['fastname'];
				}
				//$text=substr($email, 0, 3);
				$rand=rand(00001,99999);
				//$newpassword="$text$rand";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers
				$headers .= 'From: <support@tutorbd.xyz>' . "\r\n";
				
				$to	= $email;
				$subject ="Reset Password";
				$message ="The code is blablabla";
				mail($to,$subject,$message,$headers);
				echo "Mail sent!";
				//header("Location:verification.php");
				}else{
					echo "<span style='color:red;font-size:18px;'>The provided email doesnot exists!!</span>";
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
              <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Enter email address</label>
            </div>
          </div>
          <button type="submit" name="login" class= "btn btn-primary btn-block">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="login.php">Login Page</a>
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
