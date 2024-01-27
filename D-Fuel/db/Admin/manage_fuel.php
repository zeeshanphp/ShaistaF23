<?php
include 'db.php';
$message = "";


if (isset($_GET['avail'])) {
    $id = $_GET['avail'];
    mysqli_query($conn, "UPDATE fuel SET fstatus='Available' WHERE fuelId='$id'");
    header('location: manage_fuel.php');
}

if (isset($_GET['na'])) {
    $id = $_GET['na'];
    mysqli_query($conn, "UPDATE fuel SET fstatus='Not Available' WHERE fuelId='$id'");
    header('location: manage_fuel.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM fuel WHERE fuelId='$id'");
    header('location: manage_fuel.php');
}


$query = "SELECT * FROM fuel";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
include 'header.php';

?>

<div class="row">
    <div class="col-md-2 bg-dark text-white">
        <?php
        include 'nav.php';
        ?>
    </div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <center>
                    <h4>MANAGE FUEL PRICE</h4>
                </center>
            </div>
            <div class="card-body">
                <table class="table">

                    <tr>
                        <th>Fuel Name</th>
                        <th>Fuel Price</th>
                        <th colspan="">
                            Status
                        </th>
                        <th colspan="2">
                            <center> Action </center>
                        </th>
                    </tr>
                    <?php if ($count > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>

                            <tr>
                                <td><?php echo $row['fname'] ?></td>
                                <td><?php echo $row['fprice'] ?></td>
                                <?php
                                if ($row['fstatus'] == "Available") { ?>
                                    <td> <a href="?na=<?php echo $row['fuelId'] ?>" class="btn btn-danger">Make Fuel N/A</a> </td>
                                <?php } else {
                                ?>
                                    <td> <a href="?avail=<?php echo $row['fuelId'] ?>" class="btn btn-success">Make Fuel Available</a> </td>
                                <?php } ?>
                                <td> <a href="edit_fuel.php?edit=<?php echo $row['fuelId'] ?>" class="btn btn-success">Edit Fuel</a> </td>
                                <td> <a href="?delete=<?php echo $row['fuelId'] ?>" class="btn btn-danger">Delete Fuel</a> </td>

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