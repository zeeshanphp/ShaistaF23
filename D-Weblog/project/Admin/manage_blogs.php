<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM blogs b JOIN users u ON b.writer=u.user_id WHERE b.privacy='Public'");
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
                                <th>Image</th>
                                <th>Writer</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>
                                    Delete
                                </th>
                            </tr>
                            <?php if ($count > 0) {
                                while ($row = mysqli_fetch_array($result)) { ?>

                                    <tr>
                                        <td> <img src="../blogs/<?php echo $row['bpic'] ?>" height="100" width="100" /></td>
                                        <td><?php echo $row['fullname'] ?></td>
                                        <td><?php echo $row['bcat'] ?></td>
                                        <td><?php echo $row['btitle'] ?></td>
                                        <td><?php echo $row['privacy'] ?></td>
                                        <td> <a href="edit_blog.php?edit=<?php echo $row['blogId'] ?>" class="btn btn-info bg-gradient">Edit</a> </td>
                                        <td> <a href="?delete=<?php echo $row['blogId'] ?>" class="btn btn-danger bg-gradient">Delete</a> </td>

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