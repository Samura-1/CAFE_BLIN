<?php 
ob_start();
require 'header.php';
if ($_SESSION['loged']) {
        $errors[] = 'Вы уже авторизированны!';
}else{
	$data = $_POST;
	if (isset($data['do_login'])) {
		$errors = array();
		$find_user = $connect->prepare("SELECT * FROM `user` WHERE login = :login");
		$find_user->bindParam(':login',$data['login']);
		$find_user->execute();
		$count_user = $find_user->rowCount();
		$find_user = $find_user->FETCHALL(PDO::FETCH_ASSOC);
		if ($count_user > 0) {
			if (password_verify($data['password'],$find_user[0]['password'])) {
				$_SESSION['loged'] = $find_user;
				header("Location: ../index.php");
			}else{
				$errors[] = 'Не верно ведён пароль!';
			}
		}else{
			$errors[] = 'Пользователь с таким логином не найден!';
		}
	}
}
ob_end_flush();
?>
<section id="login" class="login">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="form-register_wrapper">
					<div class="form-wrapper">
						<form action="loged-page.php" method="POST">
							<h1>Вход</h1>
							<span><?php echo @array_shift($errors); ?></span>
							<div class="inptext">
								<input type="text" name="login" value="<?php echo @$_POST['login']?>">
								<span data-placeholder="Логин"></span>
							</div>
							<div class="inptext">
								<input type="password" name="password">
								<span data-placeholder="Пароль"></span>
							</div>
							<div class="btn-submit_register">
								<input type="submit" name="do_login" value="Войти">
							</div>	
							<div class="text-bottom">
								<p>У вас нет аккаунта ? <a href="../parts/register-page.php">Регистрация</a></p>
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