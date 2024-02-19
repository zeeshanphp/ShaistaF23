<?php
include 'db.php';
session_start();

$res = mysqli_query($conn,"select * from parts limit 4");

?>
<html>
    <head>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <style>
		      
			body{
				color: #f8f9d2;

				background-color: #2d3436;
				background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%);
			}
			h4{
				color: #f8f9d2;
			}
			hr{
				background-color:#f8f9d2;
			}
			ul li a{
				color: #f8f9d2;
			}
			ul li:hover{
				background: #f8f9d2;
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
			    <img src="images/banner.jpg" height='' width='100%' />
			</div>
			<div class="row justify-content-center">
				<h4 class="justify-content-center">OUR PRODUCTS</h4>
				<hr>
			</div>
			<div class="row">
				<?php while($items = mysqli_fetch_array($res)) { ?>
				<div class="col-md-3 mt-3">
				<table>
				   <tr>
					<td colspan="2"><img src="Admin/images/<?php echo $items['photo']; ?>" height="200" width="200" ></td>
				   </tr>
					<tr>
					   <td><b>Company:</b></td>
					   <td><?php echo $items['pcat']?></td>
					</tr>
					<tr>
					   <td><b>Vehicle:</b></td>
					   <td><?php echo $items['vehname']?></td>
					</tr>
					<tr>
					   <td><b>Part Name:</b></td>
					   <td><?php echo $items['pname']?></td>
					</tr>
					<tr>
					   <td><b>Part Price:</b></td>
					   <td>Rs.<?php echo $items['pprice']?></td>
					</tr>
					
				</table>
				</div>
				<?php } ?>
			</div>
		</div>
	</body>
</html>