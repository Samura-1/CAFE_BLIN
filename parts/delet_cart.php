<?php

session_start();

if(isset($_POST['delete'])) {
  $id = $_POST['delete'];

  $_SESSION['totalQuantity'] -= $_SESSION['cart'][$id]['quantity'];
  $_SESSION['totalPrice'] -= $_SESSION['cart'][$id]['price']*$_SESSION['cart'][$id]['quantity'];
  unset($_SESSION['cart'][$id]);

}
  if (isset($_POST['delete_all'])) {
  $_SESSION['totalQuantity'] = array();
  $_SESSION['totalPrice'] =  array();
  $_SESSION['cart'] = array();
  }
header("Location: {$_SERVER['HTTP_REFERER']}");