<!-- 
-*- coding: utf-8 -*-
# @Author: HeinHtetAung
# @Date:   2019-05-22 12:33:33
# @Last modified by:   Hein Htet Aung
# @Last Modified time: 2019-06-07 00:10:04
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
					<div class="text-center">
						<h1>Manage Users</h1>
						<a href="index.php" class="btn btn-success">View Register User</a>
					</div>
					<table class="table table-bordered table-striped">
					   <thead class="bg-primary">
					      <tr>
								<td>No.</td>
								<td>Name</td>
								<td>Phone Number</td>
								<td>Email</td>
								<td>NRC</td>
								<td>Address</td>
								<td>Photo</td>
								<td>Total Product</td>
								<td>Total Sale</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							<?php
								 $no=0;
								 $query=$con->prepare("SELECT * FROM user WHERE user_role='seller' ORDER BY user_id DESC");
								 $query->execute();
								 $result=$query->get_result();
								 while($row=$result->fetch_assoc())
								 {
								 	 $no+=1;
								 	 $user_id=$row['user_id'];
								 	 $user_name=$row['username'];
								 	 $user_first_name=$row['user_firstname'];
								 	 $user_last_name=$row['user_lastname'];
								 	 $user_email=$row['user_email'];
								 	 $user_image=$row['user_image'];
								 	 $user_role=$row['user_role'];
								 	 $user_nrc=$row['user_nrc'];
								 	 $user_phone_no=$row['user_phone_no'];
								 	 $user_address=$row['user_address'];
								 	 $rend_salt=$row['rendSalt'];
								 
							?>
							<tr>
								<td><?php echo htmlspecialchars($no); ?></td>
								<td><?php echo htmlspecialchars($user_name); ?></td>
								<td><?php echo htmlspecialchars($user_phone_no); ?></td>
								<td><?php echo htmlspecialchars($user_email); ?></td>
								<td><?php echo htmlspecialchars($user_nrc); ?></td>
								<td><?php echo htmlspecialchars($user_address); ?></td>
								<td><img src="../images/<?php echo htmlspecialchars($user_image) ?>" class="img-circle" width="100px" height="100px"></td>
								<?php 
									$seller_query=$con->prepare("SELECT * FROM product WHERE product_seller_id=?");
									$seller_query->bind_param("s",$user_id);
									$seller_result=$seller_query->get_result();
									$total_qty=0;
									$total_selling_price=0;
									while ($seller_result != "" && $seller_row=$seller_result->fetch_assoc()) 
									{
										$total_qty+=$seller_row['product_qty'];
										$total_selling_price+=$seller_row['product_qty']*$seller_row['product_price'];
									}
								?>
								<td><?php echo htmlspecialchars($total_qty) ?></td>
								<td><?php echo htmlspecialchars($total_selling_price) ?></td>
								<td><a href="manage_user.php?delete=<?php echo htmlspecialchars($user_id);?>" class="btn glyphicon glyphicon-trash" method="post"></a></td>
							</tr>

						<?php } ?>
							
						</tbody>
					</table>
				</div>
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

<?php
	if(isset($_GET['delete'])){
		$user_id=$_GET['delete'];
		$query=$con->prepare("DELETE FROM user WHERE user_id=?");
		$query->bind_param("s",$user_id);
		$query->execute();
		$result=$query->get_result();

		$seller_delete_query=$con->prepare("DELETE FROM product WHERE product_seller_id=?");
		$seller_delete_query->bind_param("s",$user_id);
		$seller_delete_query->execute();
		$seller_delete_result=$seller_delete_query->get_result();

		header("location:manage_user.php");
	}
// header("location:manage_user.php");

?>