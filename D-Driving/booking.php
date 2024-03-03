<?php
include 'db.php';
session_start();
$studentId = $_SESSION['studentId'];
if (empty($_SESSION['studentId'])) {
    echo "<script>alert('Please Login To Continue'); window.location.href = 'login.php';</script>";
}
$instructorId = $_GET['instId'];
$schoolId = $_GET['schoolId'];
if (isset($_POST['req_booking'])) {
    $date = $_POST['book_date'];
    $time = $_POST['time'];
    $query = "INSERT INTO bookings(book_date,class_time,instId,studentId,schoolId,status) VALUES ('$date','$time','$instructorId','$studentId','$schoolId' , 'Pending')";
    mysqli_query($conn, $query);
}
include 'header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post">
                <table class="table table-borderless">
                    <tr>
                        <td>Classes Date</td>
                        <td><input type="date" class="form-control" name="book_date" required /></td>
                    </tr>
                    <tr>
                        <td>Classes Time</td>
                        <td><input type="time" class="form-control" name="book_time" required /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="req_booking" class="btn btn-primary w-100" value="Request Booking"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php
include 'footer.php'
?>