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
				<?php include_once "include_admin/admin_nav.php" ?>

		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Category</div>
					<div class="panel-body">
						<form action="" method="post">
							<div class="input-group">
							<input type="text" class="form-control" name="txt_add" placeholder="Enter Category">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="btn_add" color="red">
                                    <span class="glyphicon glyphicon-log-in"></span>
                            </button>
                            </span>
                        </div>
<?php
	if(isset($_POST['btn_add'])){
		$cat_title=mysqli_real_escape_string($con,$_POST['txt_add']);
		if($cat_title==""){
			echo "Sorry Retrype Category!!";
		}else{
		$query=$con->prepare("INSERT INTO category(cat_title) VALUES (?)");
		$query->bind_param("s",$cat_title);
		$query->execute();
		header("location:category.php");
	}
}
	?>



                        <?php
	if(isset($_GET['edit'])){
		$cat_id=mysqli_real_escape_string($con,$_GET['edit']);
		$cat_id = (int) filter_var($cat_id, FILTER_SANITIZE_NUMBER_INT);
		$query=$con->prepare("SELECT * FROM category WHERE cat_id=?");
		$query->bind_param("s",$cat_id);
		$query->execute();
		$result=$query->get_result();
		while($row=$result->fetch_assoc()){
			$cat_id=$row['cat_id'];
			$cat_title=$row['cat_title'];

		} 			
	 		?>				<br><br>
	 						<div class='input-group'>
                            <input type="text" class="form-control" name="txt_edit" placeholder="<?php echo htmlspecialchars($cat_title);?>">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="btn_edit">
                                    <span class="glyphicon glyphicon-log-in"></span>
                            </button>
                            </span>
                        </div>
	<?php }
	?>
	<?php
	if(isset($_POST['btn_edit'])){
		$cat_id;
		$cat_title=mysqli_real_escape_string($con,$_POST['txt_edit']);
		if($cat_title==""){
			echo "Type category name";
		}else{
		$query=$con->prepare("UPDATE category SET cat_title=? WHERE cat_id=?");
		$query->bind_param("ss",$cat_title,$cat_id);
		$query->execute();
	 	header("location:category.php");
	}
}
	?>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Categoty Table</div>
					<div class="panel-body">
						<table  class="table table-bordered table-hover" action="" method="post">
						    <thead>
						    	
						    <tr class="bg-primary">
						        <th>ID</th>
						        <th>Name</th>
						        <th></th>
						        
						    </tr>
						    <?php
								 $query=$con->prepare("SELECT * FROM category");
								 $query->execute();
								 $result=$query->get_result();
								 while($row=$result->fetch_assoc())
								 {
								 	$cat_id=htmlspecialchars($row['cat_id']);
								 	$cat_title=htmlspecialchars($row['cat_title']);

							?>
							<tr>
						        <td><?php echo htmlspecialchars($cat_id); ?></td>
						        <td><?php echo ucwords(htmlspecialchars($cat_title)); ?></td>
						        <td>
						        	<a href="category.php?edit=<?php echo htmlspecialchars($cat_id); ?>" class="btn glyphicon glyphicon-edit"></a>
						        	<a href="category.php?delete=<?php echo htmlspecialchars($cat_id);?>" class="btn glyphicon glyphicon-trash"></a>
						        </td>
						    </tr>
						<?php } ?>
						    </thead>
						</table>
						
					</div>
				</div>
			</div>
		</div><!--/.row-->
				
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
		$cat_id=mysqli_real_escape_string($con,$_GET['delete']);
		$query=$con->prepare("DELETE FROM category WHERE cat_id=?");
		$query->bind_param("s",$cat_id);
		$query->execute();
		$result=$query->get_result();
		header("location:category.php");

	}
	?>