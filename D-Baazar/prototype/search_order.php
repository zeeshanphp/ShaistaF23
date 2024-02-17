<?php
session_start();
include 'db.php';
// $records = mysqli_query($conn, "SELECT * FROM orders WHERE fphone=''");
include 'header.php'
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h4 class="text-dark">SEARCH ORDER</h4>
            </center>
            <form method="post">
                <table class="table table-borderless">
                    <tr>
                        <td><input type="text" name="nfind" class="form-control"></td>
                        <td><input type="submit" name="nsearch" value="SEARCH ORDER" class="btn btn-info w-100"></td>
                    </tr>
                </table>
            </form>
        </div>
        <table class="table table-striped" style="">
            <tr>
                <th>ORDER ITEMS</th>
                <th>BILL</th>
                <th>ORDER DATE</th>
                <th>VIEW STATUS</th>
            </tr>
            <?php

            if (isset($_POST['nsearch'])) {
                $find = $_POST['nfind'];
                $query = "select * from orders where phone = '$find'";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $row['items']; ?></td>
                            <td><?php echo $row['bill']; ?></td>
                            <td><?php echo $row['orderon']; ?></td>
                            <td><a href="order-status.php?ord_id=<?php echo $row['ordId']; ?> " class='btn btn-primary'>VIEW STATUS</a></td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="4">
                            <center> <span class="text-danger"> <b>No Record Found</b> </span></center>
                        </td>
                    </tr>

            <?php }
            } ?>
        </table>
    </div>
</div>

<?php include 'footer.php' ?>