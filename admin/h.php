<!-- 
-*- coding: utf-8 -*-
# @Author: HeinHtetAung
# @Date:   2019-06-05 10:01:39
# @Last modified by:   Hein Htet Aung
# @Last Modified time: 2019-06-05 15:06:59
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Ecommerce</title>

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
				<!-- <div class="panel-heading">
					<span class="h1">Crazy</span>
					<span class="pull-right h4 successcolor">
					Biggest online Shop in Myanmar</span>
					<nav class="nav navbar-default navbar-static-top">
						<button class="navbar-toggle" data-toggle="collapse" data-target="#one">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-collapse collapse" id="one">
							<ul class="nav navbar-nav">
								<li><a href="index.html">Home</a></li>
								<li><a href="cart.html"><span class="glyphicon glyphicon-shopping-cart">Cart</span></a></li>
								<li><a href="event.html">Events</a></li>
								<li><a href="contact.html"><span class="glyphicon glyphicon-envelope"></span>Contact Us</a></li>
								<li><a href="about.html"><span class="glyphicon glyphicon-user"></span>About Us</a></li>
								<li><a href="register.html">Register</a></li>
								<li><a href="login.html">Login</a></li>
							</ul>
						</div>
					</nav>
				</div> -->
				<?php include_once "include_admin/admin_nav.php" ?>
				<div class="panel-body">
					<div class="well">
						<input type="text" placeholder="Search......"><a class="btn"><span class="glyphicon glyphicon-search"></span></a>
					</div>
					<div class="col-sm-2 sidenav">
						<div class="well">
							<p><a href="#fashion" class="btn bg-success" data-toggle="collapse">Cloths<span class="glyphicon glyphicon-menu-right"></span></a></p>
							<div class="collapse" id="fashion">
								<ul>
									<li><a href="cloth_m.html">Men</a></li>
									<li><a href="cloth_w.html">Women</a></li>
								</ul>
							</div>
							<p><a href="#watches" class="btn bg-success" data-toggle="collapse"><span></span>Watches<span class="glyphicon glyphicon-menu-right"></span></a></p>
							<div class="collapse" id="watches">
								<ul>
									<li><a href="watch_m.html">Men</a></li>
									<li><a href="watch_w.html">Women</a></li>
								</ul>
							</div>
							<p><a href="#car" class="btn bg-success" data-toggle="collapse"><span></span>Shoe<span class="glyphicon glyphicon-menu-right"></span></a></p>
							<div class="collapse" id="car">
								<ul>
									<li><a href="">Men</a></li>
									<li><a href="">Women</a></li>
								</ul>
							</div>
							<p><a href="#other" class="btn bg-success" data-toggle="collapse">Others<span class="glyphicon glyphicon-menu-right"></span></a></p>
							<div class="collapse" id="other">
								<ul>
									<li><a href="">Men</a></li>
									<li><a href="">Women</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8 text-left">
						<div>
							<h3>Cloths For Women</h3>
							<small>1640 items found in Cloths</small>
							<nav class="nav pull-right">
								<p>Sort By 
									<select name="" id="">
										<option value="">Price</option>
										<option value="">Name</option>
									</select>
								</p>
							</nav>
						</div>
						<hr>
						<table class="table-bordered text-center">
							<thead>
								<tr>
									<th>Name</th>
									<th>Image</th>
									<th>Price</th>
									<th>Qty</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>H2H Women's Casual Regular Fit Cardigan Shawl Collar Long Line with No Button</td>
									<td><img src="./img/w_cloth1.jpg" width="150px" height="200px"></td>
									<td>300000 MMK</td>
									<td><input type="number"></td>
									<td><a href="" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span>Add To Cart</a></td>
								</tr>
								<tr>
									<td>Baleaf Women's UPF 50+ UV Sun Protection Outdoor Long Sleeve Performance T-Shir</td>
									<td><img src="./img/w_cloth2.jpg" width="150px" height="200px"></td>
									<td>300000 MMK</td>
									<td><input type="number"></td>
									<td><a href="" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span>Add To Cart</a></td>
								</tr>
								<tr>
									<td>H2H Women's Casual Regular Fit Cardigan Shawl Collar Long Line with No Button</td>
									<td><img src="./img/w_cloth1.jpg" width="150px" height="200px"></td>
									<td>300000 MMK</td>
									<td><input type="number"></td>
									<td><a href="" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span>Add To Cart</a></td>
								</tr>
							</tbody>
						</table>
						<hr>
						<div class="row vertical-center-row">
							<ul class="pager">
								<li class=""><a>&laquo;</a></li>
								<li class=""><a>1</a></li>
								<li class=""><a>2</a></li>
								<li class=""><a>3</a></li>
								<li class=""><a>4</a></li>
								<li class=""><a>5</a></li>
								<li class=""><a>6</a></li>
								<li class=""><a>7</a></li>
								<li class=""><a>8</a></li>
								<li class=""><a>&raquo;</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2 sidenav">
						<div class="well">
							<p>Ads</p>
						</div>
						<div class="well">
							<p>Ads</p>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<nav class="nav navbar-fixed-bottom navbar-default">
						<p>Make With <span class="glyphicon glyphicon-heart"></span> Team <font color="#328627FF">Bane Mont</font></p>
					</nav>
				</div>
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