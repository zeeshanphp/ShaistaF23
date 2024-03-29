<?php
include 'db.php';
$message = "";
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE pId='$id'");
    header('location: view_products.php');
}
include 'header.php';

?>

<div class="row px-0 mx-0">
    <div class="col-md-2 bg-primary text-white">
        <?php
        include 'nav.php';
        ?>
    </div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header text-color-in">
                <center>
                    <h4>ALL PRODUCTS</h4>
                </center>
            </div>
            <div class="card-body">
                <table class="table table-borderless table-hover">

                    <tr class="table-active bg-gradient">
                        <th style="vertical-align: middle;">Image</th>
                        <th style="vertical-align: middle;">Product Name</th>
                        <th style="vertical-align: middle;">Product Price</th>
                        <th style="vertical-align: middle;">Product Category</th>
                        <th style="vertical-align: middle;">Edit</th>
                        <th style="vertical-align: middle;">Delete</th>
                    </tr>
                    <?php if ($count > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>

                            <tr>
                                <td><img src="images/<?php echo $row['photo'] ?>" height="70" width="70"></td>
                                <td style="vertical-align: middle;"><?php echo $row['pname'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['pprice'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['pcat'] ?></td>
                                <td><a href="edit_product.php?edit=<?php echo $row['pId'] ?>" class="btn btn-warning rounded bg-gradient">EDIT</a></td>
                                <td><a href="?delete=<?php echo $row['pId'] ?>" class="btn btn-danger rounded bg-gradient">DELETE</a></td>
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
<?php
include 'footer.php';
?>