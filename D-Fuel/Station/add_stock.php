<?php
include 'db.php';
session_start();

$id = $_SESSION['managerId'];
$station = $_GET['station'];
if (isset($_POST['add_fuel'])) {
    $fuel = $_POST['fuelId'];
    $quantity = $_POST['qty'];
    $query = "INSERT INTO fuel_stock (fuelId,fqty,managerId,stationId) VALUE('$fuel' , '$quantity' , '$id' , '$station')";
    mysqli_query($conn, $query);
    echo "success";
}
include 'header.php';
?>
<div class="row">
    <div class="col-md-2 nav-back text-white">
        <?php include 'nav.php' ?>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <center>
                    <h4>Add Your Fuel Stock</h4>
                </center>
            </div>
            <div class="card-body">
                <table class="table table-borderless">

                    <tbody>
                        <form method="post">
                            <tr>
                                <td>Select Fuel</td>
                                <td>
                                    <select name="fuelId" class="form-control">
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM fuel");
                                        while ($row = mysqli_fetch_array($result)) {  ?>
                                            <option value="<?php echo $row['fuelId'] ?>"><?php echo $row['fname'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Add Fuel Quantity</td>
                                <td><input type="text" class="form-control" name="qty" placeholder="Add Your Available Qty" required /></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="add_fuel" class="btn btn-primary w-100" value="Add Fuel To My Station"></td>
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