<?php include_once "include/header.php"; ?>
<?php include_once "include/navigation.php"; ?>
<div class="row">
<?php include_once "include/sidebar.php"; ?>
	<div class="col-md-9">
<!-- 
New Products
-->
<div class="well well-small">
	<h3>Our Products </h3>
	<div class="row-fluid">
		<ul class="thumbnails">
			
				<?php 
					$query="SELECT * FROM product";
					$result=mysqli_query($con,$query);

					while ($row=mysqli_fetch_assoc($result)) {
						$product_id=$row['product_id'];
						$product_image=$row['product_image'];
						$product_title=$row['product_title'];
						$product_price=$row['product_price'];
						
					
				 ?>
				 <li class="col-md-4">
				<div class="thumbnail">
					<a href="product_details.php" class="overlay"></a>
					<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
					<a href="product_details.php"><img class="img-responsive" src="images/<?php echo $product_image; ?>" alt=""></a>
					<div class="caption cntr">
						<p><?php echo $product_title; ?></p>
						<p><strong> <?php echo $product_price; ?></strong></p>
						<h4><a class="shopBtn" href="cart.php?cart=<?php echo $product_id; ?>" title="add to cart"> Add to cart </a></h4>
						
						<br class="clr">
					</div>
				</div>
			</li>
			<?php } ?>
			
		</ul>
	</div>
	
	
</div>
</div>
</div>
<!-- 
Clients 
-->
<?php include_once "include/footer.php"; ?>