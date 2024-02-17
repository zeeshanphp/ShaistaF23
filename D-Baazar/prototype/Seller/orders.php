<?php
include 'db.php';
$message = "";
session_start();
$seller = $_SESSION['seller'];
$query = "SELECT * FROM order_item WHERE  sellerId='$seller'";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
if (isset($_GET['approve'])) {
    $id = $_GET['approve'];
    mysqli_query($conn, "UPDATE order_item SET status='Order Is Released' WHERE id='$id'");
    header('location: orders.php');
}
include 'header.php';

?>

<div class="row px-0 mx-0">
    <div class="col-md-2 bg-primary text-white">
        <?php
        include 'nav.php';
        ?>
    </div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header text-color-in">
                <center>
                    <h4>ALL ORDERS</h4>
                </center>
            </div>
            <div class="card-body">
                <table class="table table-borderless table-hover">

                    <tr class="table-active bg-gradient">
                        <th style="vertical-align: middle;">Items</th>
                        <th style="vertical-align: middle;">Bill</th>
                        <th style="vertical-align: middle;">Status</th>
                        <th style="vertical-align: middle;">Update Status</th>
                    </tr>
                    <?php if ($count > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>

                            <tr>
                                <td style="vertical-align: middle;"><?php echo $row['product'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['price'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['status'] ?></td>
                                <?php
                                if ($row['status'] == "PENDING") {
                                ?>
                                    <td><a href="?approve=<?php echo $row['id'] ?>" class="btn btn-success bg-gradient rounded">Release Order</a></td>
                                <?php } else { ?>
                                    <td><span class="badge bg-success bg-gradient"><?php echo $row['status']; ?></span></td>
                                <?php } ?>
                            </tr>
                        <?php
                        }
                    } else { ?>
                        <tr>
                            <td colspan="5" class="text-danger"> <b> No Record Found</b></td>
                        </tr>
                    <?php }

                    ?>
                </table>
            </div>
        </div>

    </div>
</div>
<?php
include 'footer.php';
?>