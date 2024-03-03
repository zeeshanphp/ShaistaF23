<?php
include 'db.php';
$message = "";
$result = mysqli_query($conn, "SELECT b.* , i.fname , s.dname FROM bookings b JOIN instructor i ON b.instId=i.instructorId JOIN schools s ON i.schoolId=s.schoolId");
$count = mysqli_num_rows($result);
include 'header.php';

?>

<div class="row">
    <div class="col-md-2 bg-primary text-white">
        <?php
        include 'nav.php';
        ?>
    </div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <center>
                    <h4>VIEW BOOKINGS</h4>
                </center>
            </div>
            <div class="card-body">
                <table class="table table-light table-borderless">
                    <tr class="table-active">
                        <th>School Name</th>
                        <th>Instructor Name</th>
                        <th>Class Start</th>
                        <th>Class Time</th>
                        <th>Status</th>
                        <th>View Classes</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['dname']; ?></td>
                            <td><?php echo $row['fname']; ?></td>
                            <td><?php echo $row['book_date']; ?></td>
                            <td> <?php echo $row['class_time']; ?></td>
                            <td> <?php echo $row['status']; ?></td>
                            <td>
                                <?php
                                if ($row['status'] == 'Pending') {
                                ?>
                                    <span class="badge bg-warning bg-gradient w-100"> <?php echo $row['status'] ?> </span>
                                <?php } else {
                                ?>
                                    <a href="view_classes.php?bookingId=<?php echo $row['bookingId'] ?>" class="btn btn-warning bg-gradient">View Classes</a>
                                <?php } ?>
                            </td>
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