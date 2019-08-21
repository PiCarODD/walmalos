<?php session_start(); ?>
<div class="navbar navbar-default navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				<div class="pull-left socialNw">
					<a href="#"><span class="icon-twitter"></span></a>
					<a href="#"><span class="icon-facebook"></span></a>
					<a href="#"><span class="icon-youtube"></span></a>
					<a href="#"><span class="icon-tumblr"></span></a>
				</div>
				<a class="active" href="index.php"> <span class="icon-home"></span> Home</a> 
				<a href="contact.php"><span class="icon-envelope"></span> Contact us</a>
				<a href="cart_view.php"><span class="icon-shopping-cart"></span></a>
				<a href="register.php"><span class="icon-edit"></span> Register </a> 
				<a href="login.php"><span class="icon-lock"></span> Login </a>
				<?php 
					
					if(@$_SESSION['email']!=null && @$_SESSION['password']!=null)
					{
						$user_role=$_SESSION['user_role'];
						$session_email=$_SESSION['email'];
						$session_password=$_SESSION['password'];
						//email=<?php echo $session_email password=<?php echo $session_password 
						//include_once "login_check.php";

						?>
						<a href="../ecommerce/login_check.php?user_role=<?php echo $user_role ?>"><span class="icon-user"></span>My Account </a>
						<?php
						
					}
					else
					{
						?>
						<a href="../ecommerce/login_check.php?user_role=<?php echo 'null' ?>"><span class="icon-user"></span>My Account </a>				
						<?php
					}
				 ?>


			</div>
		</div>
	</div>
</div>

<!--
Lower Header Section 
-->
<div class="container">
	<div id="gototop"> </div>
	<header id="header">
		<div class="row">
			<div class="col-md-4">
				<h1>
					<a class="logo" href="index.php"><span>Wal Mal Online Shop</span> 
						<img src="assets/img/logo1.png" alt="bootstrap sexy shop">
					</a>
				</h1>
			</div>

		</div>
	</header>

<!--
Navigation Bar Section 
-->
<!-- <div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<div class="nav-collapse">
				<ul class="nav">
					<li class="active"><a href="index_sec.php">Home	</a></li>
					<li class=""><a href="list_view.php">Product List View</a></li>
					<li class=""><a href="grid_view.php">Product Grid View</a></li>
					<li class=""><a href="event.php">Event</a></li>
				</ul>
				<form action="#" class="navbar-search pull-right">
					<input type="text" placeholder="Search" class="search-query span2">
					<a class="btn btn-success">Search</a>
				</form>
			</div>
		</div>
	</div>
</div> -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <!-- <a class="navbar-brand" href="#">WalMal Online Shop</a> -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class=""><a href="index.php">Home</a></li>
	 	<li class=""><a href="list_view.php">Product List View</a></li>
		<li class=""><a href="grid_view.php">Product Grid View</a></li>
		<li class=""><a href="event.php">Event</a></li>
      </ul>
      <div class="nav navbar-nav navbar-right">
        <form class="navbar-form navbar-left" method="post" action="search_result.php">
	      <div class="input-group">
	        <div class="input-container">
	        	<input type="text" class="form-control" placeholder="Search" name="txtsearch">
	        	<!-- <i class=""></i> -->
	        	<input type="submit" name="btnsearch" value="Search" class="btn btn-success">
	          <!-- <button class="btn btn-default" type="submit" name="btnsearch">
	            <i class="icon-search"></i>
	          </button> -->
	        </div>
	      </div>
	    </form>
      </div>
    </div>
  </div>
</nav>