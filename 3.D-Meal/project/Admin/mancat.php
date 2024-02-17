<?php
include 'db.php';
$message = "";
$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "delete from categories where catId='$id'");
    header('location:manfood.php');
}
include 'header.php';

?>

<div class="row">
    <div class="col-md-2 bg-primary text-white">
        <?php
        include 'nav.php';
        ?>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <center>
                    <h4>MANAGE CATEGORIES</h4>
                </center>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['catname']; ?></td>
                                <td><a href="edit_category.php?edit=<?php echo $row['catId'] ?>" class="btn btn-warning bg-gradient">EDIT</a></td>
                                <td><a href="?delete=<?php echo $row['catId'] ?>" class="btn btn-danger bg-gradient">DELETE</a></td>

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