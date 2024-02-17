<?php
session_start();
include 'db.php';
$records = mysqli_query($conn, "SELECT * FROM products");
include 'header.php'
?>
<div class="container">
    <div class="row">
        <center>
            <h4>ALL AVAILABLE PRODUCTS</h4>
        </center>
        <?php while ($row = mysqli_fetch_array($records)) { ?>
            <div class="col-md-3">
                <div class="card">
                    <img src="Seller/images/<?php echo $row['photo']; ?>" height="200" class="card-img-top rounded" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['pname']; ?></h5>
                        <p class="card-text">
                            <b>Price :</b> Rs. <?php echo $row['pprice'] ?>
                        </p>
                        <p>
                            <b>Category : </b><?php echo $row['pcat'] ?> <br>
                            <?php
                            if ($row['remaining_stock'] > 0) {
                                echo "<span class='badge bg-success bg-gradient'>Available</span>";
                            } else {
                                echo "<span class='badge bg-danger bg-gradient'>Not In Stock</span>";
                            }
                            ?>
                        </p>
                        <a href="addtocart.php?c_id=<?php echo $row['pId'] ?>" class="btn btn-primary rounded w-100 bg-gradient">Add To Cart</a>
                    </div>
                    <div class="card-footer">
                        <a href="feedback.php?feedback=<?php echo $row['pId'] ?>" class="btn btn-success rounded w-100">Add Feedback</a>
                    </div>
                </div>

            </div>
        <?php } ?>

    </div>
</div>

<?php include 'footer.php' ?>