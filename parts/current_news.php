<?php 
ob_start();
require 'header.php';
$id_topick = $_GET['id'];
if (isset($id_topick)) {
	$current_news = $connect->prepare("SELECT * FROM `blog` WHERE id_topick = :id");
	$current_news->bindParam(':id',htmlspecialchars($id_topick));
	$current_news->execute();
	$current_news = $current_news->FETCHALL(PDO::FETCH_ASSOC);
}
$data = $_POST;
if (isset($data['do_coment'])) {
	$send_coment = $connect->prepare("INSERT INTO `coment`(`id_user`, `login_user`, `id_topick`, `coment`) VALUES (:id_user,:login_user,:id_topick,:coment)");
	$send_coment->bindParam(':id_user',htmlspecialchars($_SESSION['loged'][0]['id_user']));
	$send_coment->bindParam(':login_user',htmlspecialchars($_SESSION['loged'][0]['login']));
	$send_coment->bindParam(':id_topick',htmlspecialchars($id_topick));
	$send_coment->bindParam(':coment',htmlspecialchars($data['comment_topick']));
	$send_coment->execute();
	header("Location: ".$_SERVER["REQUEST_URI"]);
}
$select_coment = $connect->prepare("SELECT * FROM `coment` WHERE id_topick = :id_top");
$select_coment->bindParam(':id_top',$id_topick);
$select_coment->execute();
$select_coment = $select_coment->FETCHALL(PDO::FETCH_ASSOC);
ob_end_flush();
?>
<section id="current_news" class="current_news">
	<div class="container bg_s">
		<?php foreach ($current_news as $current_news) : ?>
		<div class="row">
			<div class="col-md-12">
				<div class="title-news text-center">
					<h2><?= $current_news['title'] ?></h2>
				</div>
				<div class="col-md-12 text-center">
					<div class="body-news">
					 <div class="img-news">
					 	<img src="<?= $current_news['imge'] ?>" alt="">
					 </div>
					 <p><?= $current_news['full_text'] ?></p>					
					</div>
				</div>
			</div>
		</div>			
		<?php endforeach; ?>
		<div class="container">
			<p class="title-comentar">Кометарии</p>
			<hr>
			<?php foreach ($select_coment as $select_coment): ?>
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="user-coment">
						<div class="p"><p><span class="user_aut"><a href=""><?=$select_coment['login_user']?></a></span> <span class="delet"><a class="delet_coment" id="delet_coment" href="delet_coment.php?id=<?=$select_coment['id_coment']?>">&#10006;</a></p></div>
						<div class="user-p"><p><?= $select_coment['coment']?></p></div>
					</div>
				</div>
			</div>				
			<?php endforeach ?>
		</div>
		<?php if ($_SESSION['loged']): ?>
		<div class="container">				
			<hr>
			<div class="row">
				<form method="POST">
				<textarea name="comment_topick" id="comment_topick" cols="100" rows="6" style="resize: none; width: 100"></textarea>
				<br>
				<div class="send_coment">
					<input type="submit" id="do_coment" name="do_coment" value="Отправить">
				</div>
				</form>
			</div>
		</div>	
		<?php else: ?>
			<div class="eror_aut">
				<p>Вы должны быть авторизованы чтобы оставлять комментарии</p>
			</div>
		<?php endif ?>
</section>
<?php 
require 'footer.php';
?>