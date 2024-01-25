<?php
include 'db.php';
$message = "";
if (isset($_GET['userId'])) {
    $id = $_GET['userId'];
    mysqli_query($conn, "DELETE FROM users WHERE userId='$id'");
    header('location: manage_users.php');
}

$query = "SELECT * FROM users";
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
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>CNIC</th>
                        <th>Contact</th>
                        <th>Adress</th>
                        <th>Dispute Name</th>
                        <th>Dispute Father Name</th>
                        <th>Dispute Contact</th>
                        <th>Dispute Adress</th>
                        <th>Dispute Type</th>
                        <th colspan="2">Status</th>

                    </tr>
                    <?php if ($count > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>

                            <tr>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['father_name'] ?></td>
                                <td><?php echo $row['cnic'] ?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['adress'] ?></td>
                                <td><?php echo $row['dname'] ?></td>
                                <td><?php echo $row['dfname'] ?></td>
                                <td><?php echo $row['dphone'] ?></td>
                                <td><?php echo $row['dadress'] ?></td>
                                <td><?php echo $row['dtype'] ?></td>

                                <td> <a href="edit_user.php?edit=<?php echo $row['userId'] ?>" class="btn btn-success">Edit</a> </td>
                                <td> <a href="?delete=<?php echo $row['userId'] ?>" class="btn btn-danger">Delete</a> </td>

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