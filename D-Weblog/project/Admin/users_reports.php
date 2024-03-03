<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM reports r JOIN users u ON r.userId=u.user_id");
$count = mysqli_num_rows($result);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM blogs WHERE blogId='$id'");
    header('location: manage_blogs.php');
}


?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <nav class="container-fluid py-3 bg-primary bg-gradient text-white">
        <?php include 'top-nav.php' ?>

    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-primary px-0">
                <?php include 'nav.php' ?>
            </div>
            <div class="col-md-9 mx-4 mt-4" style="background: #fff;">
                <div class="card">
                    <div class="card-header">
                        <center>
                            <h4>MANAGE BLOGS</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">

                            <tr>
                                <th>Reproted By</th>
                                <th>Report</th>
                                <th>View Blogger</th>
                                <th>View Blog</th>

                            </tr>
                            <?php if ($count > 0) {
                                while ($row = mysqli_fetch_array($result)) { ?>

                                    <tr>
                                        <td><?php echo $row['fullname'] ?></td>
                                        <td><?php echo $row['report'] ?></td>
                                        <td> <a href="view_blogger.php?blogger=<?php echo $row['bloggerId'] ?>" class="btn btn-info bg-gradient">View Blogger</a> </td>
                                        <td> <a href="view_blog.php?blog=<?php echo $row['blogId'] ?>" class="btn btn-danger bg-gradient">View Blog</a> </td>

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

    </div>
    <?php include 'footer.php'; ?>
</body>

</html>