<?php include_once "include/header.php"; ?>
<?php session_start(); ?>
<?php ob_start() ?>
<?php  

//serialize lote yan
		if(isset($_GET['user_role']))
		{
			if($_GET['user_role']=='seller')
			{
				header('Location: seller/orders.php');
			}
			elseif ($_GET['user_role']=='admin') 
			{
				header('Location: admin/index.php');
			}
			elseif ($_GET['user_role']=='null') 
			{
				header('Location: index.php');
			}

		}


		if(isset($_POST['signin'])){
			$email = $_POST['email'];
			$password = $_POST['password'];

			$email = mysqli_real_escape_string($con,$email);
			$password = mysqli_real_escape_string($con,$password);
			

			$query = $con->prepare("SELECT * FROM user WHERE user_email=?");
			$query->bind_param("s",$email);
			$query->execute();
			$result = $query->get_result();
			while ($row=$result->fetch_assoc()) {
				$db_id = $row['user_id'];
				$db_username=$row['username'];
				$db_address=$row['user_address'];
				$db_user_phone_no=$row['user_phone_no'];
				$db_email = $row['user_email'];
				$db_password = $row['user_password'];
				$db_image = $row['user_image'];
				$db_role = $row['user_role'];
			}
			
			if(password_verify($password,$db_password))
			{
				$_SESSION['user_id'] = $db_id;
				$_SESSION['username'] = $db_username;
				$_SESSION['user_address'] = $db_address;
				$_SESSION['user_phone_no'] = $db_user_phone_no;
				$_SESSION['email'] = $db_email;
				$_SESSION['user_image'] = $db_image;
				$_SESSION['password'] = $password;
				$_SESSION['user_role'] = $db_role;
				if($db_role=='seller')
				{
					header('Location: seller/orders.php');
				}
				elseif($db_role=='admin')
				{
					header('Location: admin/index.php');
				}
				
			}
			else
			{
				header("Location: login.php?fail");
			}
		}
	 ?>