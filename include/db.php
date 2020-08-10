<?php 
	$db['db_host']='127.0.0.1';
	$db['db_user']='root';
	$db['db_pass']='root';
	$db['db_name']='ecommerce';

	foreach ($db as $key => $value) {
		define(strtoupper($key),$value);
	}
	$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	// if ($con) {
	// 	echo "Connection Successfully.";
	// }else{
	// 	echo "ConnectionFailed.";
	// }
?>


	