<!-- 
-*- coding: utf-8 -*-
# @Author: HeinHtetAung
# @Date:   2019-06-04 23:42:33
# @Last modified by:   Hein Htet Aung
# @Last Modified time: 2019-06-07 00:09:42
-->
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
<!-- 				<div class="panel-heading">
					<h1 style="font-family: serif;"></span><u>Welcome Admin</u></h1>
					<nav class="nav navbar-default nav-tabs-justified">
						<button class="navbar-toggle" data-toggle="collapse" data-target="#one">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-collapse collapse" id="one">
							<ul class="nav navbar-nav">
								<li><a href="admin.html">Home</a></li>
								<li class="dropdown active">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Product <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="add_product.html">Add Product</a></li>
										<li><a href="edit_product.html">Edit Product</a></li>
										<li><a href="product.html">View Products</a></li>
										<li><a href="sale_product.html">Products On Sale</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Cupon <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="cupon.html">Create Cupon</a></li>
										<li><a href="view_cupon.html">View Cupon</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Users <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="manage_user.html">View User</a></li>
										<li><a href="register_user.html">View Register User</a></li>
									</ul>
								</li>
								<li><a href="feedbacks.html">User Feedbacks</a></li>
								<li><a href="pending.html">Pending Products</a></li>
								<li><a href="add_event.html">Add Events</a></li>
								<li></li>
							</ul>
							<ul class="nav pull-right">
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li>
											<span class="glyphicon glyphicon-cog"><a href="setting.php">Setting</a></span>
										</li>
										<li>
											<span class="glyphicon glyphicon-log-out"><a href="../shop/index.html">Logout</a></span>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</nav>
				</div> -->
				<?php include_once "include_admin/admin_nav.php" ?>
				<div class="panel-body">
					<h1 class="text-center">Products On Sale</h1>
					<table class="table table-bordered table-striped">
						<thead class="bg-primary">
							<tr>
								<td>*</td>
								<td>Orders</td>
								<td>Product Owner</td>
								<td>Purchased</td>
								<td>Phone</td>
								<td>Deliver to</td>
								<td>Date</td>
								<td>Total</td>
								<td>Payment</td>
								<td>Deliver Status</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Product id <b>P0001</b> by <b>Hein Htet Aung</b></td>
								<td>Maung Maung Zaw Latt</td>
								<td>2 Items</td>
								<td>093231312</td>
								<td>123 street,A-55,Hlaing</td>
								<td>2/2/2019</td>
								<td>25000 MMK</td>
								<td>KBZ</td>
								<td><p class="successcolor">Delivered</p></td>
								<td><a href="edit_product.html" class="btn glyphicon glyphicon-ok"></a><a class="btn glyphicon glyphicon-trash"></a></td>
							</tr>
							<tr>
								<td>2</td>
								<td>Product id <b>P0055</b> by <b>Ma Thaung Nuynt</b></td>
								<td>Maung Maung Zaw Latt</td>
								<td>3 Items</td>
								<td>093231312</td>
								<td>123 street,A-55,Hlaing</td>
								<td>2/2/2019</td>
								<td>25000 MMK</td>
								<td>CB</td>
								<td><p class="dangercolor">On Hold</p></td>
								<td><a href="edit_product.html" class="btn glyphicon glyphicon-ok"></a><a class="btn glyphicon glyphicon-trash"></a></td>
							</tr>
							<tr>
								<td>3</td>
								<td>Product id <b>P0009</b> by <b>Mg Tun Naing</b></td>
								<td>Maung Maung Zaw Latt</td>
								<td>12 Items</td>
								<td>093231312</td>
								<td>123 street,A-55,Hlaing</td>
								<td>2/2/2019</td>
								<td>125000 MMK</td>
								<td>AYA</td>
								<td><p class="successcolor">Delivered</p></td>
								<td><a href="edit_product.html" class="btn glyphicon glyphicon-ok"></a><a class="btn glyphicon glyphicon-trash"></a></td>
							</tr>
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