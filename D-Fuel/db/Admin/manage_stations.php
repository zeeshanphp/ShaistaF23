<?php
include 'db.php';
$message = "";


if (isset($_GET['approve'])) {
    $id = $_GET['approve'];
    mysqli_query($conn, "UPDATE stations SET status='Approved' WHERE stationId='$id'");
    header('location: manage_stations.php');
}

if (isset($_GET['reject'])) {
    $id = $_GET['reject'];
    mysqli_query($conn, "UPDATE stations SET status='Rejected' WHERE stationId='$id'");
    header('location: manage_stations.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM stations WHERE stationId='$id'");
    header('location: manage_stations.php');
}


$query = "SELECT * FROM stations";
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
                    <h4>MANAGE GAS STATIONS</h4>
                </center>
            </div>
            <div class="card-body">
                <table class="table">

                    <tr>
                        <th>Image</th>
                        <th>Station Name</th>
                        <th>Station Contact</th>
                        <th>Station City</th>
                        <th colspan="2">
                            <center> Status </center>
                        </th>
                        <th colspan="2">
                            <center> Action </center>
                        </th>
                    </tr>
                    <?php if ($count > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>

                            <tr>
                                <td><img src="images/<?php echo $row['image'] ?>" height="70" width="70"></td>
                                <td><?php echo $row['sname'] ?></td>
                                <td><?php echo $row['sphone'] ?></td>
                                <td><?php echo $row['scity'] ?></td>
                                <?php if ($row['status'] == "Pending") { ?>
                                    <td> <a href="?approve=<?php echo $row['stationId'] ?>" class="btn btn-success">Approve</a> </td>
                                    <td> <a href="?reject=<?php echo $row['stationId'] ?>" class="btn btn-danger">Reject</a> </td>
                                <?php } else { ?>
                                    <td colspan="2">
                                        <center> <?php echo $row['status']  ?> </center>
                                    </td>
                                <?php } ?>
                                <td> <a href="edit_station.php?edit=<?php echo $row['stationId'] ?>" class="btn btn-success">Edit</a> </td>
                                <td> <a href="?delete=<?php echo $row['stationId'] ?>" class="btn btn-danger">Delete</a> </td>

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