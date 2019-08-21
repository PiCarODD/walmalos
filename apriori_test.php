<?php include_once "include/db.php" ?>
<?php include_once "include/header.php" ?>
<?php include_once "include/navigation.php" ?>
<?php include_once "include/sidebar.php" ?>
<?php //include_once "product_details.php" ?>
<div class="col-md-9">
<div class="well well-small">			
<?php
	function confirm_query($result)
	{
		if (!$result) 
		{
			die("Query Fails!".mysqli_error($result));
		}
	}

	require_once 'test/apriori.php';
	/* ------------------------------------------ testing with array data-------------*/
	function apriori_function($product_id)
	{
		//echo $product_id;
		global $con;
		$obj=new Apriori();
		$obj->setUseTextOrArray('array'); // * need
		$dataset = array();

		$customer_query="SELECT * FROM customer";
		$customer_result=mysqli_query($con,$customer_query);
		confirm_query($customer_result);
		
		while ($customer_row=mysqli_fetch_assoc($customer_result)) 
		{
			//echo $cart_customer_id=$customer_row['customer_id']."=";
			$cart_customer_id=$customer_row['customer_id'];
			$query="SELECT * FROM cart WHERE cart_customer_id='$cart_customer_id'";
			$result=mysqli_query($con,$query);
			confirm_query($result);
			
			while ($row=mysqli_fetch_assoc($result)) 
			{
				//echo $row['cart_product_id'];
				$cart_array[]=$row['cart_product_id'];

			}
			if(@$cart_array != null)
			{
				$dataset[]=$cart_array;
				$cart_array=null;
			}
			
			
		}
		//if(array_search($cart_product_id, $cart_product_array))
		
		$obj->process($dataset);
		
		$result_arr=$obj->getFreqItemsets();
		print_r($result_arr);

		
			
		if(array_search($product_id, $result_arr))
		{
			$i=0;
			foreach ($result_arr as $key => $value) 
			{
				if($product_id!=$value)
				{
					$fre_arr[$i]=$value;
					$i+=1;
				}
				
			}
			// print_r($result_arr);
			// echo "<br>";
			//print_r($fre_arr);
			unset($fre_arr[0]);
			//echo "<br>";
			//print_r($fre_arr);
			?>
	
			<?php
			//foreach ($fre_arr as $key => $value) 
			for($j=1; $j<=count($fre_arr); $j++)	
			{
				//echo $fre_arr[$j];
				$related_query="SELECT * FROM product WHERE product_id=$fre_arr[$j]";
				$related_result=mysqli_query($con,$related_query);
				confirm_query($related_result);
				$related_row=mysqli_fetch_assoc($related_result);
				$product_id=$related_row['product_id'];
				$product_image=$related_row['product_image'];
				$product_title=$related_row['product_title'];
				$product_content=$related_row['product_content'];
				$product_price=$related_row['product_price'];
				?>
				
					<div class="row">
					<div class="col-md-3">
						<img src="images/<?php echo $product_image; ?>" width="150px" alt="">
					</div>
					<div class="col-md-5">
						<h5><?php echo $product_title; ?></h5>
						<p>
						<?php echo $product_content; ?>
						</p>
					</div>
					<div class="col-md-4 alignR">
					<form class="form-horizontal qtyFrm">
					<h3>$<?php echo $product_price; ?></h3>
					
					<div class="btn-group">
					  <a href="cart_view.php?cart_product_id=<?php echo $product_id ?>" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
					  <a href="product_details.php?productd=<?php echo $product_id ?>" class="shopBtn">VIEW</a>
					 </div>
						</form>
					</div>
					
				</div>
				<hr>
				<?php

			
			}
		}
	
	}


?>
</div>	
</div>	