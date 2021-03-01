<?php
require 'header.php';
?>
<section id="live" class="live">
	<div class="container">
		<div class="col-md-12 text-center">
			<div class="live-cam">
			</div>
			<div class="live-cam">
				<h1>Прямая трансляция</h1>
				<hr>
				<iframe width="720" height="620" src="https://www.youtube.com/embed/gnyYpX2nc1g" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
	</div>
<!-- 		<div class="container">
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
				<textarea name="comment_live" id="comment_live" cols="100" rows="6" style="resize: none; width: 100"></textarea>
				<br>
				<div class="send_coment">
				<input type="submit" id="do_send" name="do_send" value="Отправить">
				</div>
				</form>
			</div>
		</div>	
		<?php else: ?>
			<div class="eror_aut">
				<p>Вы должны быть авторизованы чтобы оставлять комментарии</p>
			</div>
		<?php endif ?> -->
</section>
<?php
require 'footer.php';