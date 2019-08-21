<!-- 
-*- coding: utf-8 -*-
# @Author: HeinHtetAung
# @Date:   2019-05-22 12:33:33
# @Last modified by:   Hein Htet Aung
# @Last Modified time: 2019-06-07 00:10:25
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
				<!-- <div class="panel-heading">
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
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Product <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="add_product.html">Add Product</a></li>
										<li><a href="edit_product.html">Edit Product</a></li>
										<li><a href="product.html">View Products</a></li>
										<li><a href="sale_product.html">Products On Sale</a></li>
									</ul>
								</li>
								<li class="dropdown active">
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
					<div class="col-md-4 col-md-offset-4">
						<div class="text-center">
							<h1>Create Cupon</h1>
							<a class="btn btn-success" href="view_cupon.html">View Cupon</a>
						</div><br>
						<form class="well form-control-static">
							<div class="form-group">
								<label for="cid" class="control-label">Cupon Code</label>
								<div class="input-group">
									<span class="input-group-addon">*</span>
									<input type="text" class="form-control" id="cid" name="">
								</div>
							</div>
							<div class="form-group">
								<label for="pn" class="control-label">From</label>
								<div class="input-group">
									<span class="input-group-addon">*</span>
									<input type="date" class="form-control" id="pn" name="">
								</div>
							</div>	
							<div class="form-group">
								<label for="to" class="control-label">To</label>
								<div class="input-group">
									<span class="input-group-addon">*</span>
									<input type="date" class="form-control" id="to" name="">
								</div>
							</div>
							<div class="form-group">
								<label for="dp" class="control-label">Discount Percent</label>
								<div class="input-group">
									<span class="input-group-addon">*</span>
									<input type="text" class="form-control" id="dp" name="">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="btn-group">
										<input type="submit" value="Submit" class="form-control btn-success" id="pi" name="">
									</div>
									<div class="btn-group">
										<input type="submit" value="Cancel" class="form-control btn-danger" id="pi" name="">
									</div>
								</div>
							</div>
						</form>	
					</div>
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