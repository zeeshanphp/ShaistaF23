<?php
include 'db.php';
session_start();
$managerId = $_SESSION['managerId'];
$message = "";
if (isset($_POST['add_station'])) {
    $folder = '../Admin/images/';
    $folder = $folder . basename($_FILES['pimage']['name']);
    move_uploaded_file($_FILES['pimage']['tmp_name'], $folder);
    $img = $_FILES['pimage']['name'];
    $sname = $_POST['sname'];
    $scontact = $_POST['sphone'];
    $scity = $_POST['scity'];
    $query = "INSERT INTO  stations(sname,sphone,scity,image,manager) VALUES('$sname' , '$scontact' , '$scity' , '$img' , '$managerId')";
    if (mysqli_query($conn, $query)) {
        $message = "Station Added Successfully Waiting for Admin Approvel <a href='manage_stations.php'> View Your Stations </a>";
    }
}
include 'header.php';
?>
<div class="row mx-0 px-0">
    <div class="col-md-2 text-white">
        <?php include 'nav.php' ?>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <?php if ($message != "") { ?>
                    <div class="alert alert-success"><?php echo $message ?></div>
                <?php } ?>
                <center>
                    <h4>ADD STATION</h4>
                </center>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <table class="table table-borderless mt-3">
                        <tr>
                            <td><b>Station Name:</b></td>
                            <td><input type="text" class="form-control" name="sname" placeholder="Enter Station Name" required /></td>
                        </tr>
                        <tr>
                            <td><b>City</b></td>
                            <td><input type="text" class="form-control" name="scity" placeholder="Enter Station City" required /></td>
                        </tr>
                        <tr>
                            <td><b>Contact</b></td>
                            <td><input type="text" class="form-control" name="sphone" placeholder="Enter Station Contact" required /></td>
                        </tr>

                        <tr>
                            <td><b>Picture</b></td>
                            <td><input type="file" name="pimage" class="form-control-file"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="add_station" class="btn btn-success w-100" value="Add Gas Station"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>


    </div>
    <div class="col-md-3"></div>
</div>
<?php
include 'footer.php';
?>