<?php
include 'db.php';
$message = "";
$id = $_GET['edit'];
$result = mysqli_query($conn, "SELECT * FROM categories WHERE catId='$id'");
$row = mysqli_fetch_array($result);
if (isset($_POST['update_category'])) {
    $category = $_POST['catname'];
    $query = "update categories set catname='$category' where catId='$id'";
    mysqli_query($conn, $query);
    header('location:mancat.php');
}
include 'header.php';

?>

<div class="row">
    <div class="col-md-2 bg-primary text-white">
        <?php
        include 'nav.php';
        ?>
    </div>
    <div class="col-md-6 mt-3 ml-3">
        <div class="card">
            <?php if ($message != "") { ?>
                <div class="alert alert-success"><?php echo $message ?></div>
            <?php } ?>
            <div class="card-header">
                <center>
                    <h4>UPDATE FOOD ITEM</h4>
                </center>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td>CATEGORY NAME</td>
                            <td><input type="text" class="form-control" name="catname" value="<?php echo $row['catname'] ?>" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan=""><input type="submit" name="update_category" class="btn w-100 btn-warning bg-gradient" value="UPDATE CATEGORY" /></td>
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