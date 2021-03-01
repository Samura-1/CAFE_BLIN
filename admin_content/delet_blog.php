<?php 
ob_start();
session_start();
require_once '../db/config.php';
if ($_SESSION['loged'][0]['status'] == 1) : ?>
<?php 
$id_delet = $_GET['id']; 
if ($_SESSION['loged'][0]['status'] == 1) {
	$delet_blog = $connect->prepare("DELETE FROM `blog` WHERE id_topick = :id");
	$delet_blog->BindParam(':id',htmlspecialchars($id_delet));
	$delet_blog->execute();
	header('Location: '.$_SERVER['HTTP_REFERER']);
}
ob_end_flush();
?>
<?php else : ?>
	<div class="eror-massege" style="color: red; font-weight: bold; font-size: 35px; display: flex;flex-direction: column; flex-wrap: wrap; justify-content: center; align-items: center;">
		<p><img src="../img/icon/404-error.png" alt=""></p>
		<p>Тебе сюда нельзя</p>		
		<a href="../index.php">На главную</a>
	</div>
<?php endif; ?>