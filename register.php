<?php 
include_once "include/header.php";
if(isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
    $c_password=$_POST['c_password'];
	$user_nrc=$_POST['user_nrc'];
	$user_address=$_POST['user_address'];
	$user_phone_no=$_POST['user_phone_no'];
	$target_dir = "userimgs/";
	$target_file = $target_dir . basename($_FILES["user_image"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$check = getimagesize($_FILES["user_image"]["tmp_name"]);
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
	{
	  header("Location:register.php?imgerror");
	  exit();
	}
	else{
		$bytes = random_bytes(20);
		$target_file = bin2hex($bytes)+".png";
		move_uploaded_file($_FILES["user_image"]["tmp_name"], $target_file) ;
	}
	if($password===$c_password)
	{
		$username=mysqli_real_escape_string($con,$username);
		$password=mysqli_real_escape_string($con,$password);
		$email=mysqli_real_escape_string($con,$email);
	    $user_nrc=mysqli_real_escape_string($con,$user_nrc);
		$user_phone_no=mysqli_real_escape_string($con,$user_phone_no);
		$c_password=mysqli_real_escape_string($con,$c_password);
		$password=mysqli_real_escape_string($con,$password);
		// $password=password_hash($password,PASSWORD_BCRYPT,array('cost'=>10));

		$query = $con->prepare("SELECT * FROM user WHERE user_email=?");
		$query->bind_param("s",$email);
		$query->execute();
		$result = $query->get_result();
		if(mysqli_num_rows($result)>0)
		{
			header("Location:register.php?fail");
		}
		else
		{
			$password=password_hash($password,PASSWORD_BCRYPT,array('cost'=>10));
			$query=$con->prepare("INSERT INTO user(username, user_password, user_email, user_image, user_role, user_nrc, user_phone_no, user_address) VALUES ('$username','$password','$email', '$user_image', 'subscriber','$user_nrc','$user_phone_no','$user_address')");
			$query->bind_param("ssssssss",$username,$password,$email,$target_file,$subscriber,$user_nrc,$user_phone_no,$user_address);
			$query->execute();
			$result=$query->get_result();
			header("Location:register.php?success");
			//header("Location:register.php?success");
		}
	}
	else
	{
		header("Location:register.php?wrongpasswd");
		// $wrong="Your password is wrong";
	}

	
}

?>
<!-- 
	Upper Header Section 
-->
<?php include_once "include/navigation.php"; ?>
<!-- 
Body Section 
-->

<?php
	if(isset($_GET['success']))
						{
							echo '<body onload="register()">';
						} 
?>
<div class="row">
<div id="regmodal" class="modal" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5>Welcome User</h5>
					<!-- <button class="" class="close" data-dismiss="modal"><span>&times;</span></button> -->
				</div>
				<div class="modal-body">
					<p class="text-center" style="color: green;font-size: 2em;">We will activate your account soon!</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" style="margin-right: 30%;width: 200px" id="cal">Ok</button>
				</div>
			</div>	
		</div>
	</div>
	<?php include_once "include/sidebar.php"; ?>
	<div class="col-md-9">
		<ul class="breadcrumb">
			<li><a href="index.html">Home</a> <span class="divider">/</span></li>
			<li class="active">Registration</li>
		</ul>
		<h3> Registration</h3>	
		<hr class="soft"/>
		<div class="row-fluid">
			<div class="well col-md-12 col-xs-12 col-sm-12">
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="col-md-4 col-xs-5 col-sm-6">
						<h3><u>Your Personal Details</u></h3>
						<div class="control-group">
							<label class="control-label" for="inputusername">Username <sup>*</sup></label>
							<div class="controls">
								<input class="form-control" type="text" id="inputFname" placeholder="Enter User Name" name="username" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputEmail">Email <sup>*</sup></label>
							<div class="controls">
								<input class="form-control" type="email" placeholder="Email" name="email" required >
							</div>
							<?php
	if(isset($_GET['fail']))
	{
		echo "<p style='color:red;'>Your email is already exist!</p>";
	} 
 ?>
						</div>	  
						<div class="control-group">
							<label class="control-label">Password <sup>*</sup></label>
							<div class="controls">
								<input class="form-control" type="password" placeholder="Enter Your Password" name="password" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Confirm Password <sup>*</sup></label>
							<div class="controls">
								<input class="form-control" type="password" placeholder="Enter Your confirm Password" name="c_password" required>
							</div>
							<?php
	if(isset($_GET['wrongpasswd']))
	{
		echo "<p style='color:red;'>Passwords doesn't match!</p>";
	} 
 ?>
						</div>
						<div class="control-group">
							<label class="control-label">NRC <sup>*</sup></label>
							<div class="controls">
								<input type="text" placeholder=" NRC" class="form-control" name="user_nrc" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Phone Number<sup>*</sup></label>
							<div class="controls">
								<input type="text" placeholder=" Phone name" class="form-control" name="user_phone_no" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Address<sup>*</sup></label>
							<div class="controls">
								<input type="text" class="form-control" placeholder="Fill Your Address Completely!!" name="user_address" required>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-2 col-xs-2">
						<div class="control-group">
							<div class="controls">
								<br><br><br><br>
								<div id='profile-upload'>
									<div class="hvr-rectangle-out"><input type="file" name="user_image" id='getval'  class="upload" required></div>
								</div>
								<u>Profile Image</u>
							</div>
						</div>
						<?php if(isset($_GET['imgerror'])){
							echo "<p style='color:red'>Only images allowed...</p>";
						} ?>
						

						<div class="control-group">
							<div class="controls">
								<input type="submit" name="submit" value="Register" class="exclusive shopBtn">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>

</div>
<!-- 
Clients 
-->
<?php include_once "include/footer.php"; ?>