<?php
include 'connection.php';
session_start();
if (empty($_SESSION['clientId'])) {
	header('location:projects.php');
}
$cId = $_SESSION['clientId'];
//echo $cId; die();
if (isset($_POST['addproject'])) {

	$title = $_POST['ptitle'];
	$skills = $_POST['pskils'];
	$category = $_POST['pcat'];
	$desc = $_POST['pdes'];
	$query = "insert into projects (title, skills, category, description, added_by)values('$title','$skills' , '$category','$desc' , '$cId') ";
	//print_r($_POST);die();
	mysqli_query($conn, $query);
}
?>
<!doctype html>
<html lang="">

<head>
	<title>TUTOR FINDER</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
	<style type="text/css">
		table {
			border: 0px;

			margin-left: 500px;
			height: 300px;
			margin-top: 20px;
		}
	</style>
</head>

<body>
	<!-- header section -->

	<header id="header">
		<div class="header-content clearfix"> <a class="logo" href="index.html">tutors <span>HUB</span></a>
			<div class="navigation">
				<?php include 'nav-bar.php' ?>
			</div>
		</div>
	</header>
	<div class="row">
		<center>
			<h3>ADD PROJECT</h3>
		</center>
		<div class="col-lg-4">
			<form action="" method="post">
				<table class="table table-striped" style="">

					<tr>
						<td>PROJECT TITLE</td>
						<td>
							<input type="text" name="ptitle" placeholder="Enter Username" class="form-control">
						</td>
					</tr>
					<tr>
						<td>SKILS</td>
						<td>
							<input type="text" name="pskils" placeholder="Enter Skils" class="form-control">
						</td>
					</tr>
					<tr>
						<td>CATEGORY</td>
						<td>
							<input type="text" name="pcat" placeholder="Enter Category" class="form-control">
						</td>
					</tr>
					<tr>
						<td>DESCRIPTION</td>
						<td>
							<textarea rows='7' cols='40' name='pdes' placeholder="Enter Description"></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="form-group"><input type="submit" name="addproject" value="ADD PROJECT" class="btn btn-info btn-block">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>

</body>

</html>