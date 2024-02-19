<?php
include 'db.php';
session_start();

//$cust_id=$_SESSION['cust_id'];
$pId= $_GET['id'];
$query="select * from products where pId='$pId'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
if(isset($_POST['addFeed'])){
	//echo $pId; die();
$feedback=$_POST['feedback'];	
$feedback_query="insert into reviews (feedback,custId,pId) values('$feedback','2', '$pId')";
mysqli_query($conn, $feedback_query);

}
$select_feedback = "select * from reviews where pId='$pId'";
$result_feedback = mysqli_query($conn, $select_feedback);

?>

<html>

<head>
    
    <!-- Site Metas -->
    <title>Online Electronics Fair Price Shop</title>    
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
		<style>
	        body{
	            font-family: "Trebuchet MS", Helvetica, sans-serif;
	        }
	        .container-fluid{
	            margin:0px;
	            padding: 0px;
	        }
        </style>
</head>

<body>


    <!-- Start Main Top -->
    
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <center> <h5>ADD REVIEWS</h5></center>

                </div>
            </div>
			
			<div class="row">		
			
		<div class="col-lg-3">	
				<table>
					<tr rowspan='2'>
						<td><img src="Admin/images/<?php echo $row['photo'] ?>" height="200px" width="200px"/></td>
					</tr>
					<tr rowspan='2'>
						<td>Name:<?php echo $row['pname'] ?></td>
					</tr>
					<tr rowspan='2'>
						<td>Price:<?php echo $row['pprice'] ?></td>
					</tr>
					
				</table>
			</div>	
		<div class="col-lg-9">
			<form method="post">
				<table>					
					<tr>
						<td><b>REVIEW</b></td>
						<td><textarea name="feedback" rows='7' cols='70' class="form-control"></textarea></td>
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
			<table style="margin-left:300px;">					
					<tr>
						<td><h4>PREVIOUS REVIEWS ABOUT PRODUCT</h4></td>
					</tr>
						<?php while($row_feedback=mysqli_fetch_array($result_feedback)){?>
					<tr class="">
						<td class="text-success py-3"><?php echo $row_feedback['feedback'] ?></td>
						
					</tr>


						<?php } ?>
				</table>
			</div>
</div>			

</body>

</html>