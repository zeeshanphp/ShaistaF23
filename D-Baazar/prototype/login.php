<?php
$message = "";

include 'db.php';
if (isset($_POST['login_user'])) {
    $username = $_POST['username'];
    $password = $_POST['upass'];
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $row = mysqli_fetch_array($result);
        header('location: index.php');
    } else {
        $message = "Invalid Username or password please enter correct credentials";
    }
}
include 'header.php'
?>
<div class="row">
    <div class="col-md-12 bg-info py-3">
        <center>
            <h4 class="text-white">
                LOGIN
            </h4>
        </center>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    <?php if ($message != "") { ?>
                        <div class="alert alert-danger"><?php echo $message ?></div>
                    <?php } ?>
                    <h2>SIGN IN AS USER</h2>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td><b>Enter Username</b></td>
                            <td><input type="text" class="form-control" name="username" placeholder="Enter Username" required /></td>
                        </tr>
                        <tr>
                            <td><b>Enter Password</b></td>
                            <td><input type="password" class="form-control" name="upass" placeholder="Enter Password For User" required /></td>
                        </tr>
                        <tr>
                            <td><input type="reset" value="Reset Form" class="btn btn-info w-100"></td>
                            <td><input type="submit" name="login_user" class=" btn btn-dark w-100 br" value="Login As User" /></td>
                        </tr>
                    </table>
                </div>
            </div>

        </form>
    </div>
</div>



<?php include 'footer.php' ?>