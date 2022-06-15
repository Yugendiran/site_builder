<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Kolkata");

$connection = mysqli_connect("localhost", "root", "", "site");

if(!$connection){
    alertBox("Database Not Connected");
}

function alertBox($msg){
    echo "<script>alert('$msg');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>
<?php
if(isset($_POST['login'])){
	$login_email = $_POST['email'];
	$login_pass = $_POST['pass'];

	$select_users_query = "SELECT * FROM users WHERE user_email = '$login_email'";
	$select_users_result = mysqli_query($connection, $select_users_query);
	$select_users_row = mysqli_num_rows($select_users_result);
	alertBox("There is no user with this email.");
	if($select_users_row >= 1){
		while($row = mysqli_fetch_assoc($select_users_result)){
			$db_user_id = $row['user_id'];
			$db_user_name = $row['user_name'];
			$db_user_email = $row['user_email'];
			$db_user_pass = $row['user_pass'];
			$db_user_status = $row['user_status'];
		}

		if($db_user_status == 'activated'){
			if($db_user_email == $login_email && $db_user_pass == md5($login_pass)){
				$_SESSION['login_user_id'] = $db_user_id;
				header("location: ../index.php");
			}else{
				alertBox("Incorrect Password. Please try again");
			}
		}else{
			alertBox("Please activate your account. Check your mail inbox");
		}
	}else{
		alertBox("There is no user with this email.");
	}
}

?>
				<form class="login100-form validate-form" action="index.php" method="post">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button name="login" type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>