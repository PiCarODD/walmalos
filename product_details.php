<?php include_once "include/header.php" ?>
<!-- 
	Upper Header Section 
-->
<?php include_once "include/navigation.php" ?>
<!-- 
Body Section 
-->
<div class="row">
	<?php include_once "include/sidebar.php" ?>
	<?php include "cart_list.php" ?>
	<?php include "apriori_test.php" ?>

	<?php ob_start() ?>

	<div class="col-md-9">
		<ul class="breadcrumb">
			<li><a href="#">Home</a> <span class="divider">/</span></li>
			<li><a href="#">Items</a> <span class="divider">/</span></li>
			<li class="active">Preview</li>
		</ul>	
		<div class="row-fluid">
			<div class="well well-small col-md-12">
				

				<?php
				$product_id=0;
				if (isset($_GET['productd'])) 
				{
					$product_id = $_GET['productd'];
					$product_id = mysqli_real_escape_string($con,$product_id);
					htmlspecialchars($product_id);
					$stmt = $con->prepare('UPDATE product SET product_view_count=product_view_count+1 WHERE product_id=?');
					$stmt->bind_param('s', $product_id); // 's' specifies the variable type => 'string'
					$stmt->execute();
					$stmt = $con->prepare('SELECT * FROM product WHERE product_id=?');
					$stmt->bind_param('s', $product_id); // 's' specifies the variable type => 'string'
					$stmt->execute();
					$result = $stmt->get_result();
					if (!$result) 
					{
						die("Huh?");
					}
					while ($row= $result->fetch_assoc())
					{
						$product_cat_id=$row['product_cat_id'];
						//$s_product_id=$row['product_id'];
						$product_image=$row['product_image'];
						$product_title=$row['product_title'];
						$product_price=$row['product_price'];
						$product_qty=$row['product_qty'];
						$product_content=$row['product_content'];
					
						?>
						<div class="col-md-5">
							<div class="item active">
								<a href="#"> <img src="images/<?php  echo htmlspecialchars($product_image); ?>" alt="" style="width:100%"></a>
							</div>
							<h4>Leave Your Comment!!!</h4>
							<form role="form" method="post">
								<div class="form-group">
									<input type="text" name="comment_author" class="form-control" placeholder="Please enter your name">
								</div>
								<div class="form-group">
									<input type="email" name="comment_email" class="form-control" placeholder="Please enter your email">
								</div>
								<div class="form-group">
									<textarea class="form-control" rows="3" name="comment_content" placeholder="Enter Your Comment"></textarea>
								</div>
								<button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
							</form>
						</div>
						<div class="col-md-7">
							<h3><?php echo htmlspecialchars($product_title); ?><div class="pull-right"><a href="index.php" class="btn btn-success"><span class="icon icon-arrow-left"></span></a></div></h3>
							<hr class="soft"/>

							<form class="form-horizontal qtyFrm">
								<div class="control-group">
									<label class="control-label"><span>$<?php echo htmlspecialchars($product_price); ?></span></label>
							<!-- <div class="controls">
							<input type="number" class="span6" placeholder="Qty.">
						</div> -->
						</div>


						<h4><?php echo htmlspecialchars($product_qty); ?> Items are instock</h4>
						<p><?php echo htmlspecialchars($product_content); ?>
						<p>
						<?php 
					} 
				}
			?>

				<h4><a class="shopBtn" href="cart_view.php?cart_product_id=<?php echo htmlspecialchars($product_id); ?>" title="add to cart"> Add to cart </a></h4>
			</form>
		</div>

	</div>

	<?php 
	//$productd=0;
	if(isset($_POST['create_comment']))
	{
		$productd = $_GET['productd'];
		$productd = mysqli_real_escape_string($con,$productd);
		htmlspecialchars($productd);
		$comment_author = $_POST['comment_author'];
		$comment_author = mysqli_real_escape_string($con,$comment_author);
		htmlspecialchars($comment_author);
		$comment_email = $_POST['comment_email'];
		$comment_email = mysqli_real_escape_string($con,$comment_email);
		htmlspecialchars($comment_email);
		$comment_content = $_POST['comment_content'];
		$comment_content = mysqli_real_escape_string($con,$comment_content);
		htmlspecialchars($comment_content);
		$stmt = $con->prepare("INSERT INTO comment(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES (?, ?, ?, ?, 'unapproved', now())");
		$stmt->bind_param('isss',$productd,$comment_author,$comment_email,$comment_content);
		$stmt->execute();
		$stmt = $con->prepare("UPDATE product SET product_comment_count=product_comment_count + 1 WHERE product_id=?");
		$stmt->bind_param('i',$productd);
		$stmt->execute();

	}


	?>


	<hr class="softn clr"/>
	<?php 
          	$select_comment_post_id=$product_id;//from index
          	$product_id = mysqli_real_escape_string($con,$product_id);
          	htmlspecialchars($product_id);
          	$select_comment_post_id = mysqli_real_escape_string($con,$select_comment_post_id);
          	htmlspecialchars($select_comment_post_id);
            $query="SELECT * FROM comment WHERE comment_post_id=$select_comment_post_id AND comment_status='approved' ORDER BY comment_id DESC";
            $result=mysqli_query($con,$query);
            $stmt = $con->prepare("SELECT * FROM comment WHERE comment_post_id=? AND comment_status='approved' ORDER BY comment_id DESC");
			$stmt->bind_param('i',$select_comment_post_id);
			$stmt->execute();
			$result=$stmt->get_result();
            if (!$result) {
            	die("Huh?");
            }

            while ($row=$result->fetch_assoc()) {
            	$comment_author=$row['comment_author'];
            	$comment_date=$row['comment_date'];
            	$comment_content=$row['comment_content'];

            	?>

            	<!-- Comment -->
            	<div class="well media">
            		<a class="pull-left" href="#">
            			<img class="media-object" src="http://placehold.it/64x64" alt="">
            		</a>
            		<div class="media-body">
            			<h4 class="media-heading"><?php echo htmlspecialchars($comment_author); ?>
            			<small><?php echo htmlspecialchars($comment_date); ?></small>
            		</h4>
            		<?php echo htmlspecialchars($comment_content); ?>
            	</div>
            </div>
            <?php 
        }    
    ?>
    <div class="row-fluid">
    	<div class="well col-md-12">
    		<ul class="nav navbar-nav">
	        <li class=""><a href="index.php">Product Details</a></li>
		 	<li class=""><a href="product_details.php?related_product_id=<?php echo htmlspecialchars($product_id) ?>&&productd=<?php echo htmlspecialchars($product_id); ?>">Related Products</a></li>
			
	    </ul>
    	</div>
    </div>
    	

	    

        <!-- <ul id="productDetail" class="nav nav-tabs">
        	<li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
        	<li class=""><a href="apriori_test.php ? product_id=<?php echo $product_id ?>" data-toggle="tab">Related Products </a></li>
  
        </ul> -->
        <div id="myTabContent" class="tab-content tabWrapper">
        	<div class="tab-pane fade active in" id="home">
        		<!-- <h4>Product Information</h4> -->
        		<?php 
			    	if (isset($_GET['related_product_id'])) 
			    	{

			    		?>
			    		
								<?php
									apriori_function($_GET['related_product_id']);
								?>
							
						<?php
			    	}
			     ?>

        	</div>

        </div> 
        
	</div>
</div>
</div>
<!-- Body wrapper -->
<!-- 
Clients 
-->
<?php include_once "include/footer.php"; ?>