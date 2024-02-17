<?php
include 'db.php';
$message = "";
$query = "SELECT * FROM orders";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);

include 'header.php';

?>

<div class="row px-0 mx-0">
    <div class="col-md-2 bg-primary text-white">
        <?php
        include 'nav.php';
        ?>
    </div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header text-color-in">
                <center>
                    <h4>ALL ORDERS</h4>
                </center>
            </div>
            <div class="card-body">
                <table class="table table-borderless table-hover">

                    <tr class="table-active bg-gradient">
                        <th style="vertical-align: middle;">Order Items</th>
                        <th style="vertical-align: middle;">Bill</th>
                        <th style="vertical-align: middle;">Payment Method</th>
                        <th style="vertical-align: middle;">Order By</th>
                        <th style="vertical-align: middle;">Phone</th>
                        <th style="vertical-align: middle;">Adress</th>
                    </tr>
                    <?php if ($count > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>

                            <tr>
                                <td style="vertical-align: middle;"><?php echo $row['items'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['bill'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['payment_method'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['fullname'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['phone'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['adress'] ?></td>
                                </tr>
                        <?php
                        }
                    } else { ?>
                        <tr>
                            <td colspan="5" class="text-danger"> <b> No Record Found</b></td>
                        </tr>
                    <?php }

                    ?>
                </table>
            </div>
        </div>

    </div>
</div>
<?php
include 'footer.php';
?>