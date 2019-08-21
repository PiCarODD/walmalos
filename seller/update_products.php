
<!-- 
-*- coding: utf-8 -*-
# @Author: HeinHtetAung
# @Date:   2019-06-05 12:52:03
# @Last modified by:   Hein Htet Aung
# @Last Modified time: 2019-06-07 15:41:26
-->
<?php session_start() ?>
<?php include_once "../include/db.php" ?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Welcome Seller</title>

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

	<?php
	 if(isset($_GET['edit'])){
	 	$product_id = $_GET['edit'];
		$query = "SELECT * FROM product WHERE product_id=$product_id";
		$result = mysqli_query($con,$query); 
		if(!$result){
		 	die("Query Failed".mysqli_error($result));

		 }
		while ($row = mysqli_fetch_assoc($result)) {
			
            //echo $product_title=$row['product_title'];
            //echo $cat_title=$row['cat_title'];
            $product_price=$row['product_price'];
            $product_qty=$row['product_qty'];
            //echo $product_image=$row['product_image'];
            //echo $product_seller_name=$row['product_seller_name'];
            //die();
		}
		 
		
		
		}
	?>
	<?php 
	 	if (isset($_POST['update_user'])) 
	 	{
	        $product_price=$_POST['product_price'];
	        $product_qty=$_POST['product_qty'];
			

			$query = "UPDATE product SET product_price=$product_price,product_qty=$product_qty WHERE product_id=$product_id";                                                                        

			$result = mysqli_query($con,$query);
			if(!$result){
			 	die("Query Failed".mysqli_error($result));

			 }
	       header("Location:products.php");
	      
	 	}
	 	elseif(isset($_POST['cancel']))
	 	{
	 		header("Location:products.php");
	 	}

	 ?>

	<div class="container">
		<div class="row">
			<div class="panel panel-primary">

				<?php include_once "profile_view.php" ?>
				
					<div class="modal" id="addproduct" tabindex="-1" data-backdrop="static" data-keyboard="false">
						<div class="modal-dialog"><!-- use to modal-sm to pop small modal box -->
							<div class="modal-content">
								<div class="modal-header"> <!-- header format -->
									<button class="close" data-dismiss="modal">&times;</button><!--data-dismiss=close -->
									<h4 class="modal-title">Update Product</h4>
								</div><!-- eoh -->
								<div class="modal-body"> <!-- body format -->
									<form class="well form-control-static" action="" method="post" enctype="multipart/form-data">
										
										<div class="form-group">
											<label for="pr" class="control-label">Price</label>
											<div class="input-group">
												<span class="input-group-addon">*</span>
												<input type="number" class="form-control" id="pr" name="product_price" value="<?php echo $product_price?>">
											</div>
										</div>
										<div class="form-group">
											<label for="qty" class="control-label">Qty</label>
											<div class="input-group">
												<span class="input-group-addon">*</span>
												<input type="number" class="form-control" id="qty" name="product_qty" value="<?php echo $product_qty?>">
											</div>
										</div>
										
										<br>
										<div class="form-group">
											<div class="input-group">
												<div class="btn-group">
													
													<input type="submit" value="Update" class="form-control btn-success" id="pi" name="update_user">
												</div>
												<div class="btn-group">
													
													<input type="submit" value="Cancel" class="form-control btn-danger" id="pi" name="cancel">
												
												</div>
											</div>
										</div>
									</form>	
									
								</div> <!-- eob -->
								<!-- eof -->
							</div>
						</div>
					</div>
				</div>
				</div>
				
				<div class="panel-footer">
					<nav class="nav navbar-default navbar-fixed-bottom">
						<p>Make with <span class="glyphicon glyphicon-heart"></span> Team <font color="#204A87FF">Bane Mont</font></p>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#addproduct').modal('show');
		});
	</script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>