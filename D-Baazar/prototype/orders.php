<?php
session_start();
include 'db.php';
$userId = $_SESSION['custId'];
$order_query = "select * from orders where custId='$userId'";
$result = mysqli_query($conn, $order_query);

include 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <center>MY ORDER HISTORY</center>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped" style="">
                        <tr>
                            <th>ORDER ITEMS</th>
                            <th>BILL</th>
                            <th>ORDER DATE</th>
                            <th>VIEW STATUS</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $row['items']; ?></td>
                                <td><?php echo $row['bill']; ?></td>
                                <td><?php echo $row['orderon']; ?></td>
                                <td><a href="order-status.php?ord_id=<?php echo $row['ordId']; ?> " class='btn btn-primary'>VIEW STATUS</a></td>
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