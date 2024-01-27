<?php
include 'db.php';
session_start();
$id = $_SESSION['managerId'];
$message = "";
$result = mysqli_query($conn, "SELECT * FROM fuel_stock JOIN fuel ON fuel_stock.fuelId = fuel.fuelId WHERE fuel_stock.managerId='$id'");
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM fuel_stock WHERE stockId='$id'");
    header('location: my_stock.php');
}


include 'header.php';
?>
<div class="row">
    <div class="col-md-2 nav-back text-white">
        <?php include 'nav.php' ?>
    </div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <center>
                    <h4>Manage Your Stock</h4>
                </center>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <thead>

                        <tr>
                            <th>Fuel Type</th>
                            <th>Rate Per Liter</th>
                            <th>Available Qty</th>
                            <th>Update Stock</th>
                            <th>Remove From Stock</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td style="vertical-align: middle;"><?php echo $row['fname'] ?></td>
                                <td style="vertical-align: middle;">Rs. <?php echo $row['fprice'] ?> /Liter</td>
                                <td style="vertical-align: middle;"><?php echo $row['fqty'] ?> Liters</td>
                                <td style="vertical-align: middle;"><a href="update_stock.php?stock=<?php echo $row['stockId'] ?>" class="btn btn-warning w-100 bg-gradient">Update Stock</a></td>
                                <td style="vertical-align: middle;"><a href="?delete=<?php echo $row['stockId'] ?>" class="btn btn-danger bg-gradient w-100">Remove Stock</a></td>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>

</div>
<?php
include 'footer.php';
?>