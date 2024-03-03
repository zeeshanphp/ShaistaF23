<?php
include 'db.php';
session_start();
$result = mysqli_query($conn, "SELECT * FROM instructor");
include 'header.php';
?>

<div class="container">
    <div class="row">
        <?php while ($row = mysqli_fetch_array($result)) {
            # code...
        ?>
            <div class="col-md-3 rounded">
                <table class="table table-borderless">
                    <tr>
                        <td colspan="2"> <img src="Owner/images/<?php echo $row['photo'] ?>" height="200" width="200"> </td>
                    </tr>

                    <tr>
                        <td><b>Name</b></td>
                        <td><?php echo $row['fname']; ?> </td>
                    </tr>
                    <tr>
                        <td> <b>Contact</b> </td>
                        <td><?php echo $row['phone']; ?> </td>
                    </tr>
                    <tr>
                        <td><b>Location</b></td>
                        <td><?php echo $row['city']; ?> </td>
                    </tr>
                    <tr>
                        <td colspan="2"><a href="view_profile.php?profile=<?php echo $row['instructorId'] ?>" class="btn btn-warning bg-gradient w-100">View Profile</a></td>
                    </tr>
                    <tr>
                        <td colspan="2"><a href="booking.php?instId=<?php echo $row['instructorId'] ?>&schoolId=<?php echo $row['schoolId'] ?>" class="btn btn-warning bg-gradient w-100">Request Booking</a></td>
                    </tr>
                </table>
            </div>
        <?php } ?>
    </div>
</div>
<?php
include 'footer.php'
?>