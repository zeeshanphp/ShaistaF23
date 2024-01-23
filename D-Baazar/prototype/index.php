<?php
session_start();
include 'db.php';
$records = mysqli_query($conn, "SELECT * FROM products");
include 'header.php'
?>
<div class="row">
    <center>
        <h4>ALL AVAILABLE PRODUCTS</h4>
    </center>
    <?php while ($row = mysqli_fetch_array($records)) { ?>
        <div class="col-md-3">
            <div class="card">
                <img src="Admin/images/<?php echo $row['photo']; ?>" height="200" class="card-img-top rounded" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['pname']; ?></h5>
                    <p class="card-text">
                        <b>Price :</b> Rs. <?php echo $row['pprice'] ?>
                    </p>
                    <p>
                        <b>Category : </b><?php echo $row['pcat'] ?>
                    </p>
                    <a href="#" class="btn btn-primary rounded w-100 bg-gradient">Add To Cart</a>
                </div>
            </div>

        </div>
    <?php } ?>

</div>


<?php include 'footer.php' ?>