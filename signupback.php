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

				<div class="col-12 logo">
					<a href="/index.php" class="dec_none">
						<span class="header-block__title logo_txt">
							<img src="bspu.png" class="logo_p"> 
							Приёмная комиссия БГПУ им. М.Акмуллы
						</span>
					</a>
				</div>
		</div>

	</header>


<content>
	<form method="POST">
		<label for="surname">Фамилия:</label><br>
		<input type="text" name="surname"><br>

		<label for="name">Имя:</label><br>
		<input type="text" name="name"><br>

		<label for="patronymic">Отчество:</label><br>
		<input type="text" name="patronymic"><br>

		<label for="date">Дата рождения:</label><br>
		<input type="date" name="date"><br>

		<label for="phnumber">Номер телефона:</label><br>
		<input type="text" name="phnumber"><br>

		<label for="email">Электронная почта:</label><br>
		<input type="text" name="email"><br>

		<label for="username">Введите логин:</label><br>
		<input type="text" name="username"><br>

		<label for="password">Введите пароль:</label><br>
		<input type="password" name="password1"><br>

		<label for="password">Введите пароль ещё раз:</label><br>
		<input type="password" name="password2"><br>

		<button name="submit">Зарегестрироваться</button>
	</form>
</content>


		<div class="col-md-12">

			<a href="#">
			<div class="row row_priem">
				
				<div class="col-md-12 bg-gray priem">
					<span class="">ХОД ПРИЁМА 2019</span>
				</div>
			</div>
			</a>
		</div>

<div class="container">			
			<div class="col-md-12" style="padding: 0 !important"> 
				<div class="row list cent">
					
					<div class="col-12 col-md-4 bg-gray bor_b">
						<span>130 образовательный программ</span>
					</div>

					<div class="col-12 col-md-4 bg-gray bor_l1 bor_b">
						<span>1699 бюджетных мест</span>
					</div>

					<div class="col-12 col-md-4 bg-gray bor_l1 bor_b">
						<span>до 50% скидки на платное обучение</span>
					</div>

				</div>
			</div>

			<div class="row">
				<!-- левая граница -->


						<!-- контейнер -->
			<div class="col-md-12">

				<section>	<!-- блок 2 -->
					<div class="row list bg-gray list_b">
						<div class="col-6 col-md-3 bor_b bor_r">
							<span>Колледж</span>
						</div>
						<div class="col-6 col-md-3 bor_b bor_l">
							<span>Бакалавриат</span>
						</div>
						<div class="col-6 col-md-3 bor_b bor_r bor_l1">
							<span>Магистратура</span>
						</div>
						<div class="col-6 col-md-3 bor_b bor_l">
							<span>Аспирантура</span>
						</div>
					</div>

				</section>


<!-- #354d83 - фон   #233456 - буквы TEXT V VR -->
				<section>
					<div class="row" style="padding-top: 10px">
						<div class="vr_img">
							<div class="col-md-12 vr_text">
								<span class="text_align">Виртуальный путеводитель по университету</span>
							</div>
						</div>
					</div>
				</section>

					<section class="vr_pad">  <!-- блок 3 -->
							
						<div class="row">
							<div class="col-5 col-md-5 vr_center ">
								<div class="row bg-gray">
									<div class="col-6 col-md-6  outline">
										<div class="vr_center">
											<span class="">ИПОИТ</span>
										</div>
									</div>
									<div class="col-6 col-md-6  outline">
										<div class="vr_center">
											<span>ФБФ</span>
										</div>
									</div>
								</div>
								<div class="row bg-gray">
									<div class="col-6 col-md-6  outline">
										<div class="vr_center">
											<span class="">ФМФ</span>
										</div>
									</div>
									<div class="col-6 col-md-6  outline">
										<div class="vr_center">   
											<span>ИИПО</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-2 col-md-2">
							</div>
							<div class="col-5 col-md-5 vr_center">
								<div class="row bg-gray">
									<div class="col-6 col-md-6 outline">
										<div class="">
											<span class="">ИПОИТ</span>
										</div>
									</div>
									<div class="col-6 col-md-6 outline">
										<div class="vr_center">
											<span>ФБФ</span>
										</div>
									</div>
								</div>
								<div class="row bg-gray">
									<div class="col-6 col-md-6 outline">
										<div class="vr_center">
											<span class="">ФМФ</span>
										</div>
									</div>
									<div class="col-6 col-md-6 outline">
										<div class="vr_center">   
											<span>ИИПО</span>
										</div>
									</div>
								</div>
							</div>
						</div>

					</section>

						<!-- CONTACT INFA -->

					<section>
						<div class="row">
							
								<div class="col-md-12 inf">

										<span>Контактная ифнормация</span>

								</div>

						</div>
					</section>

					<section>
						<div class="row">

							<div class="col-md-12" style="padding: 0px !important;">
							 	<div id="map"></div>
							</div>
						</div>

					</section>

					<!-- NEWS -->
					<section>
						<div class="row">
							<div class="col-md-12 inf">
								<span>Наши новости</span>
							</div>
						</div>
					</section>

					<section>
						
					<div class="row">
						<div class="col-sm-6 inf">
							<span>1 блок</span>
						</div>

						<div class="col-sm-6 inf">
							<span>2 блок</span>
						</div>
					</div>


					</section>


					<section>
						<div class="row">
							<div class="col-md-12 inf">
								<span>DOCUMENTS</span>
							</div>
						</div>
					</section>

					<section>
						
					<div class="row">
						<div class="col-sm-6 inf">
							<span>2</span>
						</div>

						<div class="col-sm-6 inf">
							<span>1</span>
						</div>
					</div>

							<a href="#">
							<div class="fixed_button">Есть вопросы?</div>
							</a>

					</section>

					</div>
					</div> 
				</div>
				
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