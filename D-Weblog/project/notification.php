<?php
include 'db.php';
session_start();
$userId = $_SESSION['userId'];

$result = mysqli_query($conn, "SELECT * FROM notifications WHERE bloggerId='$userId'");

include 'header.php'

?>
<div class="row">
    <div class="col-md-12 bg-info py-3">
        <center>
            <h4 class="text-white">
                NOTIFICATIONS BY ADMIN
            </h4>
        </center>
    </div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card mt-3">
            <div class="card-body">
                <table class="table">
                    <tr class="table-active">
                        <th>Notifications</th>
                        <th>Notification Date</th>
                    </tr>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?= $row['notification'] ?></td>
                                <td><?= $row['notify_date'] ?></td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<center><span class='text-danger'> <b>No Notifications From Admin Yet</b> </span></center>";
                    } ?>
                </table>
            </div>

        </div>
    </div>
</div>


<?php include 'footer.php' ?>