<?php
include 'db.php';
$message = "";
function countRecords($table)
{
    $conn = mysqli_connect("localhost", "root", "", "driving_school");
    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result);
}

include 'header.php';

?>

<div class="row">
    <div class="col-md-2 bg-primary text-white">
        <?php
        include 'nav.php';
        ?>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-3 bg-success bg-gradient py-3 px-3 rounded mx-2 mt-3">
                <center> <b>
                        <b class="text-white"> Total Students: <br> </b><span class="text-white"><?php echo countRecords('students') ?> </span>
                    </b></center>
            </div>
            <div class="col-md-3 bg-warning bg-gradient py-3 px-3 rounded mx-2 mt-3">
                <center> <b>
                        <b class="text-white"> Total Instructors: <br> </b><span class="text-white"><?php echo countRecords('instructor') ?> </span>
                    </b></center>
            </div>
            <div class="col-md-3 bg-primary bg-gradient py-3 px-3 rounded mx-2 mt-3">
                <center> <b>
                        <b class="text-white"> Total Schools: <br> </b><span class="text-white"><?php echo countRecords('schools') ?> </span>
                    </b></center>
            </div>
            <div class="col-md-3 bg-dark bg-gradient py-3 px-3 rounded mx-2 mt-3">
                <center> <b>
                        <b class="text-white"> Total Lessons: <br> </b><span class="text-white"><?php echo countRecords('classes') ?> </span>
                    </b></center>
            </div>
            <div class="col-md-3 bg-danger bg-gradient py-3 px-3 rounded mx-2 mt-3">
                <center> <b>
                        <b class="text-white"> Total Bookings: <br> </b><span class="text-white"><?php echo countRecords('bookings') ?> </span>
                    </b></center>
            </div>
            <div class="col-md-3 bg-info bg-gradient py-3 px-3 rounded mx-2 mt-3">
                <center> <b>
                        <b class="text-white"> School Owner: <br> </b><span class="text-white"><?php echo countRecords('owner') ?> </span>
                    </b></center>
            </div>
        </div>

    </div>
</div>
<?php
include 'footer.php';
?>