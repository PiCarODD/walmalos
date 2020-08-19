<!-- 
-*- coding: utf-8 -*-
# @Author: HeinHtetAung
# @Date:   2019-05-22 12:33:33
# @Last modified by:   Hein Htet Aung
# @Last Modified time: 2019-06-07 00:09:17
-->
<?php ob_start();?>
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
					<h1 class="text-center">Events</h1>
					<table class="table table-bordered table-striped" method="post">
						<thead class="bg-primary">
							<tr>
								<td>No.</td>
								<td>Event Name</td>
								<td>Description</td>
								<td>Start Date</td>
								<td>End Date</td>
								<td>Location</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							<?php
								 $event_count=0;
								 $query=$con->prepare("SELECT * FROM event ORDER BY event_id DESC");
								 $query->execute();
								 $result=$query->get_result();
								 while($row=$result->fetch_assoc())
								 {
								 	 $event_id=$row['event_id'];
								 	 $event_name=$row['event_name'];
								 	 $description=$row['description'];
								 	 $start_date=$row['start_date'];
								 	 $end_date=$row['end_date'];
								 	 $location=$row['location'];
								 	 $comment=$row['comment'];
							?>
							<tr>
								<td><?php echo $event_count+=1; ?></td>
								<td><?php echo htmlspecialchars($event_name); ?></td>
								<td><?php echo htmlspecialchars($description); ?><br>
								Come and join us</td>
								<td><?php echo htmlspecialchars($start_date); ?></td>
								<td><?php echo htmlspecialchars($end_date); ?></td>
								<td><?php echo htmlspecialchars($location); ?></td>
								<td><a href="edit_event.php?edit=<?php echo htmlspecialchars($event_id);?>" class="btn glyphicon glyphicon-edit"></a>
									<a href="view_event.php?delete=<?php echo htmlspecialchars($event_id);?>" class="btn glyphicon glyphicon-trash"></a></td>
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
		$event_id=$_GET['delete'];
		$query=$con->prepare("DELETE FROM event WHERE event_id=?");
		$query->bind_param("s",$event_id);
		$query->execute();
		$result=$query->get_result();
		header("location:view_event.php");

	}
	?>
