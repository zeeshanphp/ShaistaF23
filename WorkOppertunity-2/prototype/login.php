<?php
include 'db.php';
$message = "";
$style = "";
if (isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['upass'];
    $query = "SELECT * FROM customers WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $row = mysqli_fetch_array($result);
        session_start();
        $message = "Login Successfull";
        $style = "alert alert-success bg-gradient";
    } else {
        $message = "Login Fail";
        $style = "alert alert-danger bg-gradient";
    }
}
include 'header.php';
?>
<div class="container-xxl bg-primary">
    <div class="container">
        <h1 class="display-3 text-white mb-3">User Login</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-white">
                <li class="breadcrumb-item text-white active nav-item">Modern Work Oppertunity</li>
                <li class="breadcrumb-item text-white active" aria-current="page">Login User</li>
            </ol>
        </nav>
    </div>

</div>



<!-- Contact Start -->
<div class="container-xxl">
    <div class="container">
        <div class="row g-4">

            <div class="col-md-3 wow fadeInUp">

            </div>
            <div class="col-md-6">
                <div class="wow fadeInUp">
                    <div class="card">
                        <div class="card-header">
                            <h4>User Login</h4>
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