<?php include_once "include/header.php"; ?>
<?php include_once "include/navigation.php"; ?>
<?php //include "cart_session.php" ?>
<?php include "cart_list.php" ?>
<!-- 
Body Section 
-->
	<div class="row">
<?php include_once "include/sidebar.php"; ?>	
<div class="col-md-9">
<div class="well well-small">
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
	<div class="row">	
	 
		<div class="col-md-3">
			<img src="images/<?php echo htmlspecialchars($product_image); ?>" width="150px" alt="">
		</div>
		<div class="col-md-5">
			<h5><?php echo htmlspecialchars($product_title); ?></h5>
			<p>
			<?php echo htmlspecialchars($product_content); ?>
			</p>
		</div>
		<div class="col-md-4 alignR">
		<form class="form-horizontal qtyFrm">
		<h3>$<?php echo $product_price; ?></h3>
		<!-- <label class="checkbox">
			<input type="checkbox">  Adds product to compair
		</label><br> -->
		<div class="btn-group">
		  <a href="cart_view.php?cart_product_id=<?php echo htmlspecialchars($product_id); ?>" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
		  <a href="product_details.php?productd=<?php echo htmlspecialchars($product_id); ?>" class="shopBtn">VIEW</a>
		 </div>
			</form>
		</div>
		
	</div>

	<hr class="soften">
<?php } ?>
	
	
</div>
</div>
</div>
<!-- 
Clients 
-->
<?php include_once "include/footer.php"; ?>	