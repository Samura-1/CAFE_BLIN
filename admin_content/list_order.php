<?php session_start() ?>
<?php
if ($_SESSION['loged'][0]['status'] == 1) : ?>
<?php 
ob_start();
require_once 'header_admin.php'; 
$status_order = "Ожидает";
$view = $connect->prepare("SELECT * FROM `order_cart` WHERE status = :status");
$view->bindParam(':status',$status_order);
$view->execute();
$view = $view->FETCHALL(PDO::FETCH_ASSOC);
if (isset($_POST['edit_order'])) {
	$data = $_POST;
	$edit_order = $connect->prepare("UPDATE `order_cart` SET `status`= :status WHERE id_order = :id");
	$edit_order->bindParam(':status',htmlspecialchars($data['select']));
	$edit_order->bindParam(':id',htmlspecialchars($data['id_order']));
	$edit_order->execute();
	header ("Location: ".$_SERVER['HTTP_REFERER']);
ob_end_flush();	
}
?>
<section id="list" class="top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="list-table">
					<table class="table table-dark">      
						<tr>
						<th>Номер Заказа</th>
						<th>Заказ</th>
						<th>Заказчик</th>
						<th>Цена</th>
						</tr>
						<tr>
						<?php foreach ($view as $view) :?>
						<td><?= $view['id_order']?></td>
						<td><?=$view['order_text'] ?></td>
						<td><a href="../parts/user.php?id=<?= $view['user_id'] ?>"><?= $view['login_user'] ?></a></td>
						<td><?=$view['total_price'] ?></td>
						<td>
						<form  method="POST">
							<select size="1" name="select">
							<option value="Ожидает" selected="<?= $view['status']?>">Ожидает</option>
							<option value="Готов">Готов</option>
							</select>
							<br>
							<input type="hidden" name="id_order" value="<?= $view['id_order']?>">
							<input type="submit" name="edit_order" value="Сохранить">
						</form>
						</td>
						</tr>
					    <?php endforeach; ?>
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