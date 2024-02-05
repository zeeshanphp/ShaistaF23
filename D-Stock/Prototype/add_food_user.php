<?php
include 'db.php';
$message = "";

if (isset($_POST['add_menu'])) {
    $menu = $_POST['menu'];
    $category = $_POST['category'];
    $code = $_POST['code'];
    $food_name = $_POST['fname'];
    $sql = "INSERT into food(dishname,itemcode,category,type)VALUES('$food_name' , '$code' ,  '$category', '$menu')";
    if (mysqli_query($conn, $sql)) {
        $message = "Food Addedd Successfully";
    }
}
include 'header.php';
?>
<div class="container-fluid mx-0 px-0">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-9">
            <div class="card">
                <?php if ($message != "") { ?>
                    <div class="alert alert-success bg-gradient"><?php echo $message ?></div>
                <?php } ?>
                <div class="card-header">
                    <h4>Add Food Menu</h4>
                </div>
                <div class="card-body">
                    <form method="post">
                        <table class="table">
                            <tr>
                                <td> <b> Menu Type</b> <br>
                                    <select name="menu" id="" class="form-select">
                                        <option value="Breakfast">Breakfast</option>
                                        <option value="Lunch">Lunch</option>
                                        <option value="Dinner">Dinner</option>
                                        <option value="Dinner">Supplementry</option>
                                    </select>
                                </td>
                                <td> <b> Category : </b> <br>
                                    <select name="category" id="" class="form-select">
                                        <option value="Indian">Indian</option>
                                        <option value="Desi">Desi</option>
                                        <option value="Pakistani">Pakistani</option>
                                        <option value="Spciy">Spciy</option>
                                    </select>
                                </td>
                                <td> <b> Item Code</b> <br><input type="text" class="form-control" name="code" placeholder="Item Code" required /></td>
                            </tr>

                            <tr>
                                <td style="vertical-align: middle;"> <b> Dish Name </b></td>
                                <td colspan="2"><input type="text" class="form-control" name="fname" placeholder="Enter Food Name" required /></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="add_menu" class="btn btn-primary w-100" value="Add Food Menu">
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