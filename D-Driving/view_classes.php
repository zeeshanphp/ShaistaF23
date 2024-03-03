<?php
include 'db.php';
session_start();
$studentId = $_SESSION['studentId'];
$bookingId = $_GET['bookingId'];
include 'header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
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
<?php
include 'footer.php'
?>