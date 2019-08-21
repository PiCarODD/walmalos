<!-- 
-*- coding: utf-8 -*-
# @Author: HeinHtetAung
# @Date:   2019-05-27 20:34:57
# @Last modified by:   Hein Htet Aung
# @Last Modified time: 2019-06-07 00:10:43
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
				<?php include_once"include_admin/admin_nav.php" ?>
				
				<div class="panel-body">
					<div class="col-md-4 col-md-offset-4">
						<div class="warning">
							<h1 class="text-center">Add Product</h1>
							<div class="text-center">
								<a href="product.html" class="text-justify btn btn-success">View Products</a>
							</div>
						</div><br>
						<form class="well form-control-static">
							<div class="form-group">
								<label for="pid" class="control-label">Product ID</label>
								<div class="input-group">
									<span class="input-group-addon">*</span>
									<input type="text" value="auto-generate" disabled="" class="form-control" id="pid" name="">
								</div>
							</div>
							<div class="form-group">
								<label for="pn" class="control-label">Product Name</label>
								<div class="input-group">
									<span class="input-group-addon">*</span>
									<input type="text" class="form-control" id="pn" name="">
								</div>
							</div>
							<div class="form-group">
								<label for="pn" class="control-label">Choose Category</label>
								<div class="input-group">
									<select class="form-group">
										<option>Watches</option>
										<option>Jewely</option>
										<option>Cloths</option>
										<option>Shoe</option>
										<option>Handmades</option>
										<option>Other</option>
									</select>
								</div>
							</div>	
							<div class="form-group">
								<label for="pr" class="control-label">Price</label>
								<div class="input-group">
									<span class="input-group-addon">*</span>
									<input type="number" class="form-control" id="pr" name="">
								</div>
							</div>
							<div class="form-group">
								<label for="qty" class="control-label">Qty</label>
								<div class="input-group">
									<span class="input-group-addon">*</span>
									<input type="number" class="form-control" id="qty" name="">
								</div>
							</div>
							<div class="form-group">
								<label for="pi" class="control-label">Product Image</label>
								<div class="input-group">
									<span class="input-group-addon">*</span>
									<input type="file" class="form-control" id="pi" name="">
								</div>
							</div>	
							<div class="form-group">
								<label for="qty" class="control-label">Seller Name</label>
								<div class="input-group">
									<span class="input-group-addon">*</span>
									<input type="text" value="Maung Maung Zaw Latt" disabled="" class="form-control" id="qty" name="">
								</div>
							</div>
							<br>
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