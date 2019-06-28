<?php
session_start();
header('Content-type: text/html; charset=utf-8');
$link = mysqli_connect('localhost', 'root', '', 'test_abit');
if(!isset($_COOKIE['user_id'])) {
	if(isset($_POST['submit'])) {
		$user_username = mysqli_real_escape_string($link, trim($_POST['username']));
		$user_password = mysqli_real_escape_string($link, trim($_POST['password']));
		if(!empty($user_username) && !empty($user_password)) {
			$query = "SELECT `user_id` , `username` FROM `signup` WHERE username = '$user_username' AND password = SHA('$user_password')";
			$data = mysqli_query($link,$query);
			if(mysqli_num_rows($data) == 1) {
				$row = mysqli_fetch_assoc($data);

			$_SESSION['user_id']=$row['user_id'];
				setcookie('user_id', $row['user_id'], time() + (60*60*24*30));
				setcookie('username', $row['username'], time() + (60*60*24*30));
				$home_url = 'index.php';
				header('Location: '. $home_url);
			}
			else {
				echo 'Неверное имя пользователя или пароль';
			}
		}
		else {
			echo 'Заполните поля правильно';
		}
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Войти в профиль</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="css/bootstrap.css" rel="stylesheet">
   <!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="js/fm.revealator.jquery.min.css">
</head>
<body>
	<?php 
		include 'header.php'
	 ?>
	<div class="limiter">	
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form validate-form revealator-zoomin revealator-once">
					<span class="login100-form-title p-b-10">
						Узнали?
					</span>
			<div>
					<?php 
						if(empty($_COOKIE['username'])) {
					 ?>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<div class="wrap-input100 validate-input m-t-85 m-b-35 revealator-zoomin revealator-once" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Логин">
					</div>

					<div class="wrap-input100 validate-input m-b-50 revealator-zoomin revealator-once" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Пароль">
					</div>
				<div class="container-login100-form-btn revealator-zoomin revealator-once">
						<button  type="submit" name="submit" class="login100-form-btn">
							Войти
						</button>

						</form>
				
				<?php 
					}
				else  {
					echo 'ERROR';
				};
				?>
			</div>

					<ul class="login-more p-t-30 revealator-zoomin revealator-once">
						<li>
							<span class="txt1">
								У вас нет аккаунта?
							</span>

							<a href="signup.php" class="txt2">
								Зарегистрироваться
							</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
	
<?php 
	include 'footer.php';
 ?>
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/fm.revealator.jquery.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>