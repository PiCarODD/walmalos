<?php include_once "include/header.php"; ?>
<!-- 
	Upper Header Section 
-->
<?php include_once "include/navigation.php"; ?>
<!-- 
Body Section 
-->
<div class="row">
	<?php include_once "include/sidebar.php"; ?>
	<?php include "cart_list.php" ?>
	<div class="col-md-9">
		<div class="well np">
			<div id="myCarousel" class="carousel slide homCar">
				<div class="carousel-inner">
					<div class="item">
						<img style="width:100%" src="assets/img/bootstrap_free-ecommerce.png" alt="bootstrap ecommerce templates">
						<div class="carousel-caption">
							<h4>Wal Mal Online Shop</h4>
							<p><span>Very clean simple to use</span></p>
						</div>
					</div>
					<div class="item">
						<img style="width:100%" src="assets/img/carousel1.png" alt="bootstrap ecommerce templates">
						<div class="carousel-caption">
							<h4>Wal Mal Online Shop</h4>
							<p><span>Highly Google seo friendly</span></p>
						</div>
					</div>
					<div class="item active">
						<img style="width:100%" src="assets/img/carousel3.png" alt="bootstrap ecommerce templates">
						<div class="carousel-caption">
							<h4>Wal Mal Online Shop</h4>
							<p><span>Very easy to use.</span></p>
						</div>
					</div>
					<div class="item">
						<img style="width:100%" src="assets/img/bootstrap-templates.png" alt="bootstrap templates">
						<div class="carousel-caption">
							<h4>Wal Mal Online Shop</h4>
							<p><span>Compitable to many more devices</span></p>
						</div>
					</div>
				</div>
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>
		</div>
<!--
New Products
-->

<div class="row-fluid">
	<div class="well well-small col-md-12">
		<h3>New Products </h3>
		<hr class="soften"/>
		<div class="row-fluid">
			<div id="newProductCar" class="carousel slide">
				<div class="carousel-inner">
					<div class="item active">
						<ul class="thumbnails" style="list-style: none;">
							<?php 
							$stmt = $con->prepare("SELECT * FROM product ORDER BY product_id DESC LIMIT 12");
							$stmt -> execute();
							$result = $stmt->get_result();

							while ($row = $result->fetch_assoc()) {
								$product_cat_id=$row['product_cat_id'];
								$product_id=$row['product_id'];
								$product_image=$row['product_image'];
								$product_title=$row['product_title'];
								$product_price=$row['product_price'];
								$product_qty=$row['product_qty'];
								$product_content=$row['product_content'];

								?>
								<li class="col-md-3">
									<div class="thumbnail" >
										<a class="zoomTool" href="product_details.php?productd=<?php echo htmlspecialchars($product_id); ?>" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
										<a href="#" class="tag"></a>
										<a href="product_details.php?productd=<?php echo htmlspecialchars($product_id); ?>"><img src="images/<?php echo $product_image; ?>" alt="bootstrap-ring" style="height: 200px;"></a>
									</div>
								</li>
							<?php } ?>

						</ul>
					</div>
				</div>
				<a class="left carousel-control" href="#newProductCar" data-slide="prev">&lsaquo;</a>
				<a class="right carousel-control" href="#newProductCar" data-slide="next">&rsaquo;</a>
			</div>
		</div>
		
	</div>
</div>
<?php
	// $qty_query="SELECT * FROM product";
	// $qty_result=mysqli_query($con,$qty_query);
	// if(!$qty_result)
	// {
	// 	die("Qty query fail".mysqli_error($qty_result));
	// } 
	// while ($qty_row=mysqli_fetch_assoc($qty_result)) 
	// {
	// 	echo $_SESSION['qty'][$qty_row['product_id']]=0;
	// }
?>

<!-- <div class="well well-small">
	<a class="btn btn-mini pull-right" href="#">View more <span class="icon-plus"></span></a>
	Popular Products 
</div> -->
<hr>

</div>
</div>
<!-- 
Clients 
-->

<!--
Footer
-->
<?php 	include_once "include/footer.php"; ?>