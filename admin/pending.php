<!-- 
-*- coding: utf-8 -*-
# @Author: HeinHtetAung
# @Date:   2019-06-04 21:36:06
# @Last modified by:   Hein Htet Aung
# @Last Modified time: 2019-06-07 00:09:58
-->
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Admin Panel</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/fontawesome-all.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-primary">
				<?php include_once"include_admin/admin_nav.php" ?>
				<div class="panel-body">
					<h1 class="text-center">Pending Products List</h1>
					<table class="table table-bordered table-striped" action="" method="post">
						<thead class="bg-primary">
							<tr>
								<td>No.</td>
								<td>Product Name</td>
								<td>Category</td>
								<td>Price</td>
								<td>Qty</td>
								<td>Product Image</td>
								<td>Seller Name</td>
								
								<td>Approve/Delete</td>
							</tr>
						</thead>
						<tbody>
							<?php
								 $query="SELECT * FROM product WHERE product_status='unapproved' ORDER BY product_id DESC";
								 $result=mysqli_query($con,$query);
								 $count=1;
								 while($row=mysqli_fetch_assoc($result))
								 {
								 	 $product_id=$row['product_id'];
								 	 $product_cat_id=$row['product_cat_id'];
								 	 $product_title=$row['product_title'];
								 	 $product_title=$row['product_title'];
								 	 $product_image=$row['product_image'];
								 	 $product_content=$row['product_content'];
								 	 $product_date=$row['product_date'];
								 	 $product_price=$row['product_price'];
								 	 $product_qty=$row['product_qty'];
								 	 $product_seller_id=$row['product_seller_id'];
								 	 $product_tag=$row['product_tag'];
								 	 $product_status=$row['product_status'];
								 	 $product_comment_count=$row['product_comment_count'];
								 	 $product_view_count=$row['product_view_count'];
							?>
							<tr>
								<td><?php echo $count++; ?></td>
								<td><?php echo $product_title; ?></td>
								<td>
									<?php 
									 $cat_title_query="SELECT cat_id,cat_title FROM category WHERE cat_id=$product_cat_id";
									 $cat_title_result=mysqli_query($con,$cat_title_query);
									 while($cat_title_row=mysqli_fetch_assoc($cat_title_result))
									 {
									 	echo $cat_title=$cat_title_row['cat_title'];
									 }
									?>
									
										
									</td>
								<td><?php echo $product_price; ?> MMK</td>
								<td><?php echo $product_qty ?></td>
								<td><img src="../images/<?php echo $product_image ?>" class="img-circle" width="100px" height="100px" class="imgwidth" alt=""></td>
								<td>
									
									<?php
										$user_query="SELECT * FROM user WHERE user_id=$product_seller_id ";
										$user_result=mysqli_query($con,$user_query);
										while($row=mysqli_fetch_assoc($user_result))
										{
										 	$product_seller_name=$row['username'];
										 	$user_nrc=$row['user_nrc'];
										 	$user_phone_no=$row['user_phone_no'];
										 	$user_address=$row['user_address'];
											?>
											<p>Name:<?php echo $product_seller_name ?></p>
											<p>NRC:<?php echo $user_nrc ?></p>
											<p>Phone:<?php echo $user_phone_no ?></p>
											<p>Address:<?php echo $user_address ?></p>
											<?php 
										} 
									?>
									<a href="#info" id="toggle" data-toggle="collapse"><u><?php echo $product_seller_name ?></u></a>
									<div class="panel-body collapse" id="info">
									</div>
								</td>
								
								<td><a href="pending.php?approved=<?php echo $product_id; ?>" class="btn glyphicon glyphicon-ok"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="pending.php?delete=<?php echo $product_id; ?>" class="btn glyphicon glyphicon-remove" href=""></a></td>
							</tr>
						<?php } ?>

						
							
						</tbody>
					</table>
				</div>
				<div class="panel-footer">
					<nav class="nav navbar-default nav-tabs-justified navbar-fixed-bottom">
						
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="./js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
	if(isset($_GET['approved'])){
		$product_id=$_GET['approved'];
		$approve_query="UPDATE product SET product_status='approved' WHERE product_id=$product_id";
		$approve_result=mysqli_query($con,$approve_query);
		if ($approve_result) {
	 	echo "Query oK";
		 }else{
		 	echo "Query Fail.";die();
	 			}
	 			header("location:pending.php");

	}
	?>
	<?php
	if(isset($_GET['delete'])){
		$product_id=$_GET['delete'];
		$delete_query="DELETE FROM product WHERE product_id=$product_id";
		$delete_result=mysqli_query($con,$delete_query);
		if ($delete_result) {
	 	echo "Query oK";
		 }else{
		 	echo "Query Fail.";die();
	 			}
	 			header("location:pending.php");

	}
	?>