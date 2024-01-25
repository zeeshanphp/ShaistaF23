<?php
include 'db.php';
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='S'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {

        header('location: add_veh.php');
    } else {
        echo "<script>alert('Invalid Username Or Password');</script>";
    }
}



?>
<!DOCTYPE html>
<html>

<head>
    <title>SALE PURCHASE OF AUTOMOBILES</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background: #ecf0f5;
        }

        .nav-back {
            background: #2d3436;
            color: #FFF;
        }
    </style>
</head>

<body>
    <nav class=" nav-back">
        <center>
            <h3>SALE PURCHASE OF AUTOMOBILES</h3>
        </center>
        <center>
            <h4>SELLER PANNEL</h4>
        </center>
    </nav>
    <div class="container-fluid">

        <div class="container-fluid">
            <div class="container mt-4">
                <div class="row py-4">
                    <div class="col-md-4" style="">

                    </div>

                    <div class="col-md-4">
                        <img src="images/signin-image.jpg" height="100" width="150" />
                        <h2 class="form-title">LOGIN</h2>
                        <form method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" id="username" required="_required" placeholder="username" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" required="_required" placeholder="Password" />
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="login" class="btn btn-warning btn-block" value="LOGIN" />
                            </div>
                            <div class="form-group">
                                <a href="../index.php" class="btn btn-success btn-block">GO TO USER PANNEL</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>