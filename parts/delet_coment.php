<?php 
session_start();
require_once '../db/config.php';
if ($_SESSION['loged']) {
	$id = $_GET['id'];
	if (isset($id)) {
		$delet_coment = $connect->prepare("DELETE FROM `coment` WHERE id_coment = :id");
		$delet_coment->bindParam(':id',htmlspecialchars($id));
		$delet_coment->execute();
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
}
?>