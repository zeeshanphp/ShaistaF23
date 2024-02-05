<?php
include 'db.php';
$message = "";
$id = $_GET['change'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$id'");
$row = mysqli_fetch_array($result);

if (isset($_POST['add_user'])) {
    $fullname = $_POST['fname'];
    $phone = $_POST['uphone'];
    $email = $_POST['uemail'];
    $pass = $_POST['upass'];
    $username = $_POST['uname'];
    $city = $_POST['ucity'];
    $role = $_POST['role'];
    $query = "UPDATE users SET username='$username',fullname='$fullname',email='$email',phone='$phone',city='$city',role='$role' WHERE user_id='$id'";
    mysqli_query($conn, $query);
    header("location:list_users.php");
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
                    <div class="alert alert-success bg-gradient"><?php echo $message ?></div>
                <?php } ?>
                <div class="card-header">
                    <h4>Update User</h4>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <table class="table table-borderless">
                            <tr>
                                <td><b>Enter FullName</b></td>
                                <td><input type="text" class="form-control" name="fname" value="<?php echo $row['fullname']; ?>" required /></td>
                            </tr>
                            <tr>
                                <td><b>Enter Email Adress</b></td>
                                <td><input type="text" class="form-control" name="uemail" value="<?php echo $row['email']; ?>" required /></td>
                            </tr>
                            <tr>
                                <td><b>Enter Username</b></td>
                                <td><input type="text" class="form-control" name="uname" value="<?php echo $row['username']; ?>" required /></td>
                            </tr>

                            <tr>
                                <td><b>Enter Phone</b></td>
                                <td><input type="text" class="form-control" name="uphone" value="<?php echo $row['phone']; ?>" required /></td>
                            </tr>
                            <tr>
                                <td><b>Enter City</b></td>
                                <td><input type="text" class="form-control" name="ucity" value="<?php echo $row['city']; ?>" required /></td>
                            </tr>
                            <tr>
                                <td> <b> Select Role</b></td>
                                <td>
                                    <select name="role" class="form-select">
                                        <option value="<?php echo $row['role']; ?>"><?php echo $row['role']; ?></option>
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM roles");
                                        while ($row = mysqli_fetch_array($result)) {  ?>
                                            <option value="<?php echo $row['role'] ?>"><?php echo $row['role'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="add_user" class="btn btn-warning bg-gradient" value="Register As User" /></td>
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