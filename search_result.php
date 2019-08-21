<?php include_once "include/header.php"; ?>
<?php include_once "include/navigation.php"; ?>
<!-- <?php include "cart_session.php" ?> -->
<!-- 
Body Section 
-->
	<div class="row">
<?php include_once "include/sidebar.php"; ?>	
<div class="col-md-9">
<div class="">
		
	<?php 
		if(isset($_POST['btnsearch'])){
			 $txtsearch=$_POST['txtsearch'];
			 $query="SELECT * FROM product
			  WHERE product_status='approved' 
			  AND product_title RLIKE '$txtsearch'";
		$result=mysqli_query($con,$query);
		echo " <h3>Search Result of &nbsp;&nbsp;&nbsp; '{$txtsearch}'</h3>";
		while ($row=mysqli_fetch_assoc($result)) {
			
			$product_cat_id=$row['product_cat_id'];
			$product_id=$row['product_id'];
			$product_image=$row['product_image'];
			$product_title=$row['product_title'];
			$product_price=$row['product_price'];
			$product_qty=$row['product_qty'];
			$product_content=$row['product_content'];
	 ?> 
	 	<div class="row-fluid">	
	 	<div class="col-md-12 well">
		<div class="col-md-4">
			<img src="images/<?php echo $product_image; ?>" width="200px" height="200px" alt="">
		</div>
		<div class="col-md-4">
			<h5><?php echo $product_title; ?></h5>
			<p><?php echo $product_content; ?></p>
		</div>
		<div class="col-md-4 alignR">
		<form class="form-horizontal qtyFrm">
			<h3>$<?php echo $product_price; ?></h3>
		 		<div class="btn-group">
				;
		  			<a href="list_view.php?cart_product_id=<?php echo $product_id ?>" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
		  			<a href="product_details.php?productd=<?php echo $product_id ?>" class="shopBtn">VIEW</a>
		 		</div>
		</form>
		</div>
		</div>
	</div>
<?php  } } ?>

	<hr class="soften">

	<?php 
		if(isset($_GET['cart_product_id']))
		{
			$cart_product_id=$_GET['cart_product_id'];
			$_SESSION['cart_product_array'][]=$cart_product_id;
			//$_SESSION['product_count']+=1;
		}
	 ?>
	
</div>
</div>
</div>
<!-- Clients -->
<?php include_once "include/footer.php"; ?>	