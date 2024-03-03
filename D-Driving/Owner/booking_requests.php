<?php
include 'db.php';
session_start();
$owner =  $_SESSION['owner'];
$result = mysqli_query($conn, "SELECT b.* , i.fname , s.dname FROM bookings b JOIN instructor i ON b.instId=i.instructorId JOIN schools s ON i.schoolId=s.schoolId WHERE s.owner='$owner'");
//script for delete inventory item 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "delete from instructor where instructorId='$id'");
    header('location:manage_instructor.php');
}


?>
<?php
include 'header.php'
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-primary px-0">
            <?php include 'nav.php' ?>
        </div>
        <div class="col-md-9 mx-4 mt-4" style="background: #fff;">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h5 class="text-color"><b>MANAGE BOOKING REQUESTS</b> </h5>
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
                            <th>Schedule</th>
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
                                    <?php if ($row['status'] == "Pending") { ?>
                                        <a href="assign.php?studentId=<?php echo $row['studentId'] ?>&bookingId=<?php echo $row['bookingId'] ?>" class="btn btn-success bg-gradient">Schedule Classes</a>
                                    <?php } else { ?>
                                        <a href="view_classes.php?studentId=<?php echo $row['studentId'] ?>&bookingId=<?php echo $row['bookingId'] ?>" class="btn btn-warning bg-gradient">View Classes</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>
<?php include 'footer.php'; ?>
</body>

</html>