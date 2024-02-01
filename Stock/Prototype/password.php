<?php
include 'db.php';
$message = "";
$style = "";
$id = $_GET['pass'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$id'");
$row = mysqli_fetch_array($result);

if (isset($_POST['change_password'])) {
    $rpass = $_POST['rpass'];
    $npass = $_POST['npass'];
    if ($npass == $rpass) {
        $query = "UPDATE users SET password='$rpass' WHERE user_id='$id'";
        mysqli_query($conn, $query);
        $message = "Password Changed Successfully";
        $style = "alert-success";
    } else {
        $message = "Password Mis-match";
        $style = "alert-danger";
    }
}
include 'header.php';
?>
<div class="container-fluid mx-0 px-0">
    <div class="row">
        <div class="col-md-2">
            <?php
            include 'nav.php';
            ?>
        </div>
        <div class="col-md-7">
            <div class="card">
                <?php if ($message != "") { ?>
                    <div class="alert <?php echo $style ?> bg-gradient"><?php echo $message ?></div>
                <?php } ?>
                <div class="card-header">
                    <h4>Update User Password</h4>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <table class="table table-borderless">
                            <tr>
                                <td><b>Enter Previous Password</b></td>
                                <td><input type="text" class="form-control" name="upass" value="<?php echo $row['password']; ?>" required /></td>
                            </tr>
                            <tr>
                                <td><b>Enter New Password</b></td>
                                <td><input type="password" class="form-control" name="npass" placeholder="Enter New Password" required /></td>
                            </tr>
                            <tr>
                                <td><b>Repeat Password</b></td>
                                <td><input type="password" class="form-control" name="rpass" placeholder="Repeat New Password" required /></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><input type="submit" name="change_password" class="btn btn-warning bg-gradient" value="Update Password" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<?php
include 'footer.php';
?>