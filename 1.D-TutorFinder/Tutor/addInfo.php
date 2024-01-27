<?php
session_start();
if (empty($_SESSION['tutor'])) {
	header('location:index.php');
}
include "../connection.php";
$id = $_SESSION['tutor'];
if (isset($_POST['update'])) {
	$folder = "images/";
	$folder = $folder . basename($_FILES['image']['name']);
	move_uploaded_file($_FILES['image']['tmp_name'], $folder);
	//echo $_FILES['image']['name'];
	$photo = $_FILES['image']['name'];
	$spec = $_POST['spec'];
	$desc = $_POST['det'];
	$qual = $_POST['qual'];
	$price = $_POST['price'];
	$update_query = "update tutors set image='$photo',speciality='$spec',Description='$desc',skills='$qual' , price='$price' where tutorId='$id'";
	mysqli_query($conn, $update_query);
}

?>
<html>

<head>
	<title>TUTOR FINDER</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 bg-success bg-gradient">
				<center>
					<h1>TUTOR PANNEL</h1>
				</center>
			</div>
		</div>
		<div class="row">
			<div id="" class="col-md-2 bg-success bg-gradient">
				<?php include 'nav.php' ?>

			</div>
			<div class="col-md-8">
				<div class="tab-content">
					<form method="post" enctype="multipart/form-data">
						<table class="table table-striped" style="width:600px; height:500px;">
							<tr>
								<td>IMAGE</td>
								<td>
									<input type="file" name="image" value="BROWSE PHOTO" class="form-control" />
								</td>
							</tr>
							<tr>
								<td>SPECIALITY</td>
								<td>
									<input type="text" name="spec" placeholder="SUBJECT SPECIALITY" class="form-control" />
								</td>
							</tr>
							<tr>
								<td>PRICE</td>
								<td>
									<input type="text" name="price" placeholder="Enter Your Price" class="form-control" />
								</td>
							</tr>
							<tr>
								<td>QUALIFICATION</td>
								<td>
									<input type="text" name="qual" placeholder="Your Qualification" class="form-control" />
								</td>
							</tr>
							<tr>
								<td>DETAILS</td>
								<td>
									<textarea cols='35' rows='5' class="form-control" name="det"></textarea>
								</td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="update" value="UPDATE INFO" class="btn btn-success" style="height: 40px; width:400px;">
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>

</html>