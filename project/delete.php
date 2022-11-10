<?php 
session_start();
$id = $_GET['id'];
unset($_SESSION['cart'][$id]);
$_SESSION['cart']['count']--;
header('location:viewcart.php');
?>