<?php
include 'db.php';
session_start();
$blogId = $_GET['edit'];
$result = mysqli_query($conn, "SELECT * FROM blogs WHERE blogId='$blogId'");
$row = mysqli_fetch_array($result);
$userId = $_SESSION['userId'];
$message = "";
if (isset($_POST['update_blogs'])) {
    if (empty($_FILES['pimage']['name'])) {
        $img = $row['bpic'];
    } else {
        $folder = 'blogs/';
        $folder = $folder . basename($_FILES['pimage']['name']);
        move_uploaded_file($_FILES['pimage']['tmp_name'], $folder);
        $img = $_FILES['pimage']['name'];
    }
    $title = mysqli_real_escape_string($conn,  $_POST['btitle']);
    $cat = mysqli_real_escape_string($conn,  $_POST['bcat']);
    $title = mysqli_real_escape_string($conn,  $_POST['btitle']);
    $bdesc = mysqli_real_escape_string($conn,  $_POST['bdesc']);
    $query = "UPDATE blogs SET btitle='$title',bcat='$cat',bpic='$img',blog='$bdesc' WHERE blogId='$blogId'";
    mysqli_query($conn, $query);
    $message = "Blog Updated";
    header('location: my_blogs.php');
}
include 'header.php'
?>
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-md-1"></div>
        <div class="col-md-3 py-5">
            <img src="blogs/<?php echo $row['bpic'] ?>" class="py-3" alt="" width="100%" height="auto">
            <input type="file" name="pimage" class="form-control">
        </div>
        <div class="col-md-6">
            <form method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <?php if ($message != "") { ?>
                            <div class="alert alert-success"><?php echo $message ?></div>
                        <?php } ?>
                        <center>
                            <h4>UPDATE BLOG</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td><b>Blog Title</b></td>
                                <td><input type="text" class="form-control" name="btitle" value="<?php echo $row['btitle']; ?>" required /></td>
                            </tr>

                            <tr>
                                <td><b>Blog Category</b></td>
                                <td><input type="text" class="form-control" name="bcat" value="<?php echo $row['bcat']; ?>" required /></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;"><b>Blog Description</b></td>
                                <td>
                                    <textarea name="bdesc" id="" class="form-control" rows="10" placeholder="Enter Blog Details"><?php echo $row['blog']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="update_blogs" class="btn-warning rounded bg-gradient btn w-100" value="Update Blog" /></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<?php
include 'footer.php'
?>