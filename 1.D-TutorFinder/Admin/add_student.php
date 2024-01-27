<?php
session_start();

include "../connection.php";
$message = "";

if (isset($_POST['add_student'])) {
    $fullname = $_POST['fname'];
    $phone = $_POST['uphone'];
    $email = $_POST['uemail'];
    $pass = $_POST['upass'];
    $username = $_POST['uname'];
    $city = $_POST['ucity'];
    $query = "insert into  students(username,fullname,password,email,phone,city) values('$username','$fullname','$pass','$email','$phone','$city')";
    mysqli_query($conn, $query);
    $message = "Srudent Registered Successfully...";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TUTOR FINDER</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row bg-primary bg-gradient py-3 text-white">
            <div class="col-md-12">
                <center>
                    <h4>ADMIN PANNEL TUTOR FINDER</h4>
                </center>
            </div>
        </div>
        <div class="row">
            <div id="" class="col-md-2 bg-primary">
                <?php include 'nav.php' ?>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <?php if ($message != "") { ?>
                        <div class="alert alert-success"><?php echo $message ?></div>
                    <?php } ?>
                    <div class="card-header">
                        <h4>
                            <center> Add Student </center>
                        </h4>
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
                                    <td></td>
                                    <td><input type="submit" name="add_student" class="cust-btn-in btn btn-block" value="Add Student" /></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

        </div>

</body>

</html>