<?php
include 'db.php';
session_start();
$message = "";
$error = "";
if (isset($_POST['add_user'])) {
    $folder = 'profile_pics/';
    $folder = $folder . basename($_FILES['pimage']['name']);
    move_uploaded_file($_FILES['pimage']['tmp_name'], $folder);
    $img = $_FILES['pimage']['name'];
    $fullname = $_POST['fname'];
    $phone = $_POST['uphone'];
    $email = $_POST['uemail'];
    $pass = md5($_POST['upass']);
    $username = $_POST['uname'];
    $city = $_POST['ucity'];
    $type = $_POST['type'];


    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $verify_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        if (mysqli_num_rows($verify_email) > 0) {
            $error = "Email Already Exists Please Choose Different Email";
        } else {
            $query = "INSERT INTO users(username,fullname,password,email,phone,city,user_type,status,profile_pic) VALUES('$username','$fullname','$pass','$email','$phone','$city','$type' , 'Pending' , '$img')";
            if (mysqli_query($conn, $query)) {
                $message = "Registration Successfull";
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
                            <td><b>Profile Pic</b></td>
                            <td>
                                <input type="file" class="form-control" name="pimage" required />
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