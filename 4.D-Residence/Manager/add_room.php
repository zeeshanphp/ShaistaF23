<?php
include 'db.php';
$message = "";
if (isset($_POST['add_room'])) {
    $folder = 'images/';
    $folder = $folder . basename($_FILES['rimage']['name']);
    move_uploaded_file($_FILES['rimage']['tmp_name'], $folder);
    $img = $_FILES['rimage']['name'];
    $room = $_POST['rno'];
    $rent = $_POST['rrent'];
    $type = $_POST['type'];
    $query = "INSERT INTO  rooms(roomno,rent,type,image,status) VALUES('$room' , '$rent' , '$type' , '$img' , 'Available')";
    if (mysqli_query($conn, $query)) {
        $message = "<b> Room/Flat Added Successfully &nbsp &nbsp <a href='view_rooms.php'> View Room Details </a></b>";
    }
}
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Residence Allotment System</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header text-primary">
                        <?php if ($message != "") { ?>
                            <div class="alert alert-success"><?php echo $message ?></div>
                        <?php } ?>
                        <h4>ADD ROOM</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <table class="table table-borderless mt-3">
                                <tr>
                                    <td><b>Room/Flat No:</b></td>
                                    <td><input type="text" class="form-control" name="rno" placeholder="Enter Room No" required /></td>
                                </tr>
                                <tr>
                                    <td><b>Rent</b></td>
                                    <td><input type="text" class="form-control" name="rrent" placeholder="Enter Room Rent" required /></td>
                                </tr>
                                <tr>
                                    <td><b>Type</b></td>
                                    <td>
                                        <select name="type" id="" class="form-select">
                                            <option value="">---Select Type--</option>
                                            <option value="Room">Room</option>
                                            <option value="Flat">Flat</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>Picture</b></td>
                                    <td><input type="file" name="rimage" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-danger bg-gradient rounded" data-bs-dismiss="modal">Close</button></td>
                                    <td><input type="submit" name="add_room" class="btn btn-success w-100 bg-gradient rounded" value="Add Room/Flat"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>