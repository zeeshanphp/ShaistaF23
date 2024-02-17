<?php
include 'db.php';
session_start();
$message = "";
$error = "";
if (isset($_POST['add_user'])) {
    $fullname = $_POST['fname'];
    $phone = $_POST['uphone'];
    $email = $_POST['uemail'];
    $pass = $_POST['upass'];
    $username = $_POST['uname'];
    $city = $_POST['ucity'];
    $type = $_POST['type'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $query = "insert into  users(username,fullname,password,email,phone,city,type) values('$username','$fullname','$pass','$email','$phone','$city' , '$type')";
        if (mysqli_query($conn, $query)) {
            $message = " <b> User Registered Successfully &nbsp  &nbsp <a href='login.php'>Go To Login Page</a> </b>";
        }
    } else {
        $error =  "Invalid email. Please enter a valid email address.";
    }
}
include 'header.php'

?>
<div class="row">
    <div class="col-md-12 bg-info py-3">
        <center>
            <h4 class="text-white">
                REGISTER
            </h4>
        </center>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    <?php if ($message != "") { ?>
                        <div class="alert alert-success"><?php echo $message ?></div>
                    <?php } ?>
                    <center>
                        <h4>REGISTER AS USER</h4>
                    </center>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td><b>Enter FullName</b></td>
                            <td><input type="text" class="form-control" name="fname" placeholder="Enter User FullName" required /></td>
                        </tr>
                        <tr>
                            <td><b>Enter Email Adress</b></td>
                            <td>
                                <input type="email" class="form-control" name="uemail" placeholder="Enter User Email Adress" required />
                                <div class="text-danger"> <b> <?php echo $error ?> </b> </div>
                            </td>
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
                            <td><b>Select User Type</b></td>
                            <td>
                                <select name="type" class="form-select">
                                    <option>--Select User--</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Seller">Seller</option>
                                    <option value="Customer">Customer</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="add_user" class="btn-primary rounded bg-gradient btn w-100" value="Register As User" /></td>
                        </tr>
                    </table>
                </div>
            </div>

        </form>
    </div>
</div>


<?php include 'footer.php' ?>