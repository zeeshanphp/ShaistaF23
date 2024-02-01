<?php
include 'db.php';
$message = "";
$result = mysqli_query($conn, "SELECT * FROM purchases p JOIN users u ON p.supplierId=u.user_id JOIN ingredients i ON  i.ingId = p.ingredientId");
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
                    <h4>List Purchases</h4>
                </div>
                <div class="card-body">
                    <form method="post">
                        <table class="table">
                            <tr>
                                <th>Supplier</th>
                                <th>Ingredient</th>
                                <th>Purchase Date</th>
                                <th>Available Qty</th>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['fullname'] ?></td>
                                    <td><?php echo $row['ingredient'] ?></td>
                                    <td><?php echo $row['date_purchase'] ?></td>
                                    <td><?php echo $row['quantity'] . "&nbsp <b>" . $row['unit'] . "</b>" ?></td>
                                </tr>
                            <?php } ?>
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