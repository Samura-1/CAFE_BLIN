<?php session_start() ?>
<?php
if ($_SESSION['loged'][0]['status'] == 1) : ?>
<?php 
require_once 'header_admin.php'; 
$view = $connect->prepare("SELECT * FROM `blog`");
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
						<th>Название</th>
						<th>Добавлена</th>
						<th></th>
						<th></th>
						</tr>
						<tr>
						<?php foreach ($view as $view) :?>
						<td><?= $view['sub_text'] ?></td>
						<td><a href="../parts/user.php?id=<?= $view['user_id'] ?>"><?= $view['user_login'] ?></a></td>
						<td>
						<a href="redact_blog.php?id=<?= $view['id_topick'] ?>" class="gren">Редактировать<img src="../img/icon/edit.png" width="19" alt=""></a>
						</td>
						<td>
						<a href="delet_blog.php?id=<?= $view['id_topick'] ?>" class="red">Удалить<img src="../img/icon/delete.png" width="19" alt=""></a>
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