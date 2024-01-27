<?php
include 'db.php';
$message = "";
$style = "";
if (isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['upass'];
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $row = mysqli_fetch_array($result);
        session_start();
        $_SESSION['userId'] = $row['user_id'];
        header('location: profile.php');
    } else {
        $message = "Login Fail";
        $style = "alert alert-danger bg-gradient";
    }
}
include 'header.php';
?>
<div class="container-xxl bg-dark page-header">
    <div class="container">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Login</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="#">Fuel Fleet</a></li>
                <li class="breadcrumb-item"><a href="#">Prototype</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Login/Register</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->


<!-- Contact Start -->
<div class="container-xxl">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">SIGN IN</h1>
        <div class="row g-4">

            <div class="col-md-3 wow fadeInUp" data-wow-delay="0.1s">

            </div>
            <div class="col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                    <div class="card">
                        <div class="card-header">
                            <h4>Customer Login Pannel</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <?php if ($message != "") { ?>
                                    <div class="<?php echo $style ?>"><?php echo $message ?></div>
                                <?php } ?>
                                <table class="table table-borderless">


                                    <tr>
                                        <td><b>Enter Username</b></td>
                                        <td><input type="text" class="form-control" name="uname" placeholder="Enter User Username " required /></td>
                                    </tr>
                                    <tr>
                                        <td><b>Enter Password</b></td>
                                        <td><input type="password" class="form-control" name="upass" placeholder="Enter Password For User" required /></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td><input type="submit" name="login" class="btn btn-success text-white w-100 bg-gradient bg-banner " value="Login As Customer" /></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><a href="register.php" class="text-primary">Create Account</a></td>
                                    </tr>
                                </table>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
<?php
include 'footer.php';
?>