<?php

	require_once 'apriori.php';
	/* ------------------------------------------ testing with array data-------------*/
	$obj=new Apriori();
	$obj->setUseTextOrArray('array'); // * need
	$dataset = array();
	$dataset[]= array('A', 'B', 'C', 'D'); 
	$dataset[]= array('A', 'D', 'C');  
	$dataset[]= array('B', 'C'); 
	$dataset[]= array('A', 'B', 'C','D','E','F','G'); 
	
	$obj->process($dataset);
	//Frequent Itemsets
	echo "<h1>Testing with dataset array</h1>";
	echo '<h1>Frequent Itemsets</h1>';
	$obj->printFreqItemsets();
	echo '<h3>Frequent Itemsets Array</h3>';
	echo '<pre>';
	print_r($obj->getFreqItemsets()); 
	echo '</pre>';
	//Association Rules
	echo '<h1>Association Rules</h1>';
	$obj->printAssociationRules();
	echo '<h3>Association Rules Array</h3>';
	echo '<pre>';
	print_r($obj->getAssociationRules()); 
	echo '</pre>';

	// save to file
	$obj->saveFreqItemsets('freqitemset_test.txt');
	$obj->saveAssociationRules('associative_test.txt');

?>