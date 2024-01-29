<?php
include 'db.php';
session_start();
$id = $_SESSION['memberId'];
$message = "";
$query = "SELECT * FROM faculity_member fm JOIN faculity_profile fp on fm.memberId=fp.memberId WHERE fm.memberId='$id'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    header('location:view_profile.php');
} else {
    if (isset($_POST['update_profile'])) {
        $folder = 'images/';
        $folder = $folder . basename($_FILES['pic']['name']);
        move_uploaded_file($_FILES['pic']['tmp_name'], $folder);
        $cvfolder = 'CV/';
        $cvfolder = $cvfolder . basename($_FILES['cv']['name']);
        move_uploaded_file($_FILES['cv']['tmp_name'], $cvfolder);
        $cv = $_FILES['cv']['name'];
        $img = $_FILES['pic']['name'];
        $faculity = $_POST['faculity'];
        $qualification = $_POST['qual'];
        $experience = $_POST['exp'];
        $speciality = $_POST['spec'];
        $sql = "INSERT INTO faculity_profile(photo,faculity,qualification,experience,speciality,cv,memberId) VALUES('$img' , '$faculity' , '$qualification' , '$experience' , '$speciality' , '$cv' , '$id')";
        mysqli_query($conn, $sql);
    }
    include 'header.php';

?>

    <div class="row px-0 mx-0">
        <div class="col-md-2 bg-primary text-white">
            <?php
            include 'nav.php';
            ?>
        </div>
        <div class="col-md-7">
            <div class="card mt-3">
                <div class="card-header">
                    <div class="row">
                        <b>ADD PROFILE</b>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <table class="table">
                            <tr>
                                <td> <b> UPLOAD PICTURE </b></td>
                                <td><input type="file" name="pic" class="form-control"></td>
                            </tr>
                            <tr>
                                <td> <b> UPLOAD CV </b></td>
                                <td><input type="file" name="cv" class="form-control"></td>
                            </tr>
                            <tr>
                                <td> <b>SELECT FACULITY</b> </td>
                                <td>
                                    <select name="faculity" class="form-select">
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM faculities");
                                        while ($row = mysqli_fetch_array($result)) {  ?>
                                            <option value="<?php echo $row['faculityId'] ?>"><?php echo $row['faculity'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> <b>QUALIFICATION:</b> </td>
                                <td><input type="text" class="form-control" name="qual" placeholder="Qualification" required /></td>
                            </tr>
                            <tr>
                                <td> <b>SPECILITY:</b> </td>
                                <td><input type="text" class="form-control" name="spec" placeholder="Speciality" required /></td>
                            </tr>
                            <tr>
                                <td> <b>EXPERIENCE:</b> </td>
                                <td><input type="text" class="form-control" name="exp" placeholder="Experience" required /></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="update_profile" class="btn btn-primary w-100" value="Update Profile"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>

        </div>
    </div>

<?php
    include 'footer.php';
}
?>