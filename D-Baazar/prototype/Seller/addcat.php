<?php
include 'db.php';
$message = "";
if (isset($_POST['add_cat'])) {

    $catname = $_POST['catname'];
    $query = "insert into   categories(catname) values('$catname')";
    mysqli_query($conn, $query);
    $message = "<b> Category Added Successfully &nbsp &nbsp <a href='all_cat.php'> View All Categories </a></b>";
}

include 'header.php';
?>
<div class="row mx-0 px-0">
    <div class="col-md-2 bg-primary text-white">
        <?php include 'nav.php' ?>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-color-in">
                <?php if ($message != "") { ?>
                    <div class="alert alert-success"><?php echo $message ?></div>
                <?php } ?>
                <center>
                    <h4>ADD CATEGORY</h4>
                </center>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td>CATEGORY NAME</td>
                            <td><input type="text" class="form-control" name="catname" placeholder="Enter Category Name" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan=""><input type="submit" name="add_cat" class="btn w-100 cust-btn" value="ADD CATEGORY" /></td>
                        </tr>

                    </table>

                </form>

            </div>
        </div>


    </div>
    <div class="col-md-3"></div>
</div>
<?php
include 'footer.php';
?>