<?php
include 'db.php';

if (isset($_POST['login'])) {
    //print_r($_POST); die();
    $uname = $_POST['username'];
    $password = $_POST['password'];
    //print_r($_POST); die();
    $query = "select * from owner where username='$uname' AND pass='$password'";
    $rs = mysqli_query($conn, $query);
    if (mysqli_num_rows($rs) > 0) {

        $row = mysqli_fetch_array($rs);
        session_start();
        $_SESSION['owner'] = $row['ownerId'];
        header('location:add_school.php');
    } else {
        echo "<script>alert('Invalid Username or Password')</script>";
    }
}



?>
<!DOCTYPE html>
<html>

<head>
    <title>Driving School Booking Portal
    </title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
    <nav class="bg-primary text-white bg-gradient py-2">
        <?php include 'toptext.php' ?>
    </nav>
    <div class="container-fluid">

        <div class="container-fluid">
            <div class="container mt-4">
                <div class="row py-4">
                    <div class="col-md-4 py-4" style="">
                    </div>

                    <div class="col-md-4 py-4">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="form-title text-success-emphasis">
                                    <center><b>LOGIN</b></center>
                                </h2>
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <div class="form-group py-3">
                                        <input type="text" class="form-control" name="username" id="username" required="_required" placeholder="Enter Owner Username" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" required="_required" placeholder="Enter Owner Password" />
                                    </div>

                                    <div class="form-group form-button py-3">
                                        <input type="submit" name="login" class="btn btn-dark bg-gradient w-100" value="LOGIN" />
                                    </div>
                                    <div class="form-group">
                                        <a href="register_owner.php" class="btn btn-success bg-gradient w-100">REGISTER AS OWNER</a>
                                    </div>
                                    <div class="form-group py-3">
                                        <a href="../" class="btn btn-warning text-white bg-gradient w-100">GO TO USER PANNEL</a>
                                    </div>
                                </form>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>