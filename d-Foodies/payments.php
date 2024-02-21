<?php
include 'db.php';
session_start();
$cust = $_SESSION['customerId'];
//$customerId = $_SESSION['cust_id'];
//echo $_SESSION['email_adress']; die();
//check user is logged in  or not
if (empty($_SESSION['customerId'])) {
    echo "<script> alert('LOGIN TO CONTINUE'); window.location.replace('login.php');</script>";
}
$all = $_SESSION['items'];
$bill = $_SESSION['bill'];
if (isset($_POST['order'])) {
    $coutItems =  count($_SESSION['cart']);
    // print_r($_SESSION['cart']);
    if (mysqli_query($conn, "INSERT INTO orders(bill, items, custId,status,order_status) VALUES('$bill','$all', '$cust','CASH ON DELIVERY','Pending')")) {
        $orderId = mysqli_insert_id($conn);
        $coutItems =  count($_SESSION['cart']);
        for ($i = 0; $i < $coutItems; $i++) {
            $pid =  $_SESSION['cart'][$i];
            $fetch_product = $result = mysqli_query($conn, "SELECT * FROM food WHERE pId='$pid'");
            $row_product = mysqli_fetch_array($fetch_product);
            $pname = $row_product['pname'];
            $price = $row_product['pprice'];
            $owner = $row_product['ownerId'];
            $restaurant = $row_product['restaurantId'];
            mysqli_query($conn, "INSERT INTO order_items(pname,pprice,owner,orderId,custId,restaurantId)VALUES('$pname','$price','$owner','$orderId','$cust','$restaurant')");
        }
    }
    // die();
    unset($_SESSION['bill']);
    unset($_SESSION['items']);
    unset($_SESSION['cart']);
    echo "<script> alert('YOUR ORDER IS PLACED');window.location.replace('orders.php');</script>";
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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center class='text-success'>
                        <h2>MAKE PAYMENT</h2>
                    </center>
                </div>
                <div class="col-md-12">
                    <form method="post">
                        <table class="table table-striped table-sm " style="margin-top:70px;">
                            <tr>
                                <th>ORDER ITEMS</th>
                                <td><?php echo $_SESSION['items']; ?> </td>


                            </tr>
                            <tr>
                                <th> BILL</th>
                                <td>RS.<?php echo $_SESSION['bill']; ?></td>
                            </tr>
                            <tr>
                                <th>CARD NO</th>
                                <td><input type="text" name='c_no' placeholder="Enter Your Master Card No" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <th>CARD CV.NO</th>
                                <td><input type="text" name='cv_no' placeholder="Enter Card CVN" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <th>CARD EXPIRY</th>
                                <td><input type="date" name='date' class="form-control" required /></td>
                            </tr>


                            <tr>
                                <td colspan=""><input type="submit" name="order" class="btn btn-primary" value="PLACE ORDER"></td>
                                <td colspan=""><a href="?cancel" class="btn btn-danger">CANCEL ORDER</a></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>