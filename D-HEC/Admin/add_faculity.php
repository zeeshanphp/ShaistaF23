<?php
include 'db.php';
$message = "";
if (isset($_POST['add_faculity'])) {

    $faculity = $_POST['faculity'];
    $query = "INSERT INTO  faculities(faculity) VALUES('$faculity')";
    if (mysqli_query($conn, $query)) {
        header('location: view_faculities.php');
    }
}
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Faculty Portal for Higher Education Institutes </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header text-primary">
                        <?php if ($message != "") { ?>
                            <div class="alert alert-success"><?php echo $message ?></div>
                        <?php } ?>
                        <h4>ADD FACULITY</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <table class="table table-borderless mt-3">
                                <tr>
                                    <td><b>Faculity:</b></td>
                                    <td><input type="text" class="form-control" name="faculity" placeholder="Enter Faculity" required /></td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-danger bg-gradient rounded" data-bs-dismiss="modal">Close</button></td>
                                    <td><input type="submit" name="add_faculity" class="btn btn-success w-100 bg-gradient rounded" value="Add Faculity"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>