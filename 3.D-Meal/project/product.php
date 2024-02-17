<?php
session_start();
include 'db.php';
$query =  "SELECT * FROM food";
$result = mysqli_query($conn, $query);
$counter = 0;
while ($row = mysqli_fetch_array($result)) {
    $counter++;
    print_r($row); // Add this line to check the fetched data
}
echo "Loop executed $counter times"; // Add this line

?>

<?php
include 'header.php'
?>
<div class="container-fluid">
    <div class="row">
        <?php

        while ($row = mysqli_fetch_array($result)) {

        ?>
            <div class="col-md-3">
                <table class="table table-borderless">
                    <tr>
                        <td colspan="2">
                            <img src="Admin/product_images/<?php echo $row['photo']; ?>" class="rounded" height="200" width="100%" alt="Food Image" />
                        </td>
                    </tr>
                    <tr>
                        <td><b>Food Name:</b></td>
                        <td><?php echo $row['fname']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Food Price:</b></td>
                        <td><?php echo $row['fprice']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Qty:</b></td>
                        <td><input type="number" class="form-control w-25 d-inline" min="1" name="quantity" placeholder="" required /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="hidden" name="id" value="<?php echo $row['foodId']; ?>" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="add_to_cart" class="btn btn-primary w-100" value="Add To Cart" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><a href="feedback.php?feedback=<?php echo $row['foodId']; ?>" class="btn btn-success w-100">Add Feedback</a></td>
                    </tr>
                </table>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php

include 'footer.php'
?>