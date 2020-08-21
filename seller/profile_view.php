
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
					<div class="col-md-2 profile-sidebar " style="background-color: #337AB7;">
						<div class="col-md-offset-2 profile-userpic">
							<!-- <img src="img/girl2.jpg" width="100px" height="100px"  class="img img-circle" alt=""> -->
							<img src="../userimgs/<?php echo $_SESSION['user_image'] ?>" width="100px" height="100px"  class="img img-circle" alt="">
						</div>
						<div class="names text-center">
							<h4><u><?php echo htmlspecialchars($_SESSION['username']); ?></u></h4>
							<div class="glyphicon glyphicon-home">-<?php echo htmlspecialchars($_SESSION['user_address']); ?></div><br>
							<div class="glyphicon glyphicon-phone">-<?php echo htmlspecialchars($_SESSION['user_phone_no']); ?></div><br>

							<?php
								$user_id=$_SESSION['user_id'];
								$username=$_SESSION['username'];
								$query=$con->prepare("SELECT * FROM product WHERE product_seller_id=?");
								$query->bind_param("s",$user_id);
								$query->execute();
								$res=$query->get_result();
								$total_product=0;
								$order_product=0;
								$income=0;
						
								while ($row=$res->fetch_assoc()) 
								{
									$total_product+=$row['product_qty'];
									$product_id=$row['product_id'];
									$query=$con->prepare("SELECT * FROM cart WHERE cart_product_id=?");
									$query->bind_param("s",$product_id);
									$query->execute();
									$cart_result=$query->get_result();
									if(!$cart_result)
									{
										die("Huh?");
									}
									while ($cart_row=$cart_result->fetch_assoc()) 
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
							<small><u><?php echo htmlspecialchars($total_product); ?> Items</u></small>
							<h3>Total Order</h3>
							<small><u><?php echo htmlspecialchars($order_product) ?> Orders</u></small> 
							<h3>Total Income</h3>
							<small><u><?php echo htmlspecialchars($income) ?> MMK</u></small>
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