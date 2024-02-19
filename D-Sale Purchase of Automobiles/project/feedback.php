<?php
include 'db.php';
session_start();
//echo $_SESSION['customerId'];
$pId= $_GET['id'];
$query="select * from parts where pId='$pId'";
$result=mysqli_query($conn,$query);
$fetch_items=mysqli_fetch_array($result);
if(isset($_POST['addFeed'])){
	//echo $pId; die();
$feedback=$_POST['feedback'];	
$feedback_query="insert into reviews (feedback,custId,pId) values('$feedback','2', '$pId')";
mysqli_query($conn, $feedback_query);

}
$select_feedback = "select * from reviews where pId='$pId'";
$result_feedback = mysqli_query($conn, $select_feedback);
//$query =""; 
//$result = mysqli_query($conn , $query);
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
			<h4>ADD FEEDBACK</h4>
			<div class="row">

				<div class="col-md-3 py-2">
					<table>
						<tr>
							<td colspan="2"><img src="Admin/images/<?php echo $fetch_items['photo']?>" height="200" width="200"/>
							</td>							
						</tr>
						<tr>
                            <td><b>Vehicle Name:</b></td>
                            <td><?php echo $fetch_items['vehname']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Vehicle Model:</b></td>
                            <td><?php echo $fetch_items['vehmodel']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Part Name:</b></td>
                            <td><?php echo $fetch_items['pname']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Part Price:</b></td>
                            <td>Rs.<?php echo $fetch_items['pprice']; ?></td>
                        </tr>
                        
					</table>
				</div>
				<div class="col-lg-5">
					<form method="post">
						<table>					
							<tr>
								<td><b>ADD REVIEWS</b></td>
								<td><textarea name="feedback" rows='10' cols="50"  class="w-100"></textarea></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="addFeed" value="ADD REVIEW" class="btn w-100 btn-success"/></td>
							</tr>
							
						</table>
					</form>
				</div>
			</div>
			<div class="row">
				<center><h4>PREVIOUS REVIEWS ABOUT PRODUCT</h4></center>
				<?php while($row_feedback=mysqli_fetch_array($result_feedback)){?>
			<table class="table bg-light mt-2">					
					
						
					<tr class="">
						<td class="text-success py-3"><b><?php echo $row_feedback['feedback'] ?></b></td>
						
					</tr>


						
				</table>
				<?php } ?>
			</div>
		</div>
	</body>
</html>
