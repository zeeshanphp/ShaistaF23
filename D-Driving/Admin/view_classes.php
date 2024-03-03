<?php
include 'db.php';
$message = "";
$bookingId = $_GET['bookingId'];
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
                    <h4>VIEW CLASSES</h4>
                </center>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr class="table-active">
                        <th>Classs</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Update Status</th>
                    </tr>

                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM student_classes sc JOIN classes c ON sc.class=c.classId WHERE sc.bookingId='$bookingId'");
                    while ($row = mysqli_fetch_array($result)) {  ?>
                        <tr>
                            <td><?php echo $row['class']; ?></td>
                            <td><?php echo $row['duration']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <?php if ($row['status'] == "Class Delivered") {
                                ?>
                                    <span class="badge bg-success bg-gradient w-100"><?php echo $row['status']; ?></span>
                                <?php } else { ?>
                                    <span class="badge bg-warning bg-gradient w-100"> Classes Not Delivered Yet </span>
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