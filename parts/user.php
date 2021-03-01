<?php 
ob_start();
require 'header.php';
$id = $_GET['id'];
$id_two = $_GET['id'];
 if (isset($id)) {
 	$info = $connect->prepare("SELECT * FROM `user` WHERE id_user = :id");
 	$info->bindParam(':id',$_GET['id']);
 	$info->execute();
 	$info = $info->FETCHALL(PDO::FETCH_ASSOC);
     
 	$info_user = $connect->prepare("SELECT * FROM `options_user` WHERE id_user = :id");
 	$info_user->bindParam(':id',$id_two);
 	$info_user->execute();
 	$info_user = $info_user->FETCHALL(PDO::FETCH_ASSOC);
 } 
  $order = $connect->prepare("SELECT * FROM `order_cart` WHERE id_user = :id");
  $order->bindParam(':id',$_GET['id']);
  $order->execute();
  $order = $order->FETCHALL(PDO::FETCH_ASSOC);


 $data = $_POST;
 	if (isset($data['edit'])) {
 	if ($_SESSION['loged'][0]['id_user'] == $info[0]['id_user']) {
 		if ($data['firts_name'] == '') {
 			$data['firts_name'] = $info_user[0]['name'];
 		}
  		if ($data['second_name'] == '') {
 			$data['second_name'] = $info_user[0]['second_name'];
 		}
  		if ($data['file'] == '') {
 			$uploaddir = $info_user[0]['avata'];
 		} 
  		if ($data['date'] == '') {
 			$data['date'] = $info_user[0]['Date_of_Birth'];
 		}  			
 		$uploaddir = '../img/avatars/';
		$uploadfile = $uploaddir . basename($_FILES['file']['name']);
		move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);	

 		$updata = $connect->prepare("UPDATE options_user SET id_user=:id, name=:firts_name, second_name=:second_name, avata=:avatar, Date_of_Birth=:date_of  WHERE id_user = :id");
 		$updata->bindParam(':firts_name',$data['firts_name']);
 		$updata->bindParam(':id',$_SESSION['loged'][0]['id_user']);
 		$updata->bindParam(':second_name',$data['second_name']);
 		$updata->bindParam(':avatar',$uploadfile);
 		$updata->bindParam(':date_of',$data['date']);
 		$updata->execute();
 		header('Location: '.$_SERVER['HTTP_REFERER']);
 	}
 }
 ob_end_flush();
?>
<section id="cab" class="cab">
	<?php foreach ($info as $info) : ?>
	<?php 
	switch ($info['status']) {
	 case '1':
	  $status = 'Admin';
	 break;
	 case '0':
	 $status = 'User';
	 break;	
	}
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 text-center title-cab">
				<h1>Личный кабинет</h1>
			</div>
		</div>
	</div>	
	<div class="container wraper-story">
		<div class="row">
			<div class="col-sm-3 col-lg-3">
				<div class="wrapper-user">
					<img src="<?= $info_user[0]['avata']?>" alt="" class="img-thumbnail">
					<div class="user-info-name">
						<p><?= $info['login'] ?></p>
						<p><?= $status ?></p>
						<p>На сайте c <br> 
						<span class="last-vized"><?= date('j-m-Y',strtotime($info['last_up_time'])) ?></span></p>
						<?php if ($_SESSION['loged'][0]['status'] == 1): ?>
							<span><a href="../admin_content/index_admin.php">Панель администратора</a></span>
						<?php endif ?>
					</div>
				</div>
			</div>
			<?php if ($_SESSION['loged'][0]['id_user'] == $info['id_user']) : ?>
			<?php foreach ($info_user as $info_user) : ?>
			<div class="col-sm-9 col-lg-9">
				<div class="wrapper-form-edit">
					<div class="form-edit">
						<form  method="POST" enctype="multipart/form-data">
							<div class="txinput">
								<label for="Firts-nam">Имя</label>
								<input type="text" id="firts_name" name="firts_name" placeholder="<?= @$info_user['name'] ?>">
							</div>
							<div class="txinput">
								<label for="Firts-nam">Фамиля</label>
								<input type="text" id="second_name" name="second_name" placeholder="<?= @$info_user['second_name'] ?>">
							</div>	
							<div class="txinput">
								<label for="avatar-edit">Изменить аватар</label>
								<input type="file" id="avatar-edit" name="file">
							</div>								
							<div class="txinput">
				                <label for="date">Дата рождения: </label>
				                <input type="date" id="date" name="date" value="<?= @$info_user['Date_of_Birth'] ?>">
							</div>	
							<div class="btn-chache">
								<input type="submit" name="edit" value="Сохарнить">
							</div>													
						</form>
					</div>
				</div>
					<div class="row">
						<div class="col-md-12">
							<div class="last-active">
								<h2>История заказов</h2>
								<hr>
							</div>							
						</div>
						<?php foreach ($order as $key => $order): ?>
						<div class="col-sm-12">
							<div class="last">
							    <p class="date">#<?= $order['id_order'] ?></p>
							    <?php if ($order['status'] == 'Ожидает'): ?>
                                   <p>Статус : <span style="color: orange"><?= $order['status'] ?></span></p>
							    <?php else: ?>
                                   <p>Статус : <span style="color: green"><?= $order['status'] ?></span></p>
							    <?php endif ?>
							    <p>Дата: <?= (date('d ',strtotime($order['date'])) .  $monthes[(date('n'))]) ?></p>
							    <p>Сумма : <?= $order['total_price'] ?></p>
							</div>							
						</div>
						<?php endforeach ?>	
				   </div>	
			</div>	
		<?php endforeach; ?>
			<?php else : ?>
			<div class="col-sm-9 col-lg-9 align-middle">
				<div class="wrapper-info_user">
					<div class="info_user">
						<div class="info-user_item">
						<span>Имя</span>
						<p><?php echo $info_user[0]['name'] ?></p>							
						</div>
						<div class="info-user_item">
						<span>Фамилия</span>
						<p><?php echo $info_user[0]['second_name'] ?></p>							
						</div>
						<div class="info-user_item">
						<span>Возраст</span>
						<p><?php echo(date('d ',strtotime($info_user[0]['Date_of_Birth'])) .  $monthes[(date('n'))] . date(' Y',strtotime($info_user[0]['Date_of_Birth'])));?></p>								
						</div>
						<div class="info-user_item">
						<span>На сайте</span>	
						<p>C <?php echo date('d-n-Y',strtotime($info['last_up_time'])) ?></p>							
						</div>				
					</div>
				</div>					
			</div>						
			<?php endif; ?>
		</div>
		<?php endforeach; ?>
	</div>		
</section>
<?php 
require 'footer.php';
?>