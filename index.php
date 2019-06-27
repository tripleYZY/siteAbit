<?php
session_start();
$logout = '/index.php?logout=true';
if (isset($_REQUEST['logout'])){
	unset($_COOKIE['user_id'], $_COOKIE['username'], $_COOKIE['password']);
	session_destroy();
} 

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
				$home_url = 'http://' . $_SERVER['HTTP_HOST'];
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
  <?php 
  		include 'head.php';
   ?>
  <body>

  	<div id="page-preloader" class="preloader">
	<div id="cube-loader">
    <div class="caption">
      <div class="cube-loader">
        <div class="cube loader-1"></div>
        <div class="cube loader-2"></div>
        <div class="cube loader-4"></div>
        <div class="cube loader-3"></div>
      </div>
    </div>
  </div>
</div>

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
					<a href="index.php" class="dec_none">
						<span class="header-block__title logo_txt">
							<img src="bspu.png" class="logo_p"> 
							Приёмная комиссия БГПУ им. М.Акмуллы
						</span>
					</a>
				</div>

				<div class="col-12 col-md-12 login">
					
<?php
	if(empty($_COOKIE['username'])) {
?>
	<div><a href="login.php"><button class="buttonlog">Вход</button></a><br></div>
	<div><a href="signup.php">Регистрация</a></div>
<?php
}
else {
	?>
	<div><p  class="padt"><a href="myprofile.php">Мой профиль</a></p></div>
	<div><p><a href="exit.php">Выйти(<?php echo $_COOKIE['username']; ?>)</a></p><div>
<?php	
}
?>
</div>

		</div></div>
	</header>

	<?php 
		if(isset ($_REQUEST['reg'])) {
			echo '<div class="col-md-12 reg"><span class="reg_text">Ваш аккаунт зарегестрирован</span>
</div>';
		}
	 ?>
	

<div class="container">	
		<div class="col-md-12 " style="padding: 0 !important">
				<div class="row list cent ">
					<div class="col-md-12 yay "  style="margin-top: 25px; margin-bottom: 25px; border: 1.25px solid #183884; padding: 0px !important">

						<a href="#">
				<div class="">
					<div class="col-md-12 yaycol " style="">
						<div class="center ">
					
						<span>ХОД ПРИЕМА 2019</span>
						</div>
					</div>
				</div>
			</div>
				</a>
		</div>
		
			<div class="col-md-12 revealator-zoomin revealator-delay2 revealator-once" style="padding: 0 !important"> 
				<div class="row list cent ">
					
					<div class="col-12 col-md-4 bg-gray bor_b">
						<span id="lines">0</span><span>&nbsp; образовательных программ</span>
					</div>

					<div class="col-12 col-md-4 bg-gray bor_l1 bor_b">
						<span id="lines2">0</span><span>&nbsp; бюджетных мест</span>
					</div>

					<div class="col-12 col-md-4 bg-gray bor_l1 bor_b">
						<span>до
              <div class="loader-container">
                <div class="loader">
                  <span>0%</span>
                  <span>10%</span>
                  <span>20%</span>
                  <span>30%</span>
                  <span>40%</span>
                  <span>50%</span>
                </div>
              </div>
               скидки на платное обучение</span>
					</div>

				</div>
			</div>

			<div class="row">
				<!-- левая граница -->


						<!-- контейнер -->
			<div class="col-md-12">

				<section class="revealator-zoomin revealator-delay2 revealator-once">	<!-- блок 2 -->
					<div class="row list list_b">
						<a href="#" class="col-6 col-md-3 bor_b bor_r bg-gray ptr acolor">
							
							<span>Колледж</span>	

						</a>
						<a href="#" class="col-6 col-md-3 bor_b bor_l bg-gray ptr acolor">
							<span>Бакалавриат</span>
						</a>

						<a href="#" class="col-6 col-md-3 bor_b bor_r bg-gray bor_l1 ptr acolor">
							<span>Магистратура</span>
						</a>

						<a href="#" class="col-6 col-md-3 bor_b bor_l bg-gray ptr acolor">
							<span>Аспирантура</span>
						</a>
					</div>

				</section>


<!-- #354d83 - фон   #233456 - буквы TEXT V VR -->
				<section class="revealator-zoomin revealator-delay2 revealator-once">
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
								<div class="row bg-gray ">
									<a href="#" class="col-6 col-md-6 outline ptr acolor">
										<div class="vr_center ">
											<span class="">ИПОИТ</span>
										</div>
									</a>
									<a href="#" class="col-6 col-md-6  outline ptr acolor">
										<div class="vr_center">
											<span>ФБФ</span>
										</div>
									</a>
								</div>
								<div class="row bg-gray">
									<a href="#" class="col-6 col-md-6  outline ptr acolor">
										<div class="vr_center">
											<span class="">ФМФ</span>
										</div>
									</a>
									<a href="#" class="col-6 col-md-6  outline ptr acolor">
										<div class="vr_center">   
											<span>ИИПО</span>
										</div>
									</a>
								</div>
							</div>

							<div class="col-2 col-md-2">
							</div>
							<div class="col-5 col-md-5 vr_center">
								<div class="row bg-gray">
									<a href="#" class="col-6 col-md-6 outline ptr acolor">
										<div class="">
											<span class="">ИПОИТ</span>
										</div>
									</a>
									<a href="#" class="col-6 col-md-6 outline ptr acolor">
										<div class="vr_center">
											<span>ФБФ</span>
										</div>
									</a>
								</div>
								<div class="row bg-gray">
									<a href="#" class="col-6 col-md-6 outline ptr acolor">
										<div class="vr_center">
											<span class="">ФМФ</span>
										</div>
									</a>
									<a href="#" class="col-6 col-md-6 outline ptr acolor">
										<div class="vr_center">   
											<span>ИИПО</span>
										</div>
									</a>
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
			</div>
		</div>
				
					<!-- конец контейнера -->

<!-- правая граница -->


					<footer class="footer">
						<div class="row">
							<div class="col-12 col-md-12">
								<a href="https://vk.com/bgpu_akmully" class="icon"><i class="fa fa-vk" aria-hidden="true"></i></a>
								<a href="https://www.facebook.com/BashGosPed" class="icon"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								<a href="https://twitter.com/bspu" class="icon"><i class="fa fa-twitter" aria-hidden="true"></i></a>
								<a href="https://www.instagram.com/bgpu/" class="icon"><i class="fa fa-instagram icon_i" aria-hidden="true"></i></a>
								<a href="https://www.youtube.com/user/bspunews" class="icon"><i class="fa fa-youtube" aria-hidden="true"></i></a>
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

	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/fm.revealator.jquery.min.js"></script>
	<script src="js/preloader.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=c3514a36-1e6e-4173-abe4-71fa1262c757" type="text/javascript"></script>
    <script src="js/placemark.js" type="text/javascript"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script>
    $('#lines')
  .prop('number', 0)
  .animateNumber(
    {
      number: 130
    },
    3000
  );
    </script>

    <script>
    $('#lines2')
  .prop('number', 0)
  .animateNumber(
    {
      number: 1699
    },
    5000
  );
    </script>
  </body>
</html>