<?php 
ob_start();
session_start();
require_once '../db/config.php';
if (isset($_SESSION['loged'])) {
if (isset($_POST['order'])) {
  $data = $_POST;
  $status = "Ожидает";
  $send_order = $connect->prepare("INSERT INTO `order_cart`(`id_user`, `login_user`, `order_text`, `total_price`, `status`) 
    VALUES (:id_user,:login_user,:order_text,:total_price,:status)");
  $send_order->bindParam(':id_user',$_SESSION['loged'][0]['id_user']);
  $send_order->bindParam(':login_user',$_SESSION['loged'][0]['login']);
  $send_order->bindParam(':order_text',htmlspecialchars(trim($data['count'])));
  $send_order->bindParam(':total_price',htmlspecialchars($data['qunt']));
  $send_order->bindParam(':status',$status);
  $send_order->execute();
  $id = $connect->lastInsertId();

  $_SESSION['totalQuantity'] = array();
  $_SESSION['totalPrice'] = array();
  $_SESSION['cart'] = array();
  $_SESSION['order'] = $id;
  header ("Location: ".$_SERVER['HTTP_REFERER']);

}
}
ob_end_flush();
?>