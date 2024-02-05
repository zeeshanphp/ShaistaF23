<?php
include 'db.php';
$id = $_GET['view'];
$total_dish_cost = mysqli_query($conn, "SELECT SUM(price) AS total_price FROM food_ingredients WHERE foodId='$id'");
$dish_price = $row = mysqli_fetch_array($total_dish_cost);

$result = mysqli_query($conn, "SELECT * FROM food WHERE foodId='$id'");
$row = mysqli_fetch_array($result);
$result_ing = mysqli_query($conn, "SELECT fi.ingredientId , fi.quantity , fi.price , i.ingredient , i.unit FROM food_ingredients fi JOIN ingredients i ON fi.ingredientId=i.ingId WHERE fi.foodId='$id'");


include 'header.php';
// print_r($row);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <?php
            include 'nav.php';
            ?>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>VIEW FOOD ITEM</h4>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-striped">
                        <tr>
                            <td> <b> Dish Name</b></td>
                            <td><?php echo $row['dishname']; ?></td>
                        </tr>
                        <tr>
                            <td><b> Item Code</b></td>
                            <td><?php echo $row['itemcode']; ?></td>
                        </tr>
                        <tr>
                            <td><b> Item Category</b></td>
                            <td><?php echo $row['category']; ?></td>
                        </tr>
                        <tr>
                            <td><b> Item Type</b></td>
                            <td><?php echo $row['type']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <center> INGREDIENTS</center>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-borderless">
                        <tr class="bg-light">
                            <th>Ingredient</th>
                            <th>Ingredient Quantity</th>
                            <th>Price</th>
                        </tr>
                        <?php while ($fet_ing = mysqli_fetch_array($result_ing)) {
                        ?>
                            <tr>
                                <td><?php echo $fet_ing['ingredient'] ?></td>
                                <td><?php echo $fet_ing['quantity'] . "&nbsp <b>" . $fet_ing['unit'] . "</b>"; ?></td>
                                <td><?php echo "<b>Rs. </b>" . $fet_ing['price'] ?></td>

                            </tr>
                        <?php } ?>
                        <tfoot>
                            <tr class="bg-light">
                                <td></td>
                                <td></td>
                                <td colspan="">
                                    <span class="text-primary"><b class="text-danger">TOTAL:-</b> <b> <?php echo "<b>Rs . </b>" . $dish_price['total_price'] ?></b></span>
                                </td>

                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php'
?>