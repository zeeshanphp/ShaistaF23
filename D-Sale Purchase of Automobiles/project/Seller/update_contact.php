<?php
include 'db.php';
session_start();
$id = $_SESSION['seller'];
$seller_record = mysqli_query($conn, "select * from users where type='Seller' and custId ='$id'");
$res_record = mysqli_fetch_array($seller_record);
if (isset($_POST['update_contact'])) {
    $phone = $_POST['uphone'];
    $email = $_POST['uemail'];
    $adress = $_POST['uadress'];

    $query = "UPDATE users SET email='$email',phone='$phone',adress = '$adress' WHERE custId ='$id'";
    mysqli_query($conn, $query);
    header('location:update_contact.php');
}



?>
<!DOCTYPE html>
<html>

<head>
    <title>ONLINE USED CARS SALE AND PURCHASE SYSTEM</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background: #ecf0f5;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .cust-bg {
            background: #222d32;
        }

        .nav-back {
            background: #3c8dbc;
            color: #FFF;
        }

        ul li a {
            color: #b8c7ce;
        }

        ul li:hover {
            background: #636e72;
            color: #b8c7ce;
        }
    </style>
</head>

<body>
    <nav class="container-fluid py-3 nav-back">
        <div class="row">
            <div class="col-md-8">
            <h4>SELLER PANNEL &nbsp ONLINE USED CARS SALE AND PURCHASE SYSTEM </h4>
            </div>
            <div class="col-md-4">
                <a href="logout.php" class="btn btn-danger float-right">Logout</a>
            </div>
        </div>

    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 cust-bg">
                <?php include 'nav.php' ?>
            </div>
            <div class="col-md-8 mx-4 mt-4" style="background: #fff;">
                <form method="POST" enctype="multipart/form-data">

                    <table class="table">
                        <tr>
                            <td colspan="2" class="text-primary">
                                <center>
                                    <h5> UPDATE SELLER PROFILE </h5>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>Enter Fullname</td>
                            <td><input type="text" name="fname" class="form-control" value="<?php echo $res_record['fullname'] ?>" /></td>
                        </tr>
                        <tr>
                            <td>Enter Username</td>
                            <td><input type="text" name="uname" class="form-control" value="<?php echo $res_record['username'] ?>" /></td>
                        </tr>
                        <tr>
                            <td>Enter Adress</td>
                            <td><input type="text" name="uadress" class="form-control" value="<?php echo $res_record['city'] ?>" /></td>
                        </tr>

                        <tr>
                            <td>Enter Email</td>
                            <td><input type="text" name="uemail" class="form-control" value="<?php echo $res_record['email'] ?>" /></td>
                        </tr>
                        <tr>
                            <td>Enter Phone</td>
                            <td><input type="text" name="uphone" class="form-control" value="<?php echo $res_record['phone'] ?>" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan=""><input type="submit" name="update_contact" class="btn btn-dark w-100" value="UPDATE SELLER CONTACT INFO" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </div>
</body>

</html>