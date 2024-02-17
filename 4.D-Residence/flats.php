<?php
session_start();
include 'db.php';
if (isset($_SESSION['custId'])) {
    $id = $_SESSION['custId'];
}
$message = "";
if (isset($_POST['book_room'])) {
    $type =  $_POST['type'];
    $sql = "INSERT INTO bookings(custId,room_type) VALUES('$id' , '$type')";
    if (mysqli_query($conn, $sql)) {
        $message = "Booking Request Placed <a href='view_bookings.php'>View Status</a>";
    }
}
include 'header.php';
?>
<div class="container">
    <div class="row mt-5 py-5">
        <?php
        $query = "SELECT * FROM rooms  where type='Flat'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        ?>
        <div class="col-md-3">
            <img src="Manager/images/<?php echo $row['image'] ?>" class="card-img-top" alt="..." height="200px">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success bg-gradient text-white">
                    <center>
                        <h3>Flat Details</h3>
                    </center>

                </div>
                <div class="card-body">
                    <center>
                        <h5 class="card-title"><?php echo $row['type'] ?>s</h5>
                    </center>
                    <p class="card-text py-4">
                        <b>Flat Fare :</b> <?php echo $row['rent'] ?>
                    </p>
                    <p class="card-text">
                        <b>Available Flat :</b> <?php echo $row['remaining_rooms'] ?>
                    </p>
                </div>
                <form action="" method="post">
                    <div class="card-footer">
                        <input type="hidden" name="type" value="<?php echo $row['type'] ?>">
                        <input type="submit" name="book_room" class="btn btn-primary bg-gradient float-end" value="Request Booking">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="mt-4 py-4">
    <?php
    include 'footer.php'
    ?>
</div>