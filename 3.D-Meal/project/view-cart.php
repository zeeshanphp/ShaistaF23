<?php
session_start();
include 'db.php';
$cart = $_SESSION['cart'];
$total_bill = 0;
$total_items = 0;
$_SESSION['bill'] = $total_bill;
include 'header.php';
?>
<section class="bg-primary" style="padding-top: 7.0rem;padding-bottom: 5.0rem;">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h1 class="text-white">MY CART</h1>
            </center>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h4>MY CART</h4>
                    </center>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr class="bg-dark text-white">
                            <td>Item Name</td>
                            <td>Quantity</td>
                            <td>Unit Price</td>
                            <td>Total Price</td>
                        </tr>
                        <?php
                        foreach ($cart as $productID => $quantity) {

                            $result = mysqli_query($conn, "SELECT * FROM food WHERE foodId='$productID'");
                            if ($result) {
                                $row = mysqli_fetch_array($result);
                                $total_bill = $total_bill + ($row['fprice'] * $quantity);
                                $total_items = $total_items + $quantity;
                        ?>
                                <tr>
                                    <td> <?php echo $row['fname']  ?> Card</td>
                                    <td> <?php echo $quantity ?> </td>
                                    <td> <?php echo $row['fprice'] ?> </td>
                                    <td> <?php echo $row['fprice'] * $quantity ?> </td>
                                </tr>
                        <?php
                            }
                        } ?>
                        <tr class="bg-success text-white">
                            <td> <b> Total Items Orderd</b></td>
                            <td><b> <?php echo $total_items ?></b> </td>
                            <td><b> Total Bill</b></td>
                            <td><b> <?php echo $total_bill ?></b> </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td> <a href="" class="btn btn-primary">Continue Shopping</a> </td>
                            <td></td>
                            <td> <a href="checkout.php" class="btn btn-primary">Proceed To CheckOut</a> </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>