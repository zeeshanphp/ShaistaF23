<?php
session_start();
include 'database.php';
$id=$_GET['d_id'];
$fetch=mysqli_query($conn, "delete from categories where catId='$id'");
header('location:allcat.php');

?>