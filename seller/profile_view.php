
<?php require_once "../include/db.php" ?>
<div class="panel-heading">
					<nav class="nav">
						<span class="h3">
							Welcome Seller
						</span>
						<span class="pull-right">
							<a href="../index.php"><span class="glyphicon glyphicon-home names">Home</span>&nbsp;</a>
							<a href="../logout.php"><span class="glyphicon glyphicon-log-out names">Logout</span></a>
						</span>
					</nav>
				</div>
				<div class="panel-body">
					<div class="col-md-2 profile " style="background-color: #337AB7;">
						<div class="col-md-offset-2">
							<!-- <img src="img/girl2.jpg" width="100px" height="100px"  class="img img-circle" alt=""> -->
							<img src="../images/<?php echo $_SESSION['user_image'] ?>" width="100px" height="100px"  class="img img-circle" alt="">
						</div>
						<div class="names text-center">
							<h4><u><?php echo $_SESSION['username'] ?></u></h4>
							<div class="glyphicon glyphicon-home">-<?php echo $_SESSION['user_address'] ?></div><br>
							<div class="glyphicon glyphicon-phone">-<?php echo $_SESSION['user_phone_no'] ?></div><br>

							<?php
								$user_id=$_SESSION['user_id'];
								$username=$_SESSION['username'];
								$query="SELECT * FROM product WHERE product_seller_id=$user_id";
								$res=mysqli_query($con,$query);
								if(!$res)
								{
									die("Query failed" . mysqli_error($res));
								}

								$total_product=0;
								$order_product=0;
								$income=0;
						
								while ($row=mysqli_fetch_assoc($res)) 
								{
									$total_product+=$row['product_qty'];
									$product_id=$row['product_id'];
									$query="SELECT * FROM cart WHERE cart_product_id=$product_id";
									$cart_result=mysqli_query($con,$query);
									if(!$cart_result)
									{
										die("Query failed" . mysqli_error($cart_result));
									}
									while ($cart_row=mysqli_fetch_assoc($cart_result)) 
									{
										$order_product+=$cart_row['cart_qty'];
										//$income+=($row['product_price']*$row['product_qty']);
										//$total_income+=$income;
										$income+=$cart_row['cart_total_price'];
									
										//echo "<small><u>{$order_product} Orders</u></small>";
									}
									
								}
							?>

							<h3>Total Products On Sale</h3>
							<small><u><?php echo $total_product ?> Items</u></small>
							<h3>Total Order</h3>
							<small><u><?php echo $order_product ?> Orders</u></small> 
							<h3>Total Income</h3>
							<small><u><?php echo $income ?> MMK</u></small>
						</div>
					</div>

					<div class="col-md-9">
						<nav class="nav navbar-default navbar-static-top">
							<button class="navbar-toggle" data-toggle="collapse" data-target="#one">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div class="navbar-collapse collapse" id="one">
								<ul class="nav navbar-nav">
									<li><a href="orders.php">Total Orders</a></li>
									<li><a href="products.php">Total Products</a></li>
									<li><a href="s_product.php">Sell Products</a></li>
								</ul>
							</div>
						</nav>