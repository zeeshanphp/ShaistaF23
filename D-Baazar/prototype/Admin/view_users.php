<?php
include 'db.php';
$message = "";
$query = "SELECT * FROM users WHERE type='Customer' OR type='Seller'";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
if (isset($_GET['approve'])) {
    $id = $_GET['approve'];
    mysqli_query($conn, "UPDATE users SET status='Approved' WHERE userId='$id'");
    header('location: view_users.php');
}

if (isset($_GET['reject'])) {
    $id = $_GET['reject'];
    mysqli_query($conn, "UPDATE users SET status='Rejected' WHERE userId='$id'");
    header('location: view_users.php');
}



if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM users WHERE userId='$id'");
    header('location: view_users.php');
}
include 'header.php';

?>

<div class="row px-0 mx-0">
    <div class="col-md-2 bg-primary text-white">
        <?php
        include 'nav.php';
        ?>
    </div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header text-color-in">
                <center>
                    <h4>MANAGE USERS</h4>
                </center>
            </div>
            <div class="card-body">
                <table class="table table-borderless table-hover">

                    <tr class="table-active bg-gradient">
                        <th style="vertical-align: middle;">Username</th>
                        <th style="vertical-align: middle;">Fullname</th>
                        <th style="vertical-align: middle;">Email</th>
                        <th style="vertical-align: middle;">Phone</th>
                        <th style="vertical-align: middle;">City</th>
                        <th style="vertical-align: middle;">Role</th>
                        <th style="vertical-align: middle;">Status</th>
                        <th style="vertical-align: middle;">Update Status</th>
                        <th style="vertical-align: middle;">Delete User</th>
                    </tr>
                    <?php if ($count > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>

                            <tr>
                                <td style="vertical-align: middle;"><?php echo $row['username'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['fullname'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['email'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['phone'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['city'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['type'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['status'] ?></td>
                                <?php if ($row['status'] == "Pending" || $row['status'] == "Rejected") { ?>
                                    <td><a href="?approve=<?php echo $row['userId'] ?>" class="btn btn-success rounded bg-gradient">Approve</a></td>
                                <?php } else { ?>
                                    <td><a href="?reject=<?php echo $row['userId'] ?>" class="btn btn-danger rounded bg-gradient">Reject</a></td>
                                <?php } ?>
                                <td><a href="?delete=<?php echo $row['userId'] ?>" class="btn btn-danger rounded bg-gradient">Delete User</a></td>

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