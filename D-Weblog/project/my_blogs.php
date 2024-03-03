<?php
include 'db.php';
session_start();
$userId = $_SESSION['userId'];
if (isset($_GET['public'])) {
    $id = $_GET['public'];
    mysqli_query($conn, "UPDATE blogs SET privacy='Public' WHERE blogId='$id'");
    header('location: my_blogs.php');
}
if (isset($_GET['private'])) {
    $id = $_GET['private'];
    mysqli_query($conn, "UPDATE blogs SET privacy='Private' WHERE blogId='$id'");
    header('location: my_blogs.php');
}
$result = mysqli_query($conn, "SELECT * FROM blogs WHERE writer='$userId'");

include 'header.php'

?>
<div class="row">
    <div class="col-md-12 bg-info py-3">
        <center>
            <h4 class="text-white">
                BLOGS
            </h4>
        </center>
    </div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <?php
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {
        ?>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <img src="blogs/<?php echo $row['bpic'] ?>" height="150" width="150" alt="">
                            </div>
                            <div class="col-md-9">
                                <b> <?php echo $row['btitle']; ?></b> <br>

                                <p class="py-3">
                                <div class="row">
                                    <div class="col-md-8">
                                        <?php
                                        if ($row['privacy'] == 'Public') { ?>
                                            <a href="?private=<?php echo $row['blogId'] ?>" class="btn btn-danger bg-gradient d-inline">Make Blog Private</a>
                                        <?php   } else { ?>
                                            <a href="?public=<?php echo $row['blogId'] ?>" class="btn btn-success bg-gradient d-inline">Make Blog Public</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-4 py-2">
                                        <span class="d-inline"><?php echo $row['views']; ?></span>
                                        <span class="d-inline"><i class="bi bi-eye-fill text-success fs-4 d-inline py-2"></i></span>
                                        <a href="edit_blog.php?edit=<?php echo $row['blogId'] ?>" class="btn btn-primary bg-gradient d-inline">View Blog</a>
                                    </div>
                                </div>


                                </p>
                            </div>
                        </div>
                    </div>

                </div>
        <?php }
        } else {
            echo "<center><span class='text-danger'> <b>No Blog Added Yet</b> </span></center>";
        } ?>
    </div>
</div>


<?php include 'footer.php' ?>