<?php
session_start();
$host = 'localhost';
$db   = 'blin';
$user = 'root';
$pass = '';
$charset = 'utf8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$connect = new PDO($dsn, $user, $pass, $opt);
$monthes = array(
    1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
    5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
    9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
);
///SETING_SITE
$seting = $connect->prepare("SELECT * FROM `seting_site`");
$seting->execute();
$seting = $seting->FETCHALL(PDO::FETCH_ASSOC);