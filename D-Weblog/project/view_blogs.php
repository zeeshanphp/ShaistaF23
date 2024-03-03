<?php
include 'db.php';
session_start();
if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
} else {
    $userId = 0;
}

$blogId = $_GET['view'];
if (isset($_GET['view'])) {
    mysqli_query($conn, "UPDATE blogs SET views=(views+1) WHERE blogId='$blogId'");
}
if (isset($_GET['bloggerId'])) {
    if (empty($_SESSION['userId'])) {
        echo "<script>alert('Please Login To Continue'); window.location.href = 'login.php';</script>";
    }
    $bloggerId = $_GET['bloggerId'];
    $check = mysqli_query($conn, "SELECT * FROM subscribers WHERE userId='$userId' AND bloggerId='$bloggerId'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('You Have Already Subscribed to this blogger'); window.location.href = 'blogs.php';</script>";
    } else {
        mysqli_query($conn, "INSERT INTO subscribers(userId,bloggerId) VALUES('$userId','$bloggerId')");
    }
}
if (isset($_POST['add_comments'])) {
    $coments = $_POST['coments'];
    $blogId = $_POST['blogId'];
    $result = mysqli_query($conn, "SELECT * FROM  comments WHERE userId = '$userId' AND blogId='$blogId'");
    $count = mysqli_num_rows($result);
    if ($count >= 1) {
        echo "<script>alert('You Have Already Added Your Comments To This Blog')</script>";
    } else {
        mysqli_query($conn, "INSERT INTO comments (comment,userId,blogId) VALUES('$coments' , '$userId' , '$blogId')");
    }
}
$result = mysqli_query($conn, "SELECT * FROM blogs WHERE blogId='$blogId' ");
$row = mysqli_fetch_array($result);
include 'header.php';
?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-3">
            <img src="blogs/<?= $row['bpic'] ?>" alt="" width="300px" height="250px">
            <?php
            if ($userId == $row['writer']) { ?>

                <a href="" class="btn btn-danger bg-gradient disabled my-3">Subscribe Blogger</a>

            <?php } else {
            ?>
                <a href="?bloggerId=<?= $row['writer'] ?>" class="btn btn-info bg-gradient text-white my-3">Subscribe Blogger</a>
                <a href="report.php?blogger=<?= $row['writer'] ?>&blog=<?= $row['blogId'] ?>" class="btn btn-danger bg-gradient my-3">Report Content</a>
           <?php
            }
            ?>
        </div>
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <h4><?php echo $row['btitle']; ?></h4>
                    <p class="lh-3 justify-content-evenly">
                        <?php echo $row['blog']; ?>
                    </p>
                </div>
                <div class="card-footer">
                    <b class="text-primary">Category:</b> <?php echo $row['bcat']; ?> &nbsp; &nbsp; &nbsp; &nbsp;<b class="text-success">Likes:</b> <?php echo $row['likes']; ?> &nbsp; &nbsp; &nbsp; &nbsp;<b class="text-danger">Dislikes:</b> <?php echo $row['dislikes']; ?> &nbsp; &nbsp; &nbsp; &nbsp;<b class="text-warning">Views:</b> <?php echo $row['views']; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post">
                        <table class="table table-borderless">
                            <tr>
                                <td style="vertical-align:middle;"><b>Add Your Comments</b></td>
                                <td><textarea name="coments" class="form-control" rows="10"></textarea></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" class="form-control" name="blogId" value=<?php echo $blogId; ?> required /></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Add Comments" name="add_comments" class="btn btn-primary"></td>
                            </tr>
                        </table>
                    </form>
                    <div class="col-md-12">
                        <center>
                            <h4>Previous Comments</h4>
                        </center>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM comments c JOIN users u on c.userId=u.user_id WHERE c.blogId='$blogId'");

                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <table>
                                <tr>
                                    <td> <b> <?php echo $row['fullname']; ?></b></td>
                                </tr>
                                <tr>
                                    <td><?php echo $row['comment']; ?></td>
                                </tr>
                            </table>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>