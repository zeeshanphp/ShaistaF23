<?php
$message = "";
include 'db.php';
if (isset($_POST['login_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $row = mysqli_fetch_array($result);
        header('location: manage_users.php');
    } else {
        $message = "Login Failed Invalid Username Or Password";
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <title></title>

    <link rel="stylesheet" href="css/theme.css">

</head>

<body>
    <nav class="bg-primary text-white py-2">
        <?php include 'toptext.php' ?>
    </nav>
    <div class="container-fluid">

        <div class="container-fluid">
            <div class="container mt-4">
                <div class="row py-4">
                    <div class="col-md-3 py-4" style="">
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="form-title text-color-in">
                                    <center><b>LOGIN</b></center>
                                </h2>
                            </div>
                            <div class="card-body">
                                <?php if ($message != "") { ?>
                                    <div class="alert alert-danger"><?php echo $message ?></div>
                                <?php } ?>

                                <form method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" id="username" required="_required" placeholder="Enter Username" />
                                    </div>
                                    <div class="form-group py-3">
                                        <input type="password" name="password" class="form-control" required="_required" placeholder="Enter Password" />
                                    </div>

                                    <div class="form-group form-button  py-3">
                                        <input type="submit" name="login_user" class="btn btn-primary w-100" value="LOGIN" />
                                    </div>

                                    <div class="form-group">
                                        <a href="../" class="btn btn-success w-100">GO TO USER PANNEL</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>