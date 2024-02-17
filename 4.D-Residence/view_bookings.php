<?php
session_start();
include 'db.php';
$id = $_SESSION['custId'];
$query = "SELECT * FROM bookings  where custId='$id'";
$result = mysqli_query($conn, $query);

include 'header.php';
?>
<div class="container">
    <div class="row mt-5 py-5">
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
                        <th>Type</th>
                        <th>Room No</th>
                        <th>Book Status</th>
                        <th>Book Date</th>

                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['room_type'] ?></td>
                            <td><?php echo $row['room_no'] ?></td>
                            <td><?php echo $row['booking_status'] ?></td>
                            <td><?php echo $row['booking_date'] ?></td>

                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="mt-4 py-4">
    <?php
    include 'footer.php';
    ?>
</div>