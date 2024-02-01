<?php
include 'db.php';
$message = "";
$result = mysqli_query($conn, "SELECT * FROM food");
include 'header.php';

?>
<div class="container-fluid mx-0 px-0">
    <div class="row">
        <div class="col-md-2">
            <?php
            include 'nav.php';
            ?>
        </div>
        <div class="col-md-9">
            <div class="card">
                <?php if ($message != "") { ?>
                    <div class="alert alert-success bg-gradient"><?php echo $message ?></div>
                <?php } ?>
                <div class="card-header">
                    <h4>List Food Item / Add/View/Delete Ingredients</h4>
                </div>
                <div class="card-body">
                    <form method="post">
                        <table class="table">
                            <tr>
                                <th>Dish Name</th>
                                <th>Dish Type</th>
                                <th>Category</th>
                                <th>Dish Code</th>
                                <th>Add</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['dishname'] ?></td>
                                    <td><?php echo $row['type'] ?></td>
                                    <td><?php echo $row['category'] ?></td>
                                    <td><?php echo $row['itemcode']  ?></td>
                                    <td><a href="add_ingredient_to_food.php?foodId=<?php echo $row['foodId'] ?>" class="btn btn-primary bg-gradieny">Add</a></td>
                                    <td><a href="view.php?view=<?php echo $row['foodId'] ?>" class="btn btn-success bg-gradieny">View</a></td>
                                    <td><a href="?delete=<?php echo $row['foodId'] ?>" class="btn btn-danger bg-gradieny">Delete</a></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<?php
include 'footer.php';
?>