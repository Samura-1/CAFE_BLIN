<?php
session_start(); 
require_once '../db/config.php';

if(isset($_POST['id']) or $_GET['id']) {
//  unset($_SESSION['totalQuantity']);
//  unset($_SESSION['totalPrice']);
//  unset($_SESSION['cart']);

  if(isset($_SESSION['order'])) {
    unset($_SESSION['order']);
  }

  $id = $_POST['id'];
  $id = $_GET['id'];
  $product = $connect->prepare("SELECT * FROM product WHERE id_product = :id");
  $product->bindParam(':id',htmlspecialchars($id));
  $product->execute();
  $product = $product->fetch(PDO::FETCH_ASSOC);

  if(isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity'] += 1;
  }
  else {
    $_SESSION['cart'][$id] = [
      'id' => $product['id_product'],
      'title' => $product['name_product'],
      'price' => $product['price'],
      'img' => $product['img_product'],
      'quantity' => 1,
    ];
  }

  $_SESSION['totalQuantity'] = $_SESSION['totalQuantity'] ? $_SESSION['totalQuantity'] += 1 : 1; 
  $_SESSION['totalPrice'] = $_SESSION['totalPrice'] ? $_SESSION['totalPrice'] += $product['price'] : $product['price'];
}
header("Location: {$_SERVER['HTTP_REFERER']}");