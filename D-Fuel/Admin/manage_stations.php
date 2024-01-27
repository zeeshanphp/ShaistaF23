<?php
include 'db.php';
$message = "";

if (isset($_POST['add_station'])) {
    $folder = 'images/';
    $folder = $folder . basename($_FILES['pimage']['name']);
    move_uploaded_file($_FILES['pimage']['tmp_name'], $folder);
    $img = $_FILES['pimage']['name'];
    $sname = $_POST['sname'];
    $scontact = $_POST['sphone'];
    $scity = $_POST['scity'];
    $manager = $_POST['manager'];
    $query = "INSERT INTO  stations(sname,sphone,scity,image,status,manager) VALUES('$sname' , '$scontact' , '$scity' , '$img' , 'Approved' , '$manager')";
    if (mysqli_query($conn, $query)) {
        $message = "Station Added Successfully <a href='manage_stations.php'> View Stations </a>";
    }
}

if (isset($_GET['approve'])) {
    $id = $_GET['approve'];
    mysqli_query($conn, "UPDATE stations SET status='Approved' WHERE stationId='$id'");
    header('location: manage_stations.php');
}

if (isset($_GET['reject'])) {
    $id = $_GET['reject'];
    mysqli_query($conn, "UPDATE stations SET status='Rejected' WHERE stationId='$id'");
    header('location: manage_stations.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM stations WHERE stationId='$id'");
    header('location: manage_stations.php');
}


$query = "SELECT * FROM stations";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
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
                <div class="row">
                    <div class="col-md-6">
                        <center>
                            <h4>MANAGE GAS STATIONS</h4>
                        </center>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary bg-gradient float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Gas Station
                        </button>
                    </div>
                </div>


            </div>
            <div class="card-body">
                <table class="table">

                    <tr>
                        <th>Image</th>
                        <th>Station Name</th>
                        <th>Station Contact</th>
                        <th>Station City</th>
                        <th colspan="2">
                            <center> Status </center>
                        </th>
                        <th colspan="2">
                            <center> Action </center>
                        </th>
                    </tr>
                    <?php if ($count > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>

                            <tr>
                                <td><img src="images/<?php echo $row['image'] ?>" height="70" width="70"></td>
                                <td><?php echo $row['sname'] ?></td>
                                <td><?php echo $row['sphone'] ?></td>
                                <td><?php echo $row['scity'] ?></td>
                                <?php if ($row['status'] == "Pending") { ?>
                                    <td> <a href="?approve=<?php echo $row['stationId'] ?>" class="btn btn-success">Approve</a> </td>
                                    <td> <a href="?reject=<?php echo $row['stationId'] ?>" class="btn btn-danger">Reject</a> </td>
                                <?php } else { ?>
                                    <td colspan="2">
                                        <center> <?php echo $row['status']  ?> </center>
                                    </td>
                                <?php } ?>
                                <td> <a href="edit_station.php?edit=<?php echo $row['stationId'] ?>" class="btn btn-success">Edit</a> </td>
                                <td> <a href="?delete=<?php echo $row['stationId'] ?>" class="btn btn-danger">Delete</a> </td>

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

        <?php include 'add_station.php' ?>

    </div>

</div>
<?php
include 'footer.php';
?>