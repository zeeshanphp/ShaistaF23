<?php
include 'db.php';

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
if (isset($_GET['block'])) {
    $id = $_GET['block'];
    mysqli_query($conn, "UPDATE users SET status='Blocked' WHERE user_id='$id'");
    header('location: manage_stations.php');
}


?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/styles.css">
    <style>
    </style>
</head>

<body>
    <nav class="container-fluid py-3 bg-primary bg-gradient text-white">
        <?php include 'top-nav.php' ?>

    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-primary px-0">
                <?php include 'nav.php' ?>
            </div>
            <div class="col-md-9 mx-4 mt-4" style="background: #fff;">
                <div class="card">
                    <div class="card-header">
                        <center>
                            <h4>MANAGE USERS</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">

                            <tr>
                                <th>Fullname</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Status</th>
                                <th>
                                    <center> Block User </center>
                                </th>
                            </tr>
                            <?php if ($count > 0) {
                                while ($row = mysqli_fetch_array($result)) {                    ?>

                                    <tr>
                                        <td><?php echo $row['fullname'] ?></td>
                                        <td><?php echo $row['username'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['phone'] ?></td>
                                        <td><?php echo $row['city'] ?></td>
                                        <td colspan="">
                                            <center> <span class="badge bg-primary"> <?php echo $row['status']  ?> </span> </center>
                                        </td>
                                        <td> <a href="?block=<?php echo $row['user_id'] ?>" class="btn btn-danger">Block User</a> </td>

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

    </div>
    <?php include 'footer.php'; ?>
</body>

</html>