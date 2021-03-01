<?php ob_start(); session_start(); ?>
<?php if ($_SESSION['loged'][0]['status'] == 1) : ?>
<?php 
require_once 'header_admin.php'; 
 $data = $_POST;
 if (isset($data['send_post'])) {
 	if ($_SESSION['loged'][0]['status'] == 1) {
 		$send_post = $connect->prepare("INSERT INTO `blog`(`title`, `sub_text`, `full_text`, `imge`, `user_login`,`user_id`,`sub_full_text`=:sub_full_text) VALUES (:title,:sub_text,:full_text,:imge,:user_login,:user_id)");

 		$uploaddir = '../img/post_img/';
		$uploadfile = $uploaddir . basename($_FILES['file']['name']);
		move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);

		if (strlen($data['title_post']) > 20) {
		  $title_sub = mb_strimwidth($data['title_post'], 0, 20, "...");
		}else{
		  $title_sub = $data['title_post'];
		}
		if (strlen($data['subject']) > 70) {
		  $sub_text = mb_strimwidth($data['subject'], 0, 70, "...");
		}else{
		  $sub_text = $data['subject'];
		}			

 		$send_post->bindParam(':title',htmlspecialchars($data['title_post']));
 		$send_post->bindParam(':sub_text',htmlspecialchars($title_sub));
 		$send_post->bindParam(':full_text',htmlspecialchars($data['subject']));
 		$send_post->bindParam(':sub_full_text',htmlspecialchars($sub_text));
 		$send_post->bindParam(':imge',$uploadfile);
 		$send_post->bindParam(':user_login',$_SESSION['loged'][0]['login']);
 		$send_post->bindParam(':user_id',$_SESSION['loged'][0]['id_user']);
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
				<h1>Добавить Новую запись</h1>
				<hr>
			</div>			
		</div>
		<div class="row">
			<div class="col-md-12">
				<form action="add_topick.php" method="POST" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="title_post">Заголовок записи</label>
				    <input type="text" class="form-control" id="title_post" name="title_post" placeholder="Заголово" required>
				  </div>
				  <div class="form-group">
				    <label for="img">Изображение записи</label>
				    <input type="file" class="form-control" id="img" name="file" accept=".png, .jpg, .jpeg" required>
				  </div>
				  <div class="form-group form-check">
				  	<label for="subject">Текст записи</label>
				  	<textarea name="subject" id="subject" cols="130" rows="30" style="resize: none;" required></textarea>
				  </div>
				  <button type="submit" name="send_post" class="btn btn-primary">Добавить</button>
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