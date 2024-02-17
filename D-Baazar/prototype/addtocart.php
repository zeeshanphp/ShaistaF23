<?php
session_start();
include 'db.php';
$id = $_GET['c_id'];
if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
array_push($_SESSION['cart'], $_GET['c_id']);

include 'header.php'
?>
<div class="container">
    <div class="row">
        <table class="table table-striped table-sm " style="margin-top:70px;">
            <tr>
                <th>PRODUCT NAME</th>
                <th> CATEGORY</th>
                <th>PRICE</th>

            </tr>
            <?php
            //$name stores id and $value stores quantity
            foreach ($_SESSION['cart'] as $key => $value) {
                $result = mysqli_query($conn, "select * from  products where pId= '" . $value . "'");
                while ($row = mysqli_fetch_array($result)) {
                    $total = $value * $row['pprice'];
            ?>
                    <tr>
                        <td><?php echo $row['pname']; ?></td>
                        <td><?php echo $row['pcat']; ?></td>
                        <td>Rs.<?php echo $row['pprice']; ?></td>

                    </tr>
            <?php }
            }
            ?>
            <tr>
                <td colspan=""><a href="products.php" class="btn btn-primary">CONTINUE SHOPPING</a></td>
                <td colspan=""><a href="checkout.php" class="btn btn-danger">MAKE CHECKOUT</a></td>
            </tr>
        </table>
    </div>
</div>


<?php include 'footer.php' ?>