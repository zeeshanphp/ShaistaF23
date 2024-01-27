<?php
include 'db.php';
session_start();
$message = "";
$stockId = $_GET['stock'];
$result = mysqli_query($conn, "SELECT * FROM fuel_stock WHERE stockId='$stockId'");
$row = mysqli_fetch_array($result);
if (isset($_POST['update_fuel'])) {
    $stock = $_POST['stock'];
    $quantity = $_POST['qty'];
    $query = "UPDATE fuel_stock SET fqty='$quantity' WHERE stockId='$stock'";
    mysqli_query($conn, $query);
    $message = "Fuel Stock Updated Successfully";
}
include 'header.php';
?>
<div class="row">
    <div class="col-md-2 nav-back text-white">
        <?php include 'nav.php' ?>
    </div>
    <div class="col-md-7">
        <?php if ($message != "") { ?>
            <div class="alert alert-success"><?php echo $message ?></div>
        <?php } ?>
        <div class="card">
            <div class="card-header">
                <center>
                    <h4>Update Fuel Stock</h4>
                </center>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <form method="post">

                            <tr>
                                <td>Add Fuel Quantity</td>
                                <td><input type="text" class="form-control" name="qty" value="<?php echo $row['fqty']; ?>" required /></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" class="form-control" name="stock" value="<?php echo $stockId ?>" required /></td>
                                <td><input type="submit" name="update_fuel" class="btn btn-success w-100" value="Update My Stock"></td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>


    </div>

</div>
<?php
include 'footer.php';
?>