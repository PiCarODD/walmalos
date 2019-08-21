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
						<div class="text-center">
							<h1>Add Events</h1>
							<a class="btn btn-success" href="view_event.php">View Events</a>
						</div><br>
						<form class="well form-control-static" action="" method="post">
							<div class="form-group">
								<label for="pid" class="control-label">Event Name</label>
								<div class="input-group">
									<span class="input-group-addon">*</span>
									<input type="text" class="form-control" id="pid" name="event_name">
								</div>
							</div>
							<div class="form-group">
								<label for="pn" class="control-label">Description</label>
								<div class="input-group">
									<textarea rows="5" cols="50" class="form-control rounded-0"name="event_description"></textarea>
								</div>
							</div>	
							<div class="form-group">
								<label for="pr" class="control-label">Start Date</label>
								<div class="input-group">
									<span class="input-group-addon">*</span>
									<input type="date" class="form-control" id="pr" name="event_start_date">
								</div>
							</div>
							<div class="form-group">
								<label for="qty" class="control-label">End Date</label>
								<div class="input-group">
									<span class="input-group-addon">*</span>
									<input type="date" class="form-control" id="qty" name="event_end_date">
								</div>
							</div>
							<div class="form-group">
								<label for="pi" class="control-label">Location</label>
								<div class="input-group">
									<span class="input-group-addon">*</span>
									<input type="text" class="form-control" id="pi" name="event_location">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<input type="submit" value="post" class="form-control btn-success" id="pi" name="btn_add_event">
								</div>
							</div>		
						</form>	
					</div>
				</div>
				<div class="panel-footer">
					<nav class="nav navbar-default nav-tabs-justified navbar-fixed-bottom">
						
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
	if(isset($_POST['btn_add_event'])){
		$event_name=$_POST['event_name'];
		$event_description=$_POST['event_description'];
		$event_start_date=$_POST['event_start_date'];
		$event_end_date=$_POST['event_end_date'];
		$event_location=$_POST['event_location'];
		$comment="";
		$query="INSERT INTO event(event_name, description, start_date, end_date, location, comment) VALUES ('$event_name','$event_description','$event_start_date','$event_end_date','$event_location','$comment')";
		$result=mysqli_query($con,$query);
		if ($result) {
	 	echo "Success---";
		 }else{
		 	echo "Query Fail.";
	 			}
	 		}
	 			// header("location:category.php");
	

	?>
