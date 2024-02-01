<?php
include 'db.php';
if (isset($_POST['addCustomer'])) {
    $fullname = $_POST['fname'];
    $phone = $_POST['uphone'];
    $email = $_POST['uemail'];
    $pass = $_POST['upass'];
    $adress = $_POST['uadress'];
    $username = $_POST['uname'];
    $query = "insert into  users(username,fullname,pass,email,phone,adress) values('$username','$fullname','$pass','$email','$phone','$adress')";
    mysqli_query($conn, $query);
    header("location:view_customers.php");
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>FOODIES.COM</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/styles.css">
    <style>
    </style>
</head>

<body>
    <nav class="container-fluid py-3 nav-back">
        <?php include 'top-nav.php' ?>

    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 top-bg px-0">
                <?php include 'nav.php' ?>
            </div>
            <div class="col-md-6 mx-4 mt-4" style="background: #fff;">
                <h5 class="form-title text-color-in">
                    <center><b>ADD FOOD LOVER</b></center>
                </h5>
                <form method="POST">
                    <table class="table">
                        <tr>
                            <td>Enter Fullname</td>
                            <td><input type="text" name="fname" class="form-control" placeholder="Enter Fullname" /></td>
                        </tr>
                        <tr>
                            <td>Enter Username</td>
                            <td><input type="text" name="uname" class="form-control" placeholder="Enter Username" /></td>
                        </tr>
                        <tr>
                            <td>Enter Password</td>
                            <td><input type="password" name="upass" class="form-control" placeholder="Enter Password" /></td>
                        </tr>
                        <tr>
                            <td>Enter Adress</td>
                            <td><input type="text" name="uadress" class="form-control" placeholder="Enter Your Adress" /></td>
                        </tr>
                        <tr>
                            <td>Enter Email</td>
                            <td><input type="text" name="uemail" class="form-control" placeholder="Enter Email Adress" /></td>
                        </tr>
                        <tr>
                            <td>Enter Phone</td>
                            <td><input type="text" name="uphone" class="form-control" placeholder="Enter Phone number" /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="addCustomer" class="btn btn-dark w-100" value="Add Food Lover" /></td>
                        </tr>

                    </table>

                </form>

            </div>
        </div>

    </div>
    <?php include 'footer.php'; ?>
</body>

</html>