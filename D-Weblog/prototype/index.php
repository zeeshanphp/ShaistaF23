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
        $verify_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        if (mysqli_num_rows($verify_email) > 0) {
            $error = "Email Already Exists Please Choose Different Email";
        } else {
            $query = "INSERT INTO users(username,fullname,password,email,phone,city,user_type,status) VALUES('$username','$fullname','$pass','$email','$phone','$city','$type' , 'Pending')";
            if (mysqli_query($conn, $query)) {
                $message = " <b> User Registered Successfully Confirmation Email Is Sent To Your Email &nbsp  &nbsp <a href='login.php'>Go To Login Page</a> </b>";
                $to = $email;
                $subject = "Welcome Email..";
                $txt = 'Please click link to verify your account. https://localhost/ShaistaF23/2.Weblog/prototype/verify.php?email=' . $email;
                $headers = "From: zeeshancs619@gmail.com";
                mail($to, $subject, $txt, $headers);
            }
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
                            <td><input type="radio" name="type" value="Administrator"> Admin &nbsp; &nbsp; &nbsp;<input type="radio" name="type" value="User"> User </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="add_user" class="btn-primary rounded bg-gradient btn w-100" value="Register User" /></td>
                        </tr>
                    </table>
                </div>
            </div>

        </form>
    </div>
</div>


<?php include 'footer.php' ?>