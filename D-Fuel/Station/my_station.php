<?php
include 'db.php';
session_start();
$id = $_SESSION['managerId'];
$message = "";
$result = mysqli_query($conn, "SELECT * FROM stations WHERE manager='$id'");
$count = mysqli_num_rows($result);
if ($count == 0) {
    $message = "You Have Not Added Any Gas Station Yet <a href='add_station.php'>Click To Add New</a>";
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
                            <th>Image</th>
                            <th>Station Name</th>
                            <th>Station Contact</th>
                            <th>Add Fuel Stock</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td style="vertical-align: middle;"><img src="../Admin/images/<?php echo $row['image'] ?>" height="70" width="70" alt="..."></td>
                                <td style="vertical-align: middle;"><?php echo $row['sname'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['sphone'] ?></td>
                                <td style="vertical-align: middle;"><a href="add_stock.php?station=<?php echo $row['stationId'] ?>" class="btn btn-dark w-100">Add Stock</a></td>
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