<?php
include 'db.php';
$message = "";

$query = "SELECT * FROM categories";
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
                    <h4>VIEW ALL CATEGORIES</h4>
                </center>
            </div>
            <div class="card-body">
                <table class="table table-borderless table-striped">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['catname']; ?></td>
                            </tr>
                        <?php

                        } ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<?php
include 'footer.php';
?>