<?php session_start() ?>
<?php
ob_start();
if ($_SESSION['loged'][0]['status'] == 1) : ?>
<?php 
require_once 'header_admin.php'; 
$view_user = $connect->prepare("SELECT * FROM `user`");
$view_user->execute();
$view_user = $view_user->FETCHALL(PDO::FETCH_ASSOC);

if (isset($_POST['edit_status'])) {
	$data = $_POST;
	$edit_status = $connect->prepare("UPDATE `user` SET `status`= :status WHERE id_user = :id");
	$edit_status->bindParam(':status',htmlspecialchars($data['status']));
	$edit_status->bindParam(':id',htmlspecialchars($data['id']));
	$edit_status->execute();
	header ("Location: ".$_SERVER['HTTP_REFERER']);
}
ob_end_flush();
?>
<section id="list" class="top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="desc" style="padding-bottom: 5px;">
				<p>Значение статусов</p>
				<ul>
					<li>1 = 'Админ'</li>
					<li>0 = 'Обчный пользователь'</li>
				</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="list-table">
					<table class="table table-dark">      
						<tr>
						<th>Имя</th>
						<th>Дата регистрация</th>
						<th>Статус</th>
						<th></th>
						</tr>
						<tr>
						<?php foreach ($view_user as $view_user): ?>			
						<td><?= $view_user['login'] ?></td>
						<td><?= $view_user['last_up_time'] ?></td>
						<td>
							<div class="status-form">
								<form method="POST">
									<input type="number" min="0" max="1" name="status" placeholder="<?= $view_user['status']?>">
									<input type="hidden" name="id" value="<?= $view_user['id_user']?>">
									<input type="submit" class="edit_user_status" name="edit_status" value="Сохрать изменение">
								</form>								
							</div>
					    </td>						
						<td></td>
						</tr>
					    <?php endforeach ?>
					</table>				
				</div>
			</div>
		</div>
	</div>	
</section>
<?php else : ?>
	<div class="eror-massege" style="color: red; font-weight: bold; font-size: 35px; display: flex;flex-direction: column; flex-wrap: wrap; justify-content: center; align-items: center;">
		<p><img src="../img/icon/404-error.png" alt=""></p>
		<p>Тебе сюда нельзя</p>		
		<a href="../index.php">На главную</a>
	</div>
<?php endif; ?>