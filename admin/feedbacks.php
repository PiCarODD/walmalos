<!-- 
-*- coding: utf-8 -*-
# @Author: HeinHtetAung
# @Date:   2019-05-22 12:33:33
# @Last modified by:   Hein Htet Aung
# @Last Modified time: 2019-06-07 00:10:14
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
					
					<table class="table table-bordered table-striped" method="post">
						<thead class="bg-primary">
							<tr>
								<td>Comment_author</td>
								<td>Email</td>
								<td>Content</td>
								<td>Status</td>
								<td>Date</td>
								<td>Approved/Delete</td>
							</tr>
						</thead>
						<tbody>
							<?php 
								 $query="SELECT * FROM comment ";
								 $result=mysqli_query($con,$query);
								 while($row=mysqli_fetch_assoc($result))
								 {
								 	 $comment_id=$row['comment_id'];
								 	 $comment_post_id=$row['comment_post_id'];
								 	 $comment_author=$row['comment_author'];
								 	 $comment_email=$row['comment_email'];
								 	 $comment_content=$row['comment_content'];
								 	// if($start_date>$end_date){ echo "ok";}else {echo "not ok";}

								 	 $comment_status=$row['comment_status'];
								 	 $comment_date=$row['comment_date'];
							?>
							<tr>
								<td><?php echo $comment_author; ?></td>
								<td><?php echo $comment_email; ?></td>
								<td><?php echo $comment_content; ?></td>
								<td><?php echo $comment_status; ?></td>
								<td><?php echo $comment_date; ?></td>
								<td><a href="feedbacks.php?approved=<?php echo $comment_id; ?>" class="btn glyphicon glyphicon-ok"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="feedbacks.php?unapproved=<?php echo $comment_id; ?>" class="btn glyphicon glyphicon-remove" href=""></a></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
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
	if(isset($_GET['approved'])){
		$comment_id=$_GET['approved'];
		$query="UPDATE comment SET comment_status='approved' WHERE comment_id=$comment_id";
		$result=mysqli_query($con,$query);
		header("location:feedbacks.php");

	}
	?>

<?php
	if(isset($_GET['unapproved'])){
		$comment_id=$_GET['unapproved'];
		$query="DELETE FROM comment WHERE comment_id=$comment_id";
		$result=mysqli_query($con,$query);
		header("location:feedbacks.php");

	}
	?>

			</div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="./js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>