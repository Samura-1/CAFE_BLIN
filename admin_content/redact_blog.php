<?php 
session_start();
if ($_SESSION['loged'][0]['status'] == 1) : ?>
<?php 
ob_start();
require_once '../admin_content/header_admin.php';
$id = $_GET['id'];
$view = $connect->prepare("SELECT * FROM `blog` WHERE id_topick = :id");
$view->bindParam(':id',htmlspecialchars($id));
$view->execute();
$view = $view->FETCHALL(PDO::FETCH_ASSOC);

if ($_SESSION['loged'][0]['status'] == 1) {
	$data = $_POST;
	if (isset($data['edit_post'])) {

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

	if ($uploadfile == '../img/post_img/') {
		$uploadfile = $view[0]['imge'];
	}else{
		$uploadfile = $uploadfile;
	}

	$edit_post = $connect->prepare("UPDATE `blog` SET `title`=:title_edit,`sub_text`=:sub_text,`full_text`=:full_text,`imge`=:img,`user_login`=:login_user,`date_add`=:date_add,`user_id`=:user_id,`sub_full_text`=:sub_full_text WHERE id_topick = :id_edid");
	$edit_post->bindParam(':title_edit',htmlspecialchars($data['title_post']));
	$edit_post->bindParam(':sub_text',htmlspecialchars($title_sub));
	$edit_post->bindParam(':full_text',htmlspecialchars($data['subject']));
	$edit_post->bindParam(':sub_full_text',htmlspecialchars($sub_text));
	$edit_post->bindParam(':img',$uploadfile);
	$edit_post->bindParam(':login_user',$view[0]['user_login']);
	$edit_post->bindParam(':date_add',$view[0]['date_add']);
	$edit_post->bindParam(':user_id',$view[0]['user_id']);
	$edit_post->bindParam(':id_edid',htmlspecialchars($id));
	$edit_post->execute();
	header("Location: index_admin.php");
	}
}
ob_end_flush();
?>
<div id="add" class="add top">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center title-section">
				<h1>Редактирование записи</h1>
				<hr>
			</div>			
		</div>
		<?php foreach ($view as $view) :?>
		<div class="row">
			<div class="col-md-12">
				<form method="POST" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="title_post">Заголовок записи</label>
				    <input type="text" class="form-control" id="title_post" name="title_post" placeholder="Заголово" required value="<?= $view['title']?>">
				  </div>
				  <div class="form-group">
				    <label for="img">Изображение записи</label>
				    <input type="file" class="form-control" id="img" name="file" accept=".png, .jpg, .jpeg">
				  </div>
				  <div class="form-group form-check">
				  	<label for="subject">Текст записи</label>
				  	<textarea name="subject" id="subject" cols="130" rows="30" style="resize: none;" required ><?= $view['full_text']?></textarea>
				  </div>
				  <button type="submit" name="edit_post" class="btn btn-primary">Добавить</button>
				</form>				
			</div>
		</div>
		<?php endforeach; ?>			
	</div>
</div>
<?php else : ?>
	<div class="eror-massege" style="color: red; font-weight: bold; font-size: 35px; display: flex;flex-direction: column; flex-wrap: wrap; justify-content: center; align-items: center;">
		<p><img src="../img/icon/404-error.png" alt=""></p>
		<p>Тебе сюда нельзя</p>		
		<a href="../index.php">На главную</a>
	</div>
<?php endif; ?>