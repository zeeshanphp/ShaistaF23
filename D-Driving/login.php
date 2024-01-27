<?php
include 'db.php';
session_start();
$message = "";

if (isset($_POST['ulogin'])) {
	$username = $_POST['uname'];
	$password = $_POST['upass'];
	//print_r($_POST); die();
	$query = "select * from students where username='$username' AND password='$password'";
	$rs = mysqli_query($conn, $query);
	if (mysqli_num_rows($rs) > 0) {

		$row = mysqli_fetch_array($rs);
		if ($row['status'] == 'Pending') {
			$message = "Your Registration Request is not approved by admin YET";
		} else if ($row['status'] == 'Rejected') {
			$message = "Your Registration Request is Rejected By Admin";
		} else {
			$message = "Your Request is approved";
		}
	} else {
		echo "<script>alert('Invalid Username or Password')</script>";
	}
}
include 'header.php';
?>
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<?php if ($message != "") { ?>
				<div class="alert alert-success bg-gradient bg-success text-white"><?php echo $message ?></div>
			<?php } ?>
			<center>
				<h4>LOGIN</h4>
			</center>
			<form method="post">
				<table style="height:300px; width: 500px; margin: 0px auto;">
					<tr>
						<td>Enter Username</td>
						<td><input type="text" name="uname" class="form-control" placeholder="Enter Username" /></td>
					</tr>
					<tr>
						<td>Enter Password</td>
						<td><input type="password" name="upass" class="form-control" placeholder="Enter Password" /></td>
					</tr>

					<tr>
						<td colspan="2"><input type="submit" name="ulogin" class="btn btn-warning w-100" value="LOGIN" /></td>
					</tr>
					<tr>
						<td colspan="2"><a href="register.php" class="btn btn-primary w-100">REGISTER AS NEW STUDENT</a></td>
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