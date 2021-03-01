<?php session_start() ?>
<?php
if ($_SESSION['loged'][0]['status'] == 1) : ?>
<?php 
ob_start();
require_once 'header_admin.php'; 
$status_order = "Ожидает";
$view = $connect->prepare("SELECT * FROM `order_cart`");
$view->execute();
$view = $view->FETCHALL(PDO::FETCH_ASSOC);
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