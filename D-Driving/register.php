<?php
include 'db.php';
session_start();
$message = "";

if (isset($_POST['uregister'])) {
	$folder = 'images/';
	$folder = $folder . basename($_FILES['pimage']['name']);
	move_uploaded_file($_FILES['pimage']['tmp_name'], $folder);
	$certificate = $folder . basename($_FILES['fcert']['name']);
	move_uploaded_file($_FILES['fcert']['tmp_name'], $certificate);
	$profile_image = $_FILES['pimage']['name'];
	$certificate_image = $_FILES['fcert']['name'];
	$fname = $_POST['ufname'];
	$lname = $_POST['ulfname'];
	$phone = $_POST['uphone'];
	$email = $_POST['uemail'];
	$pass = $_POST['upass'];
	$city = $_POST['ucity'];
	$username = $_POST['uname'];
	$type = $_POST['type'];
	$query = "INSERT INTO students(username,fname,lname,password,email,phone,city,photo,certificate,lisence) VALUES ('$username','$fname','$lname','$pass','$email','$phone','$city','$profile_image','$certificate_image','$type')";
	mysqli_query($conn, $query);
	$message = "Registration Applied Successfully Waiting for approval from admin";
}
include 'header.php';
?>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php if($message != ""){ ?>
			<div class="alert alert-success"><?php echo $message ?></div>
			<?php } ?>
			<center>
				<h4>REGISTER AS NEW STUDENT</h4>
			</center>
			<form method="post" enctype="multipart/form-data">
				<table style="height:500px; width: 500px; margin: 0px auto;">
					<tr>
						<td>Enter First Name</td>
						<td><input type="text" name="ufname" class="form-control" placeholder="Enter Fullname" /></td>
					</tr>
					<tr>
						<td>Enter Last Name</td>
						<td><input type="text" name="ulfname" class="form-control" placeholder="Enter Fullname" /></td>
					</tr>
					<tr>
						<td>Enter Username</td>
						<td><input type="text" name="uname" class="form-control" placeholder="Enter Username" /></td>
					</tr>
					<tr>
						<td>Enter Password</td>
						<td><input type="password" name="upass" class="form-control" placeholder="Enter Password" /></td>
					</tr>
					<tr>
						<td>Enter Email</td>
						<td><input type="email" name="uemail" class="form-control" placeholder="Enter Password" /></td>
					</tr>
					<tr>
						<td>Enter Phone</td>
						<td><input type="text" name="uphone" class="form-control" placeholder="Enter Phone No" /></td>
					</tr>
					<tr>
						<td>Enter Adress</td>
						<td><input type="text" name="ucity" class="form-control" placeholder="Enter Your City" /></td>
					</tr>
					<tr>
						<td style="text-align:right"><b>Upload Image</b></td>
						<td><input type="file" name="pimage" class="form-control-file"></td>
					</tr>
					<tr>
						<td style="text-align:right"><b>Upload Fitness Certificate</b></td>
						<td><input type="file" name="fcert" class="form-control-file"></td>
					</tr>
					<tr>
						<td>Vehicle:</td>
						<td><select name="type" class="form-control">
								<option value="Car">Car</option>
								<option value="Bike">Bike</option>
								<option value="LTV">LTV</option>
								<option value="HTV">HTV</option>
							</select></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="uregister" class="btn btn-warning w-100" value="REGISTER" /></td>
					</tr>
					<tr>
						<td colspan="2"><a href="loign.php" class="btn btn-primary w-100">LOGIN</a></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<div class="copyright">
		<span>All right reserved Virtual University Of Pakistan</span>
	</div>
</div>




</div>

</body>

</html>