<?php
include 'db.php';
if (isset($_POST['add_owner'])) {
    $fullname = $_POST['oname'];
    $phone = $_POST['ophone'];
    $email = $_POST['oemail'];
    $pass = $_POST['opass'];
    $username = $_POST['ouname'];
    $query = "insert into  owner(username,fullname,pass,email,phone) values('$username','$fullname','$pass','$email','$phone')";
    mysqli_query($conn, $query);
    header("location:owners.php");
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>FOODIES.COM</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/styles.css">
    <style>
    </style>
</head>

<body>
    <nav class="container-fluid py-3 nav-back">
        <?php include 'top-nav.php' ?>

    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 top-bg px-0">
                <?php include 'nav.php' ?>
            </div>
            <div class="col-md-6 mx-4 mt-4" style="background: #fff;">
                <h5 class="form-title text-color-in">
                    <center><b>ADD RESTAURANT OWNER</b></center>
                </h5>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" name="oname" placeholder="Enter Onwer Name" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="oemail" placeholder="Enter Onwer Email Adress" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="ouname" placeholder="Enter Onwer Username " required />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="opass" placeholder="Enter Password For Onwer" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="ophone" placeholder="Enter Onwer Phone Number" required />
                    </div>


                    <div class="form-group form-button">
                        <input type="submit" name="add_owner" class="cust-btn-in btn btn-block" value="Register As Restaurant Owner" />
                    </div>

                </form>

            </div>
        </div>

    </div>
    <?php include 'footer.php'; ?>
</body>

</html>