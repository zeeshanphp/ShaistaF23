<?php
include 'db.php';
session_start();
$query = "SELECT * FROM instructor i JOIN schools s ON i.schoolId=s.schoolId";
$result = mysqli_query($conn, $query);
//script for delete inventory item 
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "delete from schools where schoolId='$id'");
    header('location:man_schools.php');
}


include 'header.php'
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-primary px-0">
            <?php include 'nav.php' ?>
        </div>
        <div class="col-md-9 mx-4 mt-4" style="background: #fff;">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h5 class="text-color"><b>ALL DRIVING SCHOOLS</b> </h5>
                    </center>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Instructor Name</th>
                                <th>School Name</th>
                                <th>Expertise</th>
                                <th>Liscense No</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['dname']; ?></td>
                                    <td><?php echo $row['expertise']; ?></td>
                                    <td><?php echo $row['lisence']; ?></td>
                                </tr>
                            <?php

                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>
<?php include 'footer.php'; ?>
</body>

</html>