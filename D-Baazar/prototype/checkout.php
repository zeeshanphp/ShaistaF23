<?php
session_start();
include 'db.php';

//declarre array to store products name
$prod_name = array();
//declarre array to store products price
$prod_price = array();
$prod_vendor = array();
//fetch items and bill from cart
foreach ($_SESSION['cart'] as $key => $value) {
    //query to get products from database
    $ss = mysqli_query($conn, "SELECT pname,pprice,sellerId FROM  products WHERE pId = '" . $value . "'");
    //fetching products from database table 
    while ($row = mysqli_fetch_array($ss)) {
        array_push($prod_name, $row['pname']);
        array_push($prod_price, $row['pprice']);
        array_push($prod_vendor, $row['sellerId']);
    }
    //implode is used to convert array into string
    $all =  implode(",", $prod_name);
    //array_sum is used to sum up whole array
    $bill = array_sum($prod_price);
    $_SESSION['items'] = $all;
    $_SESSION['bill'] = $bill;
    $_SESSION['sellerId'] = $prod_vendor;
}
if (isset($_GET['cancel'])) {

    $_SESSION['cart'] = "";

    echo "<script> alert('YOUR ORDER IS CANCELED');window.location.replace('products.php');</script>";
}

include 'header.php'
?>
<div class="container">
    <div class="row">
        <table class="table table-striped table-sm " style="margin-top:70px;">
            <tr>
                <th>ORDER ITEMS</th>
                <th> BILL</th>

            </tr>
            <tr>
                <td><?php echo $all; ?> </td>
                <td>RS.<?php echo $bill; ?></td>
            </tr>

            <tr>
                <td colspan=""><a href="payment.php" class="btn btn-primary">PLACE ORDER</a></td>
                <td colspan=""><a href="checkout.php?cancel" class="btn btn-danger">CANCEL ORDER</a></td>
            </tr>
        </table>
    </div>


</div>


<?php include 'footer.php' ?>