<?php
include 'connection.php';
$message = "";
session_start();
$student = $_SESSION['studentId'];
$result = mysqli_query($conn, "SELECT * FROM students WHERE studentId='$student'");
$row = mysqli_fetch_array($result);

if (isset($_POST['update_student'])) {
    $fullname = $_POST['fname'];
    $phone = $_POST['uphone'];
    $email = $_POST['uemail'];
    $username = $_POST['uname'];
    $city = $_POST['ucity'];
    $query = "UPDATE students SET username='$username',fullname='$fullname',email='$email',phone='$phone',city='$city' WHERE studentId='$student'";
    mysqli_query($conn, $query);
    $message = "Student Updated Successfully...";
}


?>

<!doctype html>
<html lang="">

<head>
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <style type="text/css">


    </style>
</head>

<body>
    <!-- header section -->
    <header id="header">
        <div class="header-content clearfix"> <a class="logo" href="index.html">Tutor <span>Hub</span></a>
            <div class="navigation">
                <?php include 'nav-bar.php' ?>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <?php if ($message != "") { ?>
                        <div class="alert alert-success bg-success"><?php echo $message ?></div>
                    <?php } ?>
                    <div class="card-header">
                        <center>
                            <h4>STUDENT PROFILE</h4>
                        </center>
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
                                    <td></td>
                                    <td><input type="submit" name="update_student" class="cust-btn-in btn btn-block" value="Update Student Profile" /></td>
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