<?php
include 'db.php';
$message = "";
$id = $_GET['edit'];
$result = mysqli_query($conn, "SELECT * FROM food WHERE foodId='$id'");
$row = mysqli_fetch_array($result);
if (isset($_POST['update_items'])) {
    if (empty($_FILES['pimage']['name'])) {
        $img = $row['photo'];
    } else {
        $img = $_FILES['pimage']['name'];
    }
    $folder = 'product_images/';
    $folder = $folder . basename($_FILES['pimage']['name']);
    move_uploaded_file($_FILES['pimage']['tmp_name'], $folder);
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $query = "UPDATE food SET fname='$pname',fprice='$pprice',photo='$img' WHERE foodId='$id'";
    mysqli_query($conn, $query);
    $message = "Food Updated Successfully <a href='manfood.php'>Click To View Food Item</a>";
}
include 'header.php';

?>

<div class="row">
    <div class="col-md-2 bg-primary text-white">
        <?php
        include 'nav.php';
        ?>
    </div>
    <div class="col-md-6 mt-3 ml-3">
        <div class="card">
            <?php if ($message != "") { ?>
                <div class="alert alert-success"><?php echo $message ?></div>
            <?php } ?>
            <div class="card-header">
                <center>
                    <h4>UPDATE FOOD ITEM</h4>
                </center>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">

                    <table class="table">
                        <tr>
                            <td style="text-align:right"><b>Food Name</b></td>
                            <td><input type="text" class="form-control" name="pname" value="<?php echo $row['fname']; ?>" required></td>
                        </tr>
                        <tr>
                            <td style="text-align:right"><b>Food Price</b></td>
                            <td><input type="text" class="form-control" name="pprice" value="<?php echo $row['fprice']; ?>" required></td>
                        </tr>
                        <tr>
                            <td style="text-align:right"><b>Food Image</b></td>
                            <td><input type="file" name="pimage" class="form-control"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan=""><input type="submit" name="update_items" class="btn btn-primary w-100" value="UPDATE FOOD ITEM" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </div>
    <div class="col-md-3">
        <img src="product_images/<?php echo $row['photo']; ?>" alt="" />
    </div>
</div>
<?php
include 'footer.php';
?>