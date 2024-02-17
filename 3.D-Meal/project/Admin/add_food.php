<?php
include 'db.php';
$categories = "select * from  categories";
$cat_records = mysqli_query($conn, $categories);
$message = "";
if (isset($_POST['add_items'])) {

    $folder = 'product_images/';
    $folder = $folder . basename($_FILES['pimage']['name']);
    move_uploaded_file($_FILES['pimage']['tmp_name'], $folder);
    $img = $_FILES['pimage']['name'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pcat = $_POST['pcat'];
    $query = "insert into  food(fname,fprice,photo,fcat) values('$pname' , '$pprice', '$img' , '$pcat')";
    mysqli_query($conn, $query);
    $message = "Food Added Successfully <a href='manfood.php'>Click To Manage Food Item</a>";
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
                    <h4>ADD FOOD ITEM</h4>
                </center>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">

                    <table class="table">
                        <tr>
                            <td style="text-align:right"><b>Food Name</b></td>
                            <td><input type="text" class="form-control" name="pname" placeholder="Enter Product Name" required></td>
                        </tr>
                        <tr>
                            <td style="text-align:right"><b>Food Price</b></td>
                            <td><input type="text" class="form-control" name="pprice" placeholder="Enter Product Price" required></td>
                        </tr>
                        <tr>
                            <td style="text-align:right"><b>Food Image</b></td>
                            <td><input type="file" name="pimage" class="form-control"></td>
                        </tr>
                        <tr>
                            <td style="text-align:right"><b>Food Category</b></td>
                            <td><select name="pcat" class="form-select" required>
                                    <option>Select Category</option>
                                    <?php while ($row = mysqli_fetch_array($cat_records)) { ?>
                                        <option value="<?php echo $row['catname'] ?>"><?php echo $row['catname'] ?></option>
                                    <?php  } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan=""><input type="submit" name="add_items" class="btn btn-primary w-100" value="ADD FOOD ITEM" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </div>
</div>
<?php
include 'footer.php';
?>