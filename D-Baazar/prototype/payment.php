<?php
session_start();
include 'db.php';
$custId = "";
if (empty($_SESSION['custId'])) {
    $custId = 0;
} else {
    $custId = $_SESSION['custId'];
}
$result_user = mysqli_query($conn, "SELECT * FROM users WHERE userId='$custId'");
$fullname = "";
$phone = "";
$email = "";
if (mysqli_num_rows($result_user) > 0) {
    $fetch_user = mysqli_fetch_array($result_user);
    $fullname = $fetch_user['fullname'];
    $phone = $fetch_user['phone'];
    $email = $fetch_user['email'];
}


// $id = '1';


// for ($i = 0; $i < count($_SESSION['cart']); $i++) {
//     echo $_SESSION['cart'][$i] . "<br>";
// }
// die();
// $id = $_SESSION['cust_id'];
if (isset($_POST['order'])) {
    $card_no = $_POST['c_no'];
    $cv_no = $_POST['cv_no'];
    $date = $_POST['date'];
    $bill = $_SESSION['bill'];
    $items = $_SESSION['items'];
    $fname = $_POST['fname'];
    $fphone = $_POST['fphone'];
    $femail = $_POST['femail'];
    $fadress = $_POST['fadress'];
    $query_order = "INSERT INTO orders(bill, items, custId,fullname,phone,email,adress,payment_method) 
    VALUES('$bill','$items', '$custId','$fname' , '$fphone' , '$femail' , '$fadress' , 'Paid Through Credit Card')";
    if (mysqli_query($conn, $query_order)) {
        $last_id = mysqli_insert_id($conn);
        $items_name = explode(',', $_SESSION['items']);
        $sellers = $_SESSION['sellerId'];
        // for ($i = 0; $i < count($items_name); $i++) {
        for ($i = 0; $i < count($_SESSION['cart']); $i++) {

            $productId = $_SESSION['cart'][$i];

            $fetch_item = mysqli_query($conn, "SELECT * FROM products WHERE pId='$productId'");
            mysqli_query($conn, "UPDATE products SET sold_stock = sold_stock+1 WHERE pId='$productId'");
            $row_item = mysqli_fetch_assoc($fetch_item);
            $pname = $row_item['pname'];
            $price = $row_item['pprice'];
            $sellers = $row_item['sellerId'];
            $query_order_items = "INSERT INTO order_item(product, order_id, price,sellerId,custId,status) VALUES('$pname','$last_id', '$price','$sellers','1','PENDING')";
            mysqli_query($conn, $query_order_items);
        }
        // }
    }
    $_SESSION['cart'] = "";
    unset($_SESSION['cart']);
    unset($_SESSION['bill']);
    unset($_SESSION['items']);
    unset($_SESSION['cart']);
    echo "<script> alert('YOUR ORDER IS PLACED');window.location.replace('products.php');</script>";
}
if (isset($_POST['cod'])) {
    $card_no = "cod";
    $cv_no = "cod";
    $date = "cod";
    $bill = $_SESSION['bill'];
    $items = $_SESSION['items'];
    $fname = $_POST['fname'];
    $fphone = $_POST['fphone'];
    $femail = $_POST['femail'];
    $fadress = $_POST['fadress'];
    $query_order = "INSERT INTO orders(bill, items, custId,fullname,phone,email,adress,payment_method) 
    VALUES('$bill','$items', '$custId','$fname' , '$fphone' , '$femail' , '$fadress' , 'Cash On Delivery')";
    if (mysqli_query($conn, $query_order)) {
        $last_id = mysqli_insert_id($conn);
        $items_name = explode(',', $_SESSION['items']);
        $sellers = $_SESSION['sellerId'];
        // for ($i = 0; $i < count($items_name); $i++) {
        for ($i = 0; $i < count($_SESSION['cart']); $i++) {

            $productId = $_SESSION['cart'][$i];
            echo $productId;
            $fetch_item = mysqli_query($conn, "SELECT * FROM products WHERE pId='$productId'");
            $row_item = mysqli_fetch_assoc($fetch_item);
            $pname = $row_item['pname'];
            $price = $row_item['pprice'];
            $sellers = $row_item['sellerId'];
            $query_order_items = "INSERT INTO order_item(product, order_id, price,sellerId,custId,status) VALUES('$pname','$last_id', '$price','$sellers','1','PENDING')";
            mysqli_query($conn, $query_order_items);
        }
        // }
    }
    // mail()
    unset($_SESSION['cart']);
    unset($_SESSION['bill']);
    unset($_SESSION['items']);
    unset($_SESSION['cart']);
    echo "<script> alert('YOUR ORDER IS PLACED');window.location.replace('products.php');</script>";
}
if (isset($_GET['cancel'])) {
    unset($_SESSION['cart']);
    unset($_SESSION['bill']);
    unset($_SESSION['items']);
    echo "<script> alert('YOUR ORDER IS CANCELED');window.location.replace('products.php');</script>";
}
include 'header.php'
?>
<div class="container">
    <form method="post">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <center> <b> Mailing Information</b></center>
                    </div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <td> <b> Enter Your Name:</b></td>
                                <td><input type="text" class="form-control" name="fname" value="<?php echo $fullname ?>" placeholder="Enter Fullname" required /></td>
                            </tr>
                            <tr>
                                <td> <b> Enter Your Phone:</b></td>
                                <td><input type="text" class="form-control" name="fphone" value="<?php echo $phone ?>" placeholder="Enter Phone No" required /></td>
                            </tr>
                            <tr>
                                <td> <b> Enter Your Email:</b></td>
                                <td><input type="text" class="form-control" name="femail" value="<?php echo $email ?>" placeholder="Enter Fullname" required /></td>
                            </tr>
                            <tr>
                                <td> <b> Enter Your Adress:</b></td>
                                <td><input type="text" class="form-control" name="fadress" placeholder="Enter Adress" required /></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <b>
                            MAKE PAYMENT
                        </b>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-sm ">
                            <tr>
                                <th>ORDER ITEMS</th>
                                <td><?php echo $_SESSION['items']; ?> </td>


                            </tr>
                            <tr>
                                <th> BILL</th>
                                <td>RS.<?php echo $_SESSION['bill']; ?></td>
                            </tr>
                            <tr>
                                <th>CARD NO</th>
                                <td><input type="text" name='c_no' placeholder="Enter Your Master Card No" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>CARD CV.NO</th>
                                <td><input type="text" name='cv_no' placeholder="Enter Card CVN" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>CARD EXPIRY</th>
                                <td><input type="date" name='date' class="form-control" /></td>
                            </tr>


                            <tr>
                                <td colspan="">
                                    <input type="submit" name="order" class="btn btn-primary bg-gradient rounded" value="PLACE ORDER">
                                    <input type="submit" name="cod" class="btn btn-warning bg-gradient rounded text-white" value="CASH ON DELIVERY">
                                </td>
                                <td colspan="">
                                    <a href="?cancel" class="btn btn-danger bg-gradient rounded">CANCEL ORDER</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

<?php
include 'footer.php'
?>