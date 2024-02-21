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

//declarre array to store products name
$prod_name = array();
//declarre array to store products price
$prod_price = array();
//fetch items and bill from cart
foreach ($_SESSION['cart'] as $key => $value) {
    //query to get products from database
    $ss = mysqli_query($conn, "SELECT pname,pprice FROM food WHERE pId = '" . $value . "'");
    //fetching products from database table 
    while ($row = mysqli_fetch_array($ss)) {
        //assign product name to array
        array_push($prod_name, $row['pname']);
        //assign product prices to array
        array_push($prod_price, $row['pprice']);
    }
    //implode is used to convert array into string
    $all =  implode(",", $prod_name);
    //array_sum is used to sum up whole array
    $bill = array_sum($prod_price);
    $_SESSION['items'] = $all;
    $_SESSION['bill'] = $bill;
}
// yeh wala if order cancel krny k lye ha
if (isset($_GET['cancel'])) {

    $_SESSION['cart'] = "";

    echo "<script> alert('YOUR ORDER IS CANCELED');window.location.replace('products.php');</script>";
}
if (isset($_GET['cod'])) {

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

    /*$to = $_SESSION['email_adress'];
		$subject = "ORDER DETAILS";
		$txt = "<table><tr><td>Order Details</td>".$all."<td></td></tr><tr><td>Total Bill is</td>".$new_bill."<td></td></tr></table>";
		$headers = "From: shanii0802@gmail.com";
		mail($to,$subject,$txt,$headers);
	   	 	 */
    unset($_SESSION['cart']);
    echo "<script> alert('YOUR ORDER IS PLACED AND DETALS SENT TO ');window.location.replace('orders.php');</script>";

    //header('location:orders.php');

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
                        <h2>CHEKOUT</h2>
                    </center>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <table class="table table-striped table-sm " style="margin-top:70px; height:300px;">
                            <tr>
                                <th>ORDER ITEMS</th>
                                <td><?php echo $all; ?> </td>


                            </tr>
                            <tr>
                                <th> TOTAL BILL</th>
                                <td>RS.<?php echo $bill; ?></td>
                            </tr>


                            <tr>
                                <td colspan="2"><a href="payments.php" class="btn btn-primary btn-block">MAKE PAYMENT BY CREDIT CARD</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="?cod" class="btn btn-success btn-block">CASH ON DELIVERY</a>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2"><a href="checkout.php?cancel" class="btn btn-danger btn-block">CANCEL ORDER</a></td>
                            </tr>
                        </table>
                    </div>



                </div>
            </div>
        </div>
    </div>
</body>

</html>