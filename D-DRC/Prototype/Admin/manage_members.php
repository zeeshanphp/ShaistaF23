<?php
include 'db.php';
$message = "";



if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM members WHERE memberid='$id'");
    header('location: manage_members.php');
}


$query = "SELECT * FROM members";
$fetch_users = mysqli_query($conn, $query);
include 'header.php';

?>

<div class="row">
    <div class="col-md-2 bg-primary text-white">
        <?php
        include 'nav.php';
        ?>
    </div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <center>
                    <h4>MANAGE MEMBERS</h4>
                </center>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>FULLNAME</th>
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th>PHONE</th>
                        <th>CITY</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                    <?php while ($result = mysqli_fetch_array($fetch_users)) { ?>
                        <tr>
                            <td><?php echo $result['fullname'] ?></td>
                            <td><?php echo $result['username'] ?></td>
                            <td><?php echo $result['email'] ?></td>
                            <td><?php echo $result['phone'] ?></td>
                            <td><?php echo $result['city'] ?></td>
                            <td><a href="edit_member.php?edit=<?php echo $result['memberid'] ?>" class="btn btn-dark w-100">EDIT</a></td>
                            <td><a href="?delete=<?php echo $result['memberid'] ?>" class="btn btn-danger w-100">DELETE</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

    </div>
</div>
<?php
include 'footer.php';
?>