<?php
include 'db.php';

$message = "";
$type = $_GET['type'];
$booking_id = $_GET['book'];
$id = $_GET['custId'];
if (isset($_POST['book_room'])) {
    $selectedRoom = $_POST['room_no'];
    $roomValues = explode('-', $selectedRoom);
    $room_detail_id = $roomValues[0];
    $room_no = $roomValues[1];
    //update booking table for updating booking status
    $query = "UPDATE bookings SET booking_status='Room Assigned' , room_no='$room_no ' WHERE bookingId='$booking_id'";
    if (mysqli_query($conn, $query)) {
        //updating room_details table to manage booking
        $sql = "UPDATE room_details SET book_status = 'Room Booked' , booked_by='$id' WHERE room_detail_id='$room_detail_id'";
        mysqli_query($conn, $sql);
        //updating rooms table to update remaining rooms and available room and  occupied room details
        mysqli_query($conn, "UPDATE rooms SET remaining_rooms=(remaining_rooms-1) , booked_room=(booked_room+1) WHERE type='$type'");
        //fetch rent amount of room
        $fetch_rent = mysqli_query($conn, "SELECT rent from rooms WHERE type='$type'");
        $row = mysqli_fetch_array($fetch_rent);
        $rent = $row['rent'];
        //add this room details for budgeting
        mysqli_query($conn, "INSERT INTO payments(custId,amount,room_id) VALUES('$id' , '$rent' , '$room_detail_id')");
        echo "<script>alert('Room/Flat Assigned Successfully'); window.location.href = 'manage_bookings.php';</script>";
    }
}


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
            <div class="card-header bg-info bg-gradient">
                <b>
                    <center>
                        Assign <?php echo $type ?>
                    </center>
                </b>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <table class="table">
                        <tr>
                            <td>Select Room</td>
                            <td>
                                <select name="room_no" class="form-control">
                                    <?php
                                    $result = mysqli_query($conn, "SELECT * FROM room_details WHERE room_type='$type'");
                                    while ($rooms = mysqli_fetch_array($result)) {  ?>
                                        <option value="<?php echo $rooms['room_detail_id'] . '-' . $rooms['room_no'] ?>"> <?php echo $type . "&nbsp No" . $rooms['room_no'] . "&nbsp - &nbsp " .  $rooms['book_status'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <input type="submit" name="book_room" class="btn btn-primary w-100" value="Book <?php echo $type ?>">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>