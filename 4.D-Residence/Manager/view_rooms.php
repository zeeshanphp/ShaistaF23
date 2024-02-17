<?php
include 'db.php';
$message = "";
$query = "SELECT * FROM rooms";
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
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9 text-primary">
                        <center>
                            <h4>VIEW ALL ROOMS</h4>
                        </center>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary bg-gradient rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Room</button>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <table class="table table-borderless table-hover">

                    <tr class="table-active bg-gradient">
                        <th style="vertical-align: middle;">Image</th>
                        <th style="vertical-align: middle;">Room Rent</th>
                        <th style="vertical-align: middle;">Room Type</th>
                        <th style="vertical-align: middle;">Total Rooms</th>
                        <th style="vertical-align: middle;">Booked Rooms</th>
                        <th style="vertical-align: middle;">Remaining Rooms</th>
                    </tr>
                    <?php if ($count > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>

                            <tr>
                                <td><img src="images/<?php echo $row['image'] ?>" height="70" width="70"></td>
                                <td style="vertical-align: middle;"><?php echo $row['rent'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['type'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['available_rooms'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['booked_room'] ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['remaining_rooms'] ?></td>

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

include 'add_room.php';
include 'footer.php';
?>