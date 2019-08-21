<?php //session_start() ?>
<?php include_once "include/header.php"; ?>
<?php //session_start(); ?>
<?php //ob_start() ?>


<?php include_once "include/navigation.php"; ?>
<!-- 
Body Section 
-->
	<div class="row">
<?php include_once "include/sidebar.php"; ?>

	<div class="col-md-9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Login</li>
    </ul>
	<h3> Login</h3>	
	<hr class="soft"/>

	<?php 
		//$_SESSION['product_count']=0;
		// if(@$_SESSION['email']!=null && @$_SESSION['password']!=null)
		// {
		// 	$session_email=$_SESSION['email'];
		// 	$session_password=$_SESSION['password'];
			
		// }
		// else
		// {
		// 	$session_email="";
		// 	$session_password="";

		// }

	 ?>
	
	<div class="row">
		<div class="col-md-4">
			<div class="well">
				<h5>ALREADY REGISTERED ?</h5>
				<form action="login_check.php" method="post">
				  <div class="control-group">
					<label class="control-label">Email</label>
					<div class="controls">
						<input class="form-control"  type="email" placeholder="Enter Your Email" name="email">
					    <!-- <input class="span3"  type="email" placeholder="Enter Your Email" name="email" value="<?php echo $session_email ?>"> -->
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label">Password</label>
					<div class="controls">
						<input type="password" class="form-control" placeholder=" Enter Your Password" name="password">
					  <!-- <input type="password" class="span3" placeholder=" Enter Your Password" name="password" value="<?php echo $session_password ?>"> -->
					</div>
				  </div>
				  <?php 
						if(isset($_GET['fail']))
						{
							echo "<p style='color:red;'>Wrong Username or Password!</p>";
						}
	 				?>
				  <br>
				  <div class="control-group">
				  	<input type="submit" name="signin" class="btn btn-default" value="Sign in">
					<!-- <div class="controls">
						
					    <a href="" class="btn btn-default" name="signin">Sign in</a> 
					</div> -->
				  </div>
				</form>
			</div>
		</div>
	</div>	
</div>
</div>
<!-- 
Clients 
-->
<?php include_once "include/footer.php"; ?>