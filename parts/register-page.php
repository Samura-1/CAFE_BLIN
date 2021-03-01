<?php 
ob_start();
require 'header.php';
$data = $_POST;
if (isset($_POST['do_reg'])) {
	$erorrs = array();
	if (trim(strlen($data['login'])) >= 20) {
		$erorrs[] = 'Логин слишком длинный';
	}
	if (trim($data['login']) == '') {
		$erorrs[] = 'Логин не может быть пустым';
	}
	if ($data['firts_password'] == '') {
		$erorrs[] = 'Пароль не может быть пустым';
	}
	if (strlen($data['firts_password']) < 3) {
		$erorrs[] = 'Пароль слишком короткий';
	}	
	if ($data['firts_password'] !== $data['second_password']) {
		$erorrs[] = 'Пароли не совпадают';
	}		

	$check_user = $connect->prepare("SELECT * FROM `user` WHERE login = :login");
	$check_user->bindParam(':login',$data['login']);
	$check_user->execute();
	$count_user = $check_user->rowCount();

	$check_email = $connect->prepare("SELECT `email` FROM `user` WHERE email = :email");
	$check_email->bindParam(':email',$data['email']);
	$check_email->execute();
	$count_email = $check_email->rowCount();

	if ($count_email > 0) {
		$erorrs[] = 'Пользователь с таким Email уже зарегистрирован';
	}
	if ($count_user > 0) {
		$erorrs[] = 'Пользователь с таким Логином уже зарегистрирован';
	}
	if (empty($erorrs)) {
		$add_user = $connect->prepare("INSERT INTO `user`(`login`, `email`, `password`) VALUES (:login,:email,:password)");
		$add_user->bindParam(':login',htmlspecialchars($data['login']));
		$add_user->bindParam(':email',htmlspecialchars($data['email']));
		$add_user->bindParam(':password',password_hash($data['firts_password'], PASSWORD_DEFAULT));
		$add_user->execute();
		$lastid = $connect->lastInsertId();
		$add_option = $connect->prepare("INSERT INTO `options_user`(`id_user`) VALUES (:id_user)");
		$add_option->bindParam(':id_user',$lastid);
		$add_option->execute();
		header("Location: ../index.php");
	}

}
ob_end_flush();
?>
<section id="register" class="register">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="form-register_wrapper">
					<div class="form-wrapper">
						<form action="register-page.php" method="POST">
							<h1>Регистрация</h1>
							<span style="color: red; font-weight: bold;"><?php echo @array_shift($erorrs) ?></span>
							<br>
							<div class="inptext">
								<input type="text" name="login" required value="<?php echo @$_POST['login'] ?>">
								<span data-placeholder="Ваш логин"></span>
							</div>
							<div class="inptext">
								<input type="email" name="email" required value="<?php echo @$_POST['email'] ?>">
								<span data-placeholder="Ваша почта"></span>								
							</div>	
							<div class="inptext">
								<input type="password" name="firts_password" required>
								<span data-placeholder="Ваш пароль"></span>
							</div>
							<div class="inptext">
								<input type="password" name="second_password" required>
								<span data-placeholder="Повторный пароль"></span>
							</div>	
							<div class="btn-submit_register">
								<input type="submit" name="do_reg" value="Зарегистрироваться">
							</div>	
							<div class="text-bottom">
								<p>У вас есть аккаунт ? <a href="../parts/loged-page.php">Войти</a></p>
							</div>																				
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
require 'footer.php';

