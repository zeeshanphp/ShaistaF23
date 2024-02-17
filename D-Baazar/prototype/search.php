<?php
session_start();
include 'db.php';
$records = mysqli_query($conn, "SELECT * FROM products");
include 'header.php'
?>
<div class="row">
    <div class="col-md-12">
        <center>
            <h4 class="text-dark">SEARCH PRODUCTS</h4>
        </center>
        <form method="post">
            <table class="table table-borderless">
                <tr>
                    <td><input type="text" name="nfind" class="form-control"></td>
                    <td><input type="submit" name="nsearch" value="SEARCH ITEM" class="btn btn-info w-100"></td>
                </tr>
            </table>
        </form>
    </div>

    <?php
    if (isset($_POST['nsearch'])) {
        $find = $_POST['nfind'];
        $query = "select * from products where pname = '$find'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) { ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="Seller/images/<?php echo $row['photo']; ?>" height="200" class="card-img-top rounded" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['pname']; ?></h5>
                            <p class="card-text">
                                <b>Price :</b> Rs. <?php echo $row['pprice'] ?>
                            </p>
                            <p>
                                <b>Category : </b><?php echo $row['pcat'] ?>
                            </p>
                            <a href="addtocart.php?c_id=<?php echo $row['pId'] ?>" class="btn btn-primary rounded w-100 bg-gradient">Add To Cart</a>
                        </div>
                        <div class="card-footer">
                            <a href="feedback.php?feedback=<?php echo $row['pId'] ?>" class="btn btn-success rounded w-100">Add Feedback</a>
                        </div>
                    </div>

                </div>
            <?php }
        } else { ?>
            <center> <span class="text-danger"> <b>No Record Found</b> </span></center>
    <?php }
    } ?>

</div>


<?php include 'footer.php' ?>