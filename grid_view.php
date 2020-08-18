<?php include_once "include/header.php"; ?>
<?php include_once "include/navigation.php"; ?>
<?php include "cart_list.php" ?>
<!-- 
Body Section 
-->
<div class="row">
	<?php include_once "include/sidebar.php"; ?>	
	<div class="col-md-9">
<!--
New Products
-->

	<h3>Our Products </h3>
	<div class="row-fluid">
	<div class="well well-small col-md-12">
<ul class="thumbnails" style="list-style-type: none;">
		<?php 

		$query=$con->prepare("SELECT * FROM product WHERE product_status='approved'");
		$query->execute();
		$result=$query->get_result();

		while ($row=$result->fetch_assoc()) {
			$product_cat_id=$row['product_cat_id'];
			$product_id=$row['product_id'];
			$product_image=$row['product_image'];
			$product_title=$row['product_title'];
			$product_price=$row['product_price'];
			$product_qty=$row['product_qty'];
			$product_content=$row['product_content'];
			?> 
			
				<li class="col-md-4">
					<div class="thumbnail">
						<a href="product_details.html" class="overlay"></a>
						<a class="zoomTool" href="product_details.php?productd=<?php echo htmlspecialchars($product_id); ?>" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
						<a href="product_details.php?productd=<?php echo $product_id ?>"><img src="images/<?php echo htmlspecialchars($product_image); ?>" alt=""></a>
						<div class="caption cntr">
							<p><?php echo htmlspecialchars($product_title); ?></p>
							<p><strong> $ <?php echo htmlspecialchars($product_price); ?></strong></p>
							<!-- <h4><a class="shopBtn" href="grid_view.php ? cart=<?php echo $product_id; ?>" title="add to cart"> Add to cart </a></h4> -->
							<h4><a class="shopBtn" href="cart_view.php?cart_product_id=<?php echo htmlspecialchars($product_id); ?>" title="add to cart"> Add to cart </a></h4>
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
<?php include_once "include/footer.php" ?>