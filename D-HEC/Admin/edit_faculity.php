<?php
include 'db.php';
$message = "";
$id = $_GET['edit'];
$result = mysqli_query($conn, "SELECT * FROM faculities WHERE faculityId='$id'");
$row = mysqli_fetch_array($result);
if (isset($_POST['update_faculity'])) {

    $faculity = $_POST['faculity'];
    $query = "UPDATE faculities SET faculity ='$faculity' WHERE faculityId='$id'";
    if (mysqli_query($conn, $query)) {
        header('location: view_faculities.php');
    }
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
            <?php if ($message != "") { ?>
                <div class="alert alert-success"><?php echo $message ?></div>
            <?php } ?>
            <div class="card-header text-primary">
                <center>
                    <h4>UPDATE FACULITY</h4>
                </center>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <table class="table table-borderless mt-3">
                        <tr>
                            <td><b>Faculity:</b></td>
                            <td><input type="text" class="form-control" name="faculity" value="<?php echo $row['faculity']; ?>" required /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="update_faculity" class="btn btn-warning w-100 bg-gradient rounded" value="Update Faculity"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </div>
</div>

<?php
include 'footer.php';
?>