<?php
include 'db.php';
session_start();

if (isset($_POST['addCustomer'])) {
    $fullname = $_POST['fname'];
    $phone = $_POST['uphone'];
    $email = $_POST['uemail'];
    $pass = $_POST['upass'];
    $adress = $_POST['uadress'];
    $username = $_POST['uname'];
    $query = "insert into  users(username,fullname,pass,email,phone,adress) values('$username','$fullname','$pass','$email','$phone','$adress')";
    mysqli_query($conn, $query);
    header("location:login.php");
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>FOODIES.COM
    </title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .cust-height {
            height: 60px;
        }

        .color-cust {
            color: white;
        }

        color-cust:hover {
            background-color: red;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2">

                <a href="Lahori Dhaba Design.html" target="main"><img src="images/logo3.png" width="180px" height="60px" align="left"></a>
            </div>

            <div class="col-10">
                <?php include 'nav.php' ?>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row py-4">
                <div class="col-md-3 py-4" style="">
                </div>

                <div class="col-md-6">
                    <h2 class="form-title">REGISTER AS CUSTOMER</h2>
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
                                <td colspan="2"><input type="submit" name="addCustomer" class="btn btn-dark w-100" value="Register As Customer" /></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="index.php" class="btn btn-success btn-block">
                                        Login As Customer
                                    </a>
                                </td>
                            </tr>
                        </table>

                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>