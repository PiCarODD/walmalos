
<!-- 
-*- coding: utf-8 -*-
# @Author: HeinHtetAung
# @Date:   2019-06-05 12:52:03
# @Last modified by:   Hein Htet Aung
# @Last Modified time: 2019-06-07 00:06:56
-->
<?php session_start() ?>
<?php include_once "../include/db.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Welcome Seller</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
	
	<?php 
        if(isset($_GET['delete']))
        {
	        $product_id = $_GET['delete'];
	        $delete_query = "DELETE FROM product WHERE product_id ='$product_id'";
	        $delete_result = mysqli_query($con,$delete_query);

	        if(!$delete_result){
	            die('Query Failed'. mysqli_error($delete_result));
	        }
        }
            
    ?>
   
	<div class="container">
		<div class="row">
			<div class="panel panel-primary">

				<?php include_once "profile_view.php" ?>

						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Image</th>
									<th>Category</th>
									<th>Price</th>
									<th>Qty</th>
									<th>Status</th>
									<th>Delete</th>
									<th>Edit</th>
								</tr>
							</thead>
							<tbody>
					<?php 
	                    $per_page=3;
	                    if (isset($_GET['page'])) 
	                    {
	                       $page=$_GET['page'];

	                    }
	                    else
	                    {
	                        $page='';
	                    }
	                    if($page=='')
	                    {
	                    	$no_count=0;
	                        $page_start=0;
	                    }
	                    else
	                    {
	                        $page_start=($page*3)-3;
	                        $no_count=$page_start;
	                    }
	                 ?>


                <?php 
                	$user_id=$_SESSION['user_id'];
                	//$username=$_SESSION['username'];
                    $product_count_query="SELECT * FROM product WHERE product_seller_id=$user_id";
                    $product_count_result=mysqli_query($con,$product_count_query);
                    if(!$product_count_result)
                    {
                        die('Query Failed'. mysqli_error($product_count_result));
                    }
                    $product_count=mysqli_num_rows($product_count_result);
                    
                    //echo $product_count;
                    $count=ceil($product_count/3);
               
					$query ="SELECT * FROM product WHERE product_seller_id=$user_id ORDER BY product_id DESC LIMIT $page_start,$per_page";
                    $result=mysqli_query($con,$query);
                     if(!$result){
                            die('Query Failed'. mysqli_error($result));
                        }
                    
                    while($row = mysqli_fetch_assoc($result) ) 
                    {
                         $no_count+=1;
                         $product_id = $row['product_id'];
                         $product_title = $row['product_title'];
                         $product_image = $row['product_image'];
                         $product_cat_id=$row['product_cat_id'];
                         $product_price= $row['product_price'];
                         $product_qty= $row['product_qty'];
                         $product_status=$row['product_status'];

                          
						?>
							<tr>
								<td><?php echo $no_count; ?></td>
								<td><?php echo $product_title; ?></td>
								<td><img src="../images/<?php echo $product_image ?>" alt="" class ="img-responsive" width="100px;"></td>
								<td><?php 
                                    $query = "SELECT * FROM category WHERE cat_id = $product_cat_id";
                                    $cat_result = mysqli_query($con,$query);
                                    if(!$cat_result){
                                        die("Query Failed". mysqli_error($cat_result));
                                    }
                                    while ($row = mysqli_fetch_assoc($cat_result)) {
                                        echo $cat_title = $row['cat_title'];
                                        
                                    }   
                                 ?></td>
								<td><?php echo $product_price?></td>
								<td><?php echo $product_qty ?></td>
								<td><p class=""><?php echo $product_status ?></p></td>
								<td><a href="products.php?delete=<?php echo $product_id?> "><span class="glyphicon glyphicon-trash">
								</span></td>
								<td><a href="update_products.php?edit=<?php echo $product_id?>">Edit</a></td>
							</tr>
							<?php
						}
					
						?>

								
						</tbody>
					</table>
						<div class="row vertical-center-row">
						 <ul class="pager">
                    <?php 
                        for($i=1;$i<=$count;$i++) {
                            echo "<li><a href='products.php?page=$i'>$i</a></li>";
                        }
                     ?>
                   <!--  <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li> -->
                </ul>
					</div>
					</div>
				</div>
				<div class="panel-footer">
					<nav class="nav navbar-default navbar-fixed-bottom">
						<p>Make with <span class="glyphicon glyphicon-heart"></span> Team <font color="#204A87FF">Bane Mont</p>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>