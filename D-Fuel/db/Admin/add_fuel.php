<?php
include 'db.php';
$message = "";
if (isset($_POST['add_fuel'])) {
    $fname = $_POST['ftype'];
    $fprice = $_POST['fprice'];
    $query = "INSERT INTO  fuel(fname,fprice,fstatus) VALUES('$fname' , '$fprice', 'Available')";
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
                            <td><input type="text" class="form-control" name="ftype" placeholder="Enter Station Name" required /></td>
                        </tr>
                        <tr>
                            <td><b>Fuel Price:</b></td>
                            <td><input type="text" class="form-control" name="fprice" placeholder="Enter Station City" required /></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><input type="submit" name="add_fuel" class="btn btn-success w-100" value="Add Gas Station"></td>
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