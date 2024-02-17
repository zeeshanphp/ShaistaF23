<?php
session_start();
if(empty($_SESSION['sell_id'])){
	header('location:index.php');
}
include 'database.php';
$sid=$_SESSION['sell_id'];

//pagination script

$limit = 7;  
  if(isset($_GET['page'])){
	  $page = $_GET['page'];
  } else{
	  $page=1;
  }
  $offset = ($page-1)*$limit; //pagination script ends here
   //select questions from  descriptive_questions table to show to user
  $query=mysqli_query($conn,"SELECT * FROM products where sellerId='$sid' limit {$offset} , {$limit}" ); 

?>
<html>
	<head>
		<title>E-CART PROJECT </title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">	
		</head>
	<body style="background:azure;">
		<div class="container-fliud">
			<center><h2 class="primary">SELLER PANNEL E-CART</h2></center>
		<div class="navbar navbar-expand-lg navbar-dark bg-primary">
			<?php include 'sell-nav.php'; ?>

		</div>
			<form method="post">
			<center><h3>ALL PRODUCTS</h3></center>
				<table class="table">
					<tr>
						<th>PRODUCT NAME</th>
						<th>PRODUCT PRICE</th>
						<th>PRODUCT CATEGORY</th>
						<th>EDIT</th>
						<th>DELETE</th>
					</tr>
					<?php while($row=mysqli_fetch_array($query)){?>
					<tr>
						<td style="vertical-align:middle;"><b><?php echo $row['pname'] ?></b></td>
						<td style="vertical-align:middle;"><b><?php echo $row['pprice'] ?></b></td>
						<td style="vertical-align:middle;"><b><?php echo $row['pcat'] ?></b></td>
						<td style="vertical-align:middle;"><a href="editprod.php?e_id=<?php echo $row['pId'];?>" class="btn btn-outline-success">EDIT PRODUCT</a></td>
						<td style="vertical-align:middle;"><a href="deleteprod.php?d_id=<?php echo $row['pId'];?>" class="btn btn-outline-danger">DELETE PRODUCT</a></td>						
					</tr>								
					<?php } 				 
			
			?> 
			
			</table>
			</form>	
<?php
//pagination script
$query_page=mysqli_query($conn,"SELECT * FROM products where sellerId='$sid'" ); 
			$total_records=mysqli_num_rows($query_page);
			
			$total_page=ceil($total_records/$limit);
			echo '<nav class="d-flex justify-content-center">';
			echo '<ul class="pagination">';
			if($page > 1){
			echo '<li class="page-item"><a class="page-link active" href="allprod.php?page='.($page-1).'">PREV</a></li>';
				}
			for($i=1; $i<=$total_page; $i++){
				if($i== $page){
					$active="active";					
				}
				else {
					$active="";
			}
				echo '<li class="page-item '.$active.'"><a class="page-link active" href="allprod.php?page='.$i.'">'.$i.'</a></li>';

			}
			if($total_page>$page){
			echo '<li class="page-item"><a class="page-link active" href="allprod.php?page='.($page+1).'">NEXT</a></li>';
				}
			echo '</ul>';
			echo '</nav>';
?>
		</div>
	</body>
</html>