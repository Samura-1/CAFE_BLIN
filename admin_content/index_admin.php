<?php session_start() ?>
<?php
if ($_SESSION['loged'][0]['status'] == 1) : ?>
<?php 
require_once 'header_admin.php'; 
 $view = $connect->prepare("SELECT * FROM `blog`");
 $view->execute();
 $count = $view->rowCount();

 $last_user = $connect->prepare("SELECT * FROM `blog` ORDER BY id_topick DESC LIMIT 1");
 $last_user->execute();
 $last_user = $last_user->FETCHALL(PDO::FETCH_ASSOC);

 $product = $connect->prepare("SELECT * FROM `product`");
 $product->execute();
 $count_product = $product->rowCount();

 $last_user_product = $connect->prepare("SELECT * FROM `product` ORDER BY id_product DESC LIMIT 1");
 $last_user_product->execute();
 $last_user_product = $last_user_product->FETCHALL(PDO::FETCH_ASSOC);
 
 $user_count = $connect->prepare("SELECT * FROM `user`");
 $user_count->execute();
 $count_user = $user_count->rowCount();

 $status_order = "Ожидает";
 $order_count = $connect->prepare("SELECT * FROM `order_cart` WHERE status = :status");
 $order_count->bindParam(':status',$status_order);
 $order_count->execute();
 $order_count = $order_count->rowCount();

 $story_order = $connect->prepare("SELECT * FROM `order_cart`");
 $story_order->execute();
 $story_count = $story_order->rowCount();
?>	
<div class="section top" id="gl_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="div_list_post">
					<div class="title_block">
						<p>Записи</p>
					</div>
					<div class="info_block">
						<table class="table" style="text-align: center;">
						  <thead>
						    <tr>
						      <th scope="col"></th>
						      <th scope="col"><a href="list_post.php" style="color: #000;">Колличество</a></th>
						      <th scope="col">От кого</th>
						      <th scope="col">Добавить новую</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th></th>
						      <td><a href="list_post.php"><?= $count ?></a></td>
						      <td><a href="../parts/user.php?id=<?= $last_user[0]['user_id'] ?>"><?= $last_user[0]['user_login'] ?></a></td>
						      <td><a href="list_product.php"><img src="../img/icon/plus.png" width="20" alt=""></a></td>
						    </tr>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<div class="title_block">
					<p>Товары</p>
				</div>
					<div class="info_block">
						<table class="table" style="text-align: center;">
						  <thead>
						    <tr>
						      <th scope="col"></th>
						      <th scope="col"><a href="list_product.php" style="color: #000;">Колличество</a></th>
						      <th scope="col">От кого</th>
						      <th scope="col">Добавить новую</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th></th>
						      <td><a href="list_product.php"><?= $count_product ?></a></td>
						      <td><a href="../parts/user.php?id=<?= $last_user[0]['user_id'] ?>"><?= $last_user_product[0]['user'] ?></a></td>
						      <td><a href="add_product.php"><img src="../img/icon/plus.png" width="20" alt=""></a></td>
						    </tr>
						  </tbody>
						</table>
					</div>								
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="title_block">
					<p>Пользователи</p>
				</div>
					<div class="info_block">
						<table class="table" style="text-align: center;">
						  <thead>
						    <tr>
						      <th scope="col"></th>
						      <th scope="col"><a href="user_list.php" style="color: #000;">Колличество</a></th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th></th>
						      <td><a href="user_list.php"><?= $count_user ?></a></td>
						    </tr>
						  </tbody>
						</table>
					</div>						
			</div>
		</div>	
		<div class="row">
			<div class="col-md-12">
				<div class="title_block">
					<p>Заказы</p>
				</div>
					<div class="info_block">
						<table class="table" style="text-align: center;">
						  <thead>
						    <tr>
						      <th scope="col"></th>
						      <th scope="col"><a href="list_order.php" style="color: #000;">Колличество</a></th>
						      <th scope="col"><a href="story_order.php">История заказов</a></th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th></th>
						      <td><a href="list_order.php"><?= $order_count ?></a></td>
						      <td><a href="story_order.php"><?= $story_count ?></a></td>
						    </tr>
						  </tbody>
						</table>
					</div>						
			</div>
		</div>				
	</div>
</div>
<?php else : ?>
	<div class="eror-massege" style="color: red; font-weight: bold; font-size: 35px; display: flex;flex-direction: column; flex-wrap: wrap; justify-content: center; align-items: center;">
		<p><img src="../img/icon/404-error.png" alt=""></p>
		<p>Тебе сюда нельзя</p>		
		<a href="../index.php">На главную</a>
	</div>
<?php endif; ?>