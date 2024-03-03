<?php
include 'db.php';
$message = "";
$blog = $_GET['blog'];
$result = mysqli_query($conn, "SELECT * FROM blogs WHERE blogId='$blog'");
$row = mysqli_fetch_array($result);
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
                <div class="row">
                    <div class="col-md-3">
                        <img src="../blogs/<?= $row['bpic'] ?>" alt="" width="300px" height="250px">
                        
                    </div>
                    <div class="col-md-8 mx-4">
                        <div class="card mx-3">

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

                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include 'footer.php'; ?>
</body>

</html>