<?php
include 'db.php';
session_start();

$consultantId = $_GET['id'];
$customerId = $_SESSION['customerId'];
if(isset($_POST['addQues'])){
	$query = $_POST['query'];
	$insertQusestion = "insert into consultant_queries(query,cId,custId,reply) values('$query', '$consultantId' , '$customerId' , 'Not Answered Yet')";
	mysqli_query($conn, $insertQusestion);
	header("location:consultants.php");
}
?>

<html>
	<head>
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	 <style>
	      body{
				color: #f8f9d2;

				background-color: #2d3436;
				background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%);
			}
			h4{
				color: #f8f9d2;
			}
			
			ul li a{
				color: #f8f9d2;
			}
			ul li:hover{
				background: #f8f9d2;
				border-radius: 5px;
				color: blue;
				font-weight: bold;
			}
			.btn:hover{
				background: grey;
			}
	</style>
	</head>
	<body>
		<div class="container">
			<div class="row py-4">
				<div class="col-md-2 m-0 p-0">
					<img src="images/logo.png" width="100%" />
				</div>
				<div class="col-md-10">
					<?php include 'nav.php';?>			
					 
				</div>
				
			</div>
			<div class="row">
				<img src="images/pbanner.jpg" height="200" width="100%" />
			</div>
			<h4>ASK QUESTION TO OUT EXPERT</h4>
			<div class="row">
				<form method="post">
					<table>
						<tr>
							<td><textarea cols="45" rows="7" name="query"></textarea></td>
						</tr>
						<tr>
							<td><input type="submit" name="addQues" value="SEND QUESTION TO EXPERT"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>
