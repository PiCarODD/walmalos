<!-- 
-*- coding: utf-8 -*-
# @Author: HeinHtetAung
# @Date:   2019-05-22 12:33:33
# @Last modified by:   Hein Htet Aung
# @Last Modified time: 2019-05-29 09:55:10
-->
<?php 
     if (isset($_SESSION['user_role'])) {//for login form
         if ($_SESSION['user_role'] !== 'admin') {
             header('Location:../index.php');
         }
     }
     
    if (!isset($_SESSION['user_role'])) {//for nav's Admin
        header('Location:../index.php');
    }
  ?>
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