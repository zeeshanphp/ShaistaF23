<?php
include 'db.php';
$message = "";
if (isset($_POST['add_cat'])) {

    $catname = $_POST['catname'];
    $query = "insert into categories(catname) values('$catname')";
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
                    <h4>ADD CATEGORIES</h4>
                </center>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <table class="table table-borderless">
                        <tr>
                            <td>CATEGORY NAME</td>
                            <td><input type="text" class="form-control" name="catname" placeholder="Enter Category Name" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan=""><input type="submit" name="add_cat" class="btn w-100 btn-primary bg-gradient" value="ADD CATEGORY" /></td>
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