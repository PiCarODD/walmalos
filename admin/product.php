<!-- 
-*- coding: utf-8 -*-
# @Author: HeinHtetAung
# @Date:   2019-05-22 12:33:33
# @Last modified by:   Hein Htet Aung
# @Last Modified time: 2019-06-07 00:09:53
-->
<?php ob_start() ?>
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
	
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-primary">
				<?php include_once"include_admin/admin_nav.php"?>
				<div class="panel-body">
					<h1 class="text-center">Products On Sale</h1>
					<table class="table table-bordered table-striped">
						<thead class="bg-primary">
							<tr>
								
								<td>No.</td>
								<td>Product Name</td>
								<td>Category</td>
								<td>Price</td>
								<td>Qty</td>
								<td>Product Image</td>
								<td>Seller Name</td>
								<!-- <td>Status</td> -->
								<td></td>
							</tr>
						</thead>
						<tbody>
							<?php
								 $product_count=0;
								 $query=$con->prepare("SELECT * FROM product WHERE product_status='approved' ORDER BY product_id DESC");
								 $query->execute();
								 $result=$query->get_result();

								 while($row=$result->fetch_assoc())
								 {	
								 	 $product_count+=1;
								 	 $product_id=$row['product_id'];
								 	 $product_cat_id=$row['product_cat_id'];
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
										<!-- <td><?php echo $product_id; ?></td> -->
										<td><?php echo htmlspecialchars($product_count); ?></td>
										<td><?php echo htmlspecialchars($product_title); ?></td>
										<td>Shoe</td>
										<td><?php echo htmlspecialchars($product_price); ?> MMK</td>
										<td><?php echo htmlspecialchars($product_qty); ?></td>
										<td><img src="../images/<?php echo htmlspecialchars($product_image); ?>" class="img-rounded imgwidth"></td>
										<?php
											$user_query=$con->prepare("SELECT * FROM user WHERE user_id=? ");
											$user_query->bind_param("i",$product_seller_id);
											$user_query->execute()
											$user_result=$user_query->get_result();
											while($row=$user_result->fetch_assoc())
											{
											 	$product_seller_name=$row['username'];
											}
										 ?>
										<td><?php echo htmlspecialchars($product_seller_name); ?></td>

										<!-- <td><?php echo $product_status; ?><a value="<?php echo $product_status; ?>"></a></td> -->
										<td><a href="edit_product.php?product_id=<?php echo htmlspecialchars($product_id); ?>" class="btn glyphicon glyphicon-edit"></a>
											<a onclick="javascript:return confirm('Are you sure you want to delete?')" href="product.php?delete=<?php echo htmlspecialchars($product_id); ?>" class="btn glyphicon glyphicon-trash"></a></td>
									</tr>
									
								<?php 
								} 
							?>
							
						</tbody>
					</table>
				</div>

				<?php 
			        if(isset($_GET['delete']))
			        {
				        $product_id = $_GET['delete'];
				        $delete_query = $con->prepare("DELETE FROM product WHERE product_id =?");
				        $delete_query->bind_param("s",$product_id);
				        $delete_query->execute();
				        $delete_result = $delete_query->get_result();

				        if(!$delete_result){
				            die('Query Failed');
				        }

				        header('Location:product.php');
			        }
			            
			    ?>

				<div class="panel-footer">
					<nav class="nav navbar-default nav-tabs-justified navbar-fixed-bottom">
						<p>Make with <span class="glyphicon glyphicon-heart"></span> Team <font color="#040246FF">Bane Mont</font></p>
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