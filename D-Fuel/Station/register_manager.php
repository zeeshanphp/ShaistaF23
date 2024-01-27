<?php
include 'db.php';
$message = "";
$error = "";
$style = "alert-danger";


if (isset($_POST['add_user'])) {
    $fullname = $_POST['fname'];
    $phone = $_POST['uphone'];
    $email = $_POST['uemail'];
    $pass = $_POST['upass'];
    $username = $_POST['uname'];
    $city = $_POST['ucity'];
    $check_fullname = mysqli_query($conn, "SELECT * FROM manager WHERE fullname = '$fullname'");
    $check_username = mysqli_query($conn, "SELECT * FROM manager WHERE username = '$username'");
    $check_email = mysqli_query($conn, "SELECT * FROM manager WHERE email = '$email'");
    $check_phone = mysqli_query($conn, "SELECT * FROM manager WHERE phone = '$phone'");
    if (mysqli_num_rows($check_username) > 0) {
        $message = "Username Already Exist";
    } else if (mysqli_num_rows($check_email) > 0) {
        $message = "Email  Already Exist";
    } else if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $query = "insert into  manager(username,fullname,password,email,phone,city) values('$username','$fullname','$pass','$email','$phone','$city')";
        if (mysqli_query($conn, $query)) {
            $style = "alert-success";
            $message = "Gas Station Manager Registered Successfully<a href='index.php'>Go To Login Page</a>";
        }
    } else {
        $error =  "Invalid email. Please enter a valid email address.";
    }
}



?>
<!DOCTYPE html>
<html>

<head>
    <title>Prototype</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <nav class="bg-primary py-2 text-white">
        <?php include 'toptext.php' ?>
    </nav>
    <div class="container-fluid">

        <div class="container-fluid">
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-3" style="">
                    </div>

                    <div class="col-md-6">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-header">
                                    <?php if ($message != "") { ?>
                                        <div class="alert <?php echo $style; ?>"><?php echo $message ?></div>
                                    <?php } ?>
                                    <center>
                                        <h4>REGISTER AS A STATION MANAGER</h4>
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
                                                <input type="text" class="form-control" name="uemail" placeholder="Enter User Email Adress" required />
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
                                            <td><input type="submit" name="add_user" class="btn rounded btn-primary w-100" value="Register As A Manager" /></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>