<?php
include 'db.php';
session_start();
if (isset($_POST['add_class'])) {
    $class = $_POST['class'];
    $duration = $_POST['duration'];
    $query = "insert into classes(class,duration) values('$class','$duration')";
    mysqli_query($conn, $query);
    header('location:add_class.php');
}



?>
<?php
include 'header.php'
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-primary px-0">
            <?php include 'nav.php' ?>
        </div>
        <div class="col-md-8 mx-4 mt-4" style="background: #fff;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <center>
                                <h5><b> ADD CLASS</b></h5>
                            </center>
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">

                                <table class="table table-borderless">
                                    <tr>
                                        <td colspan="2" class="text-color">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:right; vertical-align:middle;"><b>Class Topic</b></td>
                                        <td><textarea name="class" id="" class="form-control" rows="5" placeholder="Enter Class Topics"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:right; vertical-align:middle;"><b>Duration</b></td>
                                        <td><input type="text" class="form-control" name="duration" placeholder="Duration Of Class" required /></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan=""><input type="submit" name="add_class" class="btn btn-success bg-gradient w-100" value="ADD CLASS" /></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table table-borderless">
                        <tr class="table-active">
                            <th>Classs</th>
                            <th>Delete Class</th>
                        </tr>

                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM classes");
                        while ($row = mysqli_fetch_array($result)) {  ?>
                            <tr>
                                <td><?php echo $row['class']; ?></td>
                                <td><a href="?delete=<?php echo $row['classId'] ?>" class="btn btn-danger btn-gradient">Delete Class</a></td>
                            </tr>
                        <?php } ?>


                    </table>
                </div>
            </div>


        </div>

    </div>


</div>
<?php include 'footer.php'; ?>