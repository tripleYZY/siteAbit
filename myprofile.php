<?php
	session_start();
	header('Content-type: text/html; charset=utf-8');
	$link = mysqli_connect('localhost', 'root', '', 'test_abit');
	?>
	<!DOCTYPE html>
	<html lang="en">
	  <head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

	    <title>Страница для абитуриентов</title>


	   <link href="css/bootstrap.css" rel="stylesheet">
	   <!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
	    <link href="style.css" rel="stylesheet">
	    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

	  </head>
	  <body>

	  	<header class="head">
	  		<div class="header">
	  			<div class="push-30 flex">
	  				<div class="col-md-12">
	  					<div class="row">
			  				<div class="col-12 col-md-6 head_text">
								<a href="https://bspu.ru/" class="btn btn-white-outline ">
									<i class="fa fa-university"></i> 
									 Официальный сайт БГПУ им. М.Акмуллы
								</a>
							</div>

							<div class="col-12 col-md-6 head_text flex btn_push">
								<a href="#" class="btn">
									Информационный ресурс для абитуриентов
								</a>
							</div>

	


						</div>
					</div>
				</div>

					<div class="col-12 logo logo_pad">
						<a href="/index.php" class="dec_none">
							<span class="header-block__title logo_txt">
								<img src="bspu.png" class="logo_p"> 
								Приёмная комиссия БГПУ им. М.Акмуллы
							</span>
						</a>
					</div>

<?php
	if(empty($_COOKIE['username'])) {
?>
	<a href="login.php"><button>Вход</button></a>
	<a href="signup.php">Регистрация</a>
	</form>
<?php
}
else {
	?>
	<p  class="padt"><a href="myprofile.php">Мой профиль</a></p>
	<p><a href="exit.php">Выйти(<?php echo $_COOKIE['username']; ?>)</a></p>
<?php	
}
?>
</div>

			</div>



		</header>
	<?php
	if(isset ($_SESSION['user_id'])) {
		$user_id = $_SESSION['user_id'];
		$query = "SELECT * FROM signup WHERE user_id = ".$user_id;
		$data = mysqli_query($link,$query);
		if(mysqli_num_rows($data) == 1) {
			$row = mysqli_fetch_assoc($data);
			echo '<div class="myprofile col-md-12">
		<div class="row col-md-12 mymarg">
			<span class="mysurname2">Фамилия</span>
		<span class="mysurname">'.$row['surname'].'</span>
		</div>
		<div class="row col-md-12 mymarg">
			<span class="myname2">Имя</span>
			<span class="myname">'.$row['name'].'</span>
		</div>
		<div class="row col-md-12 mymarg">
			<span class="mypatronymic2">Отчество</span>
			<span class="mypatronymic">'.$row['patronymic'].'</span>
		</div>
		<div class="row col-md-12 mymarg">
			<span class="mydate2">Дата рождения</span>
			<span class="mydate">'.$row['date'].'</span>
		</div>
		<div class="row col-md-12 mymarg">
			<span class="myphnumber2">Номер телефона</span>
			<span class="myphnumber">'.$row['phnumber'].'</span>
		</div>
		<div class="row col-md-12 mymarg">
			<span class="myemail2">Электронная почта</span>
			<span class="myemail">'.$row['email'].'</span>
		</div>
		<div class="row col-md-12 mymarg">
			<span class="mylogin2">Логин</span>
			<span class="mylogin">'.$row['username'].'</span>
		</div>
	</div>';
	}
	}
	else {
		echo '<script>window.location.href = "login.php";</script>';
	}
	?>
	<!--
	<div class="myprofile col-md-12">
		<div class="row col-md-12 mymarg">
			<span class="mysurname2">Фамилия</span>
			<span class="mysurname"><?php echo $row['surname'] ?></span>
		</div>
		<div class="row col-md-12 mymarg">
			<span class="myname2">Имя</span>
			<span class="myname"><?php echo $row['name'] ?></span>
		</div>
		<div class="row col-md-12 mymarg">
			<span class="mypatronymic2">Отчество</span>
			<span class="mypatronymic"><?php echo $row['patronymic'] ?></span>
		</div>
		<div class="row col-md-12 mymarg">
			<span class="mydate2">Дата рождения</span>
			<span class="mydate"><?php echo $row['date'] ?></span>
		</div>
		<div class="row col-md-12 mymarg">
			<span class="myphnumber2">Номер телефона</span>
			<span class="myphnumber"><?php echo $row['phnumber'] ?></span>
		</div>
		<div class="row col-md-12 mymarg">
			<span class="myemail2">Электронная почта</span>
			<span class="myemail"><?php echo $row['email'] ?></span>
		</div>
		<div class="row col-md-12 mymarg">
			<span class="mylogin2">Логин</span>
			<span class="mylogin"><?php echo $row['username'] ?></span>
		</div>
		<div class="row col-md-12 mymarg">
			<span class="mylogin2">Логин</span>
			<span class="mylogin"><?php echo $row['password'] ?></span>
		</div>
	</div> -->
						<!-- конец контейнера -->

	<!-- правая граница -->


						<footer class="footer">
							<div class="row">
								<div class="col-12 col-md-12">
									<i class="fa fa-vk" aria-hidden="true"></i>
									<i class="fa fa-facebook" aria-hidden="true"></i>
									<i class="fa fa-twitter" aria-hidden="true"></i>
									<i class="fa fa-instagram" aria-hidden="true"></i>
									<i class="fa fa-youtube" aria-hidden="true"></i>
									<br>
									<span>© 2016-2019 <a href=""> БГПУ им. М. Акмуллы</a></span>
								</div>
							</div>
						</footer>


					</div>
				</div>
			</div>
		</div>
	</div>

	    <script src="js/jquery.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="js/scripts.js"></script>
	    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=c3514a36-1e6e-4173-abe4-71fa1262c757" type="text/javascript"></script>
	    <script src="js/placemark.js" type="text/javascript"></script>
	  </body>
	</html>