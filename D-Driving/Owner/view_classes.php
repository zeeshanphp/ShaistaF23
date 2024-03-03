<?php
include 'db.php';
session_start();
$student = $_GET['studentId'];
$bookingId = $_GET['bookingId'];
$result_student = mysqli_query($conn, "SELECT * FROM students WHERE studentId='$student'");
$row_student = mysqli_fetch_array($result_student);
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    mysqli_query($conn, "UPDATE student_classes SET status='Class Delivered' WHERE std_class_id='$id'");
    header('location: booking_requests.php');
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
        <div class="col-md-8 mx-4 mt-4" style="background: #fff;">
            <div class="row">

                <div class="col-md-12">
                    <table class="table table-borderless">
                        <tr>
                            <td> <b> Student Name </b></td>
                            <td><?php echo $row_student['fname']; ?></td>
                            <td> <b> Email</b></td>
                            <td><?php echo $row_student['email']; ?></td>
                            <td> <b>Phone</b></td>
                            <td><?php echo $row_student['phone']; ?></td>
                        </tr>
                    </table>
                    <table class="table table-borderless">
                        <tr class="table-active">
                            <th>Classs</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th>Update Status</th>
                        </tr>

                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM student_classes sc JOIN classes c ON sc.class=c.classId WHERE sc.studentId='$student' AND sc.bookingId='$bookingId'");
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
                                        <a href="?update=<?php echo $row['std_class_id'] ?>" class="btn btn-danger bg-gradient w-100">Update Class</a>
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