<?php
include 'db.php';
$message = "";
if (isset($_GET['approve'])) {
    $id = $_GET['approve'];
    mysqli_query($conn, "UPDATE students SET status='Approved' WHERE studentId='$id'");
    header('location: manage_students.php');
}

if (isset($_GET['reject'])) {
    $id = $_GET['reject'];
    mysqli_query($conn, "UPDATE students SET status='Rejected' WHERE studentId='$id'");
    header('location: manage_students.php');
}

$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);
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
                    <h4>MANAGE USERS</h4>
                </center>
            </div>
            <div class="card-body">
                <table class="table">

                    <tr>
                        <th>Firstname</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Adress</th>
                        <th>Liscense Type</th>
                        <th colspan="2">Status</th>

                    </tr>
                    <?php if ($count > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>

                            <tr>
                                <td><?php echo $row['fname'] ?></td>
                                <td><?php echo $row['lname'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['city'] ?></td>
                                <td><?php echo $row['lisence'] ?></td>
                                <?php
                                if ($row['status'] == "Pending") {
                                ?>
                                    <td> <a href="?approve=<?php echo $row['studentId'] ?>" class="btn btn-success bg-gradient">Approve</a> </td>
                                    <td> <a href="?reject=<?php echo $row['studentId'] ?>" class="btn btn-danger bg-gradient">Reject</a> </td>

                                <?php } else { ?>
                                    <td><span class="badge bg-info"><?php echo $row['status'] ?></span></td>
                                <?php } ?>
                            </tr>
                        <?php
                        }
                    } else { ?>
                        <tr>
                            <td colspan="5" class="text-danger"> <b> No Record Found</b></td>
                        </tr>
                    <?php }

                    ?>
                </table>
            </div>
        </div>

    </div>
</div>
<?php
include 'footer.php';
?>