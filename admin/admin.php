<!-- 
-*- coding: utf-8 -*-
# @Author: HeinHtetAung
# @Date:   2019-05-22 12:33:33
# @Last modified by:   Hein Htet Aung
# @Last Modified time: 2019-06-07 00:10:31
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
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Year', 'Sales', 'Expenses'],
				['2015',  1000,      400],
				['2016',  1170,      460],
				['2017',  660,       1120],
				['2018',  1030,      540]
				]);

			var options = {
				title: 'Company Performance',
				hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
				vAxis: {minValue: 0}
			};

			var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
			chart.draw(data, options);
		}
	</script>
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
					<!-- <hr style="border: 1px solid black;"> -->
<!-- 					<nav class="nav navbar-default nav-tabs-justified">
						<button class="navbar-toggle" data-toggle="collapse" data-target="#one">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-collapse collapse" id="one">
							<ul class="nav navbar-nav">
								<li class="active"><a href="admin.html">Home</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Product <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="add_product.php">Add Product</a></li>
										<li><a href="edit_product.php">Edit Product</a></li>
										<li><a href="product.php">View Products</a></li>
										<li><a href="sale_product.php">Products On Sale</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Cupon <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="cupon.php">Create Cupon</a></li>
										<li><a href="view_cupon.php">View Cupon</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Users <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="manage_user.php">View User</a></li>
										<li><a href="register_user.php">View Register User</a></li>
									</ul>
								</li>
								<li><a href="feedbacks.php">User Feedbacks</a></li>
								<li><a href="pending.php">Pending Products</a></li>
								<li><a href="add_event.php">Add Events</a></li>
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
					</nav> -->
				<!-- </div> --> -->
				<?php include_once "include_admin/admin_nav.php" ?>
				<div class="panel-body">
					<h1 class="text-warning text-center">Site Traffic</h1>
					<div id="chart_div" style="width: 100%; height: 500px;"></div>
					<div id="piechart" style="margin-left: 470px;"></div>
					<script type="text/javascript" src="js/loader.js"></script>

					<script type="text/javascript">
							// Load google charts
							google.charts.load('current', {'packages':['corechart']});
							google.charts.setOnLoadCallback(drawChart);

							// Draw the chart and set the chart values
							function drawChart() {
								var data = google.visualization.arrayToDataTable([
									['Task', 'Hours per Day'],
									['Total Customer', 8],
									['Products Sold', 2],
									['Feedbacks', 4],
									['User Register', 12],
									['Issue', 8]
									]);

							  // Optional; add a title and set the width and height of the chart
							  var options = {'title':'Weekly Report', 'width':550, 'height':400};

							  // Display the chart inside the <div> element with id="piechart"
							  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
							  chart.draw(data, options);
							}
						</script>
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