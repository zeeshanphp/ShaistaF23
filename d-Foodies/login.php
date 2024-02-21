<?php
include 'db.php';
session_start();

if (isset($_POST['login'])) {
    //print_r($_POST); die();
    $username = $_POST['uname'];
    $password = $_POST['upass'];
    //print_r($_POST); die();
    $query = "select * from users where username='$username' AND pass='$password'";
    $rs = mysqli_query($conn, $query);
    if (mysqli_num_rows($rs) > 0) {
        session_start();
        $row = mysqli_fetch_array($rs);
        $_SESSION['customerId'] = $row['userId'];
        header('location:index.php');
    } else {
        echo "<script>alert('Invalid Username or Password')</script>";
    }
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

                <a href="index.php" target="main"><img src="images/logo3.png" width="180px" height="60px" align="left"></a>
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
                    <h2 class="form-title">LOGIN AS CUSTOMER</h2>
                    <form method="POST">
                        <table class="table">

                            <tr>
                                <td>Enter Username</td>
                                <td><input type="text" name="uname" class="form-control" placeholder="Enter Username" /></td>
                            </tr>
                            <tr>
                                <td>Enter Password</td>
                                <td><input type="password" name="upass" class="form-control" placeholder="Enter Password" /></td>
                            </tr>

                            <tr>
                                <td colspan="2"><input type="submit" name="login" class="btn btn-dark w-100" value="Login As Customer" /></td>
                            </tr>

                        </table>

                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>