<?php
session_start();
include 'db.php';
$id = $_GET['category'];
$result = mysqli_query($conn, "SELECT * FROM food WHERE fcat='$id'");

include 'header.php';
?>
<section class="bg-primary" style="padding-top: 7.0rem;padding-bottom: 5.0rem;">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h1 class="text-white"><?php echo $id ?></h1>
            </center>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="row">
        <?php while ($fetch_food = mysqli_fetch_array($result)) {
            echo "Food Name: " . $fetch_food['fname'] . "<br>";
        }
        ?>
        <div class="col-md-3">

            <form action="add-to-cart.php" method="post">
                <table class="table table-borderless">
                    <tr>
                        <td colspan=""> <img src="Admin/product_images/<?php echo $fetch_food['photo'] ?>" class="rounded" height="200" width="100%" /> </td>
                    </tr>
                    <tr>
                        <td><b>Food Name:</b><?php echo $fetch_food['fname'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Food Price:</b><?php echo $fetch_food['fprice'] ?></td>
                        <!-- </tr>
                        <tr>
                            <td><b>Qty:</b><input type="number" class="form-control w-25 d-inline" min="1" name="quantity" placeholder="" required /></td>
                        </tr>
                        <tr> 
                            <td><input type="hidden" name="id" value="<?php echo $fetch_food['foodId']; ?>"></td>
                        </tr>
                        <tr>
                            <td colspan=""><input type="submit" name="add_to_cart" class="btn btn-primary w-100" value="Add To Card"></td>
                        </tr> -->
                    <tr>
                        <td colspan=""><a href="feedback.php?feedback=<?php echo $fetch_food['foodId'] ?>" class="btn btn-success w-100">Add Feedback</a></td>
                    </tr>
                </table>
            </form>
        </div>
        <?php // } 
        ?>
    </div>
</div>

<?php
include 'footer.php';
?>