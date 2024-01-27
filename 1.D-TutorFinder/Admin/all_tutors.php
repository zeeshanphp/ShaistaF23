<?php
session_start();

include "../connection.php";
$query_tutor = "SELECT * FROM  tutors";
$rs_tutor = mysqli_query($conn, $query_tutor);
if (isset($_GET['del_tutor'])) {
	$id = $_GET['del_tutor'];
	$delete = "delete from tutors where tutorId='$id'";
	mysqli_query($conn, $delete);
	header('location:allTutors.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>TUTOR FINDER</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>

<body>
	<div class="container-fluid">
		<div class="row bg-primary bg-gradient py-3 text-white">
			<div class="col-md-12">
				<center>
					<h4>ADMIN PANNEL TUTOR FINDER</h4>
				</center>
			</div>
		</div>
		<div class="row">
			<div id="" class="col-md-2 bg-primary">
				<?php include 'nav.php' ?>
			</div>
			<div class="col-md-8">

				<table class="table table-striped">
					<tr>
						<th>USERNAME</th>
						<th>PASSWORD</th>
						<th>EMAIL</th>
						<th>PHONE</th>
						<th>FULLNAME</th>
						<th>SPECIALITY</th>
						<th>SKILLS</th>
						<th>EDIT</th>
						<th>DELETE</th>
					</tr>
					<?php while ($fetch_tutor_info = mysqli_fetch_assoc($rs_tutor)) { ?>
						<tr>
							<td><?php echo $fetch_tutor_info['username'];  ?></td>
							<td><?php echo $fetch_tutor_info['pass'];  ?></td>
							<td><?php echo $fetch_tutor_info['email'];  ?></td>
							<td><?php echo $fetch_tutor_info['phone'];  ?></td>
							<td><?php echo $fetch_tutor_info['fullname'];  ?></td>
							<td><?php echo $fetch_tutor_info['speciality'];  ?></td>
							<td><?php echo $fetch_tutor_info['skills'];  ?></td>
							<td><a href="edit_tutor.php?edit=<?php echo $fetch_tutor_info['tutorId'];  ?>" class="btn btn-block btn-warning">EDIT</a></td>
							<td><a href="?del_tutor=<?php echo $fetch_tutor_info['tutorId'];  ?>" class="btn btn-block btn-danger">DELETE</a></td>
						</tr>
					<?php } ?>
				</table>

			</div>

		</div>

</body>

</html>