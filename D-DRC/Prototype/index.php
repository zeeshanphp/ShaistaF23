<?php
session_start();
$message = "";
include 'db.php';
if (isset($_POST['admin_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $row = mysqli_fetch_array($result);
        header('location: Admin/add_user.php');
    } else {
        $message = "Login Failed Invalid Username Or Password";
    }
}

include 'header.php'

?>
<div class="row mt-5">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Login As Admin</h4>
            </div>
            <div class="card-body">
                <form method="post">
                    <table class="table">
                        <tr>
                            <td>Enter Username</td>
                            <td><input type="text" class="form-control" name="username" placeholder="Username" required /></td>
                        </tr>
                        <tr>
                            <td>Enter Password</td>
                            <td><input type="password" class="form-control" name="password" placeholder="Password" required /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="admin_login" class="btn btn-primary w-100" value="Login As Admin"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php' ?>