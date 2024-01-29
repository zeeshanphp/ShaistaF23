<?php
include 'db.php';
$message = "";
$query = "SELECT * FROM faculities";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
if (isset($_GET['userId'])) {
    $id = $_GET['userId'];
    mysqli_query($conn, "DELETE FROM faculities WHERE faculityId='$id'");
    header('location: view_faculities.php');
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
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9 text-primary">
                        <center>
                            <h4>ALL AVAILABLE FACULITIES</h4>
                        </center>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary bg-gradient rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Faculity</button>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <table class="table table-borderless table-hover">

                    <tr class="table-active bg-gradient">
                        <th style="vertical-align: middle;">Faculity</th>
                        <th style="vertical-align: middle;">Edit</th>
                        <th style="vertical-align: middle;">Delete</th>
                    </tr>
                    <?php if ($count > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>

                            <tr>
                                <td style="vertical-align: middle;"><?php echo $row['faculity'] ?></td>
                                <td><a href="edit_faculity.php?edit=<?php echo $row['faculityId'] ?>" class="btn btn-warning rounded bg-gradient">EDIT</a></td>
                                <td><a href="?delete=<?php echo $row['faculityId'] ?>" class="btn btn-danger rounded bg-gradient">DELETE</a></td>
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

include 'add_faculity.php';
if (isset($_GET['edit'])) {
    include 'edit_faculity.php';
}
include 'footer.php';
?>