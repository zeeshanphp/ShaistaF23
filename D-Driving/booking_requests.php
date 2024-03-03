<?php
include 'db.php';
session_start();
$studentId = $_SESSION['studentId'];
$result = mysqli_query($conn, "SELECT b.* , i.fname , s.dname FROM bookings b JOIN instructor i ON b.instId=i.instructorId JOIN schools s ON i.schoolId=s.schoolId WHERE b.studentId='$studentId'");
include 'header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
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
<?php
include 'footer.php'
?>