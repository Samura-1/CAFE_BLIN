<?php ob_start(); session_start(); ?>
<?php if ($_SESSION['loged'][0]['status'] == 1) : ?>
<?php 
require_once 'header_admin.php'; 
 $data = $_POST;
 if (isset($data['send_product'])) {
 	if ($_SESSION['loged'][0]['status'] == 1) {
 		$send_post = $connect->prepare("INSERT INTO `product`(`name_product`,`img_product`, `price`, `more_info`, `user`, `id_user`) VALUES (:name_product,:img_product,:price,:more_info,:user,:id_user)");

 		$uploaddir = '../img/imge_product/';
		$uploadfile = $uploaddir . basename($_FILES['file']['name']);
		move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);

 		$send_post->bindParam(':name_product',htmlspecialchars($data['title_product']));
 		$send_post->bindParam(':price',htmlspecialchars($data['price']));
 		$send_post->bindParam(':more_info',htmlspecialchars($data['subject']));
 		$send_post->bindParam(':img_product',$uploadfile);
 		$send_post->bindParam(':user',$_SESSION['loged'][0]['login']);
 		$send_post->bindParam(':id_user',$_SESSION['loged'][0]['id_user']);
 		$send_post->execute();
 		header("Location: index_admin.php");
 	}
 }
 ob_end_flush();
?>	
<div id="add" class="add top">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center title-section">
				<h1>Добавить новый товар</h1>
				<hr>
			</div>			
		</div>
		<div class="row">
			<div class="col-md-12">
				<form action="add_product.php" method="POST" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="title_post">Название товара</label>
				    <input type="text" class="form-control" id="title_product" name="title_product" placeholder="Название товара" required>
				  </div>
				  <div class="form-group">
				    <label for="title_post">Цена</label>
				    <input type="number" min="1" class="form-control" id="price" name="price" placeholder="цена товара" required>
				  </div>				  
				  <div class="form-group">
				    <label for="img">Изображение записи</label>
				    <input type="file" class="form-control" id="img" name="file" accept=".png, .jpg, .jpeg" required>
				  </div>
				  <div class="form-group form-check">
				  	<label for="subject">Дополнительная информация</label>
				  	<textarea name="subject" id="subject" cols="130" rows="30" style="resize: none;" required></textarea>
				  </div>			  
				  <button type="submit" name="send_product" class="btn btn-primary">Добавить</button>
				</form>				
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