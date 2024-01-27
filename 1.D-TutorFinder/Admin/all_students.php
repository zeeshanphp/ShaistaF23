<?php
session_start();

include "../connection.php";
$query_students = "SELECT * FROM  students";
$rs_students = mysqli_query($conn, $query_students);
if (isset($_GET['del_student_id'])) {
	$id = $_GET['del_student_id'];
	$delete = "delete from students where studentId='$id'";
	mysqli_query($conn, $delete);
	header('location:allclients.php');
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
						<th>FULLNAME</th>
						<th>USERNAME</th>
						<th>PASSWORD</th>
						<th>EMAIL</th>
						<th>PHONE</th>
						<th>EDIT</th>
						<th>DELETE</th>
					</tr>
					<?php while ($fetch_student_info = mysqli_fetch_assoc($rs_students)) { ?>
						<tr>
							<td><?php echo $fetch_student_info['fullname'];  ?></td>
							<td><?php echo $fetch_student_info['username'];  ?></td>
							<td><?php echo $fetch_student_info['password'];  ?></td>
							<td><?php echo $fetch_student_info['email'];  ?></td>
							<td><?php echo $fetch_student_info['phone'];  ?></td>
							<td><a href="edit_student.php?edit=<?php echo $fetch_student_info['studentId'];  ?>" class="btn btn-block btn-warning">EDIT</a></td>
							<td><a href="?del_student_id=<?php echo $fetch_student_info['studentId'];  ?>" class="btn btn-block btn-danger">DELETE</a></td>
						</tr>
					<?php } ?>
				</table>

			</div>

		</div>

</body>

</html>