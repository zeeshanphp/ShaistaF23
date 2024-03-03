<?php
include 'db.php';
session_start();
$result = mysqli_query($conn, "SELECT * FROM blogs limit 4");
include 'header.php'

?>
<div class="row py-5 px-4" style="background: url('images/banner.jpg');">
    <?php
    while ($row = mysqli_fetch_array($result)) {

    ?>
        <div class="col-md-6 py-3">
            <div class="row">
                <div class="col-md-4">
                    <img src="blogs/<?= $row['bpic'] ?>" alt="" width="200px" height="200px" srcset="">
                </div>
                <div class="col-md-8">
                    <p class="text-white py-3">
                        <?= $row['btitle'] ?> <br>

                        <a href="view_blogs.php?view=<?php echo $row['blogId'] ?>" class="btn btn-success bg-gradient rounded text-white py-1 mt-3">View Blog</a>
                    </p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


<?php include 'footer.php' ?>