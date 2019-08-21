<?php
	$dbase['db_host']='localhost';
	$dbase['db_user']='root';
	$dbase['db_pass']='';
	$dbase['db_name']='ecommerce';

	foreach ($dbase as $key => $value) {
		define(strtoupper($key),$value);
	}
	$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	function confirm_query($result)
	{
		if (!$result) 
		{
			die("Query Fails!".mysqli_error($result));
		}
	}

	require_once 'apriori.php';
	/* ------------------------------------------ testing with array data-------------*/
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
	
	$obj->process($dataset);
	//Frequent Itemsets
	// echo "<h1>Testing with dataset array</h1>";
	// echo '<h1>Frequent Itemsets</h1>';
	// $obj->printFreqItemsets();
	// echo '<h3>Frequent Itemsets Array</h3>';
	// echo '<pre>';
	//print_r($obj->getFreqItemsets()); 
	$res_arr=$obj->getFreqItemsets();
	print_r($res_arr);
	echo '</pre>';
	//Association Rules
	// echo '<h1>Association Rules</h1>';
	// $obj->printAssociationRules();
	// echo '<h3>Association Rules Array</h3>';
	// echo '<pre>';
	// print_r($obj->getAssociationRules()); 
	// echo '</pre>';

	// // save to file
	// $obj->saveFreqItemsets('freqitemset_test.txt');
	// $obj->saveAssociationRules('associative_test.txt');

?>