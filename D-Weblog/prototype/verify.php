<?php
include 'db.php';
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    mysqli_query($conn, "UPDATE users SET status ='Approved' WHERE email='$email'");
}
include 'header.php'
?>
<div class="container">
    <div class="alert alert-success">User Verified Successfully <a href='login.php' class='btn btn-success'>Login to Contiue</a> </div>
</div>
<?php include 'footer.php' ?>