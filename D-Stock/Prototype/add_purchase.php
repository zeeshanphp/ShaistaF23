<?php
include 'db.php';
$message = "";

if (isset($_POST['add_purchases'])) {
    $supplier = $_POST['sup'];
    $ingredient = $_POST['ing'];
    $datep = $_POST['pdate'];
    $quantity = $_POST['qty'];
    $price = $_POST['price'];
    $sql = "INSERT into purchases(supplierId,ingredientId,date_purchase,quantity,price)VALUES('$supplier' , '$ingredient' ,  '$datep', '$quantity' , '$price')";
    if (mysqli_query($conn, $sql)) {
        mysqli_query($conn, "UPDATE ingredients SET  qty=qty + '$quantity' , price=price+'$price' WHERE ingId='$ingredient'");
        $message = "Purchase Addedd Successfully";
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
                    <h4>Add Purchases</h4>
                </div>
                <div class="card-body">
                    <form method="post">
                        <table class="table">
                            <tr>
                                <td> <b> Refrence Number</b> <br><input type="text" class="form-control" name="rno" placeholder="Enter Refrence Number" required /></td>
                                <td> <b> Supplier : </b> <br>
                                    <select name="sup" class="form-select">
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM users WHERE role='Supplier'");
                                        while ($row = mysqli_fetch_array($result)) {  ?>
                                            <option value="<?php echo $row['user_id'] ?>"><?php echo $row['fullname'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td> <b> Purchase Date</b> <br><input type="date" class="form-control" name="pdate" placeholder="" required /></td>

                            </tr>
                            <tr>
                                <td><b>Select Ingredient </b><br>
                                    <select name="ing" class="form-control">
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM ingredients");
                                        while ($row = mysqli_fetch_array($result)) {  ?>
                                            <option value="<?php echo $row['ingId'] ?>"><?php echo $row['ingredient'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td><b>Add Quantity </b><br>
                                    <input type="text" class="form-control" name="qty" placeholder="Enter Quantity" required />
                                </td>
                                <td>
                                    <b>Price Per Gram</b>
                                    <input type="text" class="form-control" name="price" placeholder="Enter Price" required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="add_purchases" class="btn btn-primary w-100" value="Add Purchases">
                                </td>
                            </tr>
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