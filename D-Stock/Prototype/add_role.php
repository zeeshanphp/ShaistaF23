<?php
include 'db.php';
$message = "";

if (isset($_POST['add_role'])) {
    $role = $_POST['role'];
    mysqli_query($conn, "INSERT into roles(role)VALUES('$role')");
    $message = "Role Added <a href='list_role.php'>Go To List Roles page</a>";
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
                    <h4>Add New Role</h4>
                </div>
                <div class="card-body">
                    <form method="post">
                        <table class="table">
                            <tr>
                                <td> <b> Enter User Role</b></td>
                                <td><input type="text" class="form-control" name="role" placeholder="Enter Role For User" required /></td>
                                <td><input type="submit" name="add_role" class="btn btn-primary w-100" value="Add role"></td>
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