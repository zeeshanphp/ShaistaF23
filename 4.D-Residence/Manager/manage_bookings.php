<?php
include 'db.php';
$query = "SELECT * FROM bookings b JOIN customers c ON b.custId=c.custId";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
$message = "";

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
            <div class="card-header bg-info bg-gradient">
                <b>
                    <center>
                        MY BOOKING HISTORY
                    </center>
                </b>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr class="table-active bg-gradient">
                        <th>Customer Name</th>
                        <th>Customer Phone</th>
                        <th>Customer Email</th>
                        <th>Type</th>
                        <th>Room No</th>
                        <th>Book Status</th>
                        <th>Book Date</th>
                        <th>Assign Room</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['fullname'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['room_type'] ?></td>
                            <td><?php echo $row['room_no'] ?></td>
                            <td><?php echo $row['booking_status'] ?></td>
                            <td><?php echo $row['booking_date'] ?></td>
                            <?php
                            if ($row['booking_status'] == "Pending") { ?>
                                <td><a href="assign.php?book=<?php echo $row['bookingId'] ?>&type=<?php echo $row['room_type'] ?>&custId=<?php echo $row['custId'] ?>" class="btn btn-success rounded bg-gradient">Assign Flat</a></td>
                            <?php  } else { ?>
                                <td><span class="badge bg-success"><?php echo $row['booking_status'] ?></span></td>
                            <?php }
                            ?>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>