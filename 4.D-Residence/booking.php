<?php
session_start();
include 'db.php';
if (empty($_SESSION['custId'])) {
    header("Location: register.php");
} else {
    include 'header.php';
    $id = $_GET['roomId'];
    $teanant = $_SESSION['custId'];
    $query = "INSERT INTO bookings(roomId,teanantId)VALUES('$id' , '$teanant')";
    if (mysqli_query($conn, $query)) {
        header('Location:view_bookings.php');
    }
}
