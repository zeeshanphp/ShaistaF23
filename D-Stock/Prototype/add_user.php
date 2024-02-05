<?php
include 'db.php';
$message = "";

include 'db.php';
if (isset($_POST['add_user'])) {
    $fullname = $_POST['fname'];
    $phone = $_POST['uphone'];
    $email = $_POST['uemail'];
    $pass = $_POST['upass'];
    $username = $_POST['uname'];
    $city = $_POST['ucity'];
    $role = $_POST['role'];
    $query = "insert into  users(username,fullname,password,email,phone,city,role) values('$username','$fullname','$pass','$email','$phone','$city','$role')";
    mysqli_query($conn, $query);
    $message = "User Inserted Successfully";
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
                    <h4>Add New User</h4>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <table class="table table-borderless">
                            <tr>
                                <td><b>Enter FullName</b></td>
                                <td><input type="text" class="form-control" name="fname" placeholder="Enter User FullName" required /></td>
                            </tr>
                            <tr>
                                <td><b>Enter Email Adress</b></td>
                                <td><input type="text" class="form-control" name="uemail" placeholder="Enter User Email Adress" required /></td>
                            </tr>
                            <tr>
                                <td><b>Enter Username</b></td>
                                <td><input type="text" class="form-control" name="uname" placeholder="Enter User Username " required /></td>
                            </tr>
                            <tr>
                                <td><b>Enter Password</b></td>
                                <td><input type="password" class="form-control" name="upass" placeholder="Enter Password For User" required /></td>
                            </tr>
                            <tr>
                                <td><b>Enter Phone</b></td>
                                <td><input type="text" class="form-control" name="uphone" placeholder="Enter User Phone Number" required /></td>
                            </tr>
                            <tr>
                                <td><b>Enter City</b></td>
                                <td><input type="text" class="form-control" name="ucity" placeholder="Enter User City" required /></td>
                            </tr>
                            <tr>
                                <td> <b> Select Role</b></td>
                                <td>
                                    <select name="role" class="form-select">
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
                                <td><input type="submit" name="add_user" class="btn btn-primary" value="Register As User" /></td>
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