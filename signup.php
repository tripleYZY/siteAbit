<?php
header('Content-type: text/html; charset=utf-8');
$link = mysqli_connect('localhost', 'root', '', 'test_abit') OR DIE('Ошибка подключения к базе данных');
if(isset($_POST['submit'])){
	$name = mysqli_real_escape_string($link, trim($_POST['name']));
	$surname = mysqli_real_escape_string($link, trim($_POST['surname']));
	$patronymic = mysqli_real_escape_string($link, trim($_POST['patronymic']));
	$date = mysqli_real_escape_string($link, trim($_POST['date']));
	$phnumber = mysqli_real_escape_string($link, trim($_POST['phnumber']));
	$email = mysqli_real_escape_string($link, trim($_POST['email']));
	$username = mysqli_real_escape_string($link, trim($_POST['username']));
	$password1 = mysqli_real_escape_string($link, trim($_POST['password1']));
	$password2 = mysqli_real_escape_string($link, trim($_POST['password2']));
	if(!empty($name) && !empty($surname) && !empty($patronymic) && !empty($date) && !empty($phnumber) && !empty($email) && !empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
		$query = "SELECT * FROM `signup` WHERE username = '$username'";
		$data = mysqli_query($link, $query);
		if(mysqli_num_rows($data) == 0) {  /*проверка на наличие логина, проверяет совпадения в строках БД*/
			$query ="INSERT INTO `signup` (name,surname,patronymic,`date`,phnumber,email,username, password) VALUES ('$name','$surname','$patronymic','$date','$phnumber','$email','$username', SHA('$password2'))"; /*SHA('$pas') - шифровка пароля*/
			mysqli_query($link,$query);
			header('Location: /index.php?reg=ok');
			mysqli_close($link);
			exit();
			
		}
		else {
			echo 'Такой логин уже существует!';
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
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
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
		<div class="container-login100 ">
			<div class="wrap-login100 ">
				<div class="login100-form validate-form ">
					<span class="login100-form-title p-b-10 revealator-zoomin revealator-once">
						Согласны?
					</span>
			<content>
	<form method="POST">
		<div class="wrap-input100 validate-input m-t-85 m-b-35 revealator-zoomin revealator-once" data-validate = "Enter surname ">
			<input class="input100" type="text" name="surname" placeholder="Фамилия">
		</div>

		<div class="wrap-input100 validate-input m-t-85 m-b-35 revealator-zoomin revealator-once" data-validate = "Enter name">
			<input class="input100" type="text" name="name" placeholder="Имя">
		</div>

		<div class="wrap-input100 validate-input m-t-85 m-b-35 revealator-zoomin revealator-once" data-validate = "Enter patronymic">
			<input class="input100" type="text" name="patronymic" placeholder="Отчество">
		</div>

		<div class="wrap-input100 validate-input m-t-85 m-b-35 revealator-zoomin revealator-once" data-validate = "Enter date">
			<input class="input100" type="date" name="date" placeholder="Дата рождения">
		</div>

		<div class="wrap-input100 validate-input m-t-85 m-b-35 revealator-zoomin revealator-once" data-validate = "Enter phone number">
			<input class="input100" type="text" name="phnumber" placeholder="Номер телефона">
		</div>

		<div class="wrap-input100 validate-input m-t-85 m-b-35 revealator-zoomin revealator-once" data-validate = "Enter email">
			<input class="input100" type="text" name="email" placeholder="Электронная почта">
		</div>

		<div class="wrap-input100 validate-input m-t-85 m-b-35 revealator-zoomin revealator-once" data-validate = "Enter username">
			<input class="input100" type="text" name="username" placeholder="Логин">
		</div>

		<div class="wrap-input100 validate-input m-t-85 m-b-35 revealator-zoomin revealator-once" data-validate = "Enter password">
			<input class="input100" type="password" name="password1" placeholder="Пароль">
		</div>

		<div class="wrap-input100 validate-input m-t-85 m-b-35 revealator-zoomin revealator-once" data-validate = "Enter password">
			<input class="input100" type="password" name="password2" placeholder="Пароль ещё раз">
		</div>



		<button name="submit" class="login100-form-btn revealator-zoomin revealator-once">
							Зарегистрироваться
						</button>
	</form>
</content>

					<ul class="login-more p-t-30 revealator-zoomin revealator-once">
						<li>
							<span class="txt1">
								У вас уже есть аккаунт?
							</span>

							<a href="login.php" class="txt2 revealator-zoomin revealator-once">
								Войти
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
					<!-- конец контейнера -->

<!-- правая граница -->


					


				</div>
			</div>
		</div>
	</div>
</div>

	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/fm.revealator.jquery.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=c3514a36-1e6e-4173-abe4-71fa1262c757" type="text/javascript"></script>
    <script src="js/placemark.js" type="text/javascript"></script>
  </body>
</html>