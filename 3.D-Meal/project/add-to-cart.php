<?php
include 'db.php';
session_start();
if (isset($_POST['add_to_cart'])) {
    $productID = $_POST['id'];
    $quantity = $_POST['quantity'];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (isset($_SESSION['cart'][$productID])) {
        $_SESSION['cart'][$productID] += $quantity;
    } else {
        $_SESSION['cart'][$productID] = $quantity;
    }
    header('location: view-cart.php');
}
