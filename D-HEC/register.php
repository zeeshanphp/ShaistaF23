<?php
include 'db.php';
session_start();
$rmessage = "";
$lmessage = "";
$error = "";
if (isset($_POST['add_user'])) {
    $fullname = $_POST['fname'];
    $phone = $_POST['uphone'];
    $email = $_POST['uemail'];
    $pass = $_POST['upass'];
    $username = $_POST['uname'];
    $city = $_POST['ucity'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $query = "insert into  students(username,fullname,password,email,phone,city) values('$username','$fullname','$pass','$email','$phone','$city')";
        if (mysqli_query($conn, $query)) {
            $rmessage = " <b> Student Registered Successfully &nbsp  &nbsp <a href='login.php'>Go To Login Page</a> </b>";
        }
    } else {
        $error =  "Invalid email. Please enter a valid email address.";
    }
}

if (isset($_POST['login_user'])) {
    $username = $_POST['username'];
    $password = $_POST['upass'];
    $query = "SELECT * FROM students WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $row = mysqli_fetch_array($result);
        session_start();
        $_SESSION['studentId'] = $row['studentId'];
        header('location: faculities.php');
    } else {
        $lmessage = "Invalid Username or password please enter correct credentials";
    }
}
include 'header.php'

?>
<div class="container">
    <div class="row">

        <div class="col-md-4 mt-5 py-5">
            <form method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header text-white bg-success bg-gradient">
                        <?php if ($lmessage != "") { ?>
                            <div class="alert alert-danger"><?php echo $lmessage ?></div>
                        <?php } ?>
                        <b>Students Login Form..</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td><b>Username</b></td>
                                <td><input type="text" class="form-control" name="username" placeholder="Enter Username" required /></td>
                            </tr>
                            <tr>
                                <td><b>Password</b></td>
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
        <div class="col-md-1"></div>
        <div class="col-md-6  mt-5">
            <form method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header bg-primary bg-gradient text-white">
                        <?php if ($rmessage != "") { ?>
                            <div class="alert alert-success"><?php echo $rmessage ?></div>
                        <?php } ?>
                        <b>Students Registration Form</b>
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
                                <td></td>
                                <td><input type="submit" name="add_user" class="btn-success bg-gradient btn w-100" value="Register As Student" /></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>