<?php
include 'db.php';
$student = $_GET['studentId'];
$bookingId = $_GET['bookingId'];
if (mysqli_query($conn, "UPDATE bookings SET status='Classes Scheduled' WHERE bookingId='$bookingId'")) {
    $result = mysqli_query($conn, "SELECT classId FROM classes");
    $row = mysqli_fetch_array($result);
    while ($row = mysqli_fetch_array($result)) {
        $classId = $row['classId'];
        mysqli_query($conn, "INSERT INTO student_classes(class,studentId,bookingId) VALUES('$classId' , '$student' , '$bookingId')");
    }
}
echo "<script>alert('Classes Added'); window.location.href = 'booking_requests.php';</script>";
