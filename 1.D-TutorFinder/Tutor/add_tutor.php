<?php
include '../connection.php';
if (isset($_POST['add_tutor'])) {
    $fullname = $_POST['fname'];
    $phone = $_POST['uphone'];
    $email = $_POST['uemail'];
    $pass = $_POST['upass'];
    $username = $_POST['uname'];
    $query = "insert into  tutors(username,fullname,pass,email,phone) values('$username','$fullname','$pass','$email','$phone')";
    mysqli_query($conn, $query);
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Tutor LOGIN PANNEL</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <style type="text/css">
        body {
            background-image: url('../images/body-bg.jpg');

        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <center>
                            <h4>TUTOR FINDER</h4>
                        </center>
                        <center>
                            <h4>TUTOR REGISTERATION PANNEL</h4>
                        </center>
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
                                    <td></td>
                                    <td><input type="submit" name="add_tutor" class="btn btn-primary bg-gradient w-100" value="Register As User" /></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>