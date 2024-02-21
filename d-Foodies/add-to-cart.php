<?php
session_start();
$itemId = $_GET['pId'];
if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
array_push($_SESSION['cart'], $itemId);
// print_r(json_encode($_SESSION['cart']));
header('location: menu.php');
