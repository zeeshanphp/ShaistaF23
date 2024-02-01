<?php
include 'db.php';

if (isset($_POST['add_admin'])) {
    $name = $_POST['oname'];
    $uname = $_POST['ouname'];
    $phone = $_POST['ophone'];
    $pass = $_POST['opass'];
    $email = $_POST['oemail'];
    $query = "insert into  admin(username,fullname,phone,email,pass) values('$uname' ,'$name' , '$phone', '$email' , '$pass')";
    mysqli_query($conn, $query);
    header('location:index.php');
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>FOODIES.COM
    </title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <nav class="nav-back py-2">
        <?php include 'toptext.php' ?>
    </nav>
    <div class="container-fluid">

        <div class="container-fluid">
            <div class="container mt-4">
                <div class="row py-4">
                    <div class="col-md-3 py-4" style="">
                    </div>

                    <div class="col-md-5">
                        <h5 class="form-title text-color-in">
                            <center><b>REGISTER AS ADMIN</b></center>
                        </h5>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control" name="oname" placeholder="Enter Name" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="oemail" placeholder="Enter Email Adress" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="ouname" placeholder="Enter Username " required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="opass" placeholder="Enter Password For Admim" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="ophone" placeholder="Enter Phone Number" required />
                            </div>


                            <div class="form-group form-button">
                                <input type="submit" name="add_admin" class="cust-btn-in btn btn-block" value="Register As Admin User" />
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>