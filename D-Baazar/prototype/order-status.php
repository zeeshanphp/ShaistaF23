<?php
session_start();
include 'db.php';
// $userId = $_SESSION['custId'];
$ord_id = $_GET['ord_id'];
$order_query = "select * from order_item where order_id='$ord_id'";
$result = mysqli_query($conn, $order_query);


include 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <center>MY ORDERED ITEMS</center>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped" style="">
                        <tr>
                            <th>ORDER ITEMS</th>
                            <th>BILL</th>
                            <th>STATUS</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $row['product']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>



<?php
include 'footer.php'
?>