<?php
include 'db.php';
session_start();

$id = $_GET['school'];
$result = mysqli_query($conn, "SELECT * FROM instructor WHERE schoolId='$id'");

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
                </table>
            </div>
        <?php } ?>
    </div>
</div>
<?php
include 'footer.php'
?>