<div id="sidebar" class="col-md-3 hidden-xs hidden-sm">
		<div class="well well-small">
			<ul class="nav nav-list">
				<?php 
					$stmt = $con->prepare("SELECT * FROM category");
					$stmt -> execute();
					$result = $stmt->get_result();
					while ($row=$result->fetch_assoc()) {
						$cat_id=$row['cat_id'];
						$cat_title=$row['cat_title'];
				 ?>
				<li><a href="view_product.php?cat_id=<?php echo htmlspecialchars($cat_id); ?>"><span class="icon-chevron-right"></span><?php echo htmlspecialchars($cat_title); ?></a></li>
			<?php } ?>
				
				<!-- <li style="border:0"> &nbsp;</li> -->
				<!-- <li> <a class="totalInCart" href="cart.html"><strong>Total Amount  <span class="badge badge-warning pull-right" style="line-height:18px;">$448.42</span></strong></a></li> -->
			</ul>
		</div>
		<!-- <div class="well well-small" ><a href="#"><img src="assets/img/paypal.jpg" alt="payment method paypal"></a></div> -->

		<!-- <a class="shopBtn btn-block" href="#">Upcoming products <br><small>Click to view</small></a> -->
		<br>
		<div class="well">
		<h3>Popular Products</h3>
		</div>
		<br>
		<ul class="nav nav-list promowrapper">
			<?php 
				$stmt = $con->prepare("SELECT * FROM product WHERE product_view_count ORDER BY product_view_count DESC LIMIT 3");
				$stmt -> execute();
				$result = $stmt->get_result();
				while ($row=$result->fetch_assoc()) {
					$product_cat_id=$row['product_cat_id'];
					$product_id=$row['product_id'];
					$product_image=$row['product_image'];
					$product_title=$row['product_title'];
					$product_price=$row['product_price'];
					$product_qty=$row['product_qty'];
					$product_content=$row['product_content'];
			 ?>
			<li>
				<div class="thumbnail">
					<a class="zoomTool" href="product_details.php?productd=<?php echo htmlspecialchars($product_id); ?>" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
					<img src="images/<?php echo htmlspecialchars($product_image); ?>" alt="Special Offer">
					<div class="caption">
						<h4><a class="defaultBtn" href="product_details.php?productd=<?php echo htmlspecialchars($product_id); ?>">VIEW</a> <span class="pull-right">$ <?php echo htmlspecialchars($product_price); ?></span></h4>
					</div>
				</div>
				<li style="border:0"> &nbsp;</li>
			</li>
			
			
			<?php 
				}
			 ?>
			
		</ul>

	</div>