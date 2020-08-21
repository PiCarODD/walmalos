<!-- 
-*- coding: utf-8 -*-
# @Author: HeinHtetAung
# @Date:   2019-06-05 12:52:03
# @Last modified by:   Hein Htet Aung
# @Last Modified time: 2019-06-07 10:07:01
-->
<?php ob_start() ?>
<?php session_start() ?>
<?php require_once "../include/db.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Welcome Seller</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="panel panel-primary">

				
				<?php include_once "profile_view.php" ?>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Orders</th>
									<th>Purchased</th>
									<th>Phone</th>
									<th>Email</th>
									<th>Deliver to</th>
									<th>Date</th>
									<th>Total</th>
									<th>Payment</th>
									<th>Deliver Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								
								<?php 
									$people_count=0;
									$user_id=$_SESSION['user_id'];
									$username=$_SESSION['username'];

									$query=$con->prepare("SELECT * FROM product WHERE product_seller_id=?");
									$query->bind_param("i",$user_id);
									$query->execute();
									$result=$query->get_result();

									
									while ($product_row=$result->fetch_assoc()) 
									{
										$product_id=$product_row['product_id'];
										$product_title=$product_row['product_title'];
										$query=$con->prepare("SELECT * FROM cart WHERE cart_product_id=? ORDER BY cart_id DESC");
										$query->bind_param("s",$product_id);
										$query->execute();
										$cart_result=$query->get_result();

										while ($row=$cart_result->fetch_assoc()) 
										{

											$people_count+=1;
											$cart_id=$row['cart_id'];
											$item_qty=$row['cart_qty'];
											$cart_date=$row['cart_date'];
											$cart_total_price=$row['cart_total_price'];
											$customer_id=$row['cart_customer_id'];
											$customer_query=$con->prepare("SELECT * FROM customer WHERE customer_id=$customer_id");
											$customer_query-> bind_param("s",$customer_id);
											$customer_query->execute();
											$customer_result=$customer_query->get_result();
											while ($customer_row=$customer_result->fetch_assoc())
											{
												$customer_name=$customer_row['customer_name'];
												$customer_phone_no=$customer_row['customer_phone_no'];
												$customer_email=$customer_row['customer_email'];
												$customer_address=$customer_row['customer_address'];

												?>
												<tr>
													<td><?php echo htmlspecialchars($people_count) ?></td>
													<td>Product name <b><?php echo htmlspecialchars($product_title) ?></b> by <b><?php echo htmlspecialchars($customer_name); ?></b></td>
													<td><?php echo htmlspecialchars($item_qty) ?> Items</td>
													<td><?php echo htmlspecialchars($customer_phone_no) ?></td>
													<td><a href="mailto:<?php echo htmlspecialchars($customer_email); ?>?Subject=Order Confirm"><?php echo htmlspecialchars($customer_email); ?></a></td>
													<td><?php echo htmlspecialchars($customer_address); ?></td>
													<td><?php echo htmlspecialchars($cart_date); ?></td>
													<td><?php echo htmlspecialchars($cart_total_price) ?> MMK</td>
													<td>KBZ</td>
													<!-- <td><p class="successcolor">Delivered</p></td> -->
													<td>
														<select class="form-group" name="deliver_status" required="submit">
															<option value="onhold">On Hold</option> 
															<option value="delivered">Delivered</option>
															<option value="cancel">Cancel</option>
														</select>
													</td>
													<td>
														<a href="orders.php?confirm=<?php echo htmlspecialchars($cart_id); ?>" class="btn glyphicon glyphicon-ok"></a>
														<a href="orders.php?cart_id=<?php echo htmlspecialchars($cart_id); ?>" class="btn glyphicon glyphicon-trash"></a>
													</td>
												</tr>


											<?php

											} 
										}
									}
								 ?>

								 <?php
								 	if(isset($_GET['cart_id']))
								 	{
								 		$cart_id=$_GET['cart_id'];
								 		$delete_query=$con->prepare("DELETE FROM cart WHERE cart_id=?");
								 		$delete_query->bind_param("s",$cart_id);
								 		$delete_query->execute();
								 		$delete_result=$delete_query->get_result();
								 		header("Location:orders.php");
								 	}
								  ?>
								

							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<nav class="nav navbar-default navbar-fixed-bottom">
						<p>Make with <span class="glyphicon glyphicon-heart"></span> Team <font color="#204A87FF">Bane Mont</p>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>