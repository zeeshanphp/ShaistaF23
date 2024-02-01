<?php
include 'db.php';
$message = "";
$food_id = $_GET['foodId'];
$total_dish_cost = mysqli_query($conn, "SELECT SUM(price) AS total_price FROM food_ingredients");
$dish_price = $row = mysqli_fetch_array($total_dish_cost);
$result_ing = mysqli_query($conn, "SELECT fi.ingredientId , fi.quantity , fi.price , i.ingredient , i.unit FROM food_ingredients fi JOIN ingredients i ON fi.ingredientId=i.ingId WHERE fi.foodId='$food_id'");

if (isset($_POST['add_ingredient'])) {

    $ingredient = $_POST['ing'];
    $quantity = $_POST['qty'];
    $price = $_POST['price'];
    $sql = "INSERT into food_ingredients(ingredientId,quantity,price,foodId)VALUES('$ingredient' , '$quantity' ,'$price' , '$food_id')";
    if (mysqli_query($conn, $sql)) {
        $message = "Ingredient Addedd To Food Successfully";
        header('location: add_ingredient_to_food.php?foodId=' . $food_id);
    }
}
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
                    <h4>Add Ingredient To Food</h4>
                </div>
                <div class="card-body">
                    <form method="post">
                        <table class="table">

                            <tr>
                                <td><b>Select Ingredient </b><br>
                                    <select name="ing" class="form-control" id="ing">
                                        <option>--Select Ingredietn--</option>
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM ingredients");
                                        while ($row = mysqli_fetch_array($result)) {  ?>
                                            <option value="<?php echo $row['ingId'] ?>"><?php echo $row['ingredient'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td id="qty"><b>Add Quantity </b><br>
                                    <input type="number" class="form-control" name="qty" id="food_qty" placeholder="Enter Quantity in Grams" required />
                                </td>
                                <td id="price"><b>Price </b><br>
                                    <input type="text" class="form-control" readonly name="price" id="food_price" required />
                                </td>
                                <td>
                                    <input type="submit" name="add_ingredient" class="btn btn-primary w-100" value="Add Purchases">
                                </td>
                            </tr>
                        </table>
                    </form>
                    <div id="ingredientDetails"></div>
                </div>
            </div>
            <div class="card my-3">
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
<script>
    $(document).ready(function() {
        $("#qty").hide();
        $("#price").hide();
        var foodPrice = "";
        $("#food_price").val('');
        $("#food_qty").change(function() {
            // Get the quantity value
            var quantity = $("#food_qty").val();

            // Calculate the price based on quantity and foodPrice
            var calculatedPrice = quantity * foodPrice;

            // Set the calculated price to the #price field
            $("#food_price").val(calculatedPrice);
        });
        // Triggered when the dropdown selection changes
        $("#ing").change(function() {
            $("#food_price").val('');

            var ingId = $(this).val(); // Get the selected ingredient ID

            // Use AJAX to fetch ingredient details based on the selected ID
            $.ajax({
                type: "POST",
                url: "getIngredientDetails.php", // Create a separate PHP file for handling AJAX requests
                data: {
                    ingId: ingId
                },
                success: function(data) {
                    console.log(data);
                    $("#food_price").val("0");
                    $("#qty").show();
                    $("#price").show();
                    $("#food_price").val(data);
                    foodPrice = data;
                }
            });
        });
    });
</script>

<?php
include 'footer.php';
?>