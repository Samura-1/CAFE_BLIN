<?php 
ob_start();
session_start();
if ($_SESSION['loged'][0]['status'] == 1) : ?>
<?php 
require_once '../admin_content/header_admin.php';
ob_end_flush();
?>
<section class="top seting_site">
	
</section>
<?php else : ?>
	<div class="eror-massege" style="color: red; font-weight: bold; font-size: 35px; display: flex;flex-direction: column; flex-wrap: wrap; justify-content: center; align-items: center;">
		<p><img src="../img/icon/404-error.png" alt=""></p>
		<p>Тебе сюда нельзя</p>		
		<a href="../index.php">На главную</a>
	</div>
<?php endif; ?>