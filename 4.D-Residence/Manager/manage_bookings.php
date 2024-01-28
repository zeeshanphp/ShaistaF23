<?php
include 'db.php';
$message = "";

if (isset($_GET['assign']) && isset($_GET['room'])) {
    $id = $_GET['assign'];
    $room = $_GET['room'];
    mysqli_query($conn, "UPDATE bookings SET order_status='Room Assigned' WHERE bookingId='$id'");
    mysqli_query($conn, "UPDATE rooms SET status='Room is booked' WHERE roomId='$room'");

    header('location: manage_bookings.php');
}

$query = "SELECT * FROM bookings JOIN rooms ON bookings.roomId=rooms.roomId";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
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
            <div class="card-header text-primary">
                <center>
                    <h4>VIEW ALL BOOKING REQUESTS</h4>
                </center>
            </div>
            <div class="card-body">
                <table class="table table-borderless table-hover">

                    <tr class="table-active bg-gradient">
                        <th style="vertical-align: middle;">Image</th>
                        <th style="vertical-align: middle;">Room No</th>
                        <th style="vertical-align: middle;">Room Rent</th>
                        <th style="vertical-align: middle;">Room Type</th>
                        <th style="vertical-align: middle;">Booking Status</th>
                    </tr>
                    <?php if ($count > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>

                            <tr>
                                <td><img src="images/<?php echo $row['image'] ?>" height="70" width="70"></td>
                                <td style="vertical-align: middle;"><?php echo $row['roomno'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['rent'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['type'] ?></td>
                                <td style="vertical-align: middle;"><?php if ($row['order_status'] == "Pending") { ?>
                                        <a href="?assign=<?php echo $row['bookingId']; ?>&room=<?php echo $row['roomId'] ?>" class="btn btn-dark bg-gradient">Assign</a>
                                    <?php } else {
                                                                        echo "<span class='badge bg-success'>" . $row['order_status'] . "</span>";
                                                                    } ?>
                                </td>

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