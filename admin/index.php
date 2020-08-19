 <!-- 
-*- coding: utf-8 -*-
# @Author: HeinHtetAung
# @Date:   2019-05-22 12:33:33
# @Last modified by:   Hein Htet Aung
# @Last Modified time: 2019-06-07 00:09:48
-->

<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Admin Panel</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/fontawesome-all.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="panel panel-primary">
        <?php include_once"include_admin/admin_nav.php" ?>
        <div class="panel-body">
          <div class="text-center">
            <h1>Register Users</h1>
            <a href="manage_user.php" class="btn btn-success">View All User </a>
          </div>
          <?php
                 $query=$con->prepare("SELECT * FROM user WHERE user_role='subscriber'");
                 $query->execute();
                 $result=$query->get_result();;
                 while($row=$result->fetch_assoc())
                 {
                   $user_id=$row['user_id'];
                   $user_name=$row['username'];
                   $user_first_name=$row['user_firstname'];
                   $user_last_name=$row['user_lastname'];
                   $user_email=$row['user_email'];
                   $user_image=$row['user_image'];
                   $user_role=$row['user_role'];
                   $user_nrc=$row['user_nrc'];
                   $user_phone_no=$row['user_phone_no'];
                   $user_address=$row['user_address'];
                   $rend_salt=$row['rendSalt'];
                 
              ?>
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 col-md-offset-1 well" method="post">
            <img src="../images/<?php echo $user_image ?>" class="img-circle" width="100px" height="100px"><br>
            <p class="glyphicon glyphicon-user"><?php echo htmlspecialchars($user_name); ?></p><br>
            <p class="glyphicon glyphicon-phone"><?php echo htmlspecialchars($user_phone_no); ?></p><br>
            <p class="glyphicon glyphicon-book"><a href="mailto:<?php echo htmlspecialchars($user_email); ?>?Subject=Welcome Seller&body=Hi,Thanks for choosing our service.Now you can start selling your products.Hope you enjoy our services.<br>Best Regards<br>walmal@info.com"><?php echo htmlspecialchars($user_email); ?></a></p><br>
            <p class="glyphicon glyphicon-road"><?php echo htmlspecialchars($user_address); ?></p><br>
            <a href="index.php?accept=<?php echo htmlspecialchars($user_id); ?>" class="btn btn-success">Accept</a>
            <a href="index.php?reject=<?php echo htmlspecialchars($user_id); ?>" class="btn btn-danger">Reject</a>
          </div>
          <?php } ?>
        </div>
        
      </div>
    </div>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="./js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
  if(isset($_GET['accept'])){
    $user_id=$_GET['accept'];
    $query=$con->prepare("UPDATE user SET user_role='seller' WHERE user_id=?");
    $query->bind_param("s",$user_id);
    $query->execute();
    $result=$query->get_result();
    if ($result) {
    echo "Query oK";
     }else{
      echo "Query Fail.";
        }
        header("location:index.php");

  }
  ?>
  <?php
  if(isset($_GET['reject'])){
    $user_id=$_GET['reject'];
    $query=$con->prepare("DELETE FROM user WHERE user_id=?");
    $query->bind_param("s",$user_id);
    $result=$query->get_result();
    if ($result) {
    echo "Query oK";
     }else{
      echo "Query Fail.";
        }
        header("location:index.php");

  }
  ?>
  