<?php
session_start();
include 'db.php';
$query =  "SELECT * FROM food";
$result = mysqli_query($conn, $query);
while ($fetch_food = mysqli_fetch_array($result)) {
    echo $fetch_food['fname'];
}

include 'header.php';
?>
<!-- <section class="bg-primary py-3" style="margin-top: 4rem;">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h1 class="text-white py-3">ALL AVAILABLE PRODUCTS</h1>
            </center>
        </div>
    </div>
</section> -->
<div class="container-fluid">
    <div class="row">
        <?php
        while ($fetch_food = mysqli_fetch_array($result)) {
        ?>
            <div class="col-md-3">
                    <table class="table table-borderless">
                        <tr>
                            <td colspan="2">
                                <img src="Admin/product_images/<?php echo $fetch_food['photo']; ?>" class="rounded" height="200" width="100%" alt="Food Image" />
                            </td>
                        </tr>
                        <tr>
                            <td><b>Food Name:</b></td>
                            <td><?php echo $fetch_food['fname']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Food Price:</b></td>
                            <td><?php echo $fetch_food['fprice']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Qty:</b></td>
                            <td><input type="number" class="form-control w-25 d-inline" min="1" name="quantity" placeholder="" required /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="hidden" name="id" value="<?php echo $fetch_food['foodId']; ?>" /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="add_to_cart" class="btn btn-primary w-100" value="Add To Cart" /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="feedback.php?feedback=<?php echo $fetch_food['foodId']; ?>" class="btn btn-success w-100">Add Feedback</a></td>
                        </tr>
                    </table>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
include 'footer.php';
?>