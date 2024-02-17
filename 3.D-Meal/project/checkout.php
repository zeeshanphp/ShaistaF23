<?php
include 'db.php';
session_start();
$userId = $_SESSION['userId'];
$items = array("");
$total_bill = 0;
$total_items = 0;
if (isset($_POST['place_order'])) {
    $bill = $_POST['bill'];
    $all_items = $_POST['all_items'];
    $address = $_POST['adress'];
    $query = "INSERT INTO orders(bill , items, custId , address) VALUES('$bill' , '$all_items' , '1' , '$address')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Order Placed Successfully'); window.location.href = 'orders.php';</script>";
    }
}
include 'header.php';
?>

<div class="container-fluid" style="padding-top: 4.0rem;padding-bottom: 5.0rem;">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <center>MAKE PAYMENT</center>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <table class="table table-borderless">
                            <?php

                            $cart = $_SESSION['cart'];
                            foreach ($cart as $productID => $quantity) {

                                $result = mysqli_query($conn, "SELECT * FROM food WHERE foodId='$productID'");
                                if ($result) {
                                    $row = mysqli_fetch_array($result);
                                    $total_bill = $total_bill + ($row['fprice'] * $quantity);
                                    $total_items = $total_items + $quantity;
                                    array_push($items, $row['fname']);
                            ?>

                            <?php
                                }
                            } ?>
                            <tr>
                                <td style="vertical-align: middle;"> <b> Items </b></td>
                                <td> <?php echo implode("<br>", $items);   ?></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" name="bill" value="<?php echo $total_bill ?>"></td>
                                <td><input type="hidden" name="all_items" value="<?php echo implode(",", $items); ?>"></td>
                            </tr>
                            <tr>
                                <td> <b> Total Items Orderd</b></td>
                                <td><b> <?php echo $total_items ?></b> </td>
                            </tr>
                            <tr>
                                <td><b> Total Bill</b></td>
                                <td><b> <?php echo $total_bill ?></b> </td>
                            </tr>
                            <tr>
                                <td><b> Delivery Address : </b></td>
                                <td>
                                    <textarea name="adress" id="" class="form-control" rows="3"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td><b>Card No</b></td>
                                <td> <input type="number" name="account_no" class="form-control" required placeholder="Enter Account Number"> </td>
                            </tr>
                            <tr>
                                <td><b>Expiry On</b></td>
                                <td> <input type="date" name="account_no" class="form-control" id="" required> </td>
                            </tr>
                            <tr>
                                <td><b>CVN No</b></td>
                                <td> <input type="number" name="ccv" class="form-control" required placeholder="Enter Account Number"> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td> <input type="submit" name="place_order" class="btn btn-success" value="Place Order"> </td>
                            </tr>

                        </table>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<?php
include 'footer.php'
?>