<?php
include 'db.php';

if (isset($_POST['login'])) {
    //print_r($_POST); die();
    $uname = $_POST['username'];
    $password = $_POST['password'];
    //print_r($_POST); die();
    $query = "select * from admin where username='$uname' AND password='$password'";
    $rs = mysqli_query($conn, $query);
    if (mysqli_num_rows($rs) > 0) {

        header('location:addowner.php');
    } else {
        echo "<script>alert('Invalid Username or Password')</script>";
    }
}



?>
<!DOCTYPE html>
<html>

<head>
    <title>FOODIES.COM</title>

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
                    <div class="col-md-4 py-4" style="">
                    </div>

                    <div class="col-md-4 py-4">
                        <h2 class="form-title text-color-in">
                            <center><b>LOGIN</b></center>
                        </h2>
                        <form method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" id="username" required="_required" placeholder="Enter Owner Username" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" required="_required" placeholder="Enter Owner Password" />
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="login" class="cust-btn-in btn btn-block" value="LOGIN" />
                            </div>

                            <div class="form-group">
                                <a href="../" class="cust-btn-in btn btn-block">GO TO USER PANNEL</a>
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