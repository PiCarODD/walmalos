<?php
	
	function add_to_cart($cart_product_id)
	{
		global $con; 
		if(@$_SESSION['cart_product_array']!=null)
		{
			$cart_product_array=$_SESSION['cart_product_array'];
			//print_r(array_search($cart_product_id, $cart_product_array));
			if(array_search($cart_product_id, $cart_product_array))
			{	
				$key=array_search($cart_product_id, $cart_product_array);
				qty_plus($cart_product_id,$key);

			}
			else
			{
				$_SESSION['cart_product_array'][]=$cart_product_id;
				$_SESSION['qty'][]=1;
			}
		}

		else
		{
			$_SESSION['cart_product_array'][1]=$cart_product_id;
			$_SESSION['qty'][1]=1;
		}
		
	}

	function qty_plus($cart_product_id,$key)
	{
		global $con;
		$query="SELECT * FROM product WHERE product_id=$cart_product_id";
		$result=mysqli_query($con,$query);
		if(!$result)
		{
			die("Fail".mysqli_error($result));
		}
		$row=mysqli_fetch_assoc($result);
		if($_SESSION['qty'][$key]==$row['product_qty'])
		{
			$_SESSION['qty'][$key]=$row['product_qty'];
		}
		else
		{
			$_SESSION['qty'][$key]+=1;
		}
	}

?>