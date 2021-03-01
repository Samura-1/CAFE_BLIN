<?php
session_start(); 
if ($_SESSION['loged']) {
	unset($_SESSION['loged']);
	header('Location: '.$_SERVER['HTTP_REFERER']);
}
?>