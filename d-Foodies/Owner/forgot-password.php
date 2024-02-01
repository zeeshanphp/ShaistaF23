<?php
include 'db.php';

if (isset($_POST['login'])) {

    echo "<script>alert('Password Sent To Registered Email Adress')</script>";
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

                    <div class="col-md-6 py-4">
                        <h2 class="form-title text-color-in">
                            <center>Enter Your Email Adress To Recover Your Password</center>
                        </h2>
                        <form method="POST">
                            <div class="form-group">
                                <input type="email" class="form-control" name="username" id="username" required="_required" placeholder="Enter Email Adress" />
                            </div>


                            <div class="form-group form-button">
                                <input type="submit" name="login" class="cust-btn-in btn btn-block" value="Send Link" />
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