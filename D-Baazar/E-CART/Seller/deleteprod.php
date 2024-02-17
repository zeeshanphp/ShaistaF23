<?php
session_start();
include 'database.php';
$id=$_GET['d_id'];
mysqli_query($conn, "delete from products where pId='$id'");
header('location:allcat.php');

?>