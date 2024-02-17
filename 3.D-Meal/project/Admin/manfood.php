<?php
include 'db.php';
$message = "";
$query = "SELECT * FROM food";
$result = mysqli_query($conn, $query);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "delete from food where foodId='$id'");
    header('location:manfood.php');
}
include 'header.php';

?>

<div class="row">
    <div class="col-md-2 bg-primary text-white">
        <?php
        include 'nav.php';
        ?>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <center>
                    <h4>MANAGE FOOD ITEM</h4>
                </center>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Food Name</th>
                            <th>Food Price</th>
                            <th>Food Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><img src="product_images/<?php echo $row['photo']; ?>" alt="" width="50" height="50"></td>
                                <td><?php echo $row['fname']; ?></td>
                                <td><?php echo $row['fprice']; ?></td>
                                <td><?php echo $row['fcat']; ?></td>
                                <td><a href="edit_food.php?edit=<?php echo $row['foodId'] ?>" class="btn btn-warning bg-gradient">EDIT</a></td>
                                <td><a href="?delete=<?php echo $row['foodId'] ?>" class="btn btn-danger bg-gradient">DELETE</a></td>

                            </tr>
                        <?php

                        } ?>

                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
<?php
include 'footer.php';
?>