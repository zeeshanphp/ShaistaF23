<?php
include 'db.php';
session_start();
$message = "";
$error = "";
$result = mysqli_query($conn, "SELECT * FROM blogs b JOIN users u ON b.writer=u.user_id WHERE b.privacy='Public'");
if (isset($_POST['like'])) {
    $blog = $_POST['blog'];
    mysqli_query($conn, "UPDATE blogs SET likes = (likes+1) WHERE blogId='$blog'");
    header('location: blogs.php');
}
if (isset($_POST['dislike'])) {
    $blog = $_POST['blog'];
    mysqli_query($conn, "UPDATE blogs SET dislikes = (dislikes+1) WHERE blogId='$blog'");
    header('location: blogs.php');
}
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
                                <b>Writter By: </b> <?php echo $row['fullname']; ?> <b>Published On: </b><?php echo $row['date_posted']; ?>
                            </p>
                            <p class="py-3">
                            <div class="row">
                                <div class="col-md-8">
                                    <form method="post">
                                        <input type="hidden" name="blog" value="<?php echo $row['blogId']; ?>" />
                                        <button name="like" class="btn rounded btn-light bg-gradient"><i class="bi bi-hand-thumbs-up-fill text-primary fs-4"></i></button> <?php echo $row['likes']; ?>
                                        <button name="dislike" class="btn rounded btn-light bg-gradient"><i class="bi bi-hand-thumbs-down-fill text-danger fs-4"></i></button> <?php echo $row['dislikes']; ?>
                                    </form>
                                </div>
                                <div class="col-md-4 py-2">
                                    <span class="d-inline"><?php echo $row['views']; ?></span>
                                    <span class="d-inline"><i class="bi bi-eye-fill text-success fs-4 d-inline py-2"></i></span>
                                    <a href="view_blogs.php?view=<?php echo $row['blogId'] ?>" class="btn btn-primary bg-gradient d-inline">View Blog</a>
                                </div>
                            </div>


                            </p>
                        </div>
                    </div>
                </div>

            </div>
        <?php } ?>
    </div>
</div>


<?php include 'footer.php' ?>