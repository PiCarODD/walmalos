<!-- 
-*- coding: utf-8 -*-
# @Author: HeinHtetAung
# @Date:   2019-06-05 12:52:03
# @Last modified by:   Hein Htet Aung
# @Last Modified time: 2019-06-07 15:41:26
-->
<?php session_start() ?>

<?php include_once "../include/db.php" ?>
<?php ob_start() ?>
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
                if(isset($_POST['submit']))
                {
                   
                    $cat_id=$_POST['cat_title'];
                    $product_title=$_POST['product_title'];
                    
                    $product_image=$_FILES['product_image']['name'];
					$product_image_temp=$_FILES['product_image']['tmp_name'];

					$product_content=$_POST['product_description'];
                    $product_price=$_POST['product_price'];
                    $product_qty=$_POST['product_qty'];
                    //$product_seller_name=$_POST['product_seller_name'];
                    $product_seller_id=$_SESSION['user_id'];

                    move_uploaded_file($product_image_temp,"../images/$product_image");

                    $product_query=$con->prepare("INSERT INTO product(product_cat_id, product_title, product_image, product_content, product_date, product_price, product_qty, product_seller_id, product_status) VALUES (?,?,?, ?, now(),?,?,?,'unapproved')");
                    $product_query->bind_param("issssss",$cat_id,$product_title,$product_image,$product_content,$product_price,$product_qty,$product_seller_id);
                    $product_query->execute();
					header("Location:products.php");
				
                     // $coproduct_count_query="UPDATE posts SET post_comment_count=post_comment_count+1 WHERE post_id=$post_id";
                }     // $comment_count_result=mysqli_query($connection,$comment_count_query);
                     // confirm_query($comment_count_result);
                     
     ?>

     <?php
     	if(isset($_POST['cancel'])) 
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
										<h4 class="modal-title">Add Your Product</h4>
									</div><!-- eoh -->
									<div class="modal-body"> <!-- body format -->
										<form class="well form-control-static" method="post" enctype="multipart/form-data">
											<div class="form-group">
												<label for="pn" class="control-label">Product Name</label>
												<div class="input-group">
													<span class="input-group-addon">*</span>
													<input type="text" class="form-control" id="pn" name="product_title" required>
												</div>
											</div>
											<div class="form-group">
												<label for="pn" class="control-label">Choose Category</label>
												<div class="input-group">
													<select class="form-group" name="cat_title" required="submit">
														<?php 
															$query=$con->prepare("SELECT * FROM category");
															$query->execute();
															$result=$query->get_result();
															while ($row=$result->fetch_assoc()) {
																$cat_id=$row['cat_id'];
																$cat_title=htmlspecialchars($row['cat_title']);
																echo "<option value='{$cat_id}'>{$cat_title}</option> ";
															}

														 ?>

													</select>
												</div>
											</div>	
											<div class="form-group">
												<label for="pr" class="control-label">Price</label>
												<div class="input-group">
													<span class="input-group-addon">*</span>
													<input type="number" class="form-control" id="pr" name="product_price" required>
												</div>
											</div>
											<div class="form-group">
												<label for="qty" class="control-label">Qty</label>
												<div class="input-group">
													<span class="input-group-addon">*</span>
													<input type="number" class="form-control" id="qty" name="product_qty" required>
												</div>
											</div>
											<div class="form-group">
												<label for="qty" class="control-label">Description</label>
												<div class="input-group">
													<span class="input-group-addon">*</span>
													<input type="textarea" class="form-control" id="description" name="product_description" required>
												</div>
											</div>
											<div class="form-group">
												<label for="pi" class="control-label">Product Image</label>
												<div class="input-group">
													<span class="input-group-addon">*</span>
													<input type="file" class="form-control" id="pi" name="product_image" required>
												</div>
											</div>

											<div class="form-group">
												<label for="qty" class="control-label">Seller Name</label>
												<div class="input-group">
													<span class="input-group-addon">*</span>
													<input type="text" value="<?php echo htmlspecialchars($_SESSION['username']) ?>" class="form-control" id="qty" name="product_seller_name" required>
												</div>
											</div>
											<br>
											<div class="form-group">
												<!-- <div class="input-group"> -->
													<div class="btn-group">
														<input type="submit" value="Submit" class="form-control btn-success" id="pi" name="submit">
													</div>
																							
													<div class="btn-group pull-right">
														<a class="btn btn-danger" href="products.php">&nbsp;Cancle</a>
														<!-- <input type="submit" value="Cancel" class="form-control btn-danger" id="pi" name="cancel">
 -->												</div>
												
											</div>
										</form>	
										
									</div>

									 <!-- eob -->
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