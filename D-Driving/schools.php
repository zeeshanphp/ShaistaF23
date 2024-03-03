<?php
include 'db.php';
session_start();

$result = mysqli_query($conn, "SELECT * FROM schools");

include 'header.php';
?>

<div class="container">
    <div class="row">
        <?php while ($row = mysqli_fetch_array($result)) {
            # code...
        ?>
            <div class="col-md-4 rounded">
                <table class="table table-borderless">
                    <tr>
                        <td colspan="2"> <img src="Owner/images/<?php echo $row['photo'] ?>" height="200" width="200"> </td>
                    </tr>

                    <tr>
                        <td><b>School Name</b></td>
                        <td><?php echo $row['dname']; ?> </td>
                    </tr>
                    <tr>
                        <td> <b>Contact</b> </td>
                        <td><?php echo $row['dphone']; ?> </td>
                    </tr>
                    <tr>
                        <td><b>Location</b></td>
                        <td><?php echo $row['location']; ?> </td>
                    </tr>
                    <tr>
                        <td colspan="2"><a href="instructors.php?school=<?php echo $row['schoolId'] ?>" class="btn btn-warning bg-gradient w-100">View Instructors</a></td>
                    </tr>
                </table>
            </div>
        <?php } ?>
    </div>
</div>
<?php
include 'footer.php'
?>