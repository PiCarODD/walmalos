<?php ob_start() ?>
<?php include_once"../include/db.php" ?>
<div class="panel-heading">
					<h1 style="font-family: serif;"></span><u>Welcome Admin</u></h1>
					<nav class="nav navbar-default nav-tabs-justified">
						<button class="navbar-toggle" data-toggle="collapse" data-target="#one">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-collapse collapse" id="one">
							<ul class="nav navbar-nav">
								<li><a href="index.php">Manage User</a></li>
								<li><a href="category.php">Category</a></li>
								<li><a href="product.php">View all product</a></li>
								
								
								<!-- <li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Users <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="manage_user.php">View User</a></li>
										<li><a href="register_user.php">View Register User</a></li>
									</ul>
								</li> -->
								<li><a href="feedbacks.php">User Feedbacks</a></li>
								<li><a href="pending.php">Pending Products</a></li>
								<li><a href="add_event.php">Add Events</a></li>
								<li></li>
							</ul>
							<ul class="nav pull-right">
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li>
											<span class="glyphicon glyphicon-home"><a href="../index.php">Home</a></span>
										</li>
										<li>
											<span class="glyphicon glyphicon-log-out"><a href="../logout.php">Logout</a></span>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</nav>
				</div>