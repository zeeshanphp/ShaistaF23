<?php
include 'db.php';
$message = "";
$id = $_GET['edit'];
$result = mysqli_query($conn, "SELECT * FROM fuel WHERE fuelId='$id'");
$row = mysqli_fetch_array($result);
if (isset($_POST['update_price'])) {
    $fname = $_POST['ftype'];
    $fprice = $_POST['fprice'];
    $query = "UPDATE  fuel SET fname='$fname',fprice='$fprice' WHERE fuelId='$id'";
    if (mysqli_query($conn, $query)) {
        $message = "Station Added Successfully <a href='manage_fuel.php'> View Fuels </a>";
    }
}
include 'header.php';
?>
<div class="row mx-0 px-0">
    <div class="col-md-2 bg-dark text-white">
        <?php include 'nav.php' ?>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <?php if ($message != "") { ?>
                    <div class="alert alert-success"><?php echo $message ?></div>
                <?php } ?>
                <center>
                    <h4>ADD STATION</h4>
                </center>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <table class="table table-borderless mt-3">
                        <tr>
                            <td><b>Fuel Type:</b></td>
                            <td><input type="text" class="form-control" name="ftype" value="<?php echo $row['fname']; ?>" required /></td>
                        </tr>
                        <tr>
                            <td><b>Fuel Price:</b></td>
                            <td><input type="text" class="form-control" name="fprice" value="<?php echo $row['fprice']; ?>" required /></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><input type="submit" name="update_price" class="btn btn-success w-100" value="Update Fuel Price"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>


    </div>
    <div class="col-md-3"></div>
</div>
<?php
include 'footer.php';
?>